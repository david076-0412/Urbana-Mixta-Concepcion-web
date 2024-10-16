<?php

include('../conexion.php');



    $tipo_documento = $_POST['tipo_documento'];
    $dni = $_POST['dni'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $nombres = $_POST['nombres'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $foto_do_identidad = file_get_contents($_FILES['foto_do_identidad']['tmp_name']);





// Verificar si el usuario ya existe
$queryUsuarioCheck = "SELECT * FROM usuario WHERE correo = ? OR usuario = ?";
$stmtUsuarioCheck = $conn->prepare($queryUsuarioCheck);
$stmtUsuarioCheck->bind_param("ss", $correo, $usuario);
$stmtUsuarioCheck->execute();
$resultUsuarioCheck = $stmtUsuarioCheck->get_result();

if ($resultUsuarioCheck->num_rows > 0) {
    echo "error";
    $stmtUsuarioCheck->close();
    $conn->close();
    exit();
}

$stmtUsuarioCheck->close();






    $rol="apoderado";

    $ruta = "../apoderado/panel_apoderado.php";

    $queryUsuario = "INSERT INTO usuario (correo,clave,usuario,rol,ruta) 
    VALUES ('$correo','$password','$usuario','$rol','$ruta')";
    $resultadoUsuario = $conn->query($queryUsuario);




// Verificar si el apoderado ya existe
$queryApoderadoCheck = "SELECT * FROM apoderado 
    WHERE dni = ? OR correo = ? OR (apellido_paterno = ? AND apellido_materno = ? AND nombres = ? AND usuario = ?)";
$stmtApoderadoCheck = $conn->prepare($queryApoderadoCheck);
$stmtApoderadoCheck->bind_param("ssssss", $dni, $correo, $apellido_paterno, $apellido_materno, $nombres, $usuario);
$stmtApoderadoCheck->execute();
$resultApoderadoCheck = $stmtApoderadoCheck->get_result();

if ($resultApoderadoCheck->num_rows > 0) {
    echo "error";
    $stmtApoderadoCheck->close();
    $conn->close();
    exit();
}

$stmtApoderadoCheck->close();





    $query = "INSERT INTO apoderado (tipo_documento,dni,
    apellido_paterno,apellido_materno,nombres,
    usuario,correo,password,rol,estado_foto,foto_do_identidad,perfil)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
    ON DUPLICATE KEY UPDATE 
            correo = '$correo',
            dni = '$dni'";
    
    $perfil = NULL;
    
    $rol="apoderado";

    $estado_foto="SUBIDO";
    
        $stmt = $conn->prepare($query);
    
        // Vincular parámetros
        $stmt->bind_param(
            "ssssssssssss",
            $tipo_documento,
            $dni,
            $apellido_paterno,
            $apellido_materno,
            $nombres,
            $usuario,$correo,$password,
            $rol,$estado_foto,$foto_do_identidad,$perfil
        );
    
        try {
            // Ejecutar la consulta
            $stmt->execute();
            //header("Location: ../docente/docente-curso-material.php?usuario=$usuario");


            if ($stmt == TRUE) {

                //echo "se han insertado los datos";
                echo "success";
                //header("Location: ../panel_inicio.php");
        
            } else {
                echo "error";
                //echo "No se han insertado los datos";
            }

            // Verificar el resultado de la ejecución
    
        } catch (Exception $e) {
            // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
            echo "Error: " . $e->getMessage();
        }




// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();