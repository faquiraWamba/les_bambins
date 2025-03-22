<?php 
require_once ROOT_PATH.'app/core/Controller.php';

class MenuController extends Controller{
    public function showMenu(){
        $this->view('menu');
    }
}
?>