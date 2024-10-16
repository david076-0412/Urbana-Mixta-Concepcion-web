<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];


$query = "DELETE FROM horario WHERE id ='$id'";




$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../administrador/admin-horario.php?usuario=$usuario");

} else {

    header("Location: ../administrador/admin-horario.php?usuario=$usuario");

}