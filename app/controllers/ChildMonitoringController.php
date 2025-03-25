<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ChildMonitoringController extends Controller{
    public function showChildMonitoringn(){
        $this->view('suivi-comportement');
    }

}


?>