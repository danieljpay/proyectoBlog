<?php

class About extends Controller{

    public $MODULE = "about";
    public $TITLE = "Sobre Mí";
    public $bio;

    public function index(){
        $this->getAboutPost();
        require APP . 'view/_templates/header.php';
        require APP . 'view/about/about.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getAboutPost(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => URL_CMS.'/api/collections/get/bio',
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
        $this->bio = $json->entries[0];
    }
    
}