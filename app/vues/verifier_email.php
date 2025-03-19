<?php 
    require_once '/xampp/htdocs/les_bambins/app/models/Parent.php';
    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);
    
        $parent = new Tutor();
        $existingParent = $parent->getParent($email);
    
        echo json_encode(["exists" => $existingParent ? true : false]);
    }
?>