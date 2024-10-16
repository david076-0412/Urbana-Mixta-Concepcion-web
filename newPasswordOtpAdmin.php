<?php
session_start();

include('conexion.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["password"];
    $confPassword = $_POST["confPassword"];

    $email = $_REQUEST["email"];


    if ($newPassword != null && $confPassword != null && $newPassword == $confPassword) {
        try {



            $queryUsuario = "UPDATE usuario SET clave = '$newPassword' WHERE correo = '$email'";

            $resultadoUsuario = $conexion->query($queryUsuario);



            
            $queryAlumno = "UPDATE alumno SET password = '$newPassword' WHERE correo = '$email'";

            $resultadoAlumno = $conexion->query($queryAlumno);



            $queryApoderado = "UPDATE apoderado SET password = '$newPassword' WHERE correo = '$email'";

            $resultadoApoderado = $conexion->query($queryApoderado);



            $queryDocente = "UPDATE docente SET password = '$newPassword' WHERE correo = '$email'";

            $resultadoDocente = $conexion->query($queryDocente);



            $queryAdmin = "UPDATE admin SET password = '$newPassword' WHERE correo = '$email'";

            $resultadoAdmin = $conexion->query($queryAdmin);



            if ($resultadoUsuario && $resultadoAlumno && $resultadoApoderado && $resultadoDocente && $resultadoAdmin) {
                $_SESSION["status"] = "resetSuccess";
                //echo "Si se modifico";
                header("Location: ../loginadmin.php");
            } else {
                $_SESSION["status"] = "resetFailed";
                header("Location: ../loginadmin.php");

                //echo "No se inserto";
                $conexion->error;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
