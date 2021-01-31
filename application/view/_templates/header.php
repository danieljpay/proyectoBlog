<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>css/index.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/<?php echo $this->MODULE; ?>.css">
    <title><?php echo $this->TITLE; ?></title>
</head>
<body>
    <header>
        <div class="header_logo">
            <a href="<?php echo URL; ?>inicio">
                <img 
                    class="header_logo-imagenLogo" 
                    src="https://scontent.fmex32-1.fna.fbcdn.net/v/t1.0-9/116343728_183186249897592_7872352272283125949_n.jpg?_nc_cat=106&ccb=2&_nc_sid=8bfeb9&_nc_eui2=AeEM4VG5wuIOg1rECOfVrTaFXFMpF1P_NYFcUykXU_81gaHrdnYk_wVVBZjyrIXlqrM2A8SYAy6q2in4krnyAp9t&_nc_ohc=x9f0qWskwkUAX_jFCJk&_nc_ht=scontent.fmex32-1.fna&oh=aa59765a5939a6e402f8c84a4b2180f6&oe=603C0381" 
                    alt="Imagen Intra salud"
                />
            </a>
        </div>
        <div class="header_busqueda">
            <div id="busqueda">
                <form action="<?php echo URL; ?>buscar" method="get">
                    <input id="inputBusqueda" name="query" type="text" required/>
                    <button type="submit" id="buttonBusqueda">Buscar</button>
                </form>
            </div>
            <a id="iconoBusqueda">
                <img 
                    alt="icono de buscar" 
                    class="header_busqueda-imagenLupa" 
                    src="<?php echo URL; ?>img/iconoLupa.png"
                >
            </a>
            <?php
                if(!isset($_SESSION["user"])){
                    echo '
                        <a class="header_busqueda-SignUp" href="'.URL.'registro">Registro</a> |
                        <a class="header_busqueda-buttonLogin" href="'.URL.'login">Login</a>
                    ';
                }
            ?>
        </div>
    </header>
    <nav class="navegacion">
        <div class="navegacion_selectores">
            <a href="<?php echo URL; ?>inicio" >Inicio</a>
            <a href="<?php echo URL; ?>about" >Sobre mí</a>
            <a href="<?php echo URL; ?>contacto" >Contacto</a>
        </div>
    </nav>
