<?php
include('../conexion.php');

$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];

$estado_foto="SIN SUBIR";

// Consulta SQL para actualizar el blob excluyendo el archivo PDF
$sql = "UPDATE apoderado SET foto_do_identidad = NULL , estado_foto = '$estado_foto' 
WHERE id = '$id'";
$resultado = $conexion->query($sql);
if ($resultado === TRUE) {
    header("Location: ../administrador/admin-apoderado.php?usuario=$usuario");
} else {
    echo "Error al eliminar el archivo PDF: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();