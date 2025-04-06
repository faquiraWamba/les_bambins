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
        $query = "SELECT a.id_activite, a.nom_activite, a.type_activite, a.niveau_activite, a.age_min_activite, a.age_max_activite
                  FROM activite_animateur aa
                  INNER JOIN activite a ON aa.id_activite = a.id_activite
                  WHERE aa.id_animateur = :id_animateur";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_animateur' => $id_animateur]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des activités de l'animateur : " . $e->getMessage());
            return [];
        }
    }

    // Récupérer les activités affectées à un personnel
    public function getActivitiesByPersonnel($id_personnel) {
        $query = "SELECT a.id_activite, a.nom_activite, a.age_min_activite, a.age_max_activite, a.type_activite, a.niveau_activite
                  FROM activite_animateur aa
                  INNER JOIN activite a ON aa.id_activite = a.id_activite
                  INNER JOIN animateur an ON aa.id_animateur = an.id_animateur
                  WHERE an.id_personnel = :id_personnel";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_personnel' => $id_personnel]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des activités pour le personnel : " . $e->getMessage());
            return [];
        }
    }
}
?>