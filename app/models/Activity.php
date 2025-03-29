<?php
Class Activity{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateActivity($id,$nom_activite,$age_min_activite,$age_max_activite,$type_activite,
                                   $nb_places,$niveau_activite,$prerequis,$tarif_activite,$description_activite,$image_activite){
        $query = "INSERT INTO ACTIVITE( id_activite, nom_activite,age_min_activite,age_max_activite,type_activite,
        nb_places,niveau_activite,prerequis,tarif_activite,description_activite,img_activite) 
        VALUES (:id_activite,:nom_activite,:age_min_activite,:age_max_activite,:type_activite,
        :nb_places,:niveau_activite,:prerequis,:tarif_activite,:description_activite,:image_activite)";

        $stmt=$this->db->prepare($query);

        try{
            $activity = $stmt->execute([
                ':id_activite'=>$id,
                ':nom_activite'=>$nom_activite,
                ':age_min_activite'=>$age_min_activite,
                ':age_max_activite'=>$age_max_activite,
                ':type_activite'=>$type_activite,
                ':nb_places'=>$nb_places,
                ':niveau_activite'=>$niveau_activite,
                ':prerequis'=>$prerequis,
                ':tarif_activite'=>$tarif_activite,
                ':description_activite'=>$description_activite,
                ':image_activite'=>$image_activite
            ]);
            return $activity;
        }
        catch(Exception $e){
            var_dump($e->getMessage());
            //    var_dump()

        }
    }

    public function GetActivities(){
        $query = "SELECT * FROM ACTIVITE";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute();
            $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $activities;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function getActivity($id){
        $query = $this->db->prepare("SELECT * FROM ACTIVITE WHERE id_activite=:id");
        $query->execute([':id'=>$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function UpdateActivity($id,$nom_activite,$age_min_activite,$age_max_activite,$type_activite,
                                   $nb_places,$niveau_activite,$prerequis,$tarif_activite,$description_activite,$image_activite){
        $query = "UPDATE ACTIVITE SET 
        nom_activite=:nom_activite,age_min_activite=:age_min_activite,age_max_activite=:age_max_activite,type_activite=:type_activite,
        nb_places=:nb_places,niveau_activite=:niveau_activite,prerequis=:prerequis,tarif_activite=:tarif_activite,
        description_activite=:description_activite,img_activite=:image_activite
        WHERE id_activite=:id_activite";

        $stmt=$this->db->prepare($query);

        try{
            $activity = $stmt->execute([
                ':id_activite'=>$id,
                ':nom_activite'=>$nom_activite,
                ':age_min_activite'=>$age_min_activite,
                ':age_max_activite'=>$age_max_activite,
                ':type_activite'=>$type_activite,
                ':nb_places'=>$nb_places,
                ':niveau_activite'=>$niveau_activite,
                ':prerequis'=>$prerequis,
                ':tarif_activite'=>$tarif_activite,
                ':description_activite'=>$description_activite,
                ':image_activite'=>$image_activite
            ]);
            return $activity;
        }
        catch(Exception $e){
            $e->getMessage();
            //    var_dump()

        }
    }

    public function DeleteActivity($id){
        $query = "DELETE FROM ACTIVITE WHERE id_activite=:id_activite";

        $stmt=$this->db->prepare($query);

        try{
            $activity = $stmt->execute([
                ':id_activite'=>$id
            ]);
            return $activity;
        }
        catch(Exception $e){
            return $e->getMessage();
            //    var_dump()

        }
    }
}
?>