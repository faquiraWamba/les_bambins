<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Group.php';
require_once ROOT_PATH.'app/models/Child_Group.php';
require_once ROOT_PATH.'app/core/Generator.php';
class Child_GroupController extends Controller{
    public function CreateGroup($error=null, $success=null){
        $group= new Group(); 
        $child_group= new Child_Group(); 
        $childsNogroup = $child_group->getChildsWithNoGroup();
        $groups=$group->GetGroups();
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST["nb_enfant"]) && !empty($_POST["age_min_groupe"]) && !empty($_POST["age_max_groupe"])){
                    $numero_groupe=generateGroupNumber();
                    $group->CreateGroup($numero_groupe, $_POST["nb_enfant"],$_POST["age_min_groupe"],$_POST["age_max_groupe"]);
                    
                    $msg= "Groupe créer avec succès";
                    $this->view('RP-groupe_enfants',['groups'=>$groups,'success'=>$msg,'childsNogroup'=>$childsNogroup]);
            }else{
                $msg= "Il manque des champ";
                $this->view('RP-groupe_enfants',['groups'=>$groups,'childsNogroup'=>$childsNogroup, 'error'=>$msg]);
            }
        }
        $this->view('RP-groupe_enfants',['groups'=>$groups,'childsNogroup'=>$childsNogroup, 'error'=>$error, 'success'=>$success]);
        
        
    }

    public function updateGroup() {
        $group= new Group(); 
        $child_group= new Child_Group(); 
        $childsNogroup = $child_group->getChildsWithNoGroup();
        $groups=$group->GetGroups();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id_enfant']) && !empty($_POST['numero_groupe'])) {
                $id_enfant = $_POST['id_enfant'];
                $numero_groupe = $_POST['numero_groupe'];
                    
                $result = $child_group->updateChildGroup($id_enfant, $numero_groupe);
    
                if ($result === true) {
                    $msg = "Groupe mis à jour avec succès.";
                    $this->CreateGroup(null,$msg);

                } else {
                    $this->CreateGroup($result);

                }
            } else {
                $msg=  "Données manquantes.";
                $this->CreateGroup($msg);
            }
        } else {
            $this->CreateGroup();

        }
    }

    public function deleteGroup() {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id_groupe'])) {
            $id_groupe = $_POST['id_groupe'];
    
            $groupModel = new Group();
            $result = $groupModel->deleteGroup($id_groupe);
    
            if ($result === true) {
                $msg = "Groupe supprimé avec succès.";
                $this->CreateGroup(null,$msg);
            } else {
                $this->CreateGroup($result);

            }
        } else {
            $msg= "Données invalides.";
            $this->CreateGroup($msg);

        }
    }

    public function showChildrenByGroup($numero_groupe) {
        $childModel = new Child_Group
        ();
        $children = $childModel->getChildrenByGroup($numero_groupe);
    
        $this->view('RP-enfants', ['children' => $children]);
    }
    
    
    
    
}

?>
