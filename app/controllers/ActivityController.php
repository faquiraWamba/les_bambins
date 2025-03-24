<?php 
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Activity.php';

class ActivityController extends Controller{
    public function showActivities(){
        $this->view('activities');
    }

    public function CreateActivity(){
       
        if(!empty($_POST['nom_activite']) && !empty($_POST['age_min_activite']) && !empty($_POST['age_max_activite']) && !empty($_POST['type_activite'])
            && !empty($_POST['nb_places']) && !empty($_POST['tarif_activite']) && !empty($_POST['niveau_activite']) && !empty($_POST['description_activite'])){

            $activity = new Activity();
            $activity=$activity->CreateActivity($_POST['nom_activite'],$_POST['age_min_activite'],$_POST['age_max_activite'],$_POST['type_activite'],$_POST['nb_places'],
            $_POST['niveau_activite'],$_POST['prerequis'],$_POST['tarif_activite'],$_POST['description_activite'],$_POST['image_activite']);
            
            // if($activity){
            //     $msg="Activité créé avec succès";
            //     $this->view('gestion_activites',[['error'=>$msg]]);
            // }else{
            //     $msg="Erreur lors de la création";
            //     $this->view('gestion_activites',[['error'=>$msg]]);
            // }
            var_dump($activity);

        }
        // $this->view('gestion_activites');
    }
}


?>