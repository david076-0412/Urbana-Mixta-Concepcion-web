
<?php

include "../conexion.php";

// Obtener los parámetros desde la URL
$alumno = $_REQUEST['alumno'] ?? '';
$usuario_alumno = $_REQUEST['usuario_alumno'] ?? '';
$id = $_REQUEST['id'] ?? '';
$materia = $_REQUEST['materia'] ?? '';
$nivel = $_REQUEST['nivel'] ?? '';
$grado = $_REQUEST['grado'] ?? '';
$docente = $_REQUEST['docente'] ?? '';

$nombre_curso = $materia . " - " . $alumno . " - " . $nivel . " - " . $grado . " - " . $docente;

// Consultar la base de datos para obtener el archivo material correspondiente al curso
$sql = "SELECT subirarchivotarea, titulo, materia, docente, tema, nivel, grado, usuario, alumno, id 
        FROM tarea 
        WHERE alumno = :alumno 
        AND usuario = :usuario_alumno 
        AND id = :id 
        AND materia = :materia 
        AND nivel = :nivel 
        AND grado = :grado 
        AND docente = :docente";

$stmt = $conexionDR->prepare($sql);
$stmt->bindParam(':alumno', $alumno);
$stmt->bindParam(':usuario_alumno', $usuario_alumno);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':materia', $materia);
$stmt->bindParam(':nivel', $nivel);
$stmt->bindParam(':grado', $grado);
$stmt->bindParam(':docente', $docente);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró el archivo en la base de datos
if ($result) {
    $archivo = $result['subirarchivotarea']; // Cambié 'archivotarea' a 'subirarchivotarea'

    if ($archivo) {
        // Configurar las cabeceras para la descarga del archivo
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $nombre_curso . '.pdf"');
        header('Content-Length: ' . strlen($archivo));

        // Imprimir el contenido del archivo
        echo $archivo;
    } else {
        echo "El archivo no está disponible.";
    }
} else {
    // Archivo no encontrado
    echo "Archivo no encontrado.";
}
?>
