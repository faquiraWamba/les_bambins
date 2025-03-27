<?php 
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Bill.php';

class FactureController extends Controller{
    public function showFacture(){
        $bill = new Facture();
        $unpaidBills = $bill->getUnpaidBills();
        $this->view('RP-facture', ['bills' => $unpaidBills]);
    }
    public function showFactureParent(){
        $this->view('Facture');
    }

    public function download() {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $factureModel = new Facture();
            $facture = $factureModel->getFactureById($_GET['id']);

            if ($facture && is_array($facture)) {
                $filename = "facture_" . $facture['id_facture'] . ".pdf";
                header("Content-Type: application/pdf");
                header("Content-Disposition: attachment; filename=$filename");

                echo "Facture\n";
                echo "Date : " . htmlspecialchars($facture['date_facture']) . "\n";
                echo "Montant : " . htmlspecialchars($facture['montant']) . " €\n";
                echo "Nom de l'enfant : " . htmlspecialchars($facture['nom_enfant']) . "\n";
                exit();
            } else {
                die(" Erreur : Facture introuvable.");
            }
        } else {
            die(" Erreur : ID de facture invalide.");
        }
    }
    

}

?>