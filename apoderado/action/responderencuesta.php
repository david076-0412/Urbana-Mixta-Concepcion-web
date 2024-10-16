<?php

session_start(); // Asegúrate de iniciar la sesión al principio del script

include("../../conexion.php");


// Obtiene el usuario actual de la sesión
$usuario = $_REQUEST['usuario_apoderado'];
$rol = $_REQUEST['rol'];
$apoderado = $_REQUEST['apoderado'];

$fecha = $_POST['fecha'] ?? '0000-00-00'; // Asegúrate de usar comillas


$meses = $_POST['meses'] ?? null;

// Supongamos que tienes un formulario que envía datos a esta página
$pregunta1 = $_POST['question1'] ?? null;
$pregunta2 = $_POST['question2'] ?? null;
$pregunta3 = $_POST['question3'] ?? null;
$pregunta4 = $_POST['question4'] ?? null;
$pregunta5 = $_POST['question5'] ?? null;
$pregunta6 = $_POST['question6'] ?? null;
$pregunta7 = $_POST['question7'] ?? null;
$pregunta8 = $_POST['question8'] ?? null;
$pregunta9 = $_POST['question9'] ?? null;
$pregunta10 = $_POST['question10'] ?? null;

try {
    // Preparar la consulta
    $query = $conn->prepare("
        INSERT INTO `encuestas` (
          `usuario`,
          `apoderado`,
          `fecha`,
          `meses`,
          `Pregunta_1`, 
          `Pregunta_2`, 
          `Pregunta_3`, 
          `Pregunta_4`, 
          `Pregunta_5`, 
          `Pregunta_6`, 
          `Pregunta_7`, 
          `Pregunta_8`, 
          `Pregunta_9`, 
          `Pregunta_10`,
          `estado_encuesta`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if ($query === false) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }
    
    $estado_encuesta = "Ya encuestado";

    // Enlazar parámetros
    $query->bind_param(
        'sssssssssssssss', 
        $usuario,
        $apoderado,
        $fecha,
        $meses,
        $pregunta1, 
        $pregunta2, 
        $pregunta3, 
        $pregunta4, 
        $pregunta5, 
        $pregunta6, 
        $pregunta7, 
        $pregunta8, 
        $pregunta9, 
        $pregunta10,
        $estado_encuesta
    );

    // Ejecutar consulta
    if ($query->execute()) {
        // Redirigir a la página de panel_apoderado.php en caso de éxito
        header("Location: ../panel_apoderado.php?usuario=$usuario&rol=$rol");
    } else {
        throw new Exception('Error al ejecutar la consulta: ' . $query->error);
    }
} catch (Exception $e) {
    // En caso de error, redirigir con un mensaje de error (puedes ajustar esto según tus necesidades)
    error_log($e->getMessage()); // Opcional: registra el error para depuración
    header("Location: ../panel_apoderado.php?usuario=$usuario&rol=$rol");
} finally {
    // Cierra el cursor y la conexión si es necesario
    if (isset($query)) {
        $query->close();
    }
    $conn->close(); // Si $conn está definido
}
?>


