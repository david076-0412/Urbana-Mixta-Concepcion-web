<?php

include('../conexion.php');

// Obtener parámetros de la solicitud
$id = $_REQUEST['id'] ?? null;
$usuario_alumno = $_REQUEST['usuario_alumno'] ?? null;
$usuario = $_REQUEST['usuario'] ?? null;
$usuario_apoderado = $_REQUEST['usuario_apoderado'] ?? null;
$usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'] ?? null;
$usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'] ?? null;

if (!$usuario || !$usuario_alumno) {
    // Redirigir si falta información
    header("Location: ../administrador/admin-alumno.php?error=missing_parameters");
    exit;
}

// Consultar la cantidad de descuentos y la cantidad de alumnos ordinarios para el nivel recibido
$query = $conn->prepare("SELECT cant_desc_est, cant_or FROM colegio WHERE usuario = ?");
$query->bind_param('s', $usuario);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();

$cant_desc_estee = $row['cant_desc_est'];
$cant_or = $row['cant_or'];

// Actualizar la cantidad de descuentos
if ($cant_or > $cant_desc_estee) {
    $updateQuery = $conn->prepare("UPDATE colegio SET cant_desc_est = cant_desc_est + 1 WHERE usuario = ?");
    $updateQuery->bind_param('s', $usuario);
    $updateQuery->execute();
}

// Eliminar registros relacionados
$tables = [
    'usuario' => 'usuario',
    'alumno' => 'usuario',
    'asistencia' => 'usuario',
    'curso' => 'usuario_alumno',
    'notas' => 'usuario',
    'pago' => 'usuario_alumno',
    'solicitud' => 'usuario_alumno',
    'tarea' => 'usuario'
];

foreach ($tables as $table => $column) {
    $deleteQuery = $conn->prepare("DELETE FROM $table WHERE $column = ?");
    $deleteQuery->bind_param('s', $usuario_alumno);
    $deleteQuery->execute();
}

// Redirigir después de la eliminación
header("Location: ../administrador/admin-alumno.php?usuario=$usuario&usuario_apoderado=$usuario_apoderado&usuario_dni_apoderado=$usuario_dni_apoderado&usuario_nombre_apoderado=$usuario_nombre_apoderado");
exit;

