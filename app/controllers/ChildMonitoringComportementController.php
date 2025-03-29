<?php
class ChildMonitoringComportementController extends Controller{

    public function showChildMonitoringC()
    {

        $model = new ChildMonitoringComportementModel();


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

        $suivis = $model->getSuivisComportementaux($_SESSION['id_enfant']);


        $this->view('suivi-comportement', ['suivis' => $suivis]);

    }

}


?>