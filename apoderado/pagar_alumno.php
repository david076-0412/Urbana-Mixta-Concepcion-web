<?php

include('../conexion.php');


$id = $_REQUEST['id'];


$usuario_alumno = $_REQUEST['usuario_alumno'];

$usuario = $_REQUEST['usuario'];


$nivel = $_REQUEST['nivel'];


$n_cuenta = $_POST['n_cuenta'];



$estado = "PAGADO";






$query = "UPDATE pago SET n_cuenta='$n_cuenta', estado='$estado' WHERE usuario='$usuario' AND usuario_alumno='$usuario_alumno'";

$resultado = $conexion->query($query);

if ($resultado === TRUE) {

    //echo "Si se modifico";

    header("Location: ../apoderado/apoderado-pagos.php?usuario=$usuario&usuario_alumno=$usuario_alumno&nivel=$nivel");



    //echo "success";


} else {

    //echo "No se inserto";

    //header("Location: ../apoderado/apoderado-pagos.php?usuario=$usuario");

    header("Location: ../apoderado/apoderado-pagos.php?usuario=$usuario&usuario_alumno=$usuario_alumno&nivel=$nivel");

    //$conexion->error;

    //echo "error";

}




$conexion->close();
