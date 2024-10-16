<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];

$usuario_alumno = $_REQUEST['usuario_alumno'];


$query = "DELETE FROM tarea WHERE id ='$id'";


$querytt = "UPDATE tarea 
SET categoriaentrega='SIN ENTREGAR'
 WHERE id ='$id'
 AND usuario='$usuario_alumno'";


$resultado = $conexion->query($query);

$resultadott = $conexion->query($querytt);

if ($resultado) {


    header("Location: ../docente/docente-tarea-alumno.php?usuario=$usuario");
} else {
    echo "No se a eliminado";
}