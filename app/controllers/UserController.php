<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/User.php';
class UserController extends Controller{
   

    public function getUser($id){
        $user = new User;
        $user = $user->getUser($id);

        if($user){
            $this->view('profil',['user'=>$user]);
        }
    
    }
    public function ShowProfilRP(){
        $this->view('RP-Profil');
    }
    public function ModifyProfil(){
        $this->view('Modif_profil');
    }
}









?>