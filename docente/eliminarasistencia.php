<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];

$docente = $_REQUEST['docente'];


$query = "DELETE FROM asistencia WHERE id ='$id'";

$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../docente/docente-asistencia.php?usuario=$usuario&docente=$docente");
} else {
    echo "No se a eliminado";
}