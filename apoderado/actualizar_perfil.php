<?php

session_start(); // Asegúrate de iniciar la sesión al principio del script

include("../conexion.php");
// Verifica si el usuario está autenticado
if (isset($_SESSION['apoderado']['usuario'])) {


  // Obtiene el usuario actual de la sesión
  $usuarioSesion = $_SESSION['apoderado']['usuario'];
  
  $rol = $_REQUEST['rol']; 




  // Verifica si se envió el formulario con el nuevo usuario
  if (isset($_POST['usuario'])) {
      
     
      
      

    function validarEntrada($entrada)
    {
      // Implementa la validación necesaria según el tipo de dato
      // o utiliza funciones como mysqli_real_escape_string
      return $entrada;
    }


    // Limpia y obtén el nuevo valor del usuario
    $nuevoUsuario = $conn->real_escape_string($_POST['usuario']);




    $id = validarEntrada($_REQUEST['id']);
    $apellido_paterno = validarEntrada($_POST['apellido_paterno']);
    $apellido_materno = validarEntrada($_POST['apellido_materno']);
    $nombres = validarEntrada($_POST['nombres']);
    $tipo_documento = validarEntrada($_POST['tipo_documento']);
    $dni = validarEntrada($_POST['dni']);
    $correo = validarEntrada($_POST['correo']);
    //$usuario = validarEntrada($_POST['usuario']);
    $password = validarEntrada($_POST['password']);


    $queryApoderado = "UPDATE apoderado 
SET
  apellido_paterno = '$apellido_paterno',
  apellido_materno = '$apellido_materno',
  nombres = '$nombres',
  tipo_documento = '$tipo_documento',
  dni = '$dni',
  correo = '$correo',
  usuario = '$nuevoUsuario',
  password ='$password'
WHERE usuario = '$usuarioSesion'";

$resultadoApoderado = $conn->query($queryApoderado);




    $queryAlumno = "UPDATE alumno 
SET
  usuario_apoderado = '$nuevoUsuario'
WHERE usuario_apoderado = '$usuarioSesion'";



$resultadoAlumno = $conn->query($queryAlumno);


$queryCurso = "UPDATE curso
SET
  usuario_apoderado = '$nuevoUsuario'
WHERE usuario_apoderado = '$usuarioSesion'";


$resultadoCurso = $conn->query($queryCurso);





$queryPago = "UPDATE pago
SET
  usuario = '$nuevoUsuario'
WHERE usuario = '$usuarioSesion'";



$resultadoPago = $conn->query($queryPago);





$querySolicitud = "UPDATE solicitud
SET
  usuario = '$nuevoUsuario'
WHERE usuario = '$usuarioSesion'";


$resultadoSolicitud = $conn->query($querySolicitud);


$queryUsuario = "UPDATE usuario
SET
 correo = '$correo',
 clave = '$password',
  usuario = '$nuevoUsuario'
WHERE usuario = '$usuarioSesion'";


$resultadoUsuario = $conn->query($queryUsuario);



$queryUsuariodd = "UPDATE usuario
SET
usuario_apalum = '$nuevoUsuario'
WHERE usuario_apalum = '$usuarioSesion'";


$resultadoUsuariodd = $conn->query($queryUsuariodd);




    if ($resultadoApoderado) {
        
      // Actualización exitosa, actualiza también la sesión con el nuevo usuario
      $_SESSION['apoderado']['usuario'] = $nuevoUsuario;
      header("Location: ../apoderado/apoderado-perfil.php?usuario=$nuevoUsuario&rol=$rol");
      exit(); // Termina el script después de redireccionar
    } else {
      // Log del error
      error_log("Error en la consulta: " . $conn->error);
    }
  }



  // Cierra la conexión
  $conn->close();
  // Redirecciona si no se procesó correctamente el formulario
  header("Location: ../apoderado/apoderado-perfil.php?usuario=$usuarioSesion&rol=$rol");
  exit(); // Termina el script después de redireccionar


} else {
  echo "No has iniciado sesión.";
}
