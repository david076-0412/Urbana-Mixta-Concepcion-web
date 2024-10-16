<?php
include('../conexion.php');


// Recibir datos del formulario
$usuario = $_REQUEST['usuario_docente'];
$usuario_alumno = $_POST['usuario_alumno'];
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$nota = $_POST['nota'];
$tema = $_POST['temas'];
$materias = $_POST['materias'];
$niveles = $_POST['niveles'];
$grados = $_POST['grados'];
$categoriaentrega = $_POST['categoriaentrega'];
$estadoarchivo = $_POST['estado_archivo'];
$fecha_entrega = $_POST['fecha_entrega'];
$hora_entrega = $_POST['hora_entrega'];


if ($estadoarchivo == "SIN SUBIR") {



    // Recibir y procesar el archivo
    $subir_material_tarea = file_get_contents($_FILES['subir_material_tarea']['tmp_name']);
    $estadoarchivodd = "SUBIDO";

    // Consulta SQL para actualizar el BLOB
    $query = "UPDATE tarea SET archivotarea = ?, estadoarchivo = ?, nota = ?, tema = ? , fecha_entrega = ?, hora_entrega = ? 
    WHERE usuario = ? AND id = ?";
    $stmt = $conn->prepare($query);

    // Vincular parámetros
    $stmt->bind_param("ssssssss", $subir_material_tarea, $estadoarchivodd, $nota, $tema, $fecha_entrega,$hora_entrega,$usuario_alumno, $id);

    try {
        // Ejecutar la consulta
        $stmt->execute();

        // Verificar el resultado de la ejecución
        if ($stmt->affected_rows > 0) {
            header("Location: ../docente/docente-tarea-alumno.php?usuario=$usuario");
            exit();
        } else {
            throw new Exception("Error al actualizar.");
        }
    } catch (Exception $e) {
        // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();

    
} else if ($estadoarchivo == "SUBIDO") {



    $queryTarea = "UPDATE tarea
    SET
    titulo = '$titulo',
    descripcion = '$descripcion',
    nota = '$nota',
    tema = '$tema',
    materia ='$materias',
    nivel ='$niveles',
    grado = '$grados',
    categoriaentrega = '$categoriaentrega',
    fecha_entrega = '$fecha_entrega',
    hora_entrega = '$hora_entrega'
    WHERE id = '$id'
    AND usuario = '$usuario_alumno'";



    $resultadoTarea = $conn->query($queryTarea);



    if ($resultadoTarea) {

        header("Location: ../docente/docente-tarea-alumno.php?usuario=$usuario");
    } else {
        error_log("Error en la consulta: " . $conn->error);
    }



    $conn->close();
}
