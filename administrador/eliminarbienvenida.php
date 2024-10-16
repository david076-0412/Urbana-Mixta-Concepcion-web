<?php

include('../conexion.php');


$id = $_REQUEST['id'];

$usuario = $_REQUEST['usuario'];


$query = "DELETE FROM chatbot_bienvenida WHERE id ='$id'";

$resultado = $conexion->query($query);

if ($resultado) {


    header("Location: ../administrador/chatbot_bienvenida.php?usuario=$usuario");
} else {
    header("Location: ../administrador/chatbot_bienvenida.php?usuario=$usuario");
}