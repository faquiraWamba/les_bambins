<?php
require_once ROOT_PATH.'app/models/Activity.php';
require_once ROOT_PATH.'app/models/Parcours.php';
require_once ROOT_PATH.'app/models/Activity_Parcours.php';
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';

class ParcoursController extends Controller{
    public function showParcours(){
        $parcours = new Parcours;
        $allParcours = $parcours->GetAllParcours();
        $this->view('parcours-activites',['allParcours'=>$allParcours]);
    }
    public function showAParcours(){
        $parcours = new Parcours;
        $activity = new Activity;
        $activities = $activity->GetActivities();
        $allParcours = $parcours->GetAllParcours();

        if(isset($_GET['id'])){
            $parcours = $parcours->GetParcours($_GET['id']);
            $this->view('RP-creer_parcours',['parcours'=>$parcours]);
        }
    }
    public function ConsultParcours($msg=null){
        $parcours = new Parcours;
        $allParcours = $parcours->GetAllParcours();
        $this->view('RP-consulter_parcours',['error' => $msg, 'allParcours'=>$allParcours]);
    }
    public function ModifyParcours(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $activity_parcours = new Activity_Parcours;
            $activity = new Activity;
            $parcours = new Parcours;
            $oldparcours = $parcours->getParcours($id);
    
            // Récupérer la liste des nouvelles activités
            $activities = $_POST['activities'];
    
            // Mettre à jour les informations du parcours
            $parcours->UpdateParcours(
                $id,
                $_POST['titre_parcours'],
                $_POST['prix_parcours'],
                $_POST['description_parcours'],
                $_POST['nb_places_parcours'],
                $_POST['date_debut_parcours'],
                $_POST['date_fin_parcours']
            );
    
            if($parcours){
                $oldactivities = $activity_parcours->GetAllActiviteParcours($id);
                $oldActivitiesIds = array_map(function($activity) { return $activity['id_activite']; }, $oldactivities);
                $activity_parcours->RemoveOldActivities($id, $activities);
                $activity_parcours->AddNewActivities($id, $activities);
    
                $msg = "Parcours modifié avec succès";
                $this->ConsultParcours($msg);
            }
        }
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
                $msg="Parcours Modifié avec succès";
                 $this->ConsultParcours($msg);
            }
        }
        else{
            $activities = $activity->GetActivities();
            $this->view('RP-creer_parcours',['activities'=>$activities],);
        }
    }

    public function DeleteParcours(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $activity = new Activity;
            $id_parcours = $_GET['id'];
            $activity_parcours = new Activity_Parcours;
            $parcours = new Parcours;
            $activity_parcours->DeleteParcours($id_parcours);
            $parcours->DeleteParcours($id_parcours);

            $msg="Parcours Supprimé avec succès";
            $this->ConsultParcours($msg);

                
        }

    }

}

?>