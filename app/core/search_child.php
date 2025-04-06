<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/les_bambins/config/config.php';
require_once ROOT_PATH . 'app/models/Child.php';

$db = connect_to_db();

$childModel = new Child($db);

if (isset($_GET['query'])) {
    $name = trim($_GET['query']);
    $children = $childModel->searchChildrenByName($name);

    // Vérifie que des enfants ont été trouvés
    if ($children) {
        // Renvoie les enfants sous forme de JSON
        echo json_encode($children);
    } else {
        // Si aucun enfant n'est trouvé, renvoie un tableau vide
        echo json_encode([]);
    }
} else {
    // Si le paramètre `query` n'est pas défini, renvoie un message d'erreur JSON
    echo json_encode(['error' => 'Aucune requête fournie.']);
}
?>
