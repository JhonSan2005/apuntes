<?php
$conexion = mysqli_connect("localhost", "root", "", "practica");
if (mysqli_connect_error()) {
    echo "Fallo al conectarse: " . mysqli_connect_error();
}

if(isset($_GET['documento'], $_GET['nombre'], $_GET['apellido'], $_GET['fecha_de_nacimiento'])) {
    $documento = $_GET['documento']; 
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $fecha_de_nacimiento = $_GET['fecha_de_nacimiento'];

    $documento = mysqli_real_escape_string($conexion, $documento);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellido = mysqli_real_escape_string($conexion, $apellido);
    $fecha_de_nacimiento = mysqli_real_escape_string($conexion, $fecha_de_nacimiento);

    $result = mysqli_query($conexion, "INSERT INTO tb_usuarios (documento, nombre, apellido, fecha_de_nacimiento) VALUES ('$documento', '$nombre', '$apellido', '$fecha_de_nacimiento')");

    if ($result) {
        header ('location:controlador.php');
    } else {
        echo "Error al guardar el registro: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
