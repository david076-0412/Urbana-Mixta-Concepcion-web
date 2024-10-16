<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("conexion.php");
    session_start();

    $usu = $_POST['usuario'];
    $password = $_POST['password'];

    $query = "SELECT usuario.*, usuario.ruta 
              FROM usuario 
              WHERE usuario = :usuario AND clave = :password AND rol = 'docente'";

    $stmt = $conexionDR->prepare($query);
    $stmt->bindParam(':usuario', $usu);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['docente']['usuario'] = $usu;
        $role = "docente";
        $ruta = "../docente/panel_docente.php";

        if (!empty($ruta)) {
            header("Location: " . $ruta . "?usuario=" . urlencode($usu) . "&rol=" . urlencode($role));
            exit();
        } else {
            header("Location: ../logindocentee.php?error=Rol no encontrado");
            exit();
        }
    } else {
        header("Location: ../logindocentee.php?error=Usuario o contraseña incorrectos");
        exit();
    }
} else {
    header("Location: ../logindocentee.php?error=Acceso no permitido");
    exit();
}

