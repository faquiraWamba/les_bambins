<?php
require_once "./app/core/Controller.php";
class EDTController extends Controller{
    public function ShowEDTParent(){
            $this->view('edtParent');
    }
    public function ShowEDTAnim(){
        $this->view('edtAnimateur');
    }

}
?>