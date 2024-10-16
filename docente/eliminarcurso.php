<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];

$usuario_admin = $_REQUEST['usuario_admin'];



$query = "DELETE FROM curso WHERE id ='$id'";

$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../administrador/admin-curso-material.php?usuario=$usuario_admin&usuario_docente=$usuario");
} else {
    echo "No se a eliminado";
}