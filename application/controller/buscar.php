<?php

class Buscar extends Controller{

    public $MODULE = "buscar";
    public $TITLE = "Resultados de tu búsqueda";

    public function index(){
        $query = $_GET["query"];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_CMS.'/api/collections/get/posts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "filter": {
                    "title" : "'.$query.'"
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
        $posts = $json->entries;

        require APP . 'view/_templates/header.php';
        require APP . 'view/busqueda/busqueda.php';
        require APP . 'view/_templates/footer.php';
    }

}