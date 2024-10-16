<?php

include('../conexion.php');

$id = $_REQUEST['id'];
$usuario = $_REQUEST['usuario'];

$usuario_admin=$_REQUEST['usuario_admin'];
$curso_anterior = $_REQUEST['curso_anterior'];  // Nombre anterior del curso
$curso = $_REQUEST['nombre'];  // Nuevo nombre del curso
$tema = $_REQUEST['tema'];
$docente = $_REQUEST['docente'];
$niveles = $_REQUEST['niveles'];
$grados = $_REQUEST['grados'];
$alumno = $_REQUEST['alumnos'];
$usuario_alumno = $_REQUEST['usuario_alumno'];

// Inicializar $subir_material como NULL
$subir_material = null;

// Verificar si se ha cargado un archivo
if (isset($_FILES['subir_material']) && $_FILES['subir_material']['error'] == 0) {
    $subir_material = file_get_contents($_FILES['subir_material']['tmp_name']);
}

// Consulta SQL para actualizar el curso
// Solo actualiza archivomaterial si $subir_material no es null
$query = "UPDATE curso 
SET nombre = ?, tema = ?, docente = ?, nivel = ?, grado = ?, alumno = ?, 
    archivomaterial = COALESCE(?, archivomaterial)
WHERE usuario_alumno = ? AND nombre = ?";

$stmt = $conn->prepare($query);

// Vincular parámetros
// Si $subir_material es null, pasamos NULL para que COALESCE use el valor actual
$stmt->bind_param("ssssssssss", $curso, $tema, $docente, $niveles, $grados, $alumno, $subir_material, $usuario_alumno, $curso_anterior, $id);

try {
    // Ejecutar la consulta
    $stmt->execute();
    header("Location: ../administrador/admin-curso-material.php?usuario=$usuario_admin&usuario_docente=$usuario");
} catch (Exception $e) {
    // Manejar la excepción
    echo "Error: " . $e->getMessage();
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
