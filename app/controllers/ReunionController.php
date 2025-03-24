<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ReunionController extends Controller{
    public function showReunion(){
        $this->view('RP-reunion');
    }
}

?>