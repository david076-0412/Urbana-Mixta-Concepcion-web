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
    empty($_POST['cant_desc_est']) &&
    empty($_POST['cant_docente_or']) &&
    empty($_POST['cant_docente_desc_est']) &&
    empty($_POST['titulo']) &&
    empty($_POST['contenido'])
) {
    $usuario = $_REQUEST['usuario'];

    header("Location: ../administrador/panel_admin.php?usuario=$usuario");
} else {




    $usuario = $_REQUEST['usuario'];

    $id = $_POST['id'];

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

    $cant_desc_est = $_POST['cant_desc_est'];

    $cant_docente_or = $_POST['cant_docente_or'];

    $cant_docente_desc_est = $_POST['cant_docente_desc_est'];


    $titulo = $_POST['titulo'];

    $contenido = $_POST['contenido'];


    $estadologo = $_POST['estado_logo'];


    if ($estadologo == "SIN SUBIR") {

        $subir_logo = file_get_contents($_FILES['subir_logo']['tmp_name']);

        $base64_logo = base64_encode($subir_logo);

        $estado_logo = "SUBIDO";

        $sqlColegioss = "UPDATE colegio SET
                institucion = ?,
                encabezado = ?,
                telefono = ?,
                direccion = ?,
                correo = ?,
                nivel = ?,
                dia_p = ?,
                dia_s = ?,
                hora_i = ?,
                hora_f = ?,
                fecha_inscrip = ?,
                cant_or = ?,
                cant_desc_est = ?,
                cant_docente_or = ?,
                cant_docente_desc_est = ?,
                titulo = ?,
                contenido = ?,
                estado_logo = ?,
                subir_logo = ?,
                usuario = ?
            WHERE id = ?";  // Asegúrate de ajustar 'id' según tu esquema de base de datos

        $stmtss = $conexion->prepare($sqlColegioss);

        // Vincular parámetros
        $stmtss->bind_param(
            "sssssssssssssssssssss",  // Asegúrate de ajustar los tipos de datos según tu esquema
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
            $usuario,
            $id  // Asegúrate de ajustar 'id' según tu esquema de base de datos
        );












        try {
            // Ejecutar la consulta
            $stmtss->execute();
            header("Location: ../administrador/panel_admin.php?usuario=$usuario");
            // Verificar el resultado de la ejecución

        } catch (Exception $e) {
            // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
            echo "Error: " . $e->getMessage();
        }



        // Cerrar la declaración y la conexión
        $stmtss->close();
    } else if ($estadologo == "SUBIDO") {


        $sqlColegiouu = "UPDATE colegio SET
                    institucion = ?,
                    encabezado = ?,
                    telefono = ?,
                    direccion = ?,
                    correo = ?,
                    nivel = ?,
                    dia_p = ?,
                    dia_s = ?,
                    hora_i = ?,
                    hora_f = ?,
                    fecha_inscrip = ?,
                    cant_or = ?,
                    cant_desc_est = ?,
                    cant_docente_or = ?,
                cant_docente_desc_est = ?,
                    titulo = ?,
                    contenido = ?,
                    usuario = ?
                 WHERE id = ?";

        $stmtuu = $conexion->prepare($sqlColegiouu);

        // Vincular parámetros
        $stmtuu->bind_param(
            "sssssssssssssssssss",
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
            $usuario,
            $id
        );

        // Donde $id es el valor de la clave primaria que identifica el registro que deseas actualizar



        try {
            // Ejecutar la consulta
            $stmtuu->execute();
            header("Location: ../administrador/panel_admin.php?usuario=$usuario");
            // Verificar el resultado de la ejecución

        } catch (Exception $e) {
            // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
            echo "Error: " . $e->getMessage();
        }




        // Cerrar la declaración y la conexión
        $stmtuu->close();
        $conexion->close();
    }
}
