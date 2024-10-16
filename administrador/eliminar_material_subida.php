<?php
include('../conexion.php');

$id = $_REQUEST['id'];

$usuario_alumno = $_REQUEST['usuario_alumno'];

$usuario_docente = $_REQUEST['usuario_docente'];

$docente = $_REQUEST['docente'];



$tema = $_REQUEST['tema'];

$nivel = $_REQUEST['nivel'];

$grado = $_REQUEST['grado'];


// Consulta SQL para actualizar el blob excluyendo el archivo PDF
$sql = "UPDATE curso SET archivomaterial = NULL
WHERE usuario_alumno = '$usuario_alumno'
AND usuario_docente = '$usuario_docente'
AND docente = '$docente'
AND tema='$tema'
AND nivel = '$nivel'
AND grado = '$grado'";
$resultado = $conexion->query($sql);
if ($resultado === TRUE) {
    header("Location: ../docente/docente-curso-material.php?usuario=$usuario_docente");
} else {
    echo "Error al eliminar el archivo PDF: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();