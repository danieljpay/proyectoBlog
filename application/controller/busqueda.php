<?php

class Busqueda extends Controller{
    public $MODULE = "busqueda";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/busqueda/busqueda.php';
        require APP . 'view/_templates/footer.php';
    }

}