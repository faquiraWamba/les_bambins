<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Child{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChild($id_enfant,$nom_enfant,$prenom_enfant,$sexe_enfant,$date_naissance,$securite_sociale,
    $type_famille, $fiche_medical,$type_repas,$id_parent,$numero_groupe){
        $query = "INSERT INTO ENFANT (id_enfant,nom_enfant,prenom_enfant,sexe_enfant,date_naissance,securite_sociale,
                    type_famille, fiche_medical,type_repas,id_parent,numero_groupe ) 
                    VALUES (:id_enfant,:nom_enfant,:prenom_enfant,:sexe_enfant,:date_naissance,:securite_sociale,
                    :type_famille, :fiche_medical,:type_repas,:id_parent,:numero_groupe
        ";
        
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([
                'id_enfant'=>$id_enfant,
                ':nom_enfant'=>$nom_enfant,
                ':prenom_enfant'=>$prenom_enfant,
                ':sexe_enfant'=>$sexe_enfant,
                ':date_naissance'=>$date_naissance,
                ':securite_sociale'=>$securite_sociale,
                ':type_famille'=>$type_famille,
                ':fiche_medical'=>$fiche_medical,
                ':type_repas'=>$type_repas,
                ':id_parent'=>$id_parent,
                ':numero_groupe'=>$numero_groupe
            ]);

        }
        catch(Exception $e){
            return $e->getMessage();
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
            return $e->getMessage();
        }
    }
}
?>