<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Parent.php';
Class ParentController extends Controller{

    public function CreateParent(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST["nom_parent"]) && !empty($_POST["prenom_parent"]) && !empty($_POST["sexe_parent"]) 
                && !empty($_POST["telephone_parent"]) && !empty($_POST["rue_parent"]) && !empty($_POST["ville_parent"])
                && !empty($_POST["code_postal_parent"]) && !empty($_POST["pays_parent"]) && !empty($_POST["email_parent"])){
                    $id_parent=generateUniqueID('PR');
                    $parent= new Tutor(); 
                    $user = new User();
                    $user->register($_POST["email_parent"],generateRandomPassword());

                    if($user){

                        if($_POST["complément"]){
                            $parent = $parent->CreateParent($id_parent,$_POST["nom_parent"],$_POST["prenom_parent"],$_POST["sexe_parent"],
                            $_POST["telephone_parent"],$_POST["rue_parent"],$_POST["ville_parent"],$_POST["code_postal_parent"],$_POST["pays_parent"],$user['user_id'],$_POST["complément"]);
                        }
                        else{
                            $parent= $parent->CreateParent($id_parent,$_POST["nom_parent"],$_POST["prenom_parent"],$_POST["sexe_parent"],
                            $_POST["telephone_parent"],$_POST["rue_parent"],$_POST["ville_parent"],$_POST["code_postal_parent"],$_POST["pays_parent"],$user['user_id']);
                    
                        }
                   
                    }
                return $parent;
            }
        }else{
          echo "erreur"   ;
        }
    }

    Public function getParent($email){
        $parent = new Tutor();
        $parent->getParent($email);
    }
}
?>