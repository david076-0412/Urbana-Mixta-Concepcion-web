<?php




include('../conexion.php');





$usuario_admin = $_REQUEST['usuario'];


$nombre = $_POST['nombre'];

$vencimiento = $_POST['vencimiento'];


$estado = $_POST['estado'];

$cuota = $_POST['cuota'];

$usuario_alumno = $_POST['alumno'];


$query_apoderado = "SELECT a.usuario_apoderado,a.usuario from alumno a WHERE a.usuario='$usuario_alumno'";
$resultado_usuario_apoderado = $conn->query($query_apoderado);

$fila_usuario_apoderado = $resultado_usuario_apoderado->fetch_assoc();

$usuario_apoderado = $fila_usuario_apoderado['usuario_apoderado'];


$query = "INSERT INTO pago (nombre,vencimiento,estado,cuota,usuario,usuario_alumno,usuario_admin) 
    VALUES ('$nombre','$vencimiento','$estado','$cuota','$usuario_apoderado','$usuario_alumno','$usuario_admin')";
$resultado = $conn->query($query);

if ($resultado == TRUE) {


    header("Location: ../administrador/admin-pagos.php?usuario=$usuario_admin");
} else {


    header("Location: ../administrador/admin-pagos.php?usuario=$usuario_admin");
}








// Cerrar la conexión
$conn->close();
