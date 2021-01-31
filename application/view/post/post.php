<main >
    <div class="post">
        <div class="post-titulo">
            <h2 id=Tittle><?php echo $post->title ?></h2>
        </div>
        <div class="post_container" id="postContent">
            <div class="post_container-imagen">
                <img 
                    src="<?php echo URL_PROTOCOL.URL_CMS.'/storage/uploads'.$post->image->path; ?>" 
                    alt="Imagen principal de la publicación"
                >
            </div>
            <div id="postText" class="post_container-text">
               <pre><?php echo $post->content ?></pre>
            </div>
        </div>
        <div class="post-print">
            <button id="printPostButton">Imprimir publicación</button>
        </div>
    </div>
    <div class="comments">
        <div class="comments-title">
                <h2>Comentarios</h2>
        </div>   
        <div class="comments_container" id="c_cont">
            
        </div>
        <?php 
            if(isset($_SESSION["user"])){
                echo '
                <div class="comments_container" id="commentAdder">
                    <div style="display:flex;flex-direction:column;">
                        <div style="display:flex; flex-direction:row;">
                            <div class="perfil" style="display:flex;flex-direction:column;">
                                <img src="'.URL.'img/userAnonimus.jpg" alt="">
                                <label id="user" for="">'.$_SESSION["user"].'</label>
                            </div>
                            <div class="comment_containt">
                                <div 
                                    contenteditable 
                                    class="fake-textarea" 
                                    id="fakeTextArea" 
                                    oninput="document.querySelector(\'#commentAreaInvisible\').textContent = this.innerText"
                                ></div>
                                <textarea id="commentAreaInvisible"></textarea>
                            </div>
                            <div>
                                <input 
                                    type="button" 
                                    value="Enviar" 
                                    name="sendCommentButton" 
                                    id="sendCommentButton" 
                                    onclick="javascript:addComment()"
                                >
                            </div>
                        </div>
                        <div>
                            <input id="inputFile" type="file">
                            <br/><br/>
                            <button id="btnEnviar">Enviar</button>
                        </div>
                    </div>
                </div>
                ';
            }
            else{
                echo '<h3>Necesita iniciar sesión para agregar comentarios</h3>';
            }
        ?>
    </div>
</main>

<script>
        const btnEnviar = document.querySelector("#btnEnviar");
        const inputFile = document.querySelector("#inputFile");
        btnEnviar.addEventListener("click", () => {
            if (inputFile.files.length > 0) {
                let formData = new FormData();
                var file = inputFile.files[0];
                formData.append("nombre", file.name.replace(/ /g,'_'));
                formData.append("archivo", file); // En la posición 0; es decir, el primer elemento
                fetch("<?php echo URL; ?>uploader", {
                    method: 'POST',
                    body: formData,
                })
                    .then(respuesta => respuesta.text())
                    .then(decodificado => {
                        console.log(decodificado);
                        var lastFileUploaded = file.name.replace(/ /g,'_');
                        setLastFileLoaded(lastFileUploaded);
                        alert("El archivo "+lastFileUploaded+" ha sido subido correctamente");
                    });
                    
            } else {
                // El usuario no ha seleccionado archivos
                alert("Selecciona un archivo");
            }
            
        });
    </script>