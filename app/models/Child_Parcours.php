<?php
class Child_Parcours {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    public function createParcoursInscription($id_enfant, $id_parcours) {
        try {
            // Vérifier si l'enfant est déjà inscrit à ce parcours
            $query = "SELECT COUNT(*) as count FROM enfant_parcours WHERE id_enfant = :id_enfant AND id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':id_parcours' => $id_parcours
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                // L'enfant est déjà inscrit
                return false;
            }

            // Vérifier si le parcours est encore en cours (non terminé)
            $query = "SELECT date_fin_parcours, prix_parcours FROM parcours_activite WHERE id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_parcours' => $id_parcours]);
            $parcours = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$parcours || new DateTime($parcours['date_fin_parcours']) < new DateTime()) {
                // Le parcours est terminé ou introuvable
                return false;
            }

            // Inscrire l'enfant au parcours
            $query = "INSERT INTO enfant_parcours (id_enfant, id_parcours) VALUES (:id_enfant, :id_parcours)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':id_parcours' => $id_parcours
            ]);

            // Ajouter le prix du parcours à la facture
            $prix_parcours = $parcours['prix_parcours'];
            $billModel = new Facture();
            $factureExistante = $billModel->getFactureByMonth($id_enfant);

            if ($factureExistante) {
                // Mettre à jour la facture existante
                $billModel->updateFacture($id_enfant, $prix_parcours);
            } else {
                // Créer une nouvelle facture
                $billModel->createFacture($id_enfant, $prix_parcours);
            }

            return true;
        } catch (PDOException $e) {
            error_log("Erreur lors de l'inscription au parcours : " . $e->getMessage());
            return false;
        }
    }

    public function getParcoursByChild($id_enfant) {
        try {
            $query = "SELECT ep.id_enfant_parcours, p.id_parcours, p.titre_parcours, p.date_debut_parcours, p.date_fin_parcours, p.prix_parcours
                      FROM enfant_parcours ep
                      INNER JOIN parcours_activite p ON ep.id_parcours = p.id_parcours
                      WHERE ep.id_enfant = :id_enfant";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des parcours de l'enfant : " . $e->getMessage());
            return [];
        }
    }

    public function cancelParcoursInscription($id_enfant, $id_parcours) {
        try {
            $query = "DELETE FROM enfant_parcours WHERE id_enfant = :id_enfant AND id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':id_parcours' => $id_parcours
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Erreur lors de l'annulation de l'inscription au parcours : " . $e->getMessage());
            return false;
        }
    }

    public function isChildEnrolledInParcours($id_enfant, $id_parcours) {
        try {
            $query = "SELECT COUNT(*) as count FROM enfant_parcours WHERE id_enfant = :id_enfant AND id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':id_parcours' => $id_parcours
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] > 0;
        } catch (PDOException $e) {
            error_log("Erreur lors de la vérification de l'inscription au parcours : " . $e->getMessage());
            return false;
        }
    }

    public function getParcoursInscriptionDetails($id_enfant, $id_parcours) {
        try {
            $query = "SELECT ep.id_enfant_parcours, p.id_parcours, p.titre_parcours, p.type_parcours, p.date_debut_parcours, p.date_fin_parcours
                      FROM enfant_parcours ep
                      INNER JOIN parcours_activite p ON ep.id_parcours = p.id_parcours
                      WHERE ep.id_enfant = :id_enfant AND ep.id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':id_parcours' => $id_parcours
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des détails de l'inscription au parcours : " . $e->getMessage());
            return null;
        }
    }

    public function getChildrenByParcours($id_parcours) {
        try {
            $query = "SELECT ep.id_enfant_parcours, e.id_enfant, e.nom_enfant, e.prenom_enfant
                      FROM enfant_parcours ep
                      INNER JOIN enfant e ON ep.id_enfant = e.id_enfant
                      WHERE ep.id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_parcours' => $id_parcours]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des enfants inscrits au parcours : " . $e->getMessage());
            return [];
        }
    }

    public function isParcoursTermine($id_parcours) {
        try {
            $query = "SELECT date_fin_parcours FROM parcours_activite WHERE id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_parcours' => $id_parcours]);
            $parcours = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($parcours && new DateTime($parcours['date_fin_parcours']) < new DateTime()) {
                return true; // Le parcours est terminé
            }

            return false; // Le parcours n'est pas terminé
        } catch (PDOException $e) {
            error_log("Erreur lors de la vérification du parcours : " . $e->getMessage());
            return false;
        }
    }

    public function getParcoursDetails($id_parcours) {
        try {
            $query = "SELECT * FROM parcours_activite WHERE id_parcours = :id_parcours";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_parcours' => $id_parcours]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des détails du parcours : " . $e->getMessage());
            return null;
        }
    }
}