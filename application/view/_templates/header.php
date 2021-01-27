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
                <img class="header_logo-imagenLogo" src="https://scontent.fmid1-2.fna.fbcdn.net/v/t1.0-9/116343728_183186249897592_7872352272283125949_n.jpg?_nc_cat=106&ccb=2&_nc_sid=8bfeb9&_nc_eui2=AeEM4VG5wuIOg1rECOfVrTaFXFMpF1P_NYFcUykXU_81gaHrdnYk_wVVBZjyrIXlqrM2A8SYAy6q2in4krnyAp9t&_nc_ohc=-2UQdY84-BIAX8P702f&_nc_ht=scontent.fmid1-2.fna&oh=2ee861b4863fb067df71a1df11660677&oe=60108201" alt="Imagen Intra salud">
            </a>
        </div>
        <div class="header_busqueda">
        <div id="busqueda">
                <input id="inputBusqueda" type="text" />
                <button id="buttonBusqueda">Buscar</button>
            </div>
            <a id="iconoBusqueda"><img alt="icono de buscar" class="header_busqueda-imagenLupa" src="<?php echo URL; ?>img/iconoLupa.png"></a>
            <a class="header_busqueda-SignUp" href="<?php echo URL; ?>registro">Registro</a> |
            <a class="header_busqueda-buttonLogin" href="<?php echo URL; ?>login">Login</a>
        </div>
    </header>
    <nav class="navegacion">
        <div class="navegacion_selectores">
            <a href="<?php echo URL; ?>inicio" >Inicio</a>
            <a href="<?php echo URL; ?>about" >Sobre mí</a>
            <a href="<?php echo URL; ?>contacto" >Contacto</a>
        </div>
    </nav>
