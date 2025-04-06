<?php
class ChildMonitoringPresence {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    // Ajouter une présence ou une absence
    public function addPresence($id_inscription_activite, $etat_presence, $projet_realise = null) {
        $query = "INSERT INTO presence_activite (id_inscription_activite, etat_presence_activite, projet_realise) 
                  VALUES (:id_inscription_activite, :etat_presence, :projet_realise)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':id_inscription_activite' => $id_inscription_activite,
                ':etat_presence' => $etat_presence,
                ':projet_realise' => $projet_realise
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'ajout de la présence : " . $e->getMessage());
            return false;
        }
    }

    // Vérifier si une présence existe pour une activité à une date donnée
    public function checkPresenceExists($id_inscription_activite, $date) {
        $query = "SELECT COUNT(*) as count 
                  FROM presence_activite 
                  WHERE id_inscription_activite = :id_inscription_activite AND DATE(created_at) = :date";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id_inscription_activite' => $id_inscription_activite,
            ':date' => $date
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    // Récupérer les présences pour une activité
    public function getPresenceByActivity($id_inscription_activite, $date) {
        $query = "SELECT pa.etat_presence_activite, pa.projet_realise, pa.created_at
                  FROM presence_activite pa
                  WHERE pa.id_inscription_activite = :id_inscription_activite AND DATE(pa.created_at) = :date";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id_inscription_activite' => $id_inscription_activite,
            ':date' => $date
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer l'historique des présences pour un enfant
    public function getPresenceHistory($id_enfant) {
        $query = "SELECT pa.created_at AS date_presence, pa.etat_presence_activite, pa.projet_realise
                  FROM presence_activite pa
                  INNER JOIN inscription_activite ia ON pa.id_inscription_activite = ia.id_inscription_activite
                  WHERE ia.id_enfant = :id_enfant
                  ORDER BY pa.created_at DESC";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération de l'historique des présences : " . $e->getMessage());
            return [];
        }
    }

    // Récupérer l'historique des présences avec les activités pour un enfant
    public function getPresenceHistoryWithActivity($id_enfant) {
        $query = "SELECT pa.created_at AS date_presence, pa.etat_presence_activite, pa.projet_realise, a.nom_activite
                  FROM presence_activite pa
                  INNER JOIN inscription_activite ia ON pa.id_inscription_activite = ia.id_inscription_activite
                  INNER JOIN activite a ON ia.id_activite = a.id_activite
                  WHERE ia.id_enfant = :id_enfant
                  ORDER BY pa.created_at DESC
                  LIMIT 10";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération de l'historique des présences : " . $e->getMessage());
            return [];
        }
    }
}
?>