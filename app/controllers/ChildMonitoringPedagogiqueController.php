<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/child.php';
require_once ROOT_PATH.'app/models/ChildMonitoringPedagogique.php';

class ChildMonitoringPedagogiqueController extends Controller {
    public function showChildMonitoringP() {
        $childModel = new Child();
        $children = $childModel->getChildrenInscrit();

        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $child = $childModel->getChild($id_enfant);
            if ($child) {
                $this->view('suivi-pedagogique', ['child' => $child, 'children' => $children]);
            } else {
                $this->view('suivi-pedagogique', ['error' => 'Enfant introuvable.', 'children' => $children]);
            }
        } else {
            $this->view('suivi-pedagogique', ['children' => $children]);
        }
    }

    public function addProfil() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            $type_profil = $_POST['type_profil'];
            $description_profil = $_POST['description_profil'];
            $id_enfant = $_POST['id_enfant'];

            $profilModel = new ChildMonitoringPedagogique();
            $result = $profilModel->addProfil($type_profil, $description_profil, $id_enfant);

            if ($result) {
                $this->view('suivi-pedagogique', ['success' => 'Profil pédagogique ajouté avec succès.']);
            } else {
                $this->view('suivi-pedagogique', ['error' => 'Erreur lors de l\'ajout du profil pédagogique.']);
            }
        } else {
            $this->view('suivi-pedagogique');
        }
    }

    public function getChildHistory() {
        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $profilModel = new ChildMonitoringPedagogique();
            $historique = $profilModel->getLastTenProfiles($id_enfant);
            echo json_encode($historique);
        }
    }
}
?>