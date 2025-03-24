<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ParcoursController extends Controller{
    public function showParcours(){
        $this->view('parcours-activites');
    }

}

?>