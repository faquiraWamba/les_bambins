
<?php
Class Child_Group{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function getChildsWithNoGroup() {
        $query = "SELECT * FROM enfant WHERE numero_groupe IN (3, 6, 9)";
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateChildGroup($id_enfant, $numero_groupe) {
        // Vérifie le nombre de places restantes
        $queryCheck = "SELECT (g.nb_enfant - COUNT(e.id_enfant)) AS places_restantes 
                       FROM groupe g 
                       LEFT JOIN enfant e ON g.numero_groupe = e.numero_groupe 
                       WHERE g.numero_groupe = :numero_groupe
                       GROUP BY g.nb_enfant";
        $stmtCheck = $this->db->prepare($queryCheck);
        $stmtCheck->execute([':numero_groupe' => $numero_groupe]);
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);
    
        if (!$result || $result['places_restantes'] <= 0) {
            return "Le groupe est plein ou inexistant.";
        }
    
        // Mise à jour du groupe si place disponible
        $query = "UPDATE enfant SET numero_groupe = :numero_groupe WHERE id_enfant = :id_enfant";
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute([
                ':numero_groupe' => $numero_groupe,
                ':id_enfant' => $id_enfant
            ]);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
    

    public function getChildrenByGroup($numero_groupe) {
        $query = "SELECT * FROM enfant WHERE numero_groupe = :numero_groupe";
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute([':numero_groupe' => $numero_groupe]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
}
?>