<?php
ob_start();
$profilEnfant = true; // On définit une variable pour indiquer qu'on est sur profil_enfant.php
include 'RP-valider_inscription_spe.php';
$page = ob_get_clean();

$page = preg_replace('/<div class="register-tab-for-btn">.*?<\/div>/s', '', $page);

echo $page;
?>