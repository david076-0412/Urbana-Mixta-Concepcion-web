<?php
include('../conexion.php');


$materia = $_GET['materia'];

$docente = $_GET['docente'];

$tema = $_GET['tema'];
$nivel = $_GET['nivel'];
$grado = $_GET['grado'];

$titulo = $_GET['titulo'];

$query = "SELECT archivotarea, titulo, materia, 
docente,
tema, nivel, grado 
FROM tarea 
WHERE materia= '$materia' 

AND docente = '$docente' 

AND tema = '$tema' 
AND nivel = '$nivel' 
AND grado = '$grado'
AND titulo = '$titulo'";


$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);

    // Verificamos si se obtuvo un resultado y si el campo archivomaterial no está vacío
    if ($fila && !empty($fila['archivotarea'])) {
        $archivoPDF = $fila['archivotarea'];

        // Configuramos las cabeceras para indicar que se trata de un archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="archivo.pdf"'); // Puedes cambiar el nombre del archivo según tu necesidad

        // Mostramos el contenido del archivo PDF almacenado en el campo archivomaterial
        echo $archivoPDF;
    } else {
        echo "No se encontró el archivo PDF para el usuario $usuario";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);