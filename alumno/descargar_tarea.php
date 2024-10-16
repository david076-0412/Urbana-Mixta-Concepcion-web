<?php
include("../conexion.php");

// Obtener el ID del curso desde la URL
$materia = $_GET['materia'];


$docente = $_GET['docente'];


$tema = $_GET['tema'];
$nivel = $_GET['nivel'];
$grado = $_GET['grado'];
$titulo = $_GET['titulo'];

$nombre_curso = $materia . " - ".$docente ." - ". $tema ." - ". $nivel ." - ". $grado." - ".$titulo;

// Consultar la base de datos para obtener el archivo material correspondiente al curso
$sql = "SELECT archivotarea, materia, titulo, 
docente,
tema, nivel, grado 
FROM tarea WHERE materia= :materia 

AND docente = :docente
AND tema = :tema 
AND nivel = :nivel 
AND grado = :grado
AND titulo = :titulo";
$stmt = $conexionDR->prepare($sql);
$stmt->bindParam(':materia', $materia);

$stmt->bindParam(':docente', $docente);

$stmt->bindParam(':tema', $tema);
$stmt->bindParam(':nivel', $nivel);
$stmt->bindParam(':grado', $grado);
$stmt->bindParam(':titulo', $titulo);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró el archivo en la base de datos
if ($result) {
    $archivo = $result['archivotarea'];

    // Configurar las cabeceras para la descarga del archivo
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nombre_curso . '.pdf"');

    // Imprimir el contenido del archivo
    echo $archivo;
} else {
    // Archivo no encontrado
    echo "Archivo no encontrado";
}
