<?php
include('../conexion.php');

if (isset($_POST['nivel'])) {
    $nivel = mysqli_real_escape_string($conexion, $_POST['nivel']);

    // Obtener el usuario del docente
    $usuario = $_SESSION['docente']['usuario'];

    // Consulta para obtener el grado según el nivel del docente
    $sqlCf = "SELECT DISTINCT grado FROM docente WHERE usuario = '$usuario' AND nivel = '$nivel'";
    $queryff = mysqli_query($conexion, $sqlCf);

    $options = '<option value="">SELECCIONAR...</option>';
    while ($row = mysqli_fetch_assoc($queryff)) {
        $grado = htmlspecialchars($row['grado'], ENT_QUOTES, 'UTF-8');
        $options .= "<option value=\"$grado\">$grado</option>";
    }

    // Enviar las opciones como HTML
    echo $options;
}
?>

