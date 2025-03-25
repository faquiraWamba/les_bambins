<?php
require_once ROOT_PATH.'app/models/Activity.php';
require_once ROOT_PATH.'app/models/Parcours.php';
require_once ROOT_PATH.'app/models/Activity_Parcours.php';
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';

class ParcoursController extends Controller{
    public function showParcours(){
        $this->view('parcours-activites');
    }
    public function ConsultParcours(){
        $this->view('RP-consulter_parcours');
    }
    public function ModifyParcours(){
        $this->view('RP-modifier_parcours');
    }
    public function CreateParcours(){
        $activity = new Activity;
        $activities = $activity->GetActivities();
        $parcours = new Parcours;
        $activity_parcours = new Activity_Parcours;
        if(!empty($_POST['titre_parcours']) && !empty($_POST['date_debut_parcours']) && !empty($_POST['date_fin_parcours'])
        && !empty($_POST['nb_places_parcours']) && !empty($_POST['prix_parcours']) && !empty($_POST['description_parcours'])&& !empty($_POST['activities'])){
            
            $id_parcours=generateUniqueCode('PC');
            $activities = $_POST['activities'];
            $parcours->CreateParcours(
                $id_parcours,
                $_POST['titre_parcours'],
                $_POST['prix_parcours'],
                $_POST['description_parcours'],
                $_POST['nb_places_parcours'],
                $_POST['date_debut_parcours'],
                $_POST['date_fin_parcours']
            );
            if($parcours){
                foreach ($activities as $a){
                     $activity_parcours->CreateActiviteParcours($id_parcours,$a);
                }
                $msg="Parcours créé avec succès";
                $this->view('RP-creer_activite',['error'=>$msg,'activities'=>$activities],);
            }
        }
        else{
        $this->view('RP-creer_parcours',['activities'=>$activities]);
        }
    }

}

?>