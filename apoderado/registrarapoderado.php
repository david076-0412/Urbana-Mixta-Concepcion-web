<?php

include('../conexion.php');

// Recoger datos del formulario
$tipo_documento = $_POST['tipo_documento'];
$dni = $_POST['dni'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$nombres = $_POST['nombres'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$foto_do_identidad = file_get_contents($_FILES['foto_do_identidad']['tmp_name']);

// Definir el rol y la ruta
$rol = "apoderado";
$ruta = "../apoderado/panel_apoderado.php";
$usuario_apalum = "admin";

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

// Insertar el usuario si no existe
$queryUsuario = "INSERT INTO usuario (correo,clave,usuario,usuario_apalum,rol,ruta) 
VALUES (?, ?, ?, ?, ?, ?)";
$stmtUsuario = $conn->prepare($queryUsuario);
$stmtUsuario->bind_param("ssssss", $correo, $password, $usuario, $usuario_apalum, $rol, $ruta);
$stmtUsuario->execute();
$stmtUsuario->close();

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

// Insertar el apoderado si no existe
$queryApoderado = "INSERT INTO apoderado (tipo_documento, dni, apellido_paterno, apellido_materno, nombres, usuario, correo, password, rol, estado_foto, foto_do_identidad, perfil)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtApoderado = $conn->prepare($queryApoderado);
$perfil = NULL;
$estado_foto = "SUBIDO";
$stmtApoderado->bind_param(
    "ssssssssssss",
    $tipo_documento,
    $dni,
    $apellido_paterno,
    $apellido_materno,
    $nombres,
    $usuario,
    $correo,
    $password,
    $rol,
    $estado_foto,
    $foto_do_identidad,
    $perfil
);

try {
    $stmtApoderado->execute();
    echo "success";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$stmtApoderado->close();
$conn->close();
?>
