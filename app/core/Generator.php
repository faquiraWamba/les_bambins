<?php
function generateUniqueID($prefix, $length = 4) {
    // Utilisation d'un préfixe (2 lettres) suivi d'un identifiant unique basé sur le timestamp
    $uniquePart = substr(time() . mt_rand(1000, 9999), -$length);
    return strtoupper($prefix) . $uniquePart;
}

function generateGroupNumber() {
    return str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
}

function generateRandomPassword($length = 12) {
    // Définition des caractères possibles
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=<>?';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
    }
    
    return $randomPassword;
}
?>
