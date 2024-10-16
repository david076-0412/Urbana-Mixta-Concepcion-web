<?php

include('../conexion.php');



$id = $_REQUEST['id'];
$usuario = $_REQUEST['usuario'];
$foto_perfil = file_get_contents($_FILES['perfil']['tmp_name']);

// Consulta SQL para actualizar el BLOB
$query = "UPDATE apoderado SET perfil = ? WHERE usuario = ?";
$stmt = $conn->prepare($query);

// Vincular parámetros
$stmt->bind_param("ss", $foto_perfil, $usuario);

// Enviar datos binarios largos
$stmt->send_long_data(0, $foto_perfil);

// Ejecutar la consulta
$stmt->execute();

// Verificar el resultado de la ejecución
if ($stmt->affected_rows > 0) {

    //echo "Actualización exitosa.";
    header("Location: ../apoderado/apoderado-perfil.php?usuario=$usuario");
} else {

    header("Location: ../apoderado/apoderado-perfil.php?usuario=$usuario");
    //echo "Error al actualizar.";
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
