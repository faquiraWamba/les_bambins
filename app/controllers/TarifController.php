<?php 
require_once ROOT_PATH.'app/core/Controller.php';

class TarifController extends Controller{
    public function showTarifs(){
        $this->view('tarifs');
    }
}
?>