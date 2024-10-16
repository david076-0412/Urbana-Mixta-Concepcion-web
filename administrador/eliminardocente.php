<?php

include('../conexion.php');

// Iniciar la transacción
$conexion->begin_transaction();

try {
    $id = $_REQUEST['id'];
    $usuario = $_REQUEST['usuario'];
    $usuario_docente = $_REQUEST['usuario_docente'];

    // Consultar la cantidad de descuentos y la cantidad de alumnos ordinarios para el nivel recibido
    $qlee = "SELECT * FROM colegio WHERE usuario ='$usuario'";
    $resultadoddee = $conexion->query($qlee);
    if (!$resultadoddee) {
        throw new Exception("Error al consultar la tabla 'colegio'");
    }
    $rowddee = $resultadoddee->fetch_assoc();

    $cant_desc_estee = $rowddee['cant_docente_desc_est'];
    $cant_or = $rowddee['cant_docente_or'];

    if ($cant_or == $cant_desc_estee) {
        $queryColed = "UPDATE colegio SET cant_docente_desc_est = cant_docente_desc_est WHERE usuario ='$usuario'";
    } else if ($cant_or > $cant_desc_estee) {
        $queryColed = "UPDATE colegio SET cant_docente_desc_est = cant_docente_desc_est + 1 WHERE usuario ='$usuario'";
    }

    $resultadoEs = $conexion->query($queryColed);
    if (!$resultadoEs) {
        throw new Exception("Error al actualizar la tabla 'colegio'");
    }

    // Ejecutar las consultas de eliminación
    $queries = [
        "DELETE FROM docente WHERE id ='$id'",
        "DELETE FROM usuario WHERE usuario ='$usuario_docente'",
        "DELETE FROM asistencia WHERE usuario_docente ='$usuario_docente'",
        "DELETE FROM curso WHERE usuario_docente ='$usuario_docente'",
        "DELETE FROM notas WHERE usuario_docente ='$usuario_docente'",
        "DELETE FROM tarea WHERE usuario_docente ='$usuario_docente'"
    ];

    foreach ($queries as $query) {
        $resultado = $conexion->query($query);
        if (!$resultado) {
            throw new Exception("Error al ejecutar la consulta: $query");
        }
    }

    // Confirmar la transacción
    $conexion->commit();
    
    // Redirigir si todo fue exitoso
    header("Location: ../administrador/admin-docente.php?usuario=$usuario");

} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conexion->rollback();
    // Mostrar mensaje de error o redirigir a una página de error
    header("Location: ../administrador/admin-docente.php?usuario=$usuario&error=" . urlencode($e->getMessage()));
}

// Cerrar la conexión
$conexion->close();
?>
