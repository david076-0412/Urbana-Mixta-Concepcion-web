<?php
include '../conexion.php'; // Incluye la conexión a la base de datos

if (isset($_POST['usuario'])) {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    
    $query = "SELECT COUNT(*) AS count FROM usuario WHERE usuario = '$usuario'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['count'] > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }
}
?>
