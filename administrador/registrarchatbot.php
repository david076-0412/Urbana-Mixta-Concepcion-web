<?php

include('../conexion.php');

if (
    empty($_POST['preguntas']) &&
    empty($_POST['respuestas'])
) {
    $usuario = $_REQUEST['usuario'];
    header("Location: ../administrador/panel_admin.php?usuario=$usuario");
} else {
    $usuario = $_REQUEST['usuario'];
    $preguntas = $_POST['preguntas'];
    $respuestas = $_POST['respuestas'];

    

    // Establecer el conjunto de caracteres para utf8mb4
    $conexion->set_charset("utf8mb4");

    // Preparar la consulta con statement
    $stmt = $conexion->prepare("INSERT INTO chatbot (queries, replies) VALUES (?, ?)");

    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $preguntas, $respuestas);
    $stmt->execute();

    // Verificar si la consulta se ejecutó con éxito
    if ($stmt->affected_rows > 0) {
        header("Location: ../administrador/chatbot.php?usuario=$usuario");
    } else {
        header("Location: ../administrador/chatbot.php?usuario=$usuario");
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
}

