<?php

$servidor = "localhost";
$usuario = "u286858900_tesis";
$password = "9$8753Jk5";
$db = "u286858900_tesis";
$conexion = mysqli_connect($servidor, $usuario, $password, $db) or die("No se ha podido conectar al Servidor");

$conn = new mysqli($servidor, $usuario, $password, $db);
mysqli_query($conexion, "SET SESSION collation_connection ='utf8_unicode_ci'");


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

try {
    $conexionDR = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $password);
    $conexionDR->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}


