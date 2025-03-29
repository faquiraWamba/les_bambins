<?php
// Enregistrement automatique des classes (contrôleurs, modèles, etc.)
spl_autoload_register(function ($class) {
    $paths = [
        ROOT_PATH . 'app/controllers/',
        ROOT_PATH . 'app/models/',
        ROOT_PATH . 'app/core/',
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return; // on sort dès qu'on trouve la classe
        }
    }
});
?>