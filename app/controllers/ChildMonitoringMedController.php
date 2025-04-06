<?php
require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/ChildMonitoringMedical.php';

class ChildMonitoringMedController extends Controller {
    public function showChildMonitoringM() {
        $childModel = new Child();
        $children = $childModel->getChildrenInscrit();

        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $medicalModel = new ChildMonitoringMedical();
            $historique = $medicalModel->getMedicalHistory($id_enfant);

            $this->view('suivi-medical', [
                'children' => $children,
                'historique' => $historique,
                'id_enfant' => $id_enfant
            ]);
        } else {
            $this->view('suivi-medical', ['children' => $children]);
        }
    }

    public function addMedicalRecord() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_enfant = $_POST['id_enfant'];
            $type = $_POST['type_suivi'];
            $description = $_POST['description_suivi'];

            $medicalModel = new ChildMonitoringMedical();
            $result = $medicalModel->addMedicalRecord($id_enfant, $type, $description);

            if ($result) {
                $this->view('suivi-medical', ['success' => 'Suivi médical ajouté avec succès.']);
            } else {
                $this->view('suivi-medical', ['error' => 'Erreur lors de l\'ajout du suivi médical.']);
            }
        } else {
            $this->view('suivi-medical');
        }
    }

    public function getChildHistory() {
        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $medicalModel = new ChildMonitoringMedical();
            $historique = $medicalModel->getMedicalHistory($id_enfant);
            echo json_encode($historique);
        } else {
            echo json_encode(['error' => 'ID enfant manquant']);
        }
    }
}
?>