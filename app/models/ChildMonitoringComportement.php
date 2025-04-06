<?php
class ChildMonitoringComportement {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    // Ajouter un suivi comportemental
    public function addComportement($type, $description, $id_enfant) {
        $query = "INSERT INTO COMPORTEMENT (type_comportement, description_comportement, id_enfant) 
                  VALUES (:type, :description, :id_enfant)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':type' => $type,
                ':description' => $description,
                ':id_enfant' => $id_enfant
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'ajout du suivi comportemental : " . $e->getMessage());
            return false;
        }
    }

    // Récupérer les suivis comportementaux d'un enfant
    public function getComportementHistory($id_enfant) {
        $query = "SELECT created_at, type_comportement, description_comportement, id_comportement 
                  FROM COMPORTEMENT 
                  WHERE id_enfant = :id_enfant 
                  ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des suivis comportementaux : " . $e->getMessage());
            return [];
        }
    }

    public function getLastTenComportement($id_enfant) {
        $query = "SELECT created_at, type_comportement, description_comportement, id_comportement 
                  FROM COMPORTEMENT 
                  WHERE id_enfant = :id_enfant 
                  ORDER BY created_at DESC
                  LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_enfant' => $id_enfant]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>