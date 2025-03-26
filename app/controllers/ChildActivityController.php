<?php

require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/Child_Activity.php';

class ChildActivityController extends Controller {

    public function CreateChildActivity() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id_activite']) && !empty($_POST['id_enfant'])) {
                $ChildActivity = new Child_Activity();
                $success = $ChildActivity->CreateChildActivity($_POST['id_enfant'], $_POST['id_activite']);

                if ($success) {
                    $message = "Activité ajoutée avec succès !";
                    $this->view('RP-inscription_activite', ['success' => $message]);
                } else {
                    $message = "Erreur lors de l'ajout de l'activité.";
                }
            } else {
                $message = "Veuillez remplir tous les champs.";
            }

            // Afficher la vue avec le message
            $this->view('RP-inscription_activite', ['error' => $message]);
        } else {
            // Afficher simplement le formulaire d'ajout
            $this->view('RP-inscription_activite');
        }
    }
}
?>
