<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';
require_once ROOT_PATH.'app/models/User.php';

require_once ROOT_PATH.'app/models/Parent.php';
Class ParentController extends Controller{

    public function CreateParent(){
        // echo"Dans le controlleur";
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST["nom_parent"]) && !empty($_POST["prenom_parent"]) && !empty($_POST["sexe_parent"]) 
            && !empty($_POST["telephone_parent"]) && !empty($_POST["rue_parent"]) && !empty($_POST["ville_parent"])
            && !empty($_POST["code_postal_parent"]) && !empty($_POST["pays_parent"]) && !empty($_POST["email_parent"])){
                $id_parent=generateUniqueID('PR');
                $parent= new Tutor(); 
                $user = new User();
                $user->register($_POST["email_parent"],generateRandomPassword());
                $user=$user->getUserByMail($_POST["email_parent"]);
                if($user){
                    $complement = $_POST["complement_parent"] ?? null; // Correction du champ

                    $parent = $parent->CreateParent(
                        $id_parent,
                        $_POST["nom_parent"],
                        $_POST["prenom_parent"],
                        $_POST["telephone_parent"],
                        $_POST["sexe_parent"],
                        $_POST["rue_parent"],
                        $_POST["ville_parent"],
                        $_POST["code_postal_parent"],
                        $_POST["pays_parent"],
                        $complement,
                        $user['user_id']
                    );
                }
                return $this->view('CreateChild',['parent'=>$parent]);
            }
        }
        else{

            echo "erreur";

        }
    }

    // public function CreateParent() {
    //     var_dump('yoooooooooooooo');
    //     header('Content-Type: application/json');
    
    //     if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //         echo json_encode(["success" => false, "message" => "Méthode invalide"]);
    //         exit;
    //     }
    
    //     // Vérification des champs obligatoires
    //     $requiredFields = ["nom_parent", "prenom_parent", "sexe_parent", "telephone_parent", "rue_parent", "ville_parent", "code_postal_parent", "pays_parent", "email_parent"];
    //     foreach ($requiredFields as $field) {
    //         if (empty($_POST[$field])) {
    //             echo json_encode(["success" => false, "message" => "Champs obligatoires manquants : " . $field]);
    //             exit;
    //         }
    //     }
    
    //     $id_parent = generateUniqueID('PR');
    //     $parent = new Tutor(); 
    //     $user = new User();
    
    //     // Création de l'utilisateur
    //     $userCreated = $user->register($_POST["email_parent"], generateRandomPassword());
    
    //     if (!$userCreated || !isset($userCreated['user_id'])) {
    //         echo json_encode(["success" => false, "message" => "Erreur lors de la création de l'utilisateur."]);
    //         exit;
    //     }
    
    //     // Création du parent
    //     $complement = $_POST["complement_parent"] ?? null; // Correction du champ
    //     $parentCreated = $parent->CreateParent(
    //         $id_parent,
    //         $_POST["nom_parent"],
    //         $_POST["prenom_parent"],
    //         $_POST["sexe_parent"],
    //         $_POST["telephone_parent"],
    //         $_POST["rue_parent"],
    //         $_POST["ville_parent"],
    //         $_POST["code_postal_parent"],
    //         $_POST["pays_parent"],
    //         $userCreated['user_id'],
    //         $complement
    //     );
    //     var_dump($parentCreated);
    
    //     if ($parentCreated instanceof Tutor) {
    //         echo json_encode(["success" => true, "message" => "Parent créé avec succès !", "id_parent" => $id_parent]);
    //         exit;
    //     }else{
    //         var_dump($parentCreated);
    //         echo json_encode(["sucess" => true, "message" => "$parentCreated"]);
    //         exit;
    //     }
    
    //     // Succès
       
    // }
    

    Public function getParent($email){
        $parent = new Tutor();
        $parent->getParent($email);
    }
}
?>