<?php
require_once "./app/core/Controller.php";
class HomeController extends Controller{
    public function index(){
        // var_dump($_SESSION);
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "administrateur") {
            $this->view('IntraHomePage');
        }else{
                if ($_SESSION['role'] == "animateur") {
                    $this->view('intranet');
                }else{
                    if ($_SESSION['role'] == "parent") {
                        $this->view('IntraHomeParent');
                    }
                    else {
                        if ($_SESSION['role'] == "accompagnateur") {
                            $this->view('IntraHomeAcc');
                        }
                    }
                }
            }
            $this->view('page_accueil'); 
        }
        $this->view('page_accueil'); 
    }
}
?>