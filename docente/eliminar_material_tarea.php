<?php
include('../conexion.php');

$id = $_REQUEST['id'];
$docente = $_REQUEST['docente'];

$usuario_alumno = $_REQUEST['usuario_alumno'];

$estadoarchivo="SIN SUBIR";


$tema = $_REQUEST['tema'];

$nivel = $_REQUEST['nivel'];

$grado = $_REQUEST['grado'];

$titulo = $_REQUEST['titulo'];

$usuario = $_REQUEST['usuario'];

// Consulta SQL para actualizar el blob excluyendo el archivo PDF
$sql = "UPDATE tarea SET archivotarea = NULL,estadoarchivo = '$estadoarchivo' 
WHERE usuario = '$usuario_alumno'
AND docente = '$docente'
AND id = '$id'
AND tema='$tema'
AND nivel = '$nivel'
AND grado = '$grado'
AND titulo = '$titulo'";
$resultado = $conexion->query($sql);
if ($resultado === TRUE) {
    header("Location: ../docente/docente-tarea-alumno.php?usuario=$usuario");
} else {
    echo "Error al eliminar el archivo PDF: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
