<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("conexion.php");

    session_start();

    $usu = $_POST['usuario'];
    $password = $_POST['password'];

    // Consulta para verificar usuario
    $query = "SELECT usuario.*, usuario.ruta 
              FROM usuario 
              WHERE usuario = :usuario AND clave = :password AND usuario.rol = 'apoderado'";

    $stmt = $conexionDR->prepare($query);
    $stmt->bindParam(':usuario', $usu);
    $stmt->bindParam(':password', $password); // Asegúrate de almacenar las contraseñas cifradas en la base de datos

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['apoderado']['usuario'] = $usu;
        $role = "apoderado";
        $ruta = "../apoderado/panel_apoderado.php";

        if (!empty($ruta)) {
            // Actualización de la fecha de la encuesta
            $queryFechaEncuesta = "UPDATE apoderado 
                       SET fecha_encuesta = :fecha_encuesta, Mes = :mes, Dia = :dia 
                       WHERE usuario = :usuario";

date_default_timezone_set('America/Lima');
$stmtt = $conexionDR->prepare($queryFechaEncuesta);

$fechaEncuesta = date("Y-m-d H:i:s");
$mes = date("m");
$dia = date("d");

// Vincular parámetros correctamente
$stmtt->bindParam(':fecha_encuesta', $fechaEncuesta);
$stmtt->bindParam(':mes', $mes);
$stmtt->bindParam(':dia', $dia);
$stmtt->bindParam(':usuario', $usu);

$stmtt->execute();


            // Redireccionar al panel de apoderado
            header("Location: ../" . $ruta . "?usuario=" . urlencode($usu) . "&rol=" . urlencode($role));
            exit();
        } else {
            // Rol no encontrado
            header("Location: ../loginapoderado.php?error=Rol no encontrado");
            exit();
        }
    } else {
        // Usuario no encontrado o credenciales incorrectas
        header("Location: ../loginapoderado.php?error=Usuario o password incorrecto");
        exit();
    }
} else {
    // Acceso no permitido si no es POST
    header("Location: ../loginapoderado.php?error=Acceso no permitido");
    exit();
}
