<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];


$query = "DELETE FROM notas WHERE id ='$id'";

$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../docente/docente-notas-curso.php?usuario=$usuario");
} else {
    echo "No se a eliminado";
}