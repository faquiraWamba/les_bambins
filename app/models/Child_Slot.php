<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Child_Slot{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChildSlot($id_enfant,$id_creneau,$jour,$periode){
        $query = "INSERT INTO ENFANT_CRENEAU (id_enfant,id_creneau,jour,periode) VALUES (:id_enfant,:id_creneau,:jour,:periode)";

        $stmt =$this->db->prepare($query);
        try{
            $stmt->execute([
                ':id_enfant'=>$id_enfant,
                ':id_creneau'=>$id_creneau,
                'jour'=>$jour,
                'periode'=>$periode
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function GetAllSlotAttente($id_enfant){
        $query = "SELECT *
        FROM  ENFANT_CRENEAU EC INNER JOIN creneau e ON e.id_creneau=EC.id_creneau
        WHERE EC.id_enfant like :id_enfant AND Ec.Etat = 'attente'";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([':id_enfant'=>$id_enfant]);
            $parcours = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $parcours;
        }
        catch(Exception $e){
                var_dump($e->getMessage());
                
        }  
    }

    public function validateSlot($id_enfant) {
        $query = "UPDATE ENFANT_CRENEAU 
                  SET Etat = 'validé' 
                  WHERE id_enfant = :id_enfant AND Etat = 'attente'";
    
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->rowCount() > 0; // Retourne true si au moins un créneau a été mis à jour
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }

    public function refuseSlot($id_enfant) {
        $query = "UPDATE ENFANT_CRENEAU 
                  SET Etat = 'refusé' 
                  WHERE id_enfant = :id_enfant AND Etat = 'attente'";
    
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->rowCount() > 0; // Retourne true si au moins un créneau a été mis à jour
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
    

}
?>