<?php
require_once "./app/core/Controller.php";
class ParentQuestionnaireController extends Controller{
    public function showParentQuestionnaire(){
            $this->view('ParentQuestionnaire');
       
    }
    public function showAnswerQuest(){
        $this->view('AnswerQuest');
    }
    
}
?>
