<?php

$archivo = $_FILES["archivo"];
$nombre = $_POST["nombre"];

$resultado = move_uploaded_file($archivo["tmp_name"], "uploaded/" . $nombre);
if ($resultado) {
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}

?>