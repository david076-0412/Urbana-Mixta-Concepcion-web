<?php
include "../conexion.php";





function validarEntrada($entrada)
{
    // Implementa la validación necesaria según el tipo de dato
    // o utiliza funciones como mysqli_real_escape_string
    return $entrada;
}


// Limpia y obtén el nuevo valor del usuario
//$nuevoUsuario = $_POST['usuario'];




$id = validarEntrada($_POST['id']);


$docente = validarEntrada($_POST['docente']);

$usuario_docente = validarEntrada($_POST['usuario_docente']);




$tipoasistencia = validarEntrada($_POST['tipoasistencia']);


$hora = validarEntrada($_POST['hora']);


$fecha_inicio = validarEntrada($_POST['fecha_inicio']);


$fecha_fin = validarEntrada($_POST['fecha_fin']);


$dia = validarEntrada($_POST['dia']);


$queryAsistencia = "UPDATE asistencia
        SET
        tipoasistencia = '$tipoasistencia',
        hora = '$hora',
        fecha_inicio = '$fecha_inicio',
        fecha_fin = '$fecha_fin',
        dia = '$dia'
        WHERE id='$id'";



$resultadoAsistencia = $conn->query($queryAsistencia);




if (
    $resultadoAsistencia
) {


    header("Location: ../docente/docente-asistencia.php?usuario=$usuario_docente&docente=$docente");
    exit(); // Termina el script después de redireccionar
} else {
    // Log del error
    error_log("Error en la consulta: " . $conn->error);
}



$conn->close();
