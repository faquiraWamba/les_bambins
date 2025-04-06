<?php

require_once ROOT_PATH . 'app/core/Controller.php';
require_once ROOT_PATH . 'app/models/Child_Activity.php';

class ChildActivityController extends Controller {
    public function cancelActivity() {
        try {
            if (isset($_GET['id_activite']) && isset($_GET['id_enfant'])) {
                $id_activite = $_GET['id_activite'];
                $id_enfant = $_GET['id_enfant'];

                $childActivityModel = new Child_Activity();
                $factureModel = new Facture();

                // Récupérer les détails de l'inscription
                $inscription = $childActivityModel->getActivityInscription($id_activite, $id_enfant);

                if ($inscription) {
                    // Calculer les jours restants
                    $dateDebut = new DateTime($inscription['date_debut_activite']);
                    $dateFin = new DateTime($inscription['date_fin_activite']);
                    $aujourdhui = new DateTime();

                    if ($aujourdhui > $dateDebut) {
                        $joursEffectues = $dateDebut->diff($aujourdhui)->days;
                        $joursTotaux = $dateDebut->diff($dateFin)->days + 1;
                        $joursRestants = max(0, $joursTotaux - $joursEffectues);

                        // Calculer le montant à déduire
                        $prixParJour = $inscription['prix_activite'] / $joursTotaux;
                        $montantRestant = $joursRestants * $prixParJour;

                        // Mettre à jour la facture
                        $factureModel->deduireMontant($id_enfant, $montantRestant);
                    }

                    // Annuler l'inscription
                    $childActivityModel->cancelActivityInscription($id_activite, $id_enfant);

                    // Rediriger avec un message de succès
                    header('Location: index.php?controller=Child&action=showProfilEnfant&id=' . $id_enfant . '&msg=Annulation réussie');
                    exit();
                } else {
                    throw new Exception("Inscription introuvable.");
                }
            } else {
                throw new Exception("Paramètres manquants.");
            }
        } catch (Exception $e) {
            // Rediriger avec un message d'erreur
            header('Location: index.php?controller=Child&action=showProfilEnfant&id=' . ($_GET['id_enfant'] ?? '') . '&msg=' . urlencode($e->getMessage()));
            exit();
        }
    }
}

?>
