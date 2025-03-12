<?php
require_once "/xampp/htdocs/les_bambins/config/config.php";

Class Activity{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateActivity($nom_activite,$age_min_activite,$age_max_activite,$type_activite,
    $nb_places,$niveau_activite,$prerequis,$tarif_activite){
        $query = "INSERT INTO ACTIVITE( nom_activite,age_min_activite,age_max_activite,type_activite,
        nb_places,niveau_activite,prerequis,tarif_activite) 
        VALUES (:nom_activite,:age_min_activite,:age_max_activite,:type_activite,
        :nb_places,:niveau_activite,:prerequis,:tarif_activite)";

        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':nom_activite'=>$nom_activite,
                ':age_min_activite'=>$age_min_activite,
                ':age_max_activite'=>$age_max_activite,
                ':type_activite'=>$type_activite,
                ':nb_places'=>$nb_places,
                ':niveau_activite'=>$niveau_activite,
                ':prerequis'=>$prerequis,
                ':tarif_activite'=>$tarif_activite
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>