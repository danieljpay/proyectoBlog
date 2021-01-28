<?php

class Post extends Controller{

    public $MODULE = "post";
    public $TITLE = "Publicación";

    public function view($id_post){
        $filter = '{
            "filter":{
                "_id" : "'.$id_post.'"
            }
        }';

        $response = $this->model->getCollectionEntries("posts", $filter);
        $posts = $response->entries;

        if(count($posts) != 1){
            header("Location: ".URL.'problem');
            exit();
        }

        $post = $posts[0];
        require APP . 'view/_templates/header.php';
        require APP . 'view/post/post.php';
        require APP . 'view/_templates/footer.php';
    }

    //Funcion que es consumida por ajax
    public function getComentarios(){
        $request = json_decode(file_get_contents("php://input"));
        $id_post = $request->id_post;

        $response = $this->model->queryComments($id_post);
        return json_encode($response);
    }

}