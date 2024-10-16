<?php
session_start();

if (isset($_SESSION['apoderado']['usuario'])) {
    unset($_SESSION['apoderado']['usuario']); // Elimina solo la sesión del admin
    header("Location: loginapoderado.php");
    exit();
} else {
    header("Location: loginapoderado.php?error=No se ha iniciado sesión o sesión ya cerrada");
    exit();
}
?>

