<?php

class ChildMonitoringPedagogique {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }

    public function addProfil($type_profil, $description_profil, $id_enfant) {
        $query = "INSERT INTO PROFIL_PEDAGOGIQUE (type_profil, description_profil, id_enfant) 
                  VALUES (:type_profil, :description_profil, :id_enfant)";
        $stmt = $this->db->prepare($query);
        var_dump($id_enfant);
        try {
            $stmt->execute([
                ':type_profil' => $type_profil,
                ':description_profil' => $description_profil,
                ':id_enfant' => $id_enfant
            ]);
            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }

    public function getLastTenProfiles($id_enfant) {
        $query = "SELECT created_at, type_profil, description_profil, id_profil 
                  FROM PROFIL_PEDAGOGIQUE 
                  WHERE id_enfant = :id_enfant 
                  ORDER BY created_at DESC 
                  LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_enfant' => $id_enfant]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>