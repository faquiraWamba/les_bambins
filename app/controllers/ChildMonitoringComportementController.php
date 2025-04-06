<?php
require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/ChildMonitoringComportement.php';

class ChildMonitoringComportementController extends Controller {
    public function showChildMonitoringC() {
        $childModel = new Child();
        $children = $childModel->getChildrenInscrit();

        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $comportementModel = new ChildMonitoringComportement();
            $historique = $comportementModel->getComportementHistory($id_enfant);

            $this->view('suivi-comportement', [
                'children' => $children,
                'historique' => $historique,
                'id_enfant' => $id_enfant
            ]);
        } else {
            $this->view('suivi-comportement', ['children' => $children]);
        }
    }

    public function addComportement() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'];
            $description = $_POST['description_comportemental'];
            $id_enfant = $_POST['id_enfant'];

            $comportementModel = new ChildMonitoringComportement();
            $result = $comportementModel->addComportement($type, $description, $id_enfant);

            if ($result) {
                $this->view('suivi-comportement', ['success' => 'Suivi comportemental ajouté avec succès.']);
            } else {
                $this->view('suivi-comportement', ['error' => 'Erreur lors de l\'ajout du suivi comportemental.']);
            }
        } else {
            $this->view('suivi-comportement');
        }
    }
}
?>
