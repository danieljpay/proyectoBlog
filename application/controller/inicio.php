<?php

class Inicio extends Controller{
    public $MODULE = "inicio";
    public $TITLE = "Home";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/inicio/inicio.php';
        require APP . 'view/_templates/footer.php';
    }

}