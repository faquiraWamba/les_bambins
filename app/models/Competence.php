<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Competence{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateCompetence( $nom_competence, $type_competence ){
        $query = "INSERT INTO COMPETENCE (nom_competence, type_competence ) VALUES(:nom_competence, :type_competence )";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([
                ':nom_competence'=>$nom_competence,
                ':type_competence'=>$type_competence
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function GetCompetences(){
        $query = "SELECT * FROM COMPETENCE";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute();
            $competences = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $competences;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

}
?>