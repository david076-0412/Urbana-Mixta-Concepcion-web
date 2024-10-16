<?php

include('../conexion.php');



if (
    empty($_POST['institucion']) &&
    empty($_POST['encabezado']) &&
    empty($_POST['telefono']) &&
    empty($_POST['direccion']) &&
    empty($_POST['correo']) &&
    empty($_POST['nivel']) &&
    empty($_POST['dia_p']) &&
    empty($_POST['dia_s']) &&
    empty($_POST['hora_i']) &&
    empty($_POST['hora_f']) &&
    empty($_POST['fecha_inscrip']) &&
    empty($_POST['cant_or']) &&
    empty($_POST['cant_docente_or']) &&
    empty($_POST['titulo']) &&
    empty($_POST['contenido'])
) {
    $usuario = $_REQUEST['usuario'];
    header("Location: ../administrador/panel_admin.php?usuario=$usuario");
} else {


    $usuario = $_REQUEST['usuario'];



    $institucion = $_POST['institucion'];

    $encabezado = $_POST['encabezado'];

    $telefono = $_POST['telefono'];

    $direccion = $_POST['direccion'];

    $correo = $_POST['correo'];

    $nivel = $_POST['nivel'];

    $dia_p = $_POST['dia_p'];

    $dia_s = $_POST['dia_s'];

    $hora_i = $_POST['hora_i'];

    $hora_f = $_POST['hora_f'];


    $horaf_i = date("H:i", strtotime($hora_i));

    $horaf_f = date("H:i", strtotime($hora_f));




    $fecha_inscrip = $_POST['fecha_inscrip'];

    $cant_or = $_POST['cant_or'];

    $cant_desc_est = $cant_or;

    $cant_docente_or = $_POST['cant_docente_or'];

    $cant_docente_desc_est = $cant_docente_or;


    $titulo = $_POST['titulo'];

    $contenido = $_POST['contenido'];

    $subir_logo = file_get_contents($_FILES['subir_logo']['tmp_name']);

    $estado_logo = "SUBIDO";

    $base64_logo = base64_encode($subir_logo);



    $sqlColegio = "INSERT INTO colegio (
        institucion,
        encabezado,
        telefono,
        direccion,
        correo,
        nivel,
        dia_p,
        dia_s,
        hora_i,
        hora_f,
        fecha_inscrip,
        cant_or,
        cant_desc_est,
        cant_docente_or,
        cant_docente_desc_est,
        titulo,
        contenido,
        estado_logo,
        subir_logo,
        usuario
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";




    $stmt = $conexion->prepare($sqlColegio);

    // Vincular parámetros
    $stmt->bind_param(
        "ssssssssssssssssssss",
        $institucion,
        $encabezado,
        $telefono,
        $direccion,
        $correo,
        $nivel,
        $dia_p,
        $dia_s,
        $horaf_i,
        $horaf_f,
        $fecha_inscrip,
        $cant_or,
        $cant_desc_est,
        $cant_docente_or,
        $cant_docente_desc_est,
        $titulo,
        $contenido,
        $estado_logo,
        $base64_logo,
        $usuario
    );











    try {
        // Ejecutar la consulta
        $stmt->execute();
        header("Location: ../administrador/panel_admin.php?usuario=$usuario");
        // Verificar el resultado de la ejecución

    } catch (Exception $e) {
        // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
        echo "Error: " . $e->getMessage();
    }
}



// Cerrar la declaración y la conexión
$stmt->close();
$conexion->close();
