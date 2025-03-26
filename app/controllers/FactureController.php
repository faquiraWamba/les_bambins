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


    

}

?>