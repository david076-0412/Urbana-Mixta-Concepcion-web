<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario_apoderado = $_REQUEST['usuario_apoderado'];


$tipo_documento = $_POST['tipo_documento'];

$dni = $_POST['dni'];


$alumno = $_POST['alumno'];

$fecha_nacimiento = $_POST['fecha_nacimiento'];

$sexo = $_POST['sexo'];


$discapacidad = $_POST['discapacidad'];




if ($discapacidad === "SI") {


    $discapacidad = "SI";

    $tipo_discapacidad = $_POST['tipo_discapacidad'];


} else if ($discapacidad === "NO") {

    $discapacidad = "NO";

    $tipo_discapacidad = "";
}






$query = "UPDATE alumno SET tipo_documento='$tipo_documento', 
    dni='$dni', alumno='$alumno', 
    fecha_nacimiento='$fecha_nacimiento', 
    sexo='$sexo', discapacidad='$discapacidad', 
    tipo_discapacidad='$tipo_discapacidad' 
    WHERE id ='$id'";

$resultado = $conexion->query($query);

if ($resultado) {

    //echo "Si se modifico";
    header("Location: ../apoderado/apoderado-list-registro.php?usuario=$usuario_apoderado");
} else {

    header("Location: ../apoderado/apoderado-list-registro.php?usuario=$usuario_apoderado");

    //echo "No se inserto";
    $conexion->error;
}
