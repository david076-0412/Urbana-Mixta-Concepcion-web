<?php

session_start(); // Asegúrate de iniciar la sesión al principio del script


// Verifica si el usuario está autenticado
if (isset($_SESSION['alumno']['usuario'])) {

    // Obtiene el usuario actual de la sesión
    $usuarioSesion = $_SESSION['alumno']['usuario'];

    // Verifica si se envió el formulario con el nuevo usuario
    if (isset($_POST['usuario'])) {
        
        include "../conexion.php";

        function validarEntrada($entrada)
        {
            // Implementa la validación necesaria según el tipo de dato
            // o utiliza funciones como mysqli_real_escape_string
            return $entrada;
        }


        // Limpia y obtén el nuevo valor del usuario
        $nuevoUsuario = $conn->real_escape_string($_POST['usuario']);



        $id = validarEntrada($_REQUEST['id']);
        $alumno = validarEntrada($_POST['alumno']);
        $tipo_documento = validarEntrada($_POST['tipo_documento']);
        $dni = validarEntrada($_POST['dni']);
        $correo = validarEntrada($_POST['correo']);

        $password = validarEntrada($_POST['password']);


        // Actualiza el campo 'usuario' en la tabla 'alumno'
        $queryAlumno = "UPDATE alumno SET alumno = '$alumno',
        tipo_documento = '$tipo_documento',
        dni = '$dni',
        correo = '$correo',
        password ='$password',
        usuario='$nuevoUsuario' 
        WHERE usuario='$usuarioSesion'";


        $resultadoAlumno = $conn->query($queryAlumno);




        // Actualiza el campo 'usuario' en la tabla 'alumno'
        $queryCurso = "UPDATE curso
        SET usuario_alumno='$nuevoUsuario'
        WHERE usuario_alumno='$usuarioSesion'";




        $resultadoCurso = $conn->query($queryCurso);




        // Actualiza el campo 'usuario' en la tabla 'alumno'
        $queryTarea = "UPDATE tarea 
        SET usuario='$nuevoUsuario'
        WHERE usuario='$usuarioSesion'";


        $resultadoTarea = $conn->query($queryTarea);



        // Actualiza el campo 'usuario' en la tabla 'alumno'
        $queryNotas = "UPDATE notas
        SET usuario='$nuevoUsuario'
        WHERE usuario='$usuarioSesion'";


        $resultadoNotas = $conn->query($queryNotas);


        $queryUsuario = "UPDATE usuario
        SET
        correo = '$correo',
        clave = '$password',
        usuario = '$nuevoUsuario'
        WHERE usuario = '$usuarioSesion'";


        $resultadoUsuario = $conn->query($queryUsuario);



        if ($resultadoAlumno) {
            // Actualización exitosa, actualiza también la sesión con el nuevo usuario
           $_SESSION['alumno']['usuario'] = $nuevoUsuario;
            header("Location: ../alumno/alumno-perfil.php?usuario=$nuevoUsuario");
            exit(); // Termina el script después de redireccionar
        } else {
            // Log del error
            error_log("Error en la consulta: " . $conn->error);
        }
    }


    // Cierra la conexión
    $conn->close();
    // Redirecciona si no se procesó correctamente el formulario
    header("Location: ../alumno/alumno-perfil.php?usuario=$usuarioSesion");
    exit(); // Termina el script después de redireccionar

} else {
    echo "No has iniciado sesión.";
}
