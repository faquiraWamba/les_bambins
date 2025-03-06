<?php
//vérification de connexion de l'utilisateur

if($_SESSION['user']){
    header('Location:page_accueil');
    exit;
}


?>
<h1> <?php $user->email ?> </h1>



