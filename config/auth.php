<?php
public function auth(){

    if(isset($_SESSION['user'])){
        return True;
    }else{
        return False;
    }
    
}

?>