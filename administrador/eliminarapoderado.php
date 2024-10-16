<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario_apoderado = $_REQUEST['usuario_apoderado'];

$usuario = $_REQUEST['usuario'];




$query = "DELETE FROM apoderado WHERE id ='$id'";

$resultado = $conexion->query($query);

$queryUs = "DELETE FROM usuario WHERE usuario ='$usuario_apoderado'";

$resultadoUs = $conexion->query($queryUs);


$queryUss = "DELETE FROM usuario WHERE usuario_apalum ='$usuario_apoderado'";

$resultadoUss = $conexion->query($queryUss);


$queryAl = "DELETE FROM alumno WHERE usuario_apoderado ='$usuario_apoderado'";

$resultadoAl = $conexion->query($queryAl);


$queryAsis = "DELETE FROM asistencia WHERE usuario_apoderado ='$usuario_apoderado'";

$resultadoAsis = $conexion->query($queryAsis);


$queryCur = "DELETE FROM curso WHERE usuario_apoderado ='$usuario_apoderado'";

$resultadoCur = $conexion->query($queryCur);


$queryNo = "DELETE FROM notas WHERE usuario_apoderado ='$usuario_apoderado'";

$resultadoNo = $conexion->query($queryNo);


$queryPago = "DELETE FROM pago WHERE usuario ='$usuario_apoderado'";

$resultadoPago = $conexion->query($queryPago);


$querySoli = "DELETE FROM solicitud WHERE usuario ='$usuario_apoderado'";

$resultadoSoli = $conexion->query($querySoli);



$queryTarea = "DELETE FROM tarea WHERE usuario_apoderado ='$usuario_apoderado'";

$resultadoTarea = $conexion->query($queryTarea);



if ($resultado) {


    header("Location: ../administrador/admin-apoderado.php?usuario=$usuario");

} else {

    header("Location: ../administrador/admin-apoderado.php?usuario=$usuario");

}