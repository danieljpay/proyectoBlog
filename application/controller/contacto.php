<?php

class Contacto extends Controller{

    public $MODULE = "contacto";
    public $TITLE = "Contacto";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/contacto/contacto.php';
        require APP . 'view/_templates/footer.php';
    }

}