<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/User.php';
class PaiementController extends Controller{


    public function showPaiement(){
        $this->view('Paiement');
    }
}


?>