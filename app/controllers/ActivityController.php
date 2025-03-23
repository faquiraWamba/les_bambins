<?php 
require_once ROOT_PATH.'app/core/Controller.php';

class ActivityController extends Controller{
    public function showActivities(){
        $this->view('activities');
    }

    public function CreateActivity(){
        $this->view('gestion_activites');
    }
}


?>