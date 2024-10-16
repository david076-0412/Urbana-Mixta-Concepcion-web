<?php
include('../conexion.php');




$id = $_REQUEST['id'];
$usuario = $_REQUEST['usuario'];
$subir_archivo_tarea = file_get_contents($_FILES['subirarchivotarea']['tmp_name']);
$categoriaentrega ="ENTREGADO";
$materia = $_REQUEST['materia'];
$docente = $_REQUEST['docente'];

$tema = $_REQUEST['tema'];
$nivel = $_REQUEST['nivel'];
$grado = $_REQUEST['grado'];
$alumno = $_REQUEST['alumno'];

// Consulta SQL para actualizar el BLOB
$query = "UPDATE tarea SET subirarchivotarea = ?, categoriaentrega='$categoriaentrega' WHERE usuario = ? AND id = ?";
$stmt = $conn->prepare($query);

// Vincular parámetros
$stmt->bind_param("sss", $subir_archivo_tarea, $usuario, $id);

try {
    // Ejecutar la consulta
    $stmt->execute();

    // Verificar el resultado de la ejecución
    if ($stmt->affected_rows > 0) {
        header("Location: ../alumno/alumno-tarea.php?usuario=$usuario&materia=$materia&docente=$docente&tema=$tema&nivel=$nivel&grado=$grado&alumno=$alumno");
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
