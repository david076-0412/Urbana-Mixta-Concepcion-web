<?php
session_start();

if (isset($_SESSION['admin']['usuario'])) {
    unset($_SESSION['admin']['usuario']); // Elimina solo la sesión del admin
    header("Location: loginadmin.php");
    exit();
} else {
    header("Location: loginadmin.php?error=No se ha iniciado sesión o sesión ya cerrada");
    exit();
}
?>


