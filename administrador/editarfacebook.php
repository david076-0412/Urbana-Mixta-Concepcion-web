<?php

include('../conexion.php');






$usuario = $_REQUEST['usuario'];

$id = $_POST['id'];


$facebook = $_POST['facebook'];


$usuario = $_REQUEST['usuario'];

if ($usuario == "adminprimaria" || $usuario == "adminsecundaria") {
    $query = "UPDATE admin
              SET facebook = '$facebook'
              WHERE usuario = '$usuario'";
    
    $resultado = $conn->query($query);
}


    

    

   



    if ($resultado) {

        //echo "se han insertado los datos";
        //echo "success";
        header("Location: ../administrador/panel_admin.php?usuario=$usuario");
    } else {
        //echo "error";
        //echo "No se han insertado los datos";
        header("Location: ../administrador/panel_admin.php?usuario=$usuario");
    }






// Cerrar la declaración y la conexión

$conn->close();