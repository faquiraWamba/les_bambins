<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ChildMonitoringMedController extends Controller{
    public function showChildMonitoringM(){
        $this->view('suivi-medical');
    }

}


?>