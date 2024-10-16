

<?php
include('../conexion.php');


$usuario_apoderado = $_GET['usuario_apoderado'];

$usuario = $_REQUEST['usuario'];

$id = $_REQUEST['id'];

$query = "SELECT ae.id,ae.foto_do_identidad,ae.usuario
FROM apoderado ae
WHERE ae.usuario = '$usuario_apoderado'
AND ae.id='$id'";


$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);

    // Verificamos si se obtuvo un resultado y si el campo archivomaterial no está vacío
    if ($fila && !empty($fila['foto_do_identidad'])) {
        $archivoPDF = $fila['foto_do_identidad'];

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