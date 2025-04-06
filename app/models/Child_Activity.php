<?php

class Child_Activity {
    private $db;

    function __construct() {
        $this->db = connect_to_db();
    }

    public function CreateChildActivity($id_enfant, $id_activite, $date_debut_activite, $date_fin_activite, $rabais = null) {
        // Vérifier si l'enfant est déjà inscrit à l'activité
        $query = "SELECT COUNT(*) FROM INSCRIPTION_ACTIVITE WHERE id_enfant = :id_enfant AND id_activite = :id_activite";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id_enfant' => $id_enfant,
            ':id_activite' => $id_activite
        ]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // L'enfant est déjà inscrit à l'activité
            return false;
        }

        // Vérifier le nombre de places disponibles pour l'activité
        $query = "SELECT nb_places, tarif_activite, (SELECT COUNT(*) FROM INSCRIPTION_ACTIVITE WHERE id_activite = :id_activite) AS inscrits FROM ACTIVITE WHERE id_activite = :id_activite";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_activite' => $id_activite]);
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);

        $etat_file_attente = 'in';
        if ($activity['inscrits'] >= $activity['nb_places']) {
            $etat_file_attente = 'out';
        }

        // Inscrire l'enfant à l'activité
        $query = "INSERT INTO INSCRIPTION_ACTIVITE (date_debut_activite, date_fin_activite, rabais, etat_file_attente, id_enfant, id_activite) 
                  VALUES (:date_debut_activite, :date_fin_activite, :rabais, :etat_file_attente, :id_enfant, :id_activite)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':date_debut_activite' => $date_debut_activite,
                ':date_fin_activite' => $date_fin_activite,
                ':rabais' => $rabais,
                ':etat_file_attente' => $etat_file_attente,
                ':id_enfant' => $id_enfant,
                ':id_activite' => $id_activite
            ]);

            // Calculer le montant de l'activité en tenant compte du rabais
            $montant = $activity['tarif_activite'];
            if ($rabais) {
                $montant -= ($montant * ($rabais / 100));
            }

            // Mettre à jour ou créer une facture
            $billModel = new Facture();
            $facture = $billModel->getFactureByMonth($id_enfant);

            if ($facture) {
                // Mettre à jour la facture existante
                $billModel->updateFacture($id_enfant, $montant);
            } else {
                // Créer une nouvelle facture
                $billModel->createFacture($id_enfant, $montant);
            }

            return true; 
        } catch (Exception $e) {
            return false; 
        }
    }
    public function getActivitiesByChild($id_enfant) {
        try {
            // Préparer la requête pour récupérer les activités de l'enfant
            $query = "SELECT a.id_activite, a.nom_activite, ia.etat_file_attente, ia.date_debut_activite, ia.date_fin_activite, a.tarif_activite, a.type_activite, ia.rabais
                      FROM ACTIVITE a
                      INNER JOIN INSCRIPTION_ACTIVITE ia ON a.id_activite = ia.id_activite
                      WHERE ia.id_enfant = :id_enfant";
            $stmt = $this->db->prepare($query);

            // Exécuter la requête avec l'ID de l'enfant
            $stmt->execute([':id_enfant' => $id_enfant]);

            // Retourner les résultats sous forme de tableau associatif
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs en cas de problème avec la requête
            error_log("Erreur lors de la récupération des activités : " . $e->getMessage());
            return [];
        }
    }

    public function getActivityInscription($id_activite, $id_enfant) {
        try {
            $query = "SELECT ia.date_debut_activite, ia.date_fin_activite, a.prix_activite
                      FROM INSCRIPTION_ACTIVITE ia
                      INNER JOIN ACTIVITE a ON ia.id_activite = a.id_activite
                      WHERE ia.id_activite = :id_activite AND ia.id_enfant = :id_enfant";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_activite' => $id_activite, ':id_enfant' => $id_enfant]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération de l'inscription : " . $e->getMessage());
            return null;
        }
    }

    public function cancelActivityInscription($id_activite, $id_enfant) {
        try {
            $query = "DELETE FROM INSCRIPTION_ACTIVITE WHERE id_activite = :id_activite AND id_enfant = :id_enfant";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_activite' => $id_activite, ':id_enfant' => $id_enfant]);
        } catch (PDOException $e) {
            error_log("Erreur lors de l'annulation de l'inscription : " . $e->getMessage());
            throw new Exception("Impossible d'annuler l'inscription.");
        }
    }
}
?>
