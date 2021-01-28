<?php

class Registro extends Controller{

    public $MODULE = "registro";
    public $TITLE = "Registro";

    public function index(){
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case 1:
                    $error_message = "El correo utilizado ya está en uso";
                break;

                case 2:
                    $error_message = "Error de servidor";
                break;
            }
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/registro/registro.php';
        require APP . 'view/_templates/footer.php';
    }

    public function enviarRegistro(){
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $usuario = $this->model->getUsuario($email);

        if(count($usuario) == 1 && $usuario[0]->email == $email){
            header("Location: ".URL.'registro?error=1');

        }else{
            $registro = $this->model->registro($first_name, $last_name, $email, $password);

            if($registro){
                header("Location: ".URL.'login');
            }else{
                header("Location: ".URL.'registro?error=2');
            }
        }

        exit();
    }
}