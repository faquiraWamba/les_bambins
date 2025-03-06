<?php
// Enregistrement et création de la fonctionAutoload 
spl_autoload_register(function ($class) {
    // echo "Tentative de chargement de la classe : " . var_export($class, true) . "<br>";
    $file = "../app/controllers/$class.php";
    // echo "Chargement de : $file";
    if (file_exists($file)) {
        require_once $file;
    }

    $file = "../app/models/$class.php";
    if (file_exists($file)) {
        require_once $file;
    }

    $file = "../app/core/$class.php";
    if (file_exists($file)) {
        require_once $file;
    }
});


// spl_autoload_register('autoload');
?>