<?php
include('../conexion.php');



// Función para sanitizar datos
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags($data));
}

// Recibir datos del formulario
$usuario_admin = sanitizeInput($_POST['usuario_admin']);
$usuario_apoderado = sanitizeInput($_POST['usuario_apoderado']);
$usuario_dni_apoderado = sanitizeInput($_POST['usuario_dni_apoderado']);
$usuario_nombre_apoderado = sanitizeInput($_POST['usuario_nombre_apoderado']);
$tipo_documento = sanitizeInput($_POST['tipo_documento']);
$dni = sanitizeInput($_POST['dni']);
$apellido_paterno = sanitizeInput($_POST['apellido_paterno']);
$apellido_materno = sanitizeInput($_POST['apellido_materno']);
$nombres = sanitizeInput($_POST['nombres']);
$fecha_nacimiento = sanitizeInput($_POST['fecha_nacimiento']);
$usuario_alumno = sanitizeInput($_POST['usuario_alumno']);
$correo = sanitizeInput($_POST['correo']);
$password = sanitizeInput($_POST['password']);
$sexo = sanitizeInput($_POST['sexo']);
$discapacidad = sanitizeInput($_POST['discapacidad']);
$tipo_discapacidad = $discapacidad === "SI" ? sanitizeInput($_POST['tipo_discapacidad']) : "Ninguno";
$nivel = sanitizeInput($_POST['niveles']);
$grado = sanitizeInput($_POST['grados']);
$codalu = sanitizeInput($_POST['codalu']);
$estado_alumno = sanitizeInput($_POST['estado_alumno']);

// Concatenar apellido y nombre para obtener el nombre completo del alumno
$alumno = "$apellido_paterno $apellido_materno $nombres";

// Verificar si el apoderado ya existe
$queryAlumnoCheck = "SELECT * FROM alumno 
    WHERE dni = ? OR correo = ? OR (alumno = ? AND usuario = ?)";
$stmtAlumnoCheck = $conn->prepare($queryAlumnoCheck);
$stmtAlumnoCheck->bind_param("ssss", $dni, $correo, $alumno, $usuario_alumno);
$stmtAlumnoCheck->execute();
$resultAlumnoCheck = $stmtAlumnoCheck->get_result();

$response = array('exists' => false);

if ($resultAlumnoCheck->num_rows > 0) {
    $response['exists'] = true;
}

$stmtAlumnoCheck->close();
$conn->close();

// Enviar respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>