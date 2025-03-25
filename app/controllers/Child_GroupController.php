<?php
require_once ROOT_PATH.'app/core/Controller.php';
class Child_GroupController extends Controller{
    public function CreateGroup(){
        $this->view('RP-groupe_enfants');
    }
}

?>
