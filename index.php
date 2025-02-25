<?php
// Liste des pages autorisées
$pages = ['home', 'register','login']; 

// Vérifier si une page est demandée, sinon afficher "home"
$page = isset($_GET['page']) && in_array($_GET['page'], $pages) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/CSS/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface|Poppins">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="container">

        <?php include './app/vues/header.php'; ?>

        <main class='main'>
            <?php include "./app/vues/$page.php"; ?>
        </main>

        <?php include './app/vues/footer.php'; ?>


        <script src="./public/JS/register.js"></script>
        
</body>
</html>