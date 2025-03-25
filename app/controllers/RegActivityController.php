<?php
require_once ROOT_PATH.'app/core/Controller.php';
class RegActivityController extends Controller{
    public function CreateRegActivity(){
        $this->view('RP-inscription_activite');
    }
    public function ModifyRegActivity(){
        $this->view('RP-modif_inscription_activite');
    }

}

?>
