<?php
define('BASE_URL', '/les_bambins/public/');
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . '/les_bambins/');

function connect_to_db(){
    $user = 'root';
    $host="127.0.0.1";
    $pwd='';
    $dbname="les_bambins";

    try{
        $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pwd, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $bdd;

    }catch(Exception $e){
        die('Erreur:'.$e->getMessage());
    }

}

?>