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
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_CMS.'/api/collections/get/posts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "filter": {
                    "published" : true
                }
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 43a0dc3c3900d5677bab77e58e05ed',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        $json = json_decode($response);
        $this->posts = $json->entries;
    }
}