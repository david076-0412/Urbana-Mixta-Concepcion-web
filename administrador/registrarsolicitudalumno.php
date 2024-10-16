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

    header("Location: ../administrador/admin-solicitud-alumno.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado");
} else {

    $usuario_apoderado = $_REQUEST['usuario_apoderado'];

    $usuario = $_REQUEST['usuario'];

    function generarNumeroAleatorio()
    {
        // Crear un array con los dígitos del 0 al 9
        $digitos = range(0, 9);

        // Barajar aleatoriamente el array
        shuffle($digitos);

        // Tomar los primeros 12 dígitos del array
        $numeroAleatorio = implode('', array_slice($digitos, 0, 12));

        return $numeroAleatorio;
    }

    // Generar un número aleatorio sin dígitos repetidos



    $cod_solicitud = generarNumeroAleatorio();

    
    // Establecer la zona horaria a Perú
    date_default_timezone_set('America/Lima');

    // Obtener la fecha y hora actual
    $fecha_actual = date('Y-m-d H:i:s');

    // Convertir la fecha al formato peruano
    $fecha_convertida = date('d/m/Y', strtotime($fecha_actual));

$hora = substr($fecha_actual, 11); // Obtiene la parte de la hora (a partir del 11vo carácte


    $fecha = $fecha_convertida ." ".$hora;


    $usuario = $_REQUEST['usuario'];

    $periodo = $_POST['periodo'];

    $categoria_solicitud = $_POST['categoria_solicitud'];
    $servicio = $_POST['servicio'];


    $alumnos_seleccionados = $_POST['alumnos'];


    $importe = $_POST['importe'];



    // Realizar la inserción en la base de datos
foreach ($alumnos_seleccionados as $alumno_id) {


    $query_alumno = "SELECT a.usuario,a.alumno from alumno a WHERE a.alumno='$alumno_id'";
    $resultado_usuario_alumno = $conexion->query($query_alumno);
    
    $fila_usuario_alumno = $resultado_usuario_alumno->fetch_assoc();
    
    $usuario_alumno = $fila_usuario_alumno['usuario'];




 $query = "INSERT INTO solicitud (usuario,alumno,cod_solicitud,fecha,periodo,categoria_solicitud,servicio,estado,importe,usuario_alumno) 
    VALUES ('$usuario_apoderado','$alumno_id','$cod_solicitud','$fecha','$periodo','$categoria_solicitud','$servicio','en espera','$importe','$usuario_alumno')";
    $resultado = $conexion->query($query);

    if ($resultado == TRUE) {


        $usuario_apoderado = $_REQUEST['usuario_apoderado'];

    $usuario = $_REQUEST['usuario'];

    header("Location: ../administrador/admin-solicitud-alumno.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado");
    } else {
        $usuario_apoderado = $_REQUEST['usuario_apoderado'];

    $usuario = $_REQUEST['usuario'];

    header("Location: ../administrador/admin-solicitud-alumno.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado");
    }



}



   
}


// Cerrar la conexión
$conexion->close();