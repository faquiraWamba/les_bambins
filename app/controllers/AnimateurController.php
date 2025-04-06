<?php
require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/ActivityAnimator.php';

class AnimateurController extends Controller {
    public function showActiviteAnim() {
        if (isset($_SESSION['id_personnel'])) {
            $id_personnel = $_SESSION['id_personnel'];
            $activityAnimatorModel = new ActivityAnimator();
            $activities = $activityAnimatorModel->getActivitiesByPersonnel($id_personnel);

            $this->view('AN-activite_animateur', ['activities' => $activities]);
        } else {
            $this->view('AN-activite_animateur', ['error' => 'Aucun personnel connecté.']);
        }
    }

    public function showAffectation(){
        $this->view('RP-affectation_animateur');
    }
}
?>