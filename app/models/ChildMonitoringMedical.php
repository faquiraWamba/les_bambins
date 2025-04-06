<?php
class ChildMonitoringMedical {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    // Ajouter un suivi médical
    public function addMedicalRecord($id_enfant, $type, $description) {
        $query = "INSERT INTO SUIVI_MEDICAL (id_enfant, type_suivi, description_suivi) 
                  VALUES (:id_enfant, :type, :description)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':type' => $type,
                ':description' => $description
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur lors de l'ajout du suivi médical : " . $e->getMessage());
            return false;
        }
    }

    // Récupérer les derniers suivis médicaux d'un enfant
    public function getMedicalHistory($id_enfant) {
        $query = "SELECT created_at, type_suivi, description_suivi 
                  FROM SUIVI_MEDICAL 
                  WHERE id_enfant = :id_enfant 
                  ORDER BY created_at DESC
                  LIMIT 10";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des suivis médicaux : " . $e->getMessage());
            return [];
        }
    }
}
?>