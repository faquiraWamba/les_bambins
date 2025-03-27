<?php 

require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Bill.php';
class BillController extends Controller{
    private $billModel;

    // Afficher toutes les factures non payées
    public function showUnpaidBills() {
        $unpaidBills = $this->billModel->getUnpaidBills();
        $this->view('RP-Facture', ['bills' => $unpaidBills]);
    }

  
}
?>
