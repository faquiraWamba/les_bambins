<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Comportement.php';

class ChildMonitoringComportementController extends Controller {

    public function showChildMonitoringC() {
        $model = new ChildMonitoringComportementModel();

        // Vérifier si la clé 'id_enfant' existe dans la session
        if (!isset($_SESSION['id_enfant'])) {
            // Gérer l'erreur, par exemple en redirigeant ou en affichant un message
            echo "L'id de l'enfant n'est pas défini dans la session.";
            exit; // Arrêter l'exécution du code si 'id_enfant' est manquant
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Vérifier les données soumises
            if (isset($_POST['date'], $_POST['description_comportemental'], $_POST['id_enfant'])) {
                $date = $_POST['date'];
                $description_comportemental = $_POST['description_comportemental'];
                $id_enfant = $_POST['id_enfant'];
                $type = isset($_POST['type']) ? $_POST['type'] : '';

                // Ajouter un suivi comportemental
                $enregistrement = $model->enregistrerSuiviComportement($id_enfant, $date, $type, $description_comportemental);

                if ($enregistrement) {
                    header("Location: index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC");
                } else {
                    echo "Erreur lors de l'enregistrement du suivi comportemental.";
                }
            }
        }

        // Utiliser $_SESSION['id_enfant'] pour obtenir les suivis comportementaux
        $suivis = $model->getSuivisComportementaux($_SESSION['id_enfant']);

        // Passer les suivis comportementaux à la vue
        $this->view('suivi-comportement', ['suivis' => $suivis]);
    }
}
?>
