<?php

Class Personnel{
    private $db;


    function __construct()
    {

        $this->db = connect_to_db();
    }

    Public function getPersonnelByUserId($user_id){
        $query="SELECT * FROM PERSONNEL_ENCADRANT P INNER JOIN UTILISATEUR U ON P.user_id=U.user_id WHERE U.user_id LIKE :user_id";
        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':user_id'=>$user_id
            ]);
            $parent = $stmt->fetch(PDO::FETCH_ASSOC);
            return $parent;
        }
        catch(Exception $e){
            $e=$e->getMessage();
            return null;
        }
    }
}



?>