<main class="post">
    <div class="posts_container">
        <form class="posts_container_form" method="post" action="<?php echo URL; ?>registro/enviarRegistro">
            <div class="post_container_form-titulo">
                <h2>Registro</h2>
            </div>
            <div class="post_container_form_inputs">
                <div>
                    <label>Nombre</label>
                    <input name="first_name" type="text">
                </div>
                <div>
                    <label>Apellido</label>
                    <input name="last_name" type="text">
                </div>
                <div>
                    <label>Correo</label>
                    <input name="email" type="text">
                </div>
                <div>
                    <label>Contraseña</label>
                    <input name="password" type="password">
                </div>
            </div>
            <div class="post_container_form_button">
                <button type="submit" class="post_container_form-button">Registrarse</button>
            </div>
        </form>
    </div>
</main>