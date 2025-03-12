<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Child_Activity{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChildActivity($id_enfant, $id_activite){
        $query = "INSERT INTO ENFANT_ACTIVITE(id_enfant, id_activite) VALUES (:id_enfant,:id_activite)";

        $stmt= $this->db->prepare($query);
        try{
            $stmt->execute([
                ':id_enfant'=>$id_enfant,
                ':id_activite'=>$id_activite
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>