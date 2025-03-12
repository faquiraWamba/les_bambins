<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';
require_once ROOT_PATH.'app/models/Child.php';
require_once ROOT_PATH.'app/models/Competence.php';
require_once ROOT_PATH.'app/models/Parent.php';

Class ChildController extends Controller{
    
    public function getChild($id_enfant){
        $child= new Child(); 
        $child = $child->getChild($id_enfant);

        return $child;
    }

    public function CreateChild(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST["nom_enfant"]) && !empty($_POST["nom_enfant"]) && !empty($_POST["sexe_enfant"]) && !empty($_POST["date_naissance"])
             && !empty($_POST["securite_sociale"]) && !empty($_POST["fiche_medical"])&& !empty($_POST["type_repas"])&& !empty($_POST["type_famille"])) {
                $id_enfant=generateUniqueID('CH');
                $child= new Child(); 

                //Add parent
                $parent = new Tutor();
                $parent = $parent->getParent($_POST["email_parent"]);

                //Add the child to a group
                $age = calculateAge($_POST["date_naissance"]); // calcul age de l'enfant
                //On attribu un groupe temporaire
                if($age>=3 && $age<=5){
                    $num_groupe = 5;
                }
                else if($age>5 & $age<=8){
                    $num_groupe =8;
                }
                else {
                    $num_groupe  =0;
                }
                // $group->CreateGroup($numero_groupe);

                // $group = new Group;
                // $groups=$group->GetGroupsByAge($age);

                // if($groups){
                //     $group= rand(1,sizeof($groups)+1);
                //     $numero_groupe = $group['numero_groupe'];
                // }else{
                //     $numero_groupe=generateGroupNumber();
                //     if($age>=3 && $age<=5){
                //         $nb_groupe = 5;
                //     }
                //     else if($age>5 & $age<=8){
                //         $nb_groupe=
                //     }
                //     $group->CreateGroup($numero_groupe);
                // }

                $child->CreateChild($id_enfant,$_POST["nom_enfant"],$_POST["prenom_enfant"],$_POST["sexe_enfant"],$_POST["date_naissance"],
                $_POST["securite_sociale"],$_POST["type_famille"],$_POST["fiche_medical"],$_POST["type_repas"], $parent['id'], $num_groupe );
                
            }
        }
        $competence = new Competence;
        $competences=$competence->GetCompetences();
        if($competences){
            $this->view('CreateChild',['competences'=>$competences]);
        }else{
            $this->view('CreateChild');

        }
    }

    
}
?>