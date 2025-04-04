<?php
Class Slot{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    

    public function CreateSlot($type_accueil,$tarif_creneau,$nb_place_accueil,$jour,$periode){
        $query = "INSERT INTO CRENEAU (type_accueil,tarif_creneau,nb_place_accueil,jour,periode) 
        VALUES (:type_accueil,:tarif_creneau,:nb_place_accueil,:jour,:periode)";

        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':type_accueil'=>$type_accueil,
                ':tarif_creneau'=>$tarif_creneau,
                ':nb_place_accueil'=>$nb_place_accueil,
                ':jour'=>$jour,
                ':periode'=>$periode
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>