<?php
require_once ROOT_PATH . 'app/core/Controller.php';

class FAQController extends Controller {

    public function showFAQ() {
        $this->view(view: 'FAQ');
    }

}
?>
