<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/User.php';
require_once ROOT_PATH.'app/models/Parent.php';
require_once ROOT_PATH.'app/models/Personnel.php';
class AuthController extends Controller{
    
    public function login(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $userModel = new User() ;
            $parentModel = new Tutor() ;
            $personnelModel = new Personnel() ;
            
            $user = $userModel->login($email,$password);
            if ($user){
                $_SESSION['user']=$user['user_id'];
                $parent=$parentModel->getParentByUserId($user['user_id']);
                $personnel=$personnelModel->getPersonnelByUserId($user['user_id']);

                if($parent){
                    $_SESSION['role']='parent';
                }else if($personnel){
                    $_SESSION['role']=$personnel['role_personnel'];
                }
                header('Location: index.php?controller=Home');
                exit();

            }else{
                // Si l'utilisateur n'existe pas
                $error="email ou mot de passe incorrect";
                 
                $this->view('login', ['error'=>$error]);
            }
        }
        $this->view('login');

    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new User() ;
            
            $user = $userModel->register($email,$password);
            
            if ($user){
                $error="Votre compte a été créé";
                
                $this->view('login', ['error'=>$error]);

            }else{
                //Si l'utilisateur n'est pas créer
                $error="echec lors de la creation";
                 
                $this->view('regis', ['error'=>$error]);
            }
            
        }
        $this->view('regis');

    }

    public function logout(){
        session_destroy();
        header('Location:index.php?controller=Home');
        exit();
    }
}









?>