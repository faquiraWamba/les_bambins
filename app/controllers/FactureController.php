<?php 
require_once ROOT_PATH.'app/core/Controller.php';

class FactureController extends Controller{
    public function showFacture(){
        $this->view('RP-facture');
    }
    public function showFactureParent(){
        $this->view('Facture');
    }


}

?>