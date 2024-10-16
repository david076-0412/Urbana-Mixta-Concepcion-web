<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("conexion.php");

    

    session_start();

    $usu = $_POST['usuario'];
    $password = $_POST['password'];

    $query = "SELECT usuario.*, usuario.ruta 
              FROM usuario 
              WHERE usuario = :usuario AND clave = :password AND rol = 'alumno'";

    $stmt = $conexionDR->prepare($query);
    $stmt->bindParam(':usuario', $usu);
    $stmt->bindParam(':password', $password); // Asegúrate de almacenar las contraseñas cifradas en la base de datos

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['alumno']['usuario'] = $usu;
        $role = "alumno";
        $ruta = "../alumno/panel_alumno.php";

        if (!empty($ruta)) {
            header("Location: ../" . $ruta . "?usuario=" . urlencode($usu) . "&rol=" . urlencode($role));
            exit();
        } else {
            header("Location: ../loginalumno.php?error=Rol no encontrado");
            exit();
        }
    } else {
        // Usuario no encontrado
        header("Location: ../loginalumno.php?error=Usuario o password incorrecto");
        exit();
    }
} else {
    header("Location: ../loginalumno.php?error=Acceso no permitido");
    exit();
}

