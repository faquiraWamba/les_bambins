<?php
require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/ChildMonitoringPresence.php';

class ChildMonitoringPresenceController extends Controller {
    public function showChildMonitoringPresence() {
        $childModel = new Child();
        $children = $childModel->getChildrenInscrit();

        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $presenceModel = new ChildMonitoringPresence();
            $historique = $presenceModel->getPresenceHistory($id_enfant);

            $this->view('suivi-presence', [
                'children' => $children,
                'historique' => $historique,
                'id_enfant' => $id_enfant
            ]);
        } else {
            $this->view('suivi-presence', ['children' => $children]);
        }
    }

    public function addPresence() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_inscription_activite = $_POST['id_inscription_activite'];
            $etat_presence = $_POST['etat_presence'];
            $projet_realise = $_POST['projet_realise'];

            $presenceModel = new ChildMonitoringPresence();
            $result = $presenceModel->addPresence($id_inscription_activite, $etat_presence, $projet_realise);

            if ($result) {
                $this->view('suivi-presence', ['success' => 'Présence enregistrée avec succès.']);
            } else {
                $this->view('suivi-presence', ['error' => 'Erreur lors de l\'enregistrement de la présence.']);
            }
        }
    }

    public function getChildHistory() {
        if (isset($_GET['id_enfant'])) {
            $id_enfant = $_GET['id_enfant'];
            $presenceModel = new ChildMonitoringPresence();
            $historique = $presenceModel->getPresenceHistoryWithActivity($id_enfant);

            // Retourne les données au format JSON
            header('Content-Type: application/json');
            echo json_encode($historique);
            exit();
        } else {
            // Retourne une réponse vide si aucun enfant n'est sélectionné
            header('Content-Type: application/json');
            echo json_encode([]);
            exit();
        }
    }

    public function showFicheAppel() {
        if (!isset($_SESSION['id_personnel'])) {
            $this->view('AN-fiche_appel', ['error' => 'Animateur non connecté.']);
            return;
        }

        $id_personnel = $_SESSION['id_personnel']; // ID de l'animateur connecté
        $activityModel = new ActivityAnimator(); // Modèle pour gérer les activités des animateurs
        $activities = $activityModel->getActivitiesByPersonnel($id_personnel); // Récupérer les activités de l'animateur

        if (isset($_GET['id_activite'])) {
            $id_activite = $_GET['id_activite'];
            $presenceModel = new PresenceActivite();
            $date = date('Y-m-d'); // Date du jour

            // Vérifier si l'appel a déjà été réalisé
            if ($presenceModel->checkPresenceExists($id_activite, $date)) {
                // Récupérer les présences existantes
                $presences = $presenceModel->getPresenceByActivityAndDate($id_activite, $date);
                $this->view('AN-fiche_appel', [
                    'activities' => $activities,
                    'presences' => $presences,
                    'id_activite' => $id_activite,
                    'date' => $date
                ]);
            } else {
                // Récupérer les enfants inscrits à l'activité
                $children = $presenceModel->getChildrenByActivity($id_activite);
                $this->view('AN-fiche_appel', [
                    'activities' => $activities,
                    'children' => $children,
                    'id_activite' => $id_activite,
                    'date' => $date
                ]);
            }
        } else {
            $this->view('AN-fiche_appel', ['activities' => $activities]);
        }
    }

    public function saveFicheAppel() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_activite = $_POST['id_activite'];
            $projet_realise = $_POST['projet_realise'];
            $presences = $_POST['presences']; // Tableau des présences

            $presenceModel = new ChildMonitoringPresence();

            try {
                foreach ($presences as $id_inscription_activite => $etat_presence) {
                    $presenceModel->addPresence($id_inscription_activite, $etat_presence, $projet_realise);
                }

                $this->view('AN-fiche_appel', [
                    'success' => 'Fiche d\'appel enregistrée avec succès.',
                    'id_activite' => $id_activite
                ]);
            } catch (Exception $e) {
                $this->view('AN-fiche_appel', [
                    'error' => 'Erreur lors de l\'enregistrement de la fiche d\'appel.',
                    'id_activite' => $id_activite
                ]);
            }
        } else {
            header('Location: index.php?controller=ChildMonitoringPresence&action=showFicheAppel');
            exit();
        }
    }
}
?>