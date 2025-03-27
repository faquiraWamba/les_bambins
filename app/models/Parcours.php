<?php
Class Parcours{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateParcours($id,$titre_parcours,$prix_parcours,$description_parcours,$nb_places_parcours,
   $date_debut_parcours,$date_fin_parcours){
        $query = "INSERT INTO PARCOURS_ACTIVITE( id_parcours, titre_parcours,prix_parcours,description_parcours,nb_places_parcours,
       date_debut_parcours,date_fin_parcours) 
        VALUES (:id_parcours,:titre_parcours,:prix_parcours,:description_parcours,:nb_places_parcours,
        :date_debut_parcours,:date_fin_parcours)";

        $stmt=$this->db->prepare($query);

        try{
            $parcours = $stmt->execute([
                ':id_parcours'=>$id,
                ':titre_parcours'=>$titre_parcours,
                ':prix_parcours'=>$prix_parcours,
                ':description_parcours'=>$description_parcours,
                ':nb_places_parcours'=>$nb_places_parcours,
                ':date_debut_parcours'=>$date_debut_parcours,
                ':date_fin_parcours'=>$date_fin_parcours
            ]);
            return $parcours;
        }
        catch(Exception $e){
           var_dump($e->getMessage());
        //    var_dump()
            
        }
    }

    public function GetAllParcours(){
        $query = "SELECT * FROM PARCOURS_ACTIVITE";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute();
            $parcours = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $parcours;
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function GetParcours($id){
        $query = $this->db->prepare("SELECT * FROM PARCOURS_ACTIVITE WHERE id_parcours=:id");
        $query->execute([':id'=>$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function UpdateParcours($id,$titre_parcours,$prix_parcours,$description_parcours,$nb_places_parcours,
    $date_debut_parcours,$date_fin_parcours){
        $query = "UPDATE PARCOURS_ACTIVITE SET 
        titre_parcours=:titre_parcours,prix_parcours=:prix_parcours,description_parcours=:description_parcours,nb_places_parcours=:nb_places_parcours,
        date_debut_parcours=:date_debut_parcours,date_fin_parcours=:date_fin_parcours
        WHERE id_parcours=:id_parcours";

        $stmt=$this->db->prepare($query);

        try{
            $parcours = $stmt->execute([
                ':id_parcours'=>$id,
                ':titre_parcours'=>$titre_parcours,
                ':prix_parcours'=>$prix_parcours,
                ':description_parcours'=>$description_parcours,
                ':nb_places_parcours'=>$nb_places_parcours,
                ':date_debut_parcours'=>$date_debut_parcours,
                ':date_fin_parcours'=>$date_fin_parcours
            ]);
            return $parcours;
        }
        catch(Exception $e){
            $e->getMessage();
        //    var_dump()
            
        }
    }

    public function DeleteParcours($id){
        $query = "DELETE FROM PARCOURS_ACTIVITE WHERE id_parcours=:id_parcours";

        $stmt=$this->db->prepare($query);

        try{
            $parcours = $stmt->execute([
                ':id_parcours'=>$id
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