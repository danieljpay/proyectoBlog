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
        <div class="comments_container" id="c_cont">
            <div class="comments-title">
                <h2>Comentarios</h2>
            </div>
            <div>
                <div class="perfil">
                    <img src="<?php echo URL;?>img/userAlex.jpg" alt="">
                    <label for="">Alejandro Torre</label>
                </div>
                <div class="comment_containt">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget dui condimentum, euismod turpis euismod, ultricies mauris. Etiam condimentum egestas massa facilisis feugiat. Sed dapibus justo in ipsum posuere aliquet. 
                    </p>
                    <label for="">02/01/2020</label>
                </div>
            </div>
            <div>
                <div class="perfil">
                    <img src="<?php echo URL;?>img/userJimmy.jpg" alt="">
                    <label for="">Jimmy Ojeda</label>
                </div>
                <div class="comment_containt">
                    <p>
                        Duis ac est non lorem pulvinar luctus. Vestibulum a ante a nibh mollis facilisis. Suspendisse potenti. In tellus nulla, tempus eget justo et, accumsan euismod diam. Cras non orci in erat accumsan venenatis eu quis turpis. Donec ultricies, nisl sed vulputate fermentum, orci metus accumsan orci, in tincidunt erat elit nec magna.
                    </p>
                    <label for="">02/01/2020</label>
                </div>
            </div>
            <div>
                <div class="perfil">
                    <img src="<?php echo URL;?>img/userDaniel.jpg" alt="">
                    <label for="">Daniel Pérez</label>
                </div>
                <div class="comment_containt">
                    <p>
                        Maecenas pretium non urna at mollis. Curabitur nec pretium nisi. Fusce tortor neque, vestibulum in tincidunt sed, mattis vitae ipsum. Mauris in dapibus ligula. Morbi suscipit dictum lorem quis fringilla. Pellentesque id justo consectetur, convallis erat non, sodales orci. Sed ut sem ut sem porttitor commodo. Donec fringilla orci et placerat blandit. Nunc id ligula nisi. Integer dictum, mi sed venenatis tincidunt, diam ipsum aliquam lectus, vitae imperdiet lacus massa quis est. Etiam tempor enim sed porttitor ultricies. Fusce ullamcorper eu arcu vitae semper. Proin a neque ut tellus pellentesque sollicitudin commodo et mauris. Donec ultricies, nisl sed vulputate fermentum, orci metus accumsan orci, in tincidunt erat elit nec magna. Fusce quis maximus augue, id condimentum tellus. In hac habitasse platea dictumst. Mauris aliquet aliquam augue, fringilla mollis neque semper vitae. Nam nunc mi, placerat id pulvinar in, congue ut orci. Quisque tristique mauris sed urna aliquet mollis. Donec malesuada porta metus vitae dictum. Curabitur at faucibus metus. Sed ut lacus ante. Aliquam a bibendum nisi.
                    </p>
                    <label for="">02/01/2020</label>
                </div>
            </div>
        </div>

        <div class="comments_container" id="commentAdder">
            <div style="display:flex;flex-direction:column;">
                <div style="display:flex; flex-direction:row;">
                    <div class="perfil" style="display:flex;flex-direction:column;">
                        <img src="<?php echo URL;?>img/userAnonimus.jpg" alt="">
                        <label for="">Usuario anonimo</label>
                    </div>
                    <div class="comment_containt">
                        <!-- Falso y edita el usuario -->
                        <div 
                            contenteditable 
                            class="fake-textarea" 
                            id="fakeTextArea" 
                            oninput="document.querySelector('#commentAreaInvisible').textContent = this.innerText"
                        ></div>
                        <!-- Real y oculto -->
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