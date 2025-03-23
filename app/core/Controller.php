<?php
require_once "/xampp/htdocs/les_bambins/config/config.php";
require_once "/xampp/htdocs/les_bambins/config/auth.php";
Class Controller{
    public function view($view, $data=[]){
        extract($data); 

        // Capture le contenu de la vue demandée
        ob_start();
        require_once ROOT_PATH."app/vues/$view.php";
        $content = ob_get_clean();

        // Charge le layout principal
        require_once ROOT_PATH."app/vues/layout.php";
    }
}
?>