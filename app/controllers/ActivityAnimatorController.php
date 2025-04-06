<?php
require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/ActivityAnimator.php';
require_once ROOT_PATH . 'app/models/Activity.php';
require_once ROOT_PATH . 'app/models/Animator.php';

class ActivityAnimatorController extends Controller {
    public function showAffectation() {
        $activityModel = new Activity();
        $activities = $activityModel->GetActivities();

        $animatorModel = new Animator();
        $animators = $animatorModel->getAllAnimators();

        $this->view('RP-affectation_animateur', [
            'activities' => $activities,
            'animators' => $animators
        ]);
    }

    public function assignAnimator() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_activite = $_POST['id_activite'];
            $id_animateur = $_POST['id_animateur'];

            $activityAnimatorModel = new ActivityAnimator();
            $result = $activityAnimatorModel->assignAnimatorToActivity($id_activite, $id_animateur);

            if ($result) {
                $this->view('RP-affectation_animateur', ['success' => 'Animateur affecté avec succès.']);
            } else {
                $this->view('RP-affectation_animateur', ['error' => 'Erreur lors de l\'affectation.']);
            }
        }
    }
}
?>