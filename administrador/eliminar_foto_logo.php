<?php
include('../conexion.php');

$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];

$estadologo="SIN SUBIR";

// Consulta SQL para actualizar el blob excluyendo el archivo PDF
$sql = "UPDATE colegio SET subir_logo = NULL , estado_logo = '$estadologo' 
WHERE id = '$id'";
$resultado = $conexion->query($sql);
if ($resultado === TRUE) {
    header("Location: ../administrador/panel_admin.php?usuario=$usuario");
} else {
    echo "Error al eliminar el archivo PDF: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();