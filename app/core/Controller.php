<?php
Class Controller{
    public function view($view, $data=[]){
        extract($data);

        // Capture le contenu de la vue demandée
        ob_start();
        require_once "./app/vues/$view.php";
        $content = ob_get_clean();

        // Charge le layout principal
        require_once "./app/vues/layout.php";
    }
}
?>