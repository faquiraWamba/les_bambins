<?php
require_once "./app/core/Controller.php";
class HomeController extends Controller{
    public function index(){
        var_dump(session_start());
        if(isset($_SESSION['user'])){
            $this->view('profil.php');
        }else{
            $this->view('page_accueil'); 
        }
       
    }
    
}
?>