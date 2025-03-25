<?php
require_once "/xampp/htdocs/les_bambins/config/config.php";

Class Activity_Parcours{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateActiviteParcours($id_parcours,$id_activite){
        $query = "INSERT INTO ACTIVITE_PARCOURS( id_parcours, id_activite) 
        VALUES (:id_parcours,:id_activite)";

        $stmt=$this->db->prepare($query);

        try{
            $activite_parcours = $stmt->execute([
                ':id_parcours'=>$id_parcours,
                ':id_activite'=>$id_activite
            ]);
            return $activite_parcours;
        }
        catch(Exception $e){
           var_dump($e->getMessage());
        //    var_dump()
            
        }
    }

    public function GetAllActiviteParcours(){
        $query = "SELECT * FROM ACTIVITE_PARCOURS";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute();
            $activite_parcours = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $activite_parcours;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function GetActiviteParcours($id){
        $query = $this->db->prepare("SELECT * FROM ACTIVITE_PARCOURS WHERE id_parcours=:id");
        $query->execute([':id'=>$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function UpdateActiviteParcours($id_activite_parcours,$id_parcours, $id_activite){
        $query = "UPDATE ACTIVITE_PARCOURS SET 
        id_parcours=:id_parcours,id_activite=:id_activite
        WHERE id_activite_parcours=:id_activite_parcours";

        $stmt=$this->db->prepare($query);

        try{
            $parcours = $stmt->execute([
                ':id_activite_parcours'=>$id_activite_parcours,
                ':id_parcours'=>$id_parcours,
                ':id_activite'=>$id_activite
            ]);
            return $parcours;
        }
        catch(Exception $e){
            $e->getMessage();
        //    var_dump()
            
        }
    }

    public function DeleteParcours($id_activite_parcours){
        $query = "DELETE FROM ACTIVITE_PARCOURS WHERE id_activite_parcours=:id_activite_parcours";

        $stmt=$this->db->prepare($query);

        try{
            $parcours = $stmt->execute([
                ':id_activite_parcours'=>$id_activite_parcours
            ]);
            return $parcours;
        }
        catch(Exception $e){
           return $e->getMessage();
        //    var_dump()
            
        }
    }
}
?>