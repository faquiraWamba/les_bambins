<?php
require_once "/xampp/htdocs/les_bambins/config/config.php";

Class Activity{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateActivity($nom_activite,$age_min_activite,$age_max_activite,$type_activite,
    $nb_places,$niveau_activite,$prerequis,$tarif_activite,$description_activite,$image_activite){
        $query = "INSERT INTO ACTIVITE( nom_activite,age_min_activite,age_max_activite,type_activite,
        nb_places,niveau_activite,prerequis,tarif_activite,description_activite,img_activite) 
        VALUES (:nom_activite,:age_min_activite,:age_max_activite,:type_activite,
        :nb_places,:niveau_activite,:prerequis,:tarif_activite,,:description_activite,:image_activite)";

        $stmt=$this->db->prepare($query);

        try{
            $activity = $stmt->execute([
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
           return $e->getMessage();
        //    var_dump()
            
        }
    }
}
?>