<?php
require_once ROOT_PATH.'app/core/Controller.php';

class GestionController extends Controller{
    public function showGestion(){
        $this->view('suivi-comportement');
    }

}


?>