<?php

include('../conexion.php');


$id=$_POST['id'];

$usuario= $_REQUEST['usuario'];
// Validación de variables POST
$docente = $_POST['docente'];
$alumno = $_POST['alumnos'];
$nivel = $_POST['niveles'];
$grado = $_POST['grados'];
$curso = $_POST['curso'];
$tema = $_POST['tema'];
$tipo_nota_promedio = $_POST['tipo_nota_promedio'];
$nota_cuaderno = $_POST['nota_cuaderno'];
$participacion_oral = $_POST['participacion_oral'];
$examen_mensual = $_POST['examen_mensual'];
$examen_bimestral = $_POST['examen_bimestral'];
$comportamiento = $_POST['comportamiento'];
$nota_bimestral = $_POST['nota_bimestral'];
$usuario_docente = $_POST['usuario_docente'];


$variables_post = ['nota_cuaderno', 'participacion_oral', 'examen_mensual', 'examen_bimestral', 'comportamiento', 'nota_bimestral'];
$total_notas = 0;

foreach ($variables_post as $variable) {
    // Verificar si la variable POST está definida antes de asignarla
    $total_notas += isset($_POST[$variable]) ? $_POST[$variable] : 0;
}

// Calcular la nota final
$divisor = count($variables_post);
$nota_final = ($total_notas / $divisor);



$query_alumno = "SELECT a.usuario,a.alumno from alumno a WHERE a.alumno='$alumno'";
$resultado_usuario_alumno = $conn->query($query_alumno);

$fila_usuario_alumno = $resultado_usuario_alumno->fetch_assoc();

$usuario_alumno = $fila_usuario_alumno['usuario'];



// Utilizar prepared statements para evitar inyección SQL
$query = "UPDATE notas SET 
docente = ?, 
alumno = ?, 
nivel = ?, 
grado = ?, 
curso = ?, 
tema = ?, 
nota_cuaderno = ?, 
tipo_nota_promedio = ?, 
participacion_oral = ?, 
examen_mensual = ?, 
examen_bimestral = ?, 
comportamiento = ?, 
nota_bimestral = ?, 
nota_final = ?, 
usuario = ?, 
usuario_docente = ?
WHERE id = ?";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error en la preparación del statement: " . $conn->error);
}

// Enlazar parámetros
$stmt->bind_param("sssssssssssssssss", $docente, $alumno, $nivel, $grado, $curso, $tema, $nota_cuaderno, $tipo_nota_promedio, $participacion_oral, $examen_mensual, $examen_bimestral, $comportamiento, $nota_bimestral, $nota_final, $usuario_alumno, $usuario_docente, $id);

// Ejecutar la consulta
$resultado = $stmt->execute();

// Manejo de errores
if ($resultado) {
    header("Location: ../docente/docente-notas-curso.php?usuario=$usuario");
} else {
    header("Location: ../docente/docente-notas-curso.php?usuario=$usuario&error=" . urlencode($stmt->error));
}

// Cerrar el statement y la conexión
$stmt->close();
$conn->close();