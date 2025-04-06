<?php
class HomeController extends Controller {
    public function index() {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "administrateur") {
                // echo "Redirection vers IntraHomePage<br>";
                $this->view('IntraHomePage');
            } elseif ($_SESSION['role'] == "animateur") {
                // echo "Redirection vers intranet<br>";
                $this->view('intranet');
            } elseif ($_SESSION['role'] == "parent") {
                // echo "Redirection vers IntraHomeParent<br>";
                $this->view('IntraHomeParent');
            } elseif ($_SESSION['role'] == "accompagnateur") {
                // echo "Redirection vers IntraHomeAcc<br>";
                $this->view('IntraHomeAcc');
            }
        } else {
            // echo "Aucun rôle détecté, chargement de la page_accueil<br>";
            $this->view('page_accueil');
        }
    }
}
?>