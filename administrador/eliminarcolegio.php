<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];


$query = "DELETE FROM colegio WHERE id ='$id'";




$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../administrador/panel_admin.php?usuario=$usuario");

} else {

    header("Location: ../administrador/panel_admin.php?usuario=$usuario");

}