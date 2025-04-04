<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php'; // Chemin absolu depuis "app/core"
require_once ROOT_PATH . 'config/auth.php';
require_once ROOT_PATH . 'app/core/autoload.php';

$_SESSION['auth']=auth();
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
