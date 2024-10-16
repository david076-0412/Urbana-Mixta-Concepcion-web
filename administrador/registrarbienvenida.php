<?php

include('../conexion.php');



$usuario = $_REQUEST['usuario'];

$saludo = $_POST['saludo'];
$mensaje_bienvenida = $_POST['mensaje_bienvenida'];
$opciones = $_POST['opciones'];



// Establecer el conjunto de caracteres para utf8mb4
$conexion->set_charset("utf8mb4");





// Procesar el contenido para permitir <br>
$contenido_con_br = nl2br($opciones);
$contenido_con_br = preg_replace('/(<br\s*\/?>\s*)+/', '<br>', $contenido_con_br);



// Escapar caracteres especiales para evitar inyección SQL


// Insertar datos en la tabla
$sql = "INSERT INTO chatbot_bienvenida (saludo, mensaje_bienvenida,opciones) VALUES ('$saludo', '$mensaje_bienvenida','$contenido_con_br')";
if (mysqli_query($conexion, $sql)) {
    header("Location: ../administrador/chatbot_bienvenida.php?usuario=$usuario");
} else {
    header("Location: ../administrador/chatbot_bienvenida.php?usuario=$usuario");
}

// Cerrar conexión
mysqli_close($conexion);
