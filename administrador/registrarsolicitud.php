<?php




include('../conexion.php');


if (
    $_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($_POST['periodo']) && empty($_POST['categoria_solicitud']) &&
    empty($_POST['servicio']) && empty($_POST['importe'])
) {


    include('../conexion.php');


    $usuario_apoderado = $_REQUEST['usuario_apoderado'];

    $usuario = $_REQUEST['usuario'];

    header("Location: ../administrador/admin-solicitud.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado");

    
} else {

    $usuario_apoderado = $_REQUEST['usuario_apoderado'];

    $usuario = $_REQUEST['usuario'];


    // Establecer la zona horaria a Perú
    date_default_timezone_set('America/Lima');

    // Obtener la fecha y hora actual
    $fecha_actual = date('Y-m-d H:i:s');

    // Convertir la fecha al formato peruano
    $fecha_convertida = date('d/m/Y', strtotime($fecha_actual));

    $hora = substr($fecha_actual, 11); // Obtiene la parte de la hora (a partir del 11vo carácte


    $fecha = $fecha_convertida . " " . $hora;



    $periodo = $_POST['periodo'];

    $categoria_solicitud = $_POST['categoria_solicitud'];

    $curso = $_POST['curso'];

    $servicio = "LN0" . " " . $categoria_solicitud . " " . $curso;



    $importe = $_POST['importe'];





    $query = "INSERT INTO solicitud_apoderado (fecha,periodo,categoria_solicitud,servicio,curso,importe,usuario_admin) 
    VALUES ('$fecha','$periodo','$categoria_solicitud','$servicio','$curso','$importe','$usuario')";
    $resultado = $conexion->query($query);

    if ($resultado == TRUE) {


        $usuario_apoderado = $_REQUEST['usuario_apoderado'];

        $usuario = $_REQUEST['usuario'];

        header("Location: ../administrador/admin-solicitud.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado");
    } else {
        $usuario_apoderado = $_REQUEST['usuario_apoderado'];

        $usuario = $_REQUEST['usuario'];

        header("Location: ../administrador/admin-solicitud.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado");
    }
}


// Cerrar la conexión
$conexion->close();
