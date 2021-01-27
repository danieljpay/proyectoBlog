<?php

class Login extends Controller{

    public $MODULE = "login";
    public $TITLE = "Inicia Sesión";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function iniciarSesion(){
        $user = $this->model->login($_POST["email"], $_POST["password"]);
        if(count($user) == 1){
            session_start();
            $_SESSION['user'] = $user[0]->email;
        }
        echo "Hola ".$_SESSION['user'];
    }
}