<?php

include('../conexion.php');



if (
    empty($_POST['preguntas']) &&
    empty($_POST['respuestas'])
    
) {

    $usuario = $_REQUEST['usuario'];
    header("Location: ../administrador/panel_admin.php?usuario=$usuario");


} else {


    $id = $_POST['id'];

    $usuario = $_REQUEST['usuario'];



    $preguntas = $_POST['preguntas'];

    $respuestas = $_POST['respuestas'];

    $conexion->set_charset("utf8mb4");

    $query = "UPDATE chatbot SET queries = '$preguntas',replies = '$respuestas' WHERE id = '$id'";
    
    
    
    
    $resultado = $conexion->query($query);
    


    if ($resultado) {

        //echo "se han insertado los datos";
        //echo "success";
        header("Location: ../administrador/chatbot.php?usuario=$usuario");
    } else {
        //echo "error";
        //echo "No se han insertado los datos";
        header("Location: ../administrador/chatbot.php?usuario=$usuario");
    }








}


// Cerrar la declaración y la conexión

$conexion->close();