<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/User.php';
require_once ROOT_PATH.'app/models/Parent.php';
require_once ROOT_PATH.'app/models/Personnel.php';
class UserController extends Controller{
   

    public function getUser($id){
        $user = new User;
        $user = $user->getUser($id);

        if($user){
            $this->view('profil',['user'=>$user]);
        }
    
    }

    public function ShowProfilRP(){
        if ($_SESSION['role'] === 'parent'){
            $parentmodel = new Tutor;
            $parent = $parentmodel->getParentByUserId($_SESSION['user_id']);
            $this->view('RP-Profil',['parent'=>$parent]);
        } elseif ($_SESSION['role'] === 'animateur' || $_SESSION['role'] === 'administrateur'){
            $personnelrmodel = new Personnel;
            $personnel = $personnelrmodel->getPersonnelByUserId($_SESSION['user_id']);
            $this->view('RP-Profil',['personnel'=>$personnel]);
        }

    }
    public function ModifyProfil(){
        $this->view('Modif_profil');
    }
}









?>