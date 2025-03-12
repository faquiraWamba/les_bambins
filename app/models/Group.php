<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Group{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function GetGroupsByAge($age){
        $query="SELECT DISTINCT(numero_groupe) 
                FROM GROUPE_ENFANT G INNER JOIN ENFANT E ON G.numero_groupe=E.numero_groupe
                WHERE $age BETWEEN age_min_groupe AND age_max_group
                GROUP BY numero_group
                HAVING COUNT(numero_groupe)<nb_enfant 
        ";
        $stmt=$this->db->prepare($query);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        catch(Exception $e){
            return null;
        }
        
    }
    public function CreateGroup($numero_groupe,$nb_enfant,$age_min_groupe,$age_max_groupe){
        $query = "INSERT INTO GROUPE_ENFANT (numero_groupe,nb_enfant,age_min_groupe,age_max_groupe) 
        VALUES (:numero_groupe,:nb_enfant,:age_min_groupe,:age_max_groupe)";
        $stmt=$this->db->prepare($query);
        
        try{
            
            $group=$stmt->execute([
                ':numero_groupe'=>$numero_groupe,
                ':nb_enfant'=>$nb_enfant,
                ':age_min_groupe'=>$age_min_groupe,
                ':age_max_groupe'=>$age_max_groupe
            ]);
            return $group;
        }
        catch(Exception $e){
            return $e;
        }
    }
}
?>