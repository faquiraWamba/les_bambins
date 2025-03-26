<?php
require_once "./app/core/Controller.php";
class ParentQuestionnaire extends Controller{
    public function index(){
        // var_dump($_SESSION);
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "parent") {
            $this->view('ParentQuestionnaire');
        }else{
                
            $this->view('page_accueil');
                
            }
             
        }
       
    }
    
}
?>
