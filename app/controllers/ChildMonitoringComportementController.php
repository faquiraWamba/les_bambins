<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ChildMonitoringComportementController extends Controller{
    public function showChildMonitoringC(){
        $this->view('suivi-comportement');
    }

}


?>