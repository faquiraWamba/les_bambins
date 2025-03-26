<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ChildMonitoringPedagogiqueController extends Controller{
    public function showChildMonitoringP(){
        $this->view('suivi-pedagogique');
    }

}


?>