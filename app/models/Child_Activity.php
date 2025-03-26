<?php

class Child_Activity {
    private $db;

    function __construct() {
        $this->db = connect_to_db();
    }

    public function CreateChildActivity($id_enfant, $id_activite) {
        $query = "INSERT INTO ENFANT_ACTIVITE(id_enfant, id_activite) VALUES (:id_enfant, :id_activite)";
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':id_enfant' => $id_enfant,
                ':id_activite' => $id_activite
            ]);
            return true; // Succès
        } catch (Exception $e) {
            return false; // Échec
        }
    }
}
?>
