<main>
    <h1>Dr. Jacinto Herrera León</h1>
    <?php
        if(isset($this->bio)){
            $images = $this->bio->images;

            echo '<div class="images-container">';
            foreach($images as $i){
                echo '
                    <div>
                        <img src="'.URL_PROTOCOL.URL_DOMAIN.$i->path.'" alt="">
                    </div>
                ';
            }
            echo '</div>';

            echo '<pre>'.$this->bio->content.'</pre>';
        }
    ?>
    
</main>