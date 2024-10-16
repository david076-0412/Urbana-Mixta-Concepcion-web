<?php
session_start();

if (isset($_SESSION['alumno']['usuario'])) {
    unset($_SESSION['alumno']['usuario']); // Elimina solo la sesión del admin
    header("Location: loginalumno.php");
    exit();
} else {
    header("Location: loginalumno.php?error=No se ha iniciado sesión o sesión ya cerrada");
    exit();
}
?>


