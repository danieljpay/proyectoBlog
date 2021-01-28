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
        $filter = '{
            "filter":{
                "published": true
            }  
        }';
        $response = $this->model->getCollectionEntries("bio", $filter);
        $this->bio = $response->entries[0];
    }
    
}