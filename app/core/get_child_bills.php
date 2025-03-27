<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';
require_once ROOT_PATH . 'app/models/Bill.php';
require_once ROOT_PATH . 'app/models/Child.php'; // Assurez-vous d'inclure le modèle Child

$db = connect_to_db();

// Initialisation des modèles
$billModel = new Facture($db);
$childModel = new Child($db);

if (isset($_GET['id_enfant'])) {
    $id_enfant = $_GET['id_enfant'];
    
    // Utilisation de la méthode pour récupérer les factures d'un enfant
    $bills = $billModel->getBillsByChild($id_enfant);
    
    // Retourner les résultats sous forme de JSON
    echo json_encode($bills);
}
?>

