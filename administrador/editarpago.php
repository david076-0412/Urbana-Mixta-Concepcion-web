<?php




include('../conexion.php');



$id = $_POST['id'];

$usuario_admin = $_REQUEST['usuario'];


$nombre = $_POST['nombre'];

$vencimiento = $_POST['vencimiento'];


$estado = $_POST['estado'];

$cuota = $_POST['cuota'];


$n_cuenta = $_POST['n_cuenta'];



$usuario_alumno = $_POST['alumno'];


$query_apoderado = "SELECT a.usuario_apoderado,a.usuario from alumno a WHERE a.usuario='$usuario_alumno'";
$resultado_usuario_apoderado = $conn->query($query_apoderado);

$fila_usuario_apoderado = $resultado_usuario_apoderado->fetch_assoc();

$usuario_apoderado = $fila_usuario_apoderado['usuario_apoderado'];


$query = "UPDATE pago 
SET nombre = '$nombre',
vencimiento = '$vencimiento',
estado = '$estado',
cuota = '$cuota',
n_cuenta = '$n_cuenta',
usuario = '$usuario_apoderado',
usuario_alumno = '$usuario_alumno',
usuario_admin = '$usuario_admin'
WHERE id = '$id'
AND usuario = '$usuario_apoderado'
AND usuario_alumno = '$usuario_alumno'";
$resultado = $conn->query($query);

if ($resultado == TRUE) {


    header("Location: ../administrador/admin-pagos.php?usuario=$usuario_admin");
} else {


    header("Location: ../administrador/admin-pagos.php?usuario=$usuario_admin");
}








// Cerrar la conexión
$conn->close();
