<?php

Class Group{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function GetGroupsByAge($age){
        $query = "SELECT g.*, (g.nb_enfant - COUNT(e.id_enfant)) AS places_restantes 
                    FROM groupe g
                    LEFT JOIN enfant e ON g.numero_groupe = e.numero_groupe
                    WHERE :age between g.age_min_groupe
                    AND g.age_max_groupe
                    GROUP BY g.id_groupe, g.numero_groupe, g.nb_enfant
                    HAVING places_restantes > 0";
    
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute([
                ':age' => $age
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }

    public function GetGroups(){
        $query = "SELECT g.*, (g.nb_enfant - COUNT(e.id_enfant)) AS places_restantes
                  FROM GROUPE_ENFANT g
                  LEFT JOIN enfant e ON g.numero_groupe = e.numero_groupe
                  WHERE g.numero_groupe != 3 AND g.numero_groupe != 6 AND g.numero_groupe != 9
                  GROUP BY g.numero_groupe";
        $stmt = $this->db->prepare($query);
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            var_dump($e->getMessage());
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
            var_dump(($e->getMessage()));
            return $e;
        }
    }

    public function deleteGroup($numero_groupe) {
        // Vérifier s'il y a des enfants dans le groupe
        $checkQuery = "SELECT COUNT(*) as count FROM enfant WHERE numero_groupe = :numero_groupe";
        $checkStmt = $this->db->prepare($checkQuery);
        
        try {
            $checkStmt->execute([':numero_groupe' => $numero_groupe]);
            $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result['count'] > 0) {
                return "Le groupe contient des enfants et ne peut pas être supprimé.";
            }
            
            // Si aucun enfant n'est présent, procéder à la suppression du groupe
            $query = "DELETE FROM groupe_enfant WHERE numero_groupe = :numero_groupe";
            $stmt = $this->db->prepare($query);
            
            $stmt->execute([':numero_groupe' => $numero_groupe]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>