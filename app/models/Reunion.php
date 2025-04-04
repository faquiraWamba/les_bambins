<?php
require_once '/les_bambins/config/config.php';

Class Reunion{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateReunion($nom_reunion,$date_reunion,$heure_reunion){
        $query = "INSERT INTO REUNION (nom_reunion,date_reunion,heure_reunion) 
        VALUES (:nom_reunion,:date_reunion,:heure_reunion)";

        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':nom_reunion'=>$nom_reunion,
                ':date_reunion'=>$date_reunion,
                ':heure_reunion'=>$heure_reunion
            ]);
        }
        catch(Exception $e){
            var_dump($e->getMessage()) ;
        }
    }

    public function UpdateReunion($id_reunion,$nom_reunion,$date_reunion,$heure_reunion){
        $query = "UPDATE REUNION 
        SET nom_reunion=:nom_reunion,date_reunion=:date_reunion,heure_reunion=:heure_reunion
        WHERE id_reunion = :id_reunion";

        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':id_reunion'=>$id_reunion,
                ':nom_reunion'=>$nom_reunion,
                ':date_reunion'=>$date_reunion,
                ':heure_reunion'=>$heure_reunion
            ]);
        }
        catch(Exception $e){
            var_dump($e->getMessage()) ;
        }
    }

    public function getReunions(){
        $query = "SELECT * FROM REUNION";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute();
            $reunions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $reunions;
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function getReunion($id){
        $query = "SELECT * FROM REUNION WHERE id_reunion=:id" ;
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([':id'=>$id]);
            $reunion = $stmt->fetch(PDO::FETCH_ASSOC);
            return $reunion;
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function deleteReunion($id){
        $query = "DELETE FROM REUNION WHERE id_reunion=:id" ;
        $stmt = $this->db->prepare($query);

        try{
           return $stmt->execute([':id'=>$id]);
            
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function cancelReunion($id){
        $query = "UPDATE  REUNION 
        SET etat_reunion=:etat_reunion
        WHERE id_reunion=:id";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([
                ':id'=>$id,
                ':etat_reunion'=>'annulée'
            ]);
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
}
?>