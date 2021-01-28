<?php

class Login extends Controller{

    public $MODULE = "login";
    public $TITLE = "Inicia Sesión";

    //Si existe un parametro de error al cargar el login, se crea la variable para mostrar el mensaje
    public function index(){
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case 1:
                    $error_message = "Correo o contraseña incorrectos";
                break;
            }
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/login.php';
        require APP . 'view/_templates/footer.php';
    }

    
    //Recibir datos por POST y si se encuentra el usuario, se redirecciona a inicio.
    public function iniciarSesion(){
        $user = $this->model->login($_POST["email"], $_POST["password"]);

        if(count($user) == 1 && $user[0]->email == $_POST["email"]){
            session_start();
            $_SESSION['user'] = $user[0]->email;
            header("Location: ".URL.'inicio');

        }else{
            header("Location: ".URL.'login?error=1');
        }
    }
    
}