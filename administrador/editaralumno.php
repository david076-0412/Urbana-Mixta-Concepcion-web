<?php
include('../conexion.php');

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}


date_default_timezone_set('America/Lima');


function getCurrentDate() {
    return date('Y-m-d H:i:s');
}




$id = $_POST['id'];
$usuario_admin = $_POST['usuario_admin'];
$usuario_apoderado = $_POST['usuario_apoderado'];
$usuario_dni_apoderado = $_POST['usuario_dni_apoderado'];
$usuario_nombre_apoderado = $_POST['usuario_nombre_apoderado'];

// Inicializar variables
$foto_libreta = null;
$estado_libreta = "SIN SUBIR";

// Inicializar variables
$foto_do_identidad = null;
$estado_foto = "SIN SUBIR";




$tipo_documento = $_POST['tipo_documento'];
$dni = $_POST['dni'];
$alumno = $_POST['alumno'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$usuario_alumnodd = $_POST['usuario_alumnodd'];

$usuario_alumno = $_POST['usuario_alumno'];
$usuario_alumno_nuevo = $_POST['usuario_alumno_nuevo'];

$correo = $_POST['correo'];
$password = $_POST['password'];
$sexo = $_POST['sexo'];
$nivel = $_POST['niveles'];

$grado = $_POST['grados'];
$discapacidad = $_POST['discapacidad'];
$tipo_discapacidad = $_POST['tipo_discapacidad'];
// Determinar el tipo de discapacidad a pasar a la consulta
$tipo_discapacidad_to_update = ($discapacidad === 'NO') ? 'Ninguno' : $tipo_discapacidad;


$estado_alumno = $_POST['estado_alumno'];

$estado = $_POST['estado'];

if ($estado == "aceptado") {
    $fecha_aceptacion = getCurrentDate(); // Asegúrate de que esta función retorne la fecha en el formato correcto.
    
    // Consultar la fecha de matrícula
    $qlee = $conn->prepare("SELECT a.fecha_matricula FROM alumno a WHERE a.alumno = ?");
    $qlee->bind_param("s", $alumno);
    $qlee->execute();
    $resultado = $qlee->get_result();
    $rowd = $resultado->fetch_assoc();

    // Verificar si se obtuvo una fecha de matrícula válida
    if (!empty($rowd['fecha_matricula']) && $rowd['fecha_matricula'] !== '0000-00-00') {
        $fecha_matricula = $rowd['fecha_matricula']; // Fecha en formato YYYY-MM-DD

        // Convertir las fechas a timestamp
        $timestamp_aceptacion = strtotime($fecha_aceptacion);
        $timestamp_matricula = strtotime($fecha_matricula);

        // Calcular la diferencia en días como un entero
        $diferencia_dias = (int)(($timestamp_aceptacion - $timestamp_matricula) / (60 * 60 * 24)); // Diferencia en días como entero


        // Almacenar la diferencia en formato varchar
        if ($diferencia_dias == 1) {
            $tiempo_aceptacion = "1 día"; // Singular
        } else {
            $tiempo_aceptacion = $diferencia_dias . " días"; // Plural
        }

    } else {
        $tiempo_aceptacion = "Fecha de matrícula no válida"; // Manejo de error para fecha no válida
    }
    
} else if ($estado == "en proceso") {
    $fecha_aceptacion = "0000-00-00"; // Puedes usar esto ya que tu sql_mode lo permite.
}else if($estado == "rechazado"){
    
    $fecha_aceptacion = getCurrentDate(); // Asegúrate de que esta función retorne la fecha en el formato correcto.
    
    // Consultar la fecha de matrícula
    $qlee = $conn->prepare("SELECT a.fecha_matricula FROM alumno a WHERE a.alumno = ?");
    $qlee->bind_param("s", $alumno);
    $qlee->execute();
    $resultado = $qlee->get_result();
    $rowd = $resultado->fetch_assoc();

    // Verificar si se obtuvo una fecha de matrícula válida
    if (!empty($rowd['fecha_matricula']) && $rowd['fecha_matricula'] !== '0000-00-00') {
        $fecha_matricula = $rowd['fecha_matricula']; // Fecha en formato YYYY-MM-DD

        // Convertir las fechas a timestamp
        $timestamp_aceptacion = strtotime($fecha_aceptacion);
        $timestamp_matricula = strtotime($fecha_matricula);

        // Calcular la diferencia en días como un entero
        $diferencia_dias = (int)(($timestamp_aceptacion - $timestamp_matricula) / (60 * 60 * 24)); // Diferencia en días como entero


        // Almacenar la diferencia en formato varchar
        if ($diferencia_dias == 1) {
            $tiempo_aceptacion = "1 día"; // Singular
        } else {
            $tiempo_aceptacion = $diferencia_dias . " días"; // Plural
        }

    } else {
        $tiempo_aceptacion = "Fecha de matrícula no válida"; // Manejo de error para fecha no válida
    }
    
    
    
}else {
    $fecha_aceptacion = null; // Manejo para otros estados si es necesario.
}





// Crear la consulta UPDATE con los valores directamente concatenados
$querytt = "UPDATE alumno SET 
dni = '$dni', 
tipo_documento = '$tipo_documento',
correo = '$correo', 
alumno = '$alumno', 
fecha_nacimiento = '$fecha_nacimiento',
usuario = '$usuario_alumno_nuevo',
sexo = '$sexo',
nivel = '$nivel',
grado = '$grado',
password = '$password',
discapacidad = '$discapacidad',
tipo_discapacidad = '$tipo_discapacidad_to_update',
estado = '$estado',
tiempo_aceptado = '$tiempo_aceptacion',
fecha_aceptacion = '$fecha_aceptacion',
estado_alumno = '$estado_alumno'

WHERE id = '$id'";

// Preparar la declaración
$stmtee = $conn->prepare($querytt);

$stmtee->execute();


// Cerrar la declaración
$stmtee->close();



$queryUsuario = "UPDATE usuario SET correo='$correo', clave='$password', usuario='$usuario_alumno_nuevo' WHERE usuario = '$usuario_alumno'";


$stmtuu = $conn->prepare($queryUsuario);


$stmtuu->execute();


// Cerrar la declaración
$stmtuu->close();







// Verificar si se ha cargado un archivo de libreta
if (isset($_FILES['foto_do_identidad']) && $_FILES['foto_do_identidad']['error'] === UPLOAD_ERR_OK) {
    // Validar tipo de archivo
    $allowedTypes = ['application/pdf'];
    if (!in_array($_FILES['foto_do_identidad']['type'], $allowedTypes)) {
        die("Tipo de archivo no permitido.");
    }
    
    // Leer el contenido del archivo
    $foto_do_identidad = file_get_contents($_FILES['foto_do_identidad']['tmp_name']);
    $estado_foto = "SUBIDO";
} else {
   $foto_do_identidad = null;
}

// Actualizar `foto_libreta` si está disponible
if ($foto_do_identidad !== null) {
    $query_foto_identidad = "UPDATE alumno SET foto_do_identidad = ?, estado_foto = ? WHERE id = ?";
    $stmtt = $conn->prepare($query_foto_identidad);

    if ($stmtt === false) {
        $foto_do_identidad = null;
    }

    // Enlazar parámetros: 'b' para el contenido binario, 's' para el estado, 'i' para el ID
    $stmtt->bind_param("bsi", $foto_do_identidad, $estado_foto, $id);
    $stmtt->send_long_data(0, $foto_do_identidad); // Enviar datos binarios largos

    if (!$stmtt->execute()) {
        echo "Error al ejecutar la consulta: " . $stmtt->error;
    }

    $stmtt->close();
}



// Verificar si se ha cargado un archivo de libreta
if (isset($_FILES['foto_libreta']) && $_FILES['foto_libreta']['error'] === UPLOAD_ERR_OK) {
    // Validar tipo de archivo
    $allowedTypes = ['application/pdf'];
    if (!in_array($_FILES['foto_libreta']['type'], $allowedTypes)) {
        die("Tipo de archivo no permitido.");
    }
    
    // Leer el contenido del archivo
    $foto_libreta = file_get_contents($_FILES['foto_libreta']['tmp_name']);
    $estado_libreta = "SUBIDO";
} else {
    $foto_libreta = null;
}

// Actualizar `foto_libreta` si está disponible
if ($foto_libreta !== null) {
    $query_foto_libreta = "UPDATE alumno SET foto_libreta = ?, estado_libreta = ? WHERE id = ?";
    $stmt = $conn->prepare($query_foto_libreta);

    if ($stmt === false) {
        $foto_libreta = null;
    }

    // Enlazar parámetros: 'b' para el contenido binario, 's' para el estado, 'i' para el ID
    $stmt->bind_param("bsi", $foto_libreta, $estado_libreta, $id);
    $stmt->send_long_data(0, $foto_libreta); // Enviar datos binarios largos

    if (!$stmt->execute()) {
        echo "Error al ejecutar la consulta: " . $stmt->error;
    }

    $stmt->close();
}

// Redirigir al administrador
header("Location: ../administrador/admin-alumno.php?usuario=$usuario_admin&usuario_apoderado=$usuario_apoderado&usuario_dni_apoderado=$usuario_dni_apoderado&usuario_nombre_apoderado=$usuario_nombre_apoderado");

// Cerrar la conexión
$conn->close();







