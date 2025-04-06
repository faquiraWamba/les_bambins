<?php
class PresenceActivite {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    // Vérifier si l'appel a déjà été réalisé pour une activité à une date donnée
    public function checkPresenceExists($id_activite, $date) {
        $query = "SELECT COUNT(*) as count FROM presence_activite pa
                  INNER JOIN inscription_activite ia ON pa.id_inscription_activite = ia.id_inscription_activite
                  WHERE ia.id_activite = :id_activite AND DATE(pa.created_at) = :date";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_activite' => $id_activite, ':date' => $date]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    // Récupérer les présences pour une activité à une date donnée
    public function getPresenceByActivityAndDate($id_activite, $date) {
        $query = "SELECT pa.etat_presence_activite, pa.projet_realise, e.nom_enfant, e.prenom_enfant
                  FROM presence_activite pa
                  INNER JOIN inscription_activite ia ON pa.id_inscription_activite = ia.id_inscription_activite
                  INNER JOIN enfant e ON ia.id_enfant = e.id_enfant
                  WHERE ia.id_activite = :id_activite AND DATE(pa.created_at) = :date";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_activite' => $id_activite, ':date' => $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Enregistrer les présences pour une activité
    public function savePresence($id_inscription_activite, $etat_presence, $projet_realise) {
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
            error_log("Erreur lors de l'enregistrement de la présence : " . $e->getMessage());
            return false;
        }
    }

    // Récupérer les enfants inscrits à une activité (hors file d'attente)
    public function getChildrenByActivity($id_activite) {
        $query = "SELECT ia.id_inscription_activite, e.nom_enfant, e.prenom_enfant, e.id_enfant
                  FROM inscription_activite ia
                  INNER JOIN enfant e ON ia.id_enfant = e.id_enfant
                  WHERE ia.id_activite = :id_activite AND ia.etat_file_attente = 'out'";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_activite' => $id_activite]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>