<?php

include('../conexion.php');



$hora_i = $_POST['hora_i'];

$hora_f = $_POST['hora_f'];

$horaFormateada_inicio = date("h:i A", strtotime($hora_i));

$horaFormateada_fin = date("h:i A", strtotime($hora_f));

$hora = $horaFormateada_inicio . " - " . $horaFormateada_fin;

$dia = $_POST['dia'];

$materia = $_POST['materia'];

$niveles = $_POST['niveles'];

$grados = $_POST['grados'];

$usuario_docente = $_POST['docente'];

$usuario_admin = $_POST['usuario_admin'];


$query = "INSERT INTO horario (
    hora_i,hora_f,hora,dia,
    materia,nivel,
    grado,usuario_docente,
    usuario_admin) 
    VALUES ('$hora_i','$hora_f','$hora','$dia','$materia','$niveles','$grados','$usuario_docente','$usuario_admin') ";

$resultado = $conn->query($query);





if ($resultado) {

    //echo "se han insertado los datos";
    //echo "success";
    header("Location: ../administrador/admin-horario.php?usuario=$usuario_admin");
} else {
    //echo "error";
    //echo "No se han insertado los datos";
    header("Location: ../administrador/admin-horario.php?usuario=$usuario_admin");
}






// Cerrar la declaración y la conexión

$conn->close();
 