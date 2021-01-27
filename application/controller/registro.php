<?php

class Registro extends Controller{

    public $MODULE = "registro";
    public $TITLE = "Registro";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/registro/registro.php';
        require APP . 'view/_templates/footer.php';
    }

    public function enviarRegistro(){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = $this->model->registro($first_name, $last_name, $email, $password);

        if($result){
            echo "Registro exitoso";
        }else{
            echo "Fallo el registro";
        }
    }
}