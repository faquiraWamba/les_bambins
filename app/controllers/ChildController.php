<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';
require_once ROOT_PATH.'app/models/Child.php';
require_once ROOT_PATH.'app/models/User.php';
require_once ROOT_PATH.'app/models/Child_Slot.php';
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
        $parent= new Tutor(); 
        $user = new User();
        $child= new Child(); 
        $id_parent=null;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            // var_dump($_POST);}
            if (!empty($_POST["nom_parent"]) && !empty($_POST["prenom_parent"]) && !empty($_POST["sexe_parent"]) 
            && !empty($_POST["telephone_parent"]) && !empty($_POST["rue_parent"]) && !empty($_POST["ville_parent"])
            && !empty($_POST["code_postal_parent"]) && !empty($_POST["pays_parent"]) && !empty($_POST["email_parent"])){
                $id_parent=generateUniqueID('PR');
                
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
            }
            if (!empty($_POST["nom_enfant"]) && !empty($_POST["prenom_enfant"]) && !empty($_POST["sexe_enfant"]) && !empty($_POST["date_naissance"])&&
               !empty($_POST["type_famille"])) {
                
                $id_enfant=generateUniqueID('CH');

                // //Add parent
                // $parent = $parent->getParent($_POST["id_parent"]);
                

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
                    $parent, 
                    $num_groupe 
                );
                if (!empty($_POST["competence"])){
                    $competences =$_POST["competence"];
                    $child_competence = new Child_Competence();
                    foreach ($competences as $competence){
                        $child_competence->CreateChildcompetence($child, $competence);
                    }
                }
                if (!empty($_POST["creneau"])){
                    echo("creneau pas vide");
                    $slots =$_POST["creneau"];
                    $child_slot = new Child_Slot();
                    $jours=['lundi','mardi','mercredi','jeudi','vendredi'];
                    foreach ($slots as $slot){
                        echo($slot);
                        if($slot=="periscolaire"){
                            if(isset($_POST["periode_periscolaire"])){
                                $jours = $_POST["periode_periscolaire"];
                                var_dump($_POST["periode_periscolaire"]);
                                foreach($jours as $jour => $periodes){
                                    foreach($periodes as $period){

                                        $child_slot->CreateChildSlot($child,1,$jour ,$period);
                                    }
                                }
                             }

                        }else{
                            if(isset($_POST["periode_".$slot])){
                                $periodes = $_POST["periode_".$slot];
                                foreach($periodes as $period){
                                    if($slot=="mercredi"){
                                        $child_slot->CreateChildSlot($child,2,'Mercredi',$period);
                                    }else if($slot=="vacances"){
                                        if($period=='hiver'){
                                            $child_slot->CreateChildSlot($child,4,'tous les jours','tous');
                                        }else if($period=='noel'){
                                            $child_slot->CreateChildSlot($child,5,'tous les jours','tous');
                                        }else if($period=='printemps'){
                                            $child_slot->CreateChildSlot($child,6,'tous les jours','tous');
                                            
                                        }else if($period=='été'){
                                            $child_slot->CreateChildSlot($child,7,'tous les jours','tous');
                                            
                                        $child_slot->CreateChildSlot($child,8,'tous les jours','tous');
                                    }
                                    }if($slot=="quantine"){
                                        $child_slot->CreateChildSlot($child,3,$period,'repas');
                                    }
                                }
                            }

                        }
                        
                    }
                }
                $msg="inscription en cours de validation";
                $this->view('Page_accueil',[['error'=>$msg]]);
                
            }
        }
            $this->view('CreateChild');
    }

    
}
?>