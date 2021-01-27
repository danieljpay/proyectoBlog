<main>
    <div>
        <h1>Últimas publicaciones</h1>
        <div class="container">
            <?php 
                foreach($this->posts as $post){
                    echo '
                        <article>
                            <img src="'.URL_PROTOCOL.URL_CMS.'/storage/uploads'.$post->image->path.'" alt="">
                            <div>
                                <h3>'.$post->title.'</h3>
                                <p>'.$post->description.'</p>
                                <a href="<?php echo URL; ?>post">Ver publicación...</a>
                            </div>
                        </article>
                    ';
                }
            ?>
        </div>
    </div>
</main>