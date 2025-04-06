<?php
require_once  $_SERVER['DOCUMENT_ROOT'] .'/les_bambins/config/config.php';
require_once ROOT_PATH . 'app/models/Child.php';

session_start(); // Assurez-vous que la session est démarrée
$db = connect_to_db();

$childModel = new Child($db);

if (isset($_GET['query']) && isset($_SESSION['role']) && $_SESSION['role'] === 'parent') {
    $name = trim($_GET['query']);
    $id_parent = $_SESSION['parent_id']; // ID du parent connecté

    // Recherche des enfants du parent connecté
    $children = $childModel->searchChildrenByParent($name, $id_parent);

    // Vérifie que des enfants ont été trouvés
    if ($children) {
        // Renvoie les enfants sous forme de JSON
        echo json_encode($children);
    } else {
        // Si aucun enfant n'est trouvé, renvoie un tableau vide
        echo json_encode([]);
    }
} else {
    // Si le paramètre `query` ou la session n'est pas valide, renvoie un message d'erreur JSON
    echo json_encode(['error' => 'Requête invalide ou utilisateur non autorisé.']);
}
?>