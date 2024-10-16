<?php
include('../conexion.php');

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$docente = $_GET['docente'];

$tema = $_GET['tema'];
$nivel = $_GET['nivel'];
$grado = $_GET['grado'];

$query = "SELECT id, archivomaterial, nombre, 
docente,
tema, nivel, grado 
FROM curso 
WHERE nombre= '$nombre' 
AND docente = '$docente'
AND tema = '$tema' 
AND nivel = '$nivel' 
AND grado = '$grado'
AND id = '$id'";


$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);

    // Verificamos si se obtuvo un resultado y si el campo archivomaterial no está vacío
    if ($fila && !empty($fila['archivomaterial'])) {
        $archivoPDF = $fila['archivomaterial'];

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

