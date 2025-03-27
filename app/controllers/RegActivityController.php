<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Child_Activity.php';
require_once ROOT_PATH.'app/models/Child.php';
require_once ROOT_PATH.'app/models/Activity.php';

class RegActivityController extends Controller {
    public function CreateRegActivity() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id_enfant']) && !empty($_POST['id_activite'])) {
                $child_activity = new Child_Activity();
                $result = $child_activity->CreateChildActivity($_POST['id_enfant'], $_POST['id_activite']);
                
                if ($result === true) {
                    $message = "L'inscription à l'activité a été réalisée avec succès.";
                    $this->view('RP-inscription_activite', ['success' => $message]);
                } else {
                    $message = "Une erreur est survenue lors de l'inscription à l'activité.";
                    $this->view('RP-inscription_activite', ['error' => $message]);
                }
            } else {
                $message = "Veuillez fournir l'ID de l'enfant et l'ID de l'activité.";
                $this->view('RP-inscription_activite', ['error' => $message]);
            }
        } else {
            $this->view('RP-inscription_activite');
        }
    }

    public function ModifyRegActivity() {
        $this->view('RP-modif_inscription_activite');
    }

    public function inscrireEnfant() {
        if (isset($_GET['id'])) {
            $id_activite = $_GET['id'];
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
