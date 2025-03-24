<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Child_Slot{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChildSlot($id_enfant,$id_creneau,$jour,$periode){
        $query = "INSERT INTO ENFANT_CRENEAU (id_enfant,id_creneau,jour,periode) VALUES (:id_enfant,:id_creneau,:jour,:periode)";

        $stmt =$this->db->prepare($query);
        try{
            $stmt->execute([
                ':id_enfant'=>$id_enfant,
                ':id_creneau'=>$id_creneau,
                'jour'=>$jour,
                'periode'=>$periode
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>