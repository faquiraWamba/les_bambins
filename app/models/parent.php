<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Tutor{
    private $db;


    function __construct()
    {

        $this->db = connect_to_db();
    }

    public function CreateParent( $id_parent,$nom_parent, $prenom_parent,$telephone_parent,$sexe_parent,$rue_parent,$ville_parent,
    $code_postal_parent,$pays_parent,$complement=null, $user_id ){
        
       $complement?:
        $query = "INSERT INTO PARENT (id_parent,nom_parent, prenom_parent,telephone_parent,sexe_parent,rue_parent,ville_parent,
        code_postal_parent,pays_parent,user_id ) VALUES (:id_parent,:nom_parent, :prenom_parent,:telephone_parent,:sexe_parent,:rue_parent,:ville_parent,
        :code_postal_parent,:pays_parent,:user_id)";

        $stmt = $this->db->prepare($query); 
        try{
            
            $stmt->execute([
                ':id_parent'=>$id_parent,
                ':nom_parent'=>$nom_parent, 
                ':prenom_parent'=>$prenom_parent,
                ':telephone_parent'=>$telephone_parent,
                ':sexe_parent'=>$sexe_parent,
                ':rue_parent'=>$rue_parent,
                ':ville_parent'=>$ville_parent,
                ':code_postal_parent'=>$code_postal_parent,
                ':pays_parent'=>$pays_parent,
                ':user_id'=>$user_id
            ]);
            return $id_parent;
        }catch (Exception $e) {
            echo"erreuur";
           echo $e->getMessage();
        }
        
    }
    Public function getParent($email){
        $query="SELECT * FROM PARENT P INNER JOIN UTILISATEUR U ON P.user_id=U.user_id WHERE U.email LIKE :email";
        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':email'=>$email
            ]);
            $parent = $stmt->fetch(PDO::FETCH_ASSOC);
            return $parent;
        }
        catch(Exception $e){
            $e=$e->getMessage();
            return null;
        }
    }
    Public function getParentByUserId($user_id){
        $query="SELECT * FROM PARENT P INNER JOIN UTILISATEUR U ON P.user_id=U.user_id WHERE U.user_id LIKE :user_id";
        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':user_id'=>$user_id
            ]);
            $parent = $stmt->fetch(PDO::FETCH_ASSOC);
            return $parent;
        }
        catch(Exception $e){
            $e=$e->getMessage();
            return null;
        }
    }
}   
?>