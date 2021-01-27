<?php

class About extends Controller{
    public $MODULE = "about";
    public $TITLE = "Sobre Mí";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/about/about.php';
        require APP . 'view/_templates/footer.php';
    }

}