<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Child_Competence{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChildcompetence($id_enfant,$id_competence){
        $query = "INSERT INTO ENFANT_COMPETENCE (id_enfant,id_competence) VALUES (:id_enfant,:id_competence)";

        $stmt =$this->db->prepare($query);
        try{
            $stmt->execute([
                ':id_enfant'=>$id_enfant,
                ':id_competence'=>$id_competence
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>