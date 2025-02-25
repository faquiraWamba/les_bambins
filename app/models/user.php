<?php
require_once './config/config.php';
Class Utilisateur {
    private $db;

    public function __construct()
    {
        $this->db=connect_to_db();
    }

    public function creerUtilisateur($email,$password){

        $query= $this->db->prepare("INSERT INTO utilisateur (email,password) VALUES ($email,$password)");
        return $query->execute([
            'email'=>$email,
            'password'=>password_hash($password, PASSWORD_DEFAULT)
        ]);

    }
    public function getUtilisateur($id){
        $query = $this->db->prepare("SELECT * FROM UTILISATEUR WHERE user_id=$id");
        $query->execute(['id'=>$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getUtilisateurs(){
        $query=$this->db->prepare("SELECT * FROM UTILISATEUR");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>