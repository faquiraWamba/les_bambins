<?php
class Animator {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    // Récupérer tous les animateurs
    public function getAllAnimators() {
        $query = "SELECT a.id_animateur, p.nom_personnel, p.prenom_personnel 
                  FROM animateur a
                  INNER JOIN personnel_encadrant p ON a.id_personnel = p.id_personnel";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des animateurs : " . $e->getMessage());
            return [];
        }
    }

    // Récupérer un animateur par son ID
    public function getAnimatorById($id_animateur) {
        $query = "SELECT a.id_animateur, p.nom_personnel, p.prenom_personnel 
                  FROM animateur a
                  INNER JOIN personnel_encadrant p ON a.id_personnel = p.id_personnel
                  WHERE a.id_animateur = :id_animateur";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_animateur' => $id_animateur]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération de l'animateur : " . $e->getMessage());
            return null;
        }
    }

    // Ajouter un animateur
    public function addAnimator($id_animateur, $id_personnel) {
        $query = "INSERT INTO animateur (id_animateur, id_personnel) 
                  VALUES (:id_animateur, :id_personnel)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':id_animateur' => $id_animateur,
                ':id_personnel' => $id_personnel
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'ajout de l'animateur : " . $e->getMessage());
            return false;
        }
    }

    // Supprimer un animateur
    public function deleteAnimator($id_animateur) {
        $query = "DELETE FROM animateur WHERE id_animateur = :id_animateur";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_animateur' => $id_animateur]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de la suppression de l'animateur : " . $e->getMessage());
            return false;
        }
    }
}
?>