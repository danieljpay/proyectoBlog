<?php

class Problem extends Controller{

    public $MODULE = "problem";
    public $TITLE = "Error";

    public function index(){
        require APP . 'view/_templates/header.php';
        echo "Ocurrio un error";
        require APP . 'view/_templates/footer.php';
    }

}