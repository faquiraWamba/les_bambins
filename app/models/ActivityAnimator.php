<?php
class ActivityAnimator {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    // Affecter un animateur à une activité
    public function assignAnimatorToActivity($id_activite, $id_animateur) {
        $query = "INSERT INTO activite_animateur (id_activite, id_animateur) 
                  VALUES (:id_activite, :id_animateur)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':id_activite' => $id_activite,
                ':id_animateur' => $id_animateur
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'affectation de l'animateur : " . $e->getMessage());
            return false;
        }
    }

    // Récupérer les activités affectées à un animateur
    public function getActivitiesByAnimator($id_animateur) {
        $query = "SELECT a.id_activite, a.nom_activite 
                  FROM activite_animateur aa
                  INNER JOIN activite a ON aa.id_activite = a.id_activite
                  WHERE aa.id_animateur = :id_animateur";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_animateur' => $id_animateur]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des activités : " . $e->getMessage());
            return [];
        }
    }
}
?>