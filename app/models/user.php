<?php

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
             $e->getMessage();
        }
        
    }


    public function getUser($id){
        $query = $this->db->prepare("SELECT * FROM UTILISATEUR WHERE user_id=:id");
        $query->execute([':id'=>$id]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserByMail($email){
        $query = $this->db->prepare("SELECT * FROM UTILISATEUR WHERE email LIKE :email");
        $query->execute([':email'=>$email]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsers(){
        $query=$this->db->prepare("SELECT * FROM UTILISATEUR");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $email = null, $password = null) {
        $sql = "UPDATE utilisateur SET ";
        $params = [];
    
        if ($email !== null) {
            $sql .= "email = :email, ";
            $params[':email'] = $email;
        }
        
        if ($password !== null) {
            $sql .= "password = :password, ";
            $params[':password'] = password_hash($password, PASSWORD_BCRYPT);
        }
    
        // Supprimer la dernière virgule et ajouter la condition WHERE
        $sql = rtrim($sql, ", ") . " WHERE id = :id";
        $params[':id'] = $id;
    
        $stmt = $this->db->prepare($sql);
    
        try {
            return $stmt->execute($params);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updatePassword($id, $password) {
        $sql = "UPDATE utilisateur SET password = :password WHERE user_id = :id";
        $stmt = $this->db->prepare($sql);
        
        try {
            $stmt->execute([
                ':password' => password_hash($password, PASSWORD_BCRYPT),
                ':id' => $id
            ]);
            return $stmt->rowCount() > 0; // Retourne true si une ligne a été mise à jour
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
    
    
}
?>