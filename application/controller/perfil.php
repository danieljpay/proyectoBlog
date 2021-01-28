<?php

class Perfil extends Controller{
    public $MODULE = "perfil";
    public $TITLE = "Perfil";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/perfil/perfil.php';
        require APP . 'view/_templates/footer.php';
    }

}