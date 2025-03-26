<?php

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

    public function GetAllActiviteParcours($id_parcours){
        $query = "SELECT A.*
        FROM  ACTIVITE_PARCOURS AP INNER JOIN ACTIVITE A ON A.id_activite=AP.id_activite
        WHERE AP.id_parcours like :id_parcours";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([':id_parcours'=>$id_parcours]);
            $parcours = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $parcours;
        }
        catch(Exception $e){
                var_dump($e->getMessage());
                
        }  
     }

    public function GetActiviteParcours($id_parcours, $id_activite){
        $query = $this->db->prepare("SELECT * FROM ACTIVITE_PARCOURS 
        WHERE id_parcours=:id_parcours AND id_activite=:id_activite ");
        $query->execute([
            ':id_parcours'=>$id_parcours,
                ':id_activite'=>$id_activite
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function UpdateActiviteParcours($id_parcours, $id_activite){
        $query = "UPDATE ACTIVITE_PARCOURS SET 
        id_parcours=:id_parcours,id_activite=:id_activite
        WHERE id_parcours=:id_parcours AND id_activite=:id_activite ";

        $stmt=$this->db->prepare($query);

        try{
            $parcours = $stmt->execute([
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

    public function RemoveOldActivities($id_parcours, $activities) {
        // Créer des placeholders pour la liste des activités
        $placeholders = implode(',', array_fill(0, count($activities), '?')); 
    
        // Requête pour supprimer les anciennes activités non sélectionnées
        $query = "DELETE FROM ACTIVITE_PARCOURS 
                  WHERE id_parcours = ? 
                  AND id_activite NOT IN ($placeholders)";
    
        $stmt = $this->db->prepare($query);
    
        // Exécuter la requête
        return $stmt->execute(array_merge([$id_parcours], $activities));
    }
    public function AddNewActivities($id_parcours, $activities) {
        // Créer des placeholders pour la liste des activités
        $placeholders = implode(',', array_fill(0, count($activities), '?'));
    
        // Requête pour insérer les nouvelles activités qui ne sont pas déjà associées
        $query = "INSERT INTO ACTIVITE_PARCOURS (id_parcours, id_activite)
                  SELECT ?, id_activite 
                  FROM ACTIVITE 
                  WHERE id_activite IN ($placeholders)
                  AND id_activite NOT IN (
                      SELECT id_activite 
                      FROM ACTIVITE_PARCOURS 
                      WHERE id_parcours = ?
                  )";
    
        $stmt = $this->db->prepare($query);
        return $stmt->execute(array_merge([$id_parcours], $activities, [$id_parcours]));
    }
        

    public function DeleteParcours($id_parcours){
        $query = "DELETE FROM ACTIVITE_PARCOURS WHERE id_parcours = :id_parcours";
    $stmt = $this->db->prepare($query);
    
    try {
        return $stmt->execute([':id_parcours' => $id_parcours]);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
    }
}
?>