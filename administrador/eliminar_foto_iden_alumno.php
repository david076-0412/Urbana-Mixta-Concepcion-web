<?php
include('../conexion.php');

$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];

$usuario_apoderado = $_REQUEST['usuario_apoderado'];

$estado_foto="SIN SUBIR";

$usuario_alumno = $_REQUEST['usuario_alumno'];

$usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];

$usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];



// Consulta SQL para actualizar el blob excluyendo el archivo PDF
$sql = "UPDATE alumno SET foto_do_identidad = NULL , estado_foto = '$estado_foto' 
WHERE id = '$id'
AND usuario = '$usuario_alumno'
AND usuario_apoderado = '$usuario_apoderado'";
$resultado = $conexion->query($sql);
if ($resultado === TRUE) {
    header("Location: ../administrador/admin-alumno.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado&usuario_dni_apoderado=$usuario_dni_apoderado&usuario_nombre_apoderado=$usuario_nombre_apoderado");
} else {
    echo "Error al eliminar el archivo PDF: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();