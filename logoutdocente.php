<?php
session_start();

if (isset($_SESSION['docente']['usuario'])) {
    unset($_SESSION['docente']['usuario']); // Elimina solo la sesión del admin
    header("Location: logindocentee.php");
    exit();
} else {
    header("Location: logindocentee.php?error=No se ha iniciado sesión o sesión ya cerrada");
    exit();
}
?>


