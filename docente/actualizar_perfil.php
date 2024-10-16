<?php

session_start(); // Asegúrate de iniciar la sesión al principio del script


// Verifica si el usuario está autenticado
if (isset($_SESSION['docente']['usuario'])) {


  include "../conexion.php";
  

  // Obtiene el usuario actual de la sesión
  $usuarioSesion = $_SESSION['docente']['usuario'];




  // Verifica si se envió el formulario con el nuevo usuario
  if (isset($_POST['usuario'])) {

    function validarEntrada($entrada)
    {
      // Implementa la validación necesaria según el tipo de dato
      // o utiliza funciones como mysqli_real_escape_string
      return $entrada;
    }


    // Limpia y obtén el nuevo valor del usuario
    //$nuevoUsuario = $_POST['usuario'];




    $id = validarEntrada($_REQUEST['id']);
    $apellido_paterno = validarEntrada($_POST['apellido_paterno']);
    $apellido_materno = validarEntrada($_POST['apellido_materno']);
    $nombre = validarEntrada($_POST['nombre']);

    $docente = $apellido_paterno . " " . $apellido_materno . " " . $nombre;


    $tipo_documento = validarEntrada($_POST['tipo_documento']);
    $dni = validarEntrada($_POST['dni']);
    $correo = validarEntrada($_POST['correo']);
    $nuevoUsuario = validarEntrada($_POST['usuario']);
    $password = validarEntrada($_POST['password']);

    $queryDocente = "UPDATE docente
    SET
      
      apellido_paterno = '$apellido_paterno',
      apellido_materno = '$apellido_materno',
      nombres = '$nombre',
      tipo_documento = '$tipo_documento',
      dni = '$dni',
      correo = '$correo',
      password ='$password',
      usuario ='$nuevoUsuario'
    WHERE usuario = '$usuarioSesion'";


$resultadoDocente = $conn->query($queryDocente);



    $queryAsistencia = "UPDATE asistencia
SET
  docente = '$docente',
  usuario_docente ='$nuevoUsuario'
WHERE usuario_docente = '$usuarioSesion'";



$resultadoAsistencia = $conn->query($queryAsistencia);




$queryCurso = "UPDATE curso
    SET
      docente = '$docente',
      usuario_docente ='$nuevoUsuario'
    WHERE usuario_docente = '$usuarioSesion'";

$resultadoCurso = $conn->query($queryCurso);



$queryHorario = "UPDATE horario
    SET
    usuario_docente ='$nuevoUsuario'
    WHERE usuario_docente = '$usuarioSesion'";


$resultadoHorario = $conn->query($queryHorario);




$queryNotas = "UPDATE notas
    SET
      docente = '$docente',
      usuario_docente ='$nuevoUsuario'
    WHERE usuario_docente = '$usuarioSesion'";


$resultadoNotas = $conn->query($queryNotas);


$queryUsuario = "UPDATE usuario
    SET
      correo = '$correo',
      clave = '$password',
      usuario = '$nuevoUsuario'
    WHERE usuario = '$usuarioSesion'";

$resultadoUsuario = $conn->query($queryUsuario);


if (
  $resultadoDocente
) {
  // Actualización exitosa, actualiza también la sesión con el nuevo usuario
  $_SESSION['docente']['usuario'] = $nuevoUsuario;
  header("Location: ../docente/docente-perfil.php?usuario=$nuevoUsuario");
  exit(); // Termina el script después de redireccionar
} else {
  // Log del error
  error_log("Error en la consulta: " . $conn->error);
}

  }



  // Cierra la conexión
  $conexion->close();
  // Redirecciona si no se procesó correctamente el formulario
  header("Location: ../docente/docente-perfil.php?usuario=$usuarioSesion");
  exit(); // Termina el script después de redireccionar


} else {
  echo "No has iniciado sesión.";
}
