<main class="posts">
    <div class="posts_container">
        <form action="<?php echo URL; ?>login/iniciarSesion" method="post" class="posts_container_form">
            <div class="post_container_form-titulo">
                <h2>Iniciar sesión</h2>
            </div>
            <p class="error"><?php echo isset($error_message) ? $error_message : ''; ?><p>
            <div class="post_container_form_inputs">
                <div>
                    <label for="">Correo:</label>
                    <input id="email-input" name="email" type="text" required>
                </div>
                <div>
                    <label for="">Contraseña:</label>
                    <input id="password-input" name="password" type="password" required>
                </div>
            </div>
            <div class="post_container_form_button">
                <button id="login-btn" class="post_container_form-button">Ingresar</button>
            </div>
        </form>
    </div>
</main>