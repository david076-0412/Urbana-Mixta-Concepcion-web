<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario_admin = $_REQUEST['usuario_admin'];

$usuario_admin = $_REQUEST['usuario_admin'];


$query = "DELETE FROM pago WHERE id ='$id'";




$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../administrador/admin-pagos.php?usuario=$usuario_admin");

} else {

    header("Location: ../administrador/admin-pagos.php?usuario=$usuario_admin");

}