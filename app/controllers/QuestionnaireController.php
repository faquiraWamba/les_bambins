<?php
require_once ROOT_PATH.'app/core/Controller.php';

class QuestionnaireController extends Controller{
    public function showQuestionnaire(){
        $this->view('RP-Questionnaire');
    }
}

?>