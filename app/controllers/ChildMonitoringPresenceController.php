<?php
require_once ROOT_PATH.'app/core/Controller.php';

class ChildMonitoringPresenceController extends Controller{
    public function showChildMonitoringPresence(){
        $this->view('suivi-presence');
    }

}


?>