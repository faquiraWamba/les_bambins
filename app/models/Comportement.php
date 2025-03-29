<?php
class ChildMonitoringComportementModel {

    public function enregistrerSuiviComportement($id_enfant, $date, $type, $description_comportemental) {
        // Préparation de la requête SQL pour insérer un suivi comportemental
        $query = "INSERT INTO suivi_comportemental (id_enfant, date, type, description_comportemental) 
                  VALUES (:id_enfant, :date, :type, :description_comportemental)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id_enfant', $id_enfant);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':description_comportemental', $description_comportemental);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function getSuivisComportementaux($id_enfant) {
        $query = "SELECT * FROM suivi_comportemental WHERE id_enfant = :id_enfant";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_enfant', $id_enfant);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
