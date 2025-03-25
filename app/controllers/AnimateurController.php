<?php
require_once ROOT_PATH.'app/core/Controller.php';

class AnimateurController extends Controller{
    public function showActiviteAnim(){
        $this->view('AN-activite_animateur');
    }

}


?>