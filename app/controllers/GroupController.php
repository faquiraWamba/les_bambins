<?php
require_once ROOT_PATH.'app/core/Controller.php';
Class GroupController extends Controller{

    public function CreateGroup(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if (!empty($_POST["nb_enfant"]) && !empty($_POST[" age_min_groupe"]) && !empty($_POST["age_max_groupe"])){
                    $numero_groupe=generateGroupNumber();
                    $group= new Group(); 
                    $group->CreateGroup($numero_groupe, $_POST["nb_enfant"],$_POST[" age_min_groupe"],$_POST["age_max_groupe"]);
                return $group;
            }
        }else{
            
        }
    }
    
    
}   
?>