<?php 
// session_start();
// require_once '../config/config.php';
// require_once '../app/controllers/AuthController.php';
// require_once '../app/core/autoload.php';

// // Liste des pages autorisées
// $pages = ['page_accueil', 'register','login']; 

// // Vérifier si une page est demandée, sinon afficher "home"
// $page = isset($_GET['page']) && in_array($_GET['page'], $pages) ? $_GET['page'] : 'page_accueil';

// $authController = new AuthController();

// if(isset($_GET['action'])){
//     $action = $_GET['action'];

//     if ($action == 'login') {
//         $authController->login();
//         exit();
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL?>/CSS/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- Inclusion de Select2 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <title>Les Bambins</title>
</head>
<body class="body">
<?php if (isset($error)): ?>
        <div style="color: red;">
            <?= $error ?>
        </div>
<?php endif; ?>
        <?php include 'header.php'; ?>

        <main class='main'>
                
                <?php echo $content; ?>
        </main>

        <?php include 'footer.php'; ?>


        <script src="<?=BASE_URL?>/JS/register.js"></script>
        <script src="<?=BASE_URL?>/JS/Gestion_activite.js"></script>
        
        
</body>
</html> 