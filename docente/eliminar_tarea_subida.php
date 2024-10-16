<?php
include('../conexion.php');


$docente = $_REQUEST['docente'];

$usuario_alumno = $_REQUEST['usuario_alumno'];

$usuario = $_REQUEST['usuario'];


// Consulta SQL para actualizar el blob excluyendo el archivo PDF
$sql = "UPDATE tarea SET subirarchivotarea = NULL, categoriaentrega='SIN ENTREGAR'
WHERE usuario = '$usuario_alumno'";
$resultado = $conexion->query($sql);
if ($resultado === TRUE) {
    header("Location: ../docente/docente-tarea-alumno.php?usuario=$usuario");

} else {
    echo "Error al eliminar el archivo PDF: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();