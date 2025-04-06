<?php
require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/Child_Parcours.php';
require_once ROOT_PATH . 'app/models/Bill.php';

class RegParcoursController extends Controller {
    public function CreateRegParcours() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_enfant = $_POST['id_enfant'];
            $id_parcours = $_POST['id_parcours'];
            $prix_parcours = $_POST['prix_parcours'];

            $childParcoursModel = new Child_Parcours();
            $factureModel = new Facture();

            // Vérifier si l'enfant est déjà inscrit
            if ($childParcoursModel->isChildEnrolledInParcours($id_enfant, $id_parcours)) {
                $this->view('FormInscriptionParcours', ['error' => 'L\'enfant est déjà inscrit à ce parcours.']);
                return;
            }

            // Inscrire l'enfant au parcours
            $childParcoursModel->createParcoursInscription($id_enfant, $id_parcours);

            // Ajouter le prix du parcours à la facture
            $factureExistante = $factureModel->getFactureByMonth($id_enfant);
            if ($factureExistante) {
                $factureModel->updateFacture($id_enfant, $prix_parcours);
            } else {
                $factureModel->createFacture($id_enfant, $prix_parcours);
            }

            $this->view('FormInscriptionParcours', ['success' => 'Inscription réussie !']);
        }
    }

    public function inscrireEnfantParcours() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_enfant = $_POST['id_enfant'];
            $id_parcours = $_POST['id_parcours'];

            $childParcoursModel = new Child_Parcours();

            // Vérifier si l'enfant est déjà inscrit au parcours
            if ($childParcoursModel->isChildEnrolledInParcours($id_enfant, $id_parcours)) {
                $this->view('FormInscriptionParcours', ['error' => 'L\'enfant est déjà inscrit à ce parcours.']);
                return;
            }

            // Vérifier si le parcours est terminé
            if ($childParcoursModel->isParcoursTermine($id_parcours)) {
                $this->view('FormInscriptionParcours', ['error' => 'Ce parcours est déjà terminé.']);
                return;
            }

            // Inscrire l'enfant au parcours
            $result = $childParcoursModel->createParcoursInscription($id_enfant, $id_parcours);

            if ($result) {
                $this->view('FormInscriptionParcours', ['success' => 'Inscription réussie !']);
            } else {
                $this->view('FormInscriptionParcours', ['error' => 'Une erreur est survenue lors de l\'inscription.']);
            }
        } else {
            // Charger les données nécessaires pour afficher le formulaire
            $parcoursModel = new Parcours();
            $parcours = $parcoursModel->GetParcours($_GET['id_parcours'] ?? null);

            if (!$parcours) {
                $this->view('FormInscriptionParcours', ['error' => 'Le parcours demandé est introuvable.']);
                return;
            }

            $childModel = new Child();
            $children = $childModel->getChildrenByParent($_SESSION['parent_id'] ?? null);

            $this->view('FormInscriptionParcours', [
                'parcours' => $parcours,
                'children' => $children
            ]);
        }
    }
}
?>