<?php

class Inicio extends Controller{

    public $MODULE = "inicio";
    public $TITLE = "Home";
    public $posts = array();

    public function index(){
        $this->getAllPosts();
        require APP . 'view/_templates/header.php';
        require APP . 'view/inicio/inicio.php';
        require APP . 'view/_templates/footer.php';
    }

    //Llamar a la API externa del CMS para traer los posts
    private function getAllPosts(){
        $filter = '{
            "filter":{
                "published": true
            }  
        }';
        $response = $this->model->getCollectionEntries("posts", $filter);
        $this->posts = $response->entries;
    }

    public function logout(){
        session_destroy();
        $_SESSION = array();
        print_r($_SESSION);
        header("Location: ".URL.'inicio');
        exit();
    }
}