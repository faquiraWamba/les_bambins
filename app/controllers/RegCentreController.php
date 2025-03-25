<?php
require_once ROOT_PATH.'app/core/Controller.php';
class RegCentreController extends Controller{
    public function ModifyReg(){
        $this->view('RP-modify_inscription');
    }
    public function ValidReg(){
        $this->view('RP-valider_inscription');
    }

}

?>
