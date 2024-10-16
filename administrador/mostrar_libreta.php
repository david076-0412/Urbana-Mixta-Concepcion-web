
<?php
include('../conexion.php');



$usuario = $_REQUEST['usuario'];

$id = $_REQUEST['id'];


$usuario_alumno = $_REQUEST['usuario_alumno'];




$query = "SELECT id,foto_libreta,usuario
FROM alumno
WHERE id='$id'
AND usuario = '$usuario_alumno'";


$resultado = mysqli_query($conn, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);

    // Verificamos si se obtuvo un resultado y si el campo archivomaterial no está vacío
    if ($fila && !empty($fila['foto_libreta'])) {
        $archivoPDF = $fila['foto_libreta'];

        // Configuramos las cabeceras para indicar que se trata de un archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="archivo.pdf"'); // Puedes cambiar el nombre del archivo según tu necesidad

        // Mostramos el contenido del archivo PDF almacenado en el campo archivomaterial
        echo $archivoPDF;
    } else {
        echo "No se encontró el archivo PDF para el usuario $usuario";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

mysqli_close($conn);