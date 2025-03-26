<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Reunion.php';

class ReunionController extends Controller{
    
    public function showReunion($msg=null){
        $reunion = new Reunion;
        $reunions = $reunion->getReunions();
        $this->view('RP-reunion',['$error'=>$msg, 'reunions'=>$reunions]);
        
    }

    public function getReunion(){
        $reunion = new Reunion;
        if($_GET['id']){
            $id = $_GET['id'];
        $reunions = $reunion->getReunions();
        $getreunion = $reunion->getReunion($id);
        var_dump($getreunion);
        $this->view('RP-reunion',['reunion'=>$getreunion,'reunions'=>$reunions]);
        }
    }

    public function createReunion(){
        $reunion = new Reunion;
        if(!empty($_POST['nom_reunion']) && !empty($_POST['date_reunion']) &&!empty($_POST['heure_reunion'])){
            $newreunion = $reunion->CreateReunion(
                $_POST['nom_reunion'],
                $_POST['date_reunion'],
                $_POST['heure_reunion']
            );

            if($newreunion){
                $msg = "reunion crée avec Succès";
                $this->showReunion($msg);
            }
            $this->showReunion();

        }
    }

    public function ModifyReunion(){
        $reunion = new Reunion;
        if($_GET['id']){
            $id = $_GET['id'];
            $newreunion = $reunion->UpdateReunion(
                $id,
                $_POST['nom_reunion'],
                $_POST['date_reunion'],
                $_POST['heure_reunion']
            );
            if($newreunion){
                $msg = "reunion Modifié avec Succès";
                $this->showReunion($msg);
            }
            $this->showReunion();

        }
    }

    public function deleteReunion(){
        $reunion = new Reunion;
        if($_GET['id']){
            $id = $_GET['id'];
        $reunions = $reunion->getReunions();
        $reunion->deleteReunion($id);
        $this->view('RP-reunion',['reunions'=>$reunions]);
        }
    }

    public function cancelReunion(){
        $reunion = new Reunion;
        if($_GET['id']){
            $id = $_GET['id'];
        $reunions = $reunion->getReunions();
        $reunion->cancelReunion($id);
        $this->view('RP-reunion',['reunions'=>$reunions]);
        }
    }
}

?>