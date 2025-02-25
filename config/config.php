<?php
function connect_to_db(){
    $user = 'root';
    $host="localhost";
    $pwd='';
    $dbname="les_bambins";

    try{
        $bdd = new PDO("mysql:host= $host; dbname=$dbname; charset=utf8",$user,$pwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;

    }catch(Exception $e){
        die('Erreur:'.$e->getMessage());
    }

}


?>