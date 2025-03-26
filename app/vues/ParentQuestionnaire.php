<?php
//vérification de connexion de l'utilisateur

if(!isset($_SESSION['user'])){
    header('Location:page_accueil');
    exit;
}


?>
<h1> Bonjour user/<?php echo $_SESSION['user']; ?> </h1>


