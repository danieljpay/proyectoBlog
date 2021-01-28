<main>
    <?php
        if(isset($posts)){
            echo '<h2>Resultados que coinciden con tu búsqueda: "'.$query.'"</h2>';
            echo '<div class="container">';
            
            foreach($posts as $post){
                echo '
                    <article>
                        <div class="img-container">
                            <img src="'.URL_PROTOCOL.URL_CMS.'/storage/uploads'.$post->image->path.'" alt="">
                        </div>
                        <div class="post-container">
                            <h3>'.$post->title.'</h3>
                            <p>'.$post->description.'</p>
                            <a href="'.URL.'post/view/'.$post->_id.'">Ver publicación...</a>
                        </div>
                    </article>
                ';
            }

        }
    ?>
    </div>
</main>