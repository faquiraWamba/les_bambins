<?php

Class Child{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChild($id_enfant,$nom_enfant,$prenom_enfant,$sexe_enfant,$date_naissance,
    $type_famille,$id_parent,$numero_groupe){
        $query = "INSERT INTO ENFANT (id_enfant,nom_enfant,prenom_enfant,sexe_enfant,date_naissance,
                    type_famille,id_parent,numero_groupe ) 
                    VALUES (:id_enfant,:nom_enfant,:prenom_enfant,:sexe_enfant,:date_naissance,
                    :type_famille,:id_parent,:numero_groupe)
        ";
        
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([
                'id_enfant'=>$id_enfant,
                ':nom_enfant'=>$nom_enfant,
                ':prenom_enfant'=>$prenom_enfant,
                ':sexe_enfant'=>$sexe_enfant,
                ':date_naissance'=>$date_naissance,
                ':type_famille'=>$type_famille,
                ':id_parent'=>$id_parent,
                ':numero_groupe'=>$numero_groupe
            ]);
            return $id_enfant;

        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getChild($id_enfant){
        $query="SELECT * FROM ENFANT WHERE id_enfant=:id_enfant";
        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([':id_enfant'=>$id_enfant]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
             var_dump($e->getMessage());
        }
    }

    public function inscriptionEnAttente(){
        $query = "SELECT DISTINCT e.* 
            FROM enfant e
            INNER JOIN enfant_creneau c ON e.id_enfant = c.id_enfant
            WHERE c.Etat = 'attente'";
        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function searchChildrenByName($name) {
        $query = "SELECT id_enfant, nom_enfant FROM ENFANT WHERE nom_enfant LIKE :name LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':name' => $name . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChilds() {
        $query = "SELECT * FROM enfant";
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
}
?>