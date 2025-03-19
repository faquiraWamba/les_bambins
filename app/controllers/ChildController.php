<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';
require_once ROOT_PATH.'app/models/Child.php';
require_once ROOT_PATH.'app/models/Child_Competence.php';
require_once ROOT_PATH.'app/core/calculateFunction.php';
require_once ROOT_PATH.'app/models/Parent.php';

Class ChildController extends Controller{
    
    public function getChild($id_enfant){
        $child= new Child(); 
        $child = $child->getChild($id_enfant);

        return $child;
    }

    public function CreateChild(){

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST["nom_parent"]) && !empty($_POST["prenom_parent"]) && !empty($_POST["sexe_parent"]) 
            && !empty($_POST["telephone_parent"]) && !empty($_POST["rue_parent"]) && !empty($_POST["ville_parent"])
            && !empty($_POST["code_postal_parent"]) && !empty($_POST["pays_parent"]) && !empty($_POST["email_parent"])){
                
            }
            if (!empty($_POST["nom_enfant"]) && !empty($_POST["prenom_enfant"]) && !empty($_POST["sexe_enfant"]) && !empty($_POST["date_naissance"])&&
               !empty($_POST["type_famille"])) {
                
                $id_enfant=generateUniqueID('CH');
                $child= new Child(); 

                //Add parent
                $parent = new Tutor();
                $parent = $parent->getParent($_POST["id_parent"]);
                

                // calcul age de l'enfant
                $age = calculateAge($_POST["date_naissance"]); 

                //On attribu un groupe temporaire
                if($age>=3 && $age<=5){
                    $num_groupe = 3;
                }
                else if($age>5 & $age<=8){
                    $num_groupe =6;
                }
                else {
                    $num_groupe  =9;
                }

                $child=$child->CreateChild(
                    $id_enfant,
                    $_POST["nom_enfant"],
                    $_POST["prenom_enfant"],
                    $_POST["sexe_enfant"],
                    $_POST["date_naissance"],
                    $_POST["type_famille"],
                    $_POST['id_parent'], 
                    $num_groupe 
                );
                if($child){
                    var_dump($child);
                }else{
                    echo("il y aune erreur");
                }
                if (!empty($_POST["competence"])){
                    $competences =$_POST["competence"];
                    $child_competence = new Child_Competence();
                    foreach ($competences as $competence){
                        $child_competence->CreateChildcompetence($child, $competence);
                    }
                }
                // $this->view('regis');
                
            }
        }
            $this->view('CreateChild');
    }

    
}
?>