<?php
if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/les_bambins/');
}

if (!defined('BASE_URL')) {
    define('BASE_URL', '/les_bambins/public/');
}

function connect_to_db(){
    $user = 'root';
    $host="127.0.0.1";
    $pwd=''; //changer si besoin
    $dbname="les_bambins";

    try{
        $bdd = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8", $user, $pwd, [ //enlever port=8889 si besoin
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $bdd;

    }catch(Exception $e){
        die('Erreur:'.$e->getMessage());
    }

}

?>