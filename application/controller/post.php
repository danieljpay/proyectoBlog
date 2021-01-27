<?php

class Post extends Controller{
    public $MODULE = "post";
    public $TITLE = "Publicación";

    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/post/post.php';
        require APP . 'view/_templates/footer.php';
    }

}