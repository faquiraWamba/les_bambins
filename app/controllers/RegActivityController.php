<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Child_Activity.php';
require_once ROOT_PATH.'app/models/Child.php';
require_once ROOT_PATH.'app/models/Activity.php';
require_once ROOT_PATH.'app/models/Bill.php';

class RegActivityController extends Controller {
    public function CreateRegActivity() {
        $activity = new Activity;
        $activities = $activity->GetActivities();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id_enfant']) && !empty($_POST['id_activite']) && !empty($_POST['date_debut_activite']) && !empty($_POST['date_fin_activite'])) {
                $child_activity = new Child_Activity();
                $result = $child_activity->CreateChildActivity(
                    $_POST['id_enfant'], 
                    $_POST['id_activite'], 
                    $_POST['date_debut_activite'], 
                    $_POST['date_fin_activite'], 
                    $_POST['rabais'] ?? null
                );
                
                if ($result === true) {
                    $message = "L'inscription à l'activité a été réalisée avec succès.";
                    $this->view('RP-Consulter_activite', ['success' => $message,'activities'=>$activities]);
                } else {
                    $message = "L'enfant est déjà inscrit à cette activité ou une erreur est survenue.";
                    $this->view('RP-Consulter_activite', ['error' => $message,'activities'=>$activities]);
                }
            } else {
                $message = "Veuillez fournir tous les champs requis.";
                $this->view('RP-Consulter_activite', ['error' => $message]);
            }
        } else {
            $this->view('RP-inscription_activite');
        }
    }

    public function ModifyRegActivity() {
        $this->view('RP-modif_inscription_activite');
    }

    public function inscrireEnfant() {
        if (isset($_GET['id_activite'])) {
            $id_activite = $_GET['id_activite'];
            $activityModel = new Activity();
            $activity = $activityModel->getActivityById($id_activite);

            if ($_SESSION['role'] == 'parent') {
                $parentId = $_SESSION['parent_id'];
                $childModel = new Child();
                $children = $childModel->getChildrenByParent($parentId);
                $this->view('FormInscriptionActivite', ['activity' => $activity, 'children' => $children]);
            } else {
                $this->view('FormInscriptionActivite', ['activity' => $activity]);
            }
        } else {
            $this->view('FormInscriptionActivite', ['error' => 'ID de l\'activité non fourni.']);
        }
    }
}
?>
