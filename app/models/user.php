<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class User {
    private $db;

    public function __construct()
    {
        $this->db=connect_to_db();
    }

    public function login($email,$password){
        $query="SELECT * FROM UTILISATEUR WHERE email=:email";
        $stmt= $this->db->prepare($query);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        
        $user=$stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])){

            return $user;
        }

        return  false;
    }


    public function register($email,$password){
        $sql = "INSERT INTO utilisateur (email,password) VALUES (:email,:password)";
        $stmt = $this->db->prepare($sql);
        try{
            $user = $stmt->execute([
                ':email'=>$email,
                ':password'=>password_hash($password, PASSWORD_BCRYPT)
            ]);
            return $user;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    public function getUser($id){
        $query = $this->db->prepare("SELECT * FROM UTILISATEUR WHERE user_id=$id");
        $query->execute(['id'=>$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsers(){
        $query=$this->db->prepare("SELECT * FROM UTILISATEUR");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>