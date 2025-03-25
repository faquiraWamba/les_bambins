<?php 
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/core/Generator.php';
require_once ROOT_PATH.'app/models/Activity.php';
require_once ROOT_PATH.'app/controllers/imgController.php';

class ActivityController extends Controller{
    public function showActivities(){
        $activity = new Activity;
        $activities = $activity->GetActivities();
        
        $this->view('activities',['activities'=>$activities]);
    }

    public function showActivitiesRP(){
        $activity = new Activity;
        $activities = $activity->GetActivities();
        
        $this->view('RP-Consulter_activite',['activities'=>$activities]);
    }
    
    public function ShowActivity(){
        if(isset($_GET['id'])){
            $activite = new Activity();
            $activite = $activite->getActivity($_GET['id']);
            $this->view('RP-creer_activite',['activity'=>$activite]);
        }
        // $this->view('RP-modifier_activite');
    }

    public function CreateActivity(){
       
        if(!empty($_POST['nom_activite']) && !empty($_POST['age_min_activite']) && !empty($_POST['age_max_activite']) && !empty($_POST['type_activite'])
            && !empty($_POST['nb_places']) && !empty($_POST['tarif_activite']) && !empty($_POST['niveau_activite']) && !empty($_POST['description_activite'])){

            $activity = new Activity();
            $id_activite=generateUniqueCode('AC');
            
            $imgController = new ImgController();

            // Upload de l'image
            $imageUpload = $imgController->uploadImage($_FILES["image_activite"]);
    
            if (isset($imageUpload['error'])) {
                die($imageUpload['error']); // Si erreur lors du téléchargement
            }
            $activity = new Activity();
        $id_activite = generateUniqueCode('AC');

        // Création de l'activité
        $activity = $activity->CreateActivity(
            $id_activite,
            $_POST['nom_activite'],
            $_POST['age_min_activite'],
            $_POST['age_max_activite'],
            $_POST['type_activite'],
            $_POST['nb_places'],
            $_POST['niveau_activite'],
            $_POST['prerequis'],
            $_POST['tarif_activite'],
            $_POST['description_activite'],
            $imageUpload['success']
        );

            if($activity){
                $msg="Activité créé avec succès";
                $this->view('RP-creer_activite',['error'=>$msg]);
            }

        }
        $this->view('RP-creer_activite');
    }

    public function ModifyActivity(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $activity = new Activity;
            $oldactivity = $activity->getActivity($id);
    
            // Si une nouvelle image est envoyée
            if(!empty($_FILES["image_activite"]["name"])){
    
                // Instancier ImgController pour gérer l'image
                $imgController = new ImgController();
    
                // Upload de l'image
                $imageUpload = $imgController->uploadImage($_FILES["image_activite"]);
    
                if (isset($imageUpload['error'])) {
                    die($imageUpload['error']); // Si erreur lors du téléchargement
                }
    
                // Mise à jour de l'activité avec la nouvelle image
                $activity = $activity->UpdateActivity(
                    $id,
                    $_POST['nom_activite'],
                    $_POST['age_min_activite'],
                    $_POST['age_max_activite'],
                    $_POST['type_activite'],
                    $_POST['nb_places'],
                    $_POST['niveau_activite'],
                    $_POST['prerequis'],
                    $_POST['tarif_activite'],
                    $_POST['description_activite'],
                    $imageUpload['success'] // Lien vers la nouvelle image
                );
            } else {
                // Si pas de nouvelle image, garder l'ancienne
                $activity = $activity->UpdateActivity(
                    $id,
                    $_POST['nom_activite'],
                    $_POST['age_min_activite'],
                    $_POST['age_max_activite'],
                    $_POST['type_activite'],
                    $_POST['nb_places'],
                    $_POST['niveau_activite'],
                    $_POST['prerequis'],
                    $_POST['tarif_activite'],
                    $_POST['description_activite'],
                    $oldactivity['img_activite'] // Conserver l'ancienne image
                );
            }
    
            if($activity){
                $msg = "Activité modifiée avec succès";
                $this->showActivitiesRP();
            } else {
                $msg = "Erreur lors de la modification";
                $this->view('RP-creer_activite', ['error' => $msg]);
            }
        }
        $this->view('RP-modifier_activite');

    }
    public function DeleteActivity(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $activity = new Activity;
            $activity->DeleteActivity($id);
            $this->showActivitiesRP();
        }

    }
    public function ConsultParcours(){
        $this->view('RP-consulter_parcours');
    }
    public function ModifyParcours(){
        $this->view('RP-modifier_parcours');
    }
    public function CreateParcours(){
        $this->view('RP-creer_parcours');
    }


}


?>