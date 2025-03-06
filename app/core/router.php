<?php
session_start();
require_once './config/config.php';
require_once 'autoload.php'; // Charge automatiquement les classes

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'HomeController';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerFile =ROOT_PATH."app/controllers/$controller.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controller();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo "Erreur : Action non trouvée.";
    }
} else {
    echo "Erreur : Contrôleur non trouvé.";
}
?>
