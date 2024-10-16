<?php

include('../conexion.php');


$nuevoUsuario = $conexion->real_escape_string($_POST['usuario_apoderado']);


$usuario_admin = $_POST['usuario_admin'];

$tipo_documento = $_POST['tipo_documento'];
$dni = $_POST['dni'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$nombres = $_POST['nombres'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$password = $_POST['password'];


$estado_foto = $_REQUEST['estado_foto'];

if ($estado_foto == "SIN SUBIR") {



    $foto_do_identidad = file_get_contents($_FILES['foto_do_identidad']['tmp_name']);


    $estado_foto = "SUBIDO";


    $queryUsuario = "UPDATE usuario 
        SET correo = ?, clave = ?, usuario = ?, usuario_apalum = ?
        WHERE usuario = ?";


    $stmtt = $conn->prepare($queryUsuario);

    // Vincular parámetros
    $stmtt->bind_param("sssss", $correo, $password, $usuario, $usuario_admin, $nuevoUsuario);




    $query = "UPDATE apoderado 
    SET tipo_documento = ?, dni = ?,
        apellido_paterno = ?,apellido_materno = ?, nombres = ?,
        usuario = ?, correo = ?, password = ?, estado_foto = ?,foto_do_identidad = ?
        WHERE usuario = ?";



    $stmt = $conn->prepare($query);

    // Vincular parámetros
    $stmt->bind_param(
        "sssssssssss",
        $tipo_documento,
        $dni,
        $apellido_paterno,
        $apellido_materno,
        $nombres,
        $usuario,
        $correo,
        $password,
        $estado_foto,
        $foto_do_identidad,
        $nuevoUsuario
    );

    try {
        // Ejecutar la consulta
        $stmtt->execute();
        $stmt->execute();
        header("Location: ../administrador/admin-apoderado.php?usuario=$usuario_admin");



        // Verificar el resultado de la ejecución

    } catch (Exception $e) {
        // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
        echo "Error: " . $e->getMessage();
    }
} else if ($estado_foto == "SUBIDO") {





    // Consulta SQL para actualizar la tabla usuario
    $queryUsuario = "UPDATE usuario 
    SET correo = ?, clave = ?, usuario = ?, usuario_apalum = ?
    WHERE usuario = ?";

    // Prepara la consulta utilizando una declaración preparada
    $stmtt = $conn->prepare($queryUsuario);

    // Vincula los parámetros en la declaración preparada utilizando bind_param
    $stmtt->bind_param("sssss", $correo, $clave, $nuevoUsuario, $usuario_admin, $usuario);

    // Consulta SQL para actualizar la tabla apoderado
    $query = "UPDATE apoderado 
    SET tipo_documento = ?, dni = ?,
        apellido_paterno = ?, apellido_materno = ?, nombres = ?,
        usuario = ?, correo = ?, password = ?
        WHERE usuario = ?";

    // Prepara la consulta utilizando una declaración preparada
    $stmt = $conn->prepare($query);

    // Vincula los parámetros en la declaración preparada utilizando bind_param
    $stmt->bind_param(
        "sssssssss",
        $tipo_documento,
        $dni,
        $apellido_paterno,
        $apellido_materno,
        $nombres,
        $usuario,
        $correo,
        $password,
        $usuario
    );

    try {
        // Ejecutar las consultas
        $stmtt->execute();
        $stmt->execute();

        // Redirige al usuario a la página correspondiente
        header("Location: ../administrador/admin-apoderado.php?usuario=$usuario_admin");
    } catch (Exception $e) {
        // Maneja cualquier excepción que pueda ocurrir durante la ejecución de la consulta
        echo "Error: " . $e->getMessage();
    }
}








// Cerrar la declaración y la conexión
$stmt->close();
$stmtt->close();
$conn->close();
