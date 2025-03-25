<?php
require_once "./app/core/Controller.php";
class HomeController extends Controller{
    public function index(){
        // var_dump($_SESSION);
        if(isset($_SESSION['user'])){
            $this->view('IntraHomePage');
        }else{

            $this->view('page_accueil'); 
        }
       
    }
    
}
?>