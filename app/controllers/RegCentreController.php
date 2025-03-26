<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Child.php';
class RegCentreController extends Controller{
    public function ModifyReg(){
        $this->view('RP-modify_inscription');
    }
    public function ValidReg(){
        $enfant =  new Child();
        $enfants=$enfant->inscriptionEnAttente();
        $this->view('RP-valider_inscription',['enfants'=>$enfants]);
    }

}

?>
