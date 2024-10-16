<?php

include('../conexion.php');



$id = $_POST['id'];

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


$query = "UPDATE horario 
SET
    hora_i = '$hora_i',
    hora_f = '$hora_f',
    hora = '$hora',
    dia = '$dia',
    materia = '$materia',
    nivel = '$niveles',
    grado = '$grados',
    usuario_docente = '$usuario_docente',
    usuario_admin = '$usuario_admin'
    WHERE id = '$id'";

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
 