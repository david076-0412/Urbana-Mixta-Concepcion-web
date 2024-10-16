<?php

include('../conexion.php');

// Establecer la zona horaria a Perú
date_default_timezone_set('America/Lima');

function sanitizeInput($data) {
    return isset($data) ? htmlspecialchars(stripslashes(trim($data))) : '';
}


function handleFileUpload($file) {
    return file_get_contents($file['tmp_name']);
}

function getCurrentDate() {
    return date('Y-m-d');
}

function addDaysToDate($date, $days) {
    return date('Y-m-d', strtotime($date . " +$days days"));
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);





// Verificar si el usuario ya existe
$queryUsuarioCheck = "SELECT * FROM usuario WHERE correo = ? OR usuario = ?";
$stmtUsuarioCheck = $conn->prepare($queryUsuarioCheck);
$stmtUsuarioCheck->bind_param("ss", $correo, $usuario);
$stmtUsuarioCheck->execute();
$resultUsuarioCheck = $stmtUsuarioCheck->get_result();

if ($resultUsuarioCheck->num_rows > 0) {
    echo "exists";
    $stmtUsuarioCheck->close();
    $conn->close();
    exit();
}

$stmtUsuarioCheck->close();





// Verificar si el apoderado ya existe
$queryAlumnoCheck = "SELECT * FROM alumno 
    WHERE dni = ? OR correo = ? OR (alumno = ? AND usuario = ?)";
$stmtAlumnoCheck = $conn->prepare($queryAlumnoCheck);
$stmtAlumnoCheck->bind_param("ssss", $dni, $correo, $alumno, $usuario);
$stmtAlumnoCheck->execute();
$resultAlumnoCheck = $stmtAlumnoCheck->get_result();

if ($resultAlumnoCheck->num_rows > 0) {
    echo "exists";
    $stmtAlumnoCheck->close();
    $conn->close();
    exit();
}

$stmtAlumnoCheck->close();







function insertOrUpdateAlumno($conn, $params) {
    $query = "INSERT INTO alumno (
        usuario_apoderado, usuario_dni_apoderado, usuario_nombre_apoderado,
        tipo_documento, dni, alumno, fecha_nacimiento, usuario, correo,
        password, sexo, rol, foto_do_identidad,
        estado_alumno, foto_libreta, discapacidad,
        tipo_discapacidad, nivel, grado, turno,
        horario, codalu, ano_inscrip, modalidad,
        cant_desc_est, estado, tiempo_espera, fecha_matricula, fecha_aceptacion,
        estado_foto, estado_libreta, perfil
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    // Ajusta la cadena de tipos según la definición de tu tabla
    $stmt->bind_param(
        "ssssissssssbssssssssssssssssssbb", // Cambiado a "b" para longblob
        $params['usuario_apoderado'],
        $params['usuario_dni_apoderado'],
        $params['usuario_nombre_apoderado'],
        $params['tipo_documento'],
        $params['dni'], // 'dni' como entero
        $params['alumno'],
        $params['fecha_nacimiento'],
        $params['usuario_alumno'],
        $params['correo'],
        $params['password'],
        $params['sexo'],
        $params['rol'],
        $params['foto_do_identidad'], // Debe ser un blob
        $params['estado_alumno'],
        $params['foto_libreta'], // Debe ser un blob
        $params['discapacidad'],
        $params['tipo_discapacidad'],
        $params['nivel'],
        $params['grado'],
        $params['turno'],
        $params['horario'],
        $params['codalu'],
        $params['ano_inscrip'],
        $params['modalidad'],
        $params['cant_desc_est'],
        $params['estado'],
        $params['tiempo_espera'],
        $params['fecha_matricula'],
        $params['fecha_aceptacion'],
        $params['estado_foto'],
        $params['estado_libreta'],
        $params['perfil'] // Debe ser un blob
    );

    if (!$stmt->execute()) { // Control de errores en la ejecución
        throw new Exception("Execute failed: " . $stmt->error);
    }

    if ($stmt->affected_rows <= 0) {
        throw new Exception("No rows affected: " . $stmt->error);
    }

    $stmt->close();
}

function updateOrUpdateAlumno($conn, $params) {
    $query = "UPDATE alumno SET
        usuario_apoderado = ?,
        usuario_dni_apoderado = ?,
        usuario_nombre_apoderado = ?,
        tipo_documento = ?,
        dni = ?,
        alumno = ?,
        fecha_nacimiento = ?,
        usuario = ?,
        correo = ?,
        password = ?,
        sexo = ?,
        rol = ?,
        foto_do_identidad = ?,
        estado_alumno = ?,
        discapacidad = ?,
        tipo_discapacidad = ?,
        nivel = ?,
        grado = ?,
        turno = ?,
        horario = ?,
        codalu = ?,
        ano_inscrip = ?,
        modalidad = ?,
        cant_desc_est = ?,
        estado = ?,
        tiempo_espera = ?,
        fecha_matricula = ?,
        fecha_aceptacion = ?,
        estado_foto = ?,
        estado_libreta = ?,
        perfil = ?
    WHERE alumno = ?"; // Aquí se usa el campo `alumno` como identificador.

    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    // Ajusta la cadena de tipos según la definición de tu tabla
    $stmt->bind_param(
        "ssssissssssbssssssssssssssssssb",
        $params['usuario_apoderado'],
        $params['usuario_dni_apoderado'],
        $params['usuario_nombre_apoderado'],
        $params['tipo_documento'],
        $params['dni'], // 'dni' como entero
        $params['alumno'],
        $params['fecha_nacimiento'],
        $params['usuario_alumno'],
        $params['correo'],
        $params['password'],
        $params['sexo'],
        $params['rol'],
        $params['foto_do_identidad'], // Debe ser un blob
        $params['estado_alumno'],
        $params['discapacidad'],
        $params['tipo_discapacidad'],
        $params['nivel'],
        $params['grado'],
        $params['turno'],
        $params['horario'],
        $params['codalu'],
        $params['ano_inscrip'],
        $params['modalidad'],
        $params['cant_desc_est'],
        $params['estado'],
        $params['tiempo_espera'],
        $params['fecha_matricula'],
        $params['fecha_aceptacion'],
        $params['estado_foto'],
        $params['estado_libreta'], // Para la columna de estado de la libreta
        $params['perfil'], // Debe ser un blob
        $params['alumno']  // Este es el identificador en la cláusula WHERE
    );

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    // Comprobar si alguna fila fue afectada
    if ($stmt->affected_rows <= 0) {
        throw new Exception("No rows affected: " . $stmt->error);
    }

    $stmt->close();
}



try {
    // Recibir datos del formulario
    $usuario_apoderadouu = sanitizeInput($_POST['usuario_apoderado']);
    $usuario_apoderado = isset($_POST['usuario_apoderado']) ? sanitizeInput($_POST['usuario_apoderado']) : '';
// Agrega una validación similar para todos los campos.
    $rol = sanitizeInput($_REQUEST['rol']);
    $usuario_dni_apoderado = sanitizeInput($_POST['usuario_dni_apoderado']);
    $usuario_nombre_apoderado = sanitizeInput($_POST['usuario_nombre_apoderado']);
    $tipo_documento = sanitizeInput($_POST['tipo_documento']);
    $dni = sanitizeInput($_POST['dni']);
    $apellido_paterno = sanitizeInput($_POST['apellido_paterno']);
    $apellido_materno = sanitizeInput($_POST['apellido_materno']);
    $nombres = sanitizeInput($_POST['nombres']);
    $fecha_nacimiento = sanitizeInput($_POST['fecha_nacimiento']);
    $usuario_alumno = sanitizeInput($_POST['usuario_alumno']);
    $correo = sanitizeInput($_POST['correo']);
    $password = sanitizeInput($_POST['password']);
    $sexo = sanitizeInput($_POST['sexo']);
    $discapacidad = sanitizeInput($_POST['discapacidad']);
    $tipo_discapacidad = $discapacidad === "SI" ? sanitizeInput($_POST['tipo_discapacidad']) : "Ninguno";
    $nivel = sanitizeInput($_POST['niveles']);
    $grado = isset($_POST['grados']) ? sanitizeInput($_POST['grados']) : null; // Asegúrate de definirlo antes de usarlo.


    $codalu = sanitizeInput($_POST['codalu']);
    $estado_alumno = sanitizeInput($_POST['estado_alumno']);

    // Concatenar apellido y nombre para obtener el nombre completo del alumno
    $alumno = "$apellido_paterno $apellido_materno $nombres";


    // Definir turno y estado de la foto
    $turno = "mañana";
    $estado_foto = "SUBIDO";
    $estado_libreta = "SUBIDO";

    // Obtener el año de inscripción actual
    $ano_inscrip = date('Y');
    // Definir la modalidad
    $modalidad = "Presencial";
    // Obtener la fecha actual y añadir 3 días
    $fecha_actual_peru = getCurrentDate();
    $tiempo_espera = addDaysToDate($fecha_actual_peru, 3);
    
    $fecha_matricula = getCurrentDate();
    
    $fecha_aceptacion = "0000-00-00";

    // Consultar la cantidad de descuentos y alumnos ordinarios
    $qlee = $conn->prepare("SELECT c.id, c.nivel, TIME_FORMAT(c.hora_i, '%h:%i %p') AS hora_ic, TIME_FORMAT(c.hora_f, '%h:%i %p') AS hora_fc, c.dia_p, c.dia_s, c.cant_desc_est, c.cant_or FROM colegio c WHERE c.nivel = ?");
    $qlee->bind_param("s", $nivel);
    $qlee->execute();
    $resultadoddee = $qlee->get_result();
    $rowddee = $resultadoddee->fetch_assoc();

    $cant_desc_estee = $rowddee['cant_desc_est'];
    $cant_or = $rowddee['cant_or'];

    // Verificar si hay vacantes disponibles
    if ($cant_desc_estee == 0) {
        echo "error";
        exit;
    } elseif ($cant_desc_estee <= $cant_or) {
        $foto_do_identidad = handleFileUpload($_FILES['foto_do_identidad']);
        $foto_libreta = isset($_FILES['foto_libreta']) && !empty($_FILES['foto_libreta']['tmp_name']) ? handleFileUpload($_FILES['foto_libreta']) : null;

        if ($estado_alumno == "Antiguo") {
            
            $estado_libretadd = "SUBIDO";

            $dia_p = $rowddee['dia_p'];
            $dia_s = $rowddee['dia_s'];
            $hora_i = $rowddee['hora_ic'];
            $hora_f = $rowddee['hora_fc'];
            $horario = "$dia_p-$dia_s: $hora_i - $hora_f";

            $qleed = $conn->prepare("SELECT c.id, c.cant_desc_est FROM colegio c WHERE c.nivel = ?");
            $qleed->bind_param("s", $nivel);
            $qleed->execute();
            $resultadoddeed = $qleed->get_result();
            $rowddeed = $resultadoddeed->fetch_assoc();

            $cant_desc_ested = $rowddeed['cant_desc_est'];

            $params = [
                'usuario_apoderado' => $usuario_apoderado,
                'usuario_dni_apoderado' => $usuario_dni_apoderado,
                'usuario_nombre_apoderado' => $usuario_nombre_apoderado,
                'tipo_documento' => $tipo_documento,
                'dni' => $dni,
                'alumno' => $alumno,
                'fecha_nacimiento' => $fecha_nacimiento,
                'usuario_alumno' => $usuario_alumno,
                'correo' => $correo,
                'password' => $password,
                'sexo' => $sexo,
                'rol' => "alumno",
                'foto_do_identidad' => $foto_do_identidad,
                'estado_alumno' => $estado_alumno,
                'foto_libreta' => $foto_libreta,
                'discapacidad' => $discapacidad,
                'tipo_discapacidad' => $tipo_discapacidad,
                'nivel' => $nivel,
                'grado' => $grado,
                'turno' => $turno,
                'horario' => $horario,
                'codalu' => $codalu,
                'ano_inscrip' => $ano_inscrip,
                'modalidad' => $modalidad,
                'cant_desc_est' => $cant_desc_ested,
                'estado' => "en proceso",
                'tiempo_espera' => $tiempo_espera,
                'fecha_matricula' => $fecha_matricula,
                'fecha_aceptacion' => $fecha_aceptacion,
                'estado_foto' => $estado_foto,
                'estado_libreta' => $estado_libretadd,
                'perfil' => null
            ];

            updateOrUpdateAlumno($conn, $params);
            
            

        

            $usuarioan = $_REQUEST['usuario'];
                header("Location: ../apoderado/apoderado-matricula.php?usuario=$usuarioan");
            exit;
        } elseif ($estado_alumno == "Nuevo") {
            if ($foto_libreta) {
                $gradot = sanitizeInput($_POST['grados']);
                
                 // Consultar la cantidad de descuentos y alumnos ordinarios
    $qlee = $conn->prepare("SELECT c.id, c.nivel, TIME_FORMAT(c.hora_i, '%h:%i %p') AS hora_ic, TIME_FORMAT(c.hora_f, '%h:%i %p') AS hora_fc, c.dia_p, c.dia_s, c.cant_desc_est, c.cant_or FROM colegio c WHERE c.nivel = ?");
    $qlee->bind_param("s", $nivel);
    $qlee->execute();
    $resultadoddee = $qlee->get_result();
    $rowddee = $resultadoddee->fetch_assoc();
                
                
                
                $dia_p = $rowddee['dia_p'];
            $dia_s = $rowddee['dia_s'];
            $hora_i = $rowddee['hora_ic'];
            $hora_f = $rowddee['hora_fc'];
            $horario = "$dia_p-$dia_s: $hora_i - $hora_f";
                $nivel = sanitizeInput($_POST['niveles']);
                $qlrdd = $conn->prepare("UPDATE colegio SET cant_desc_est = $cant_desc_estee - 1 WHERE nivel = ?");
                $qlrdd->bind_param("s", $nivel);
                $qlrdd->execute();
                
                $nivelt = sanitizeInput($_POST['niveles']);
                 $qltt = $conn->prepare("SELECT c.id, c.nivel, TIME_FORMAT(c.hora_i, '%h:%i %p') AS hora_ic, TIME_FORMAT(c.hora_f, '%h:%i %p') AS hora_fc, c.dia_p, c.dia_s, c.cant_desc_est, c.cant_or FROM colegio c WHERE c.nivel = ?");
    $qltt->bind_param("s", $nivelt);
    $qltt->execute();
    $resultadott = $qltt->get_result();
    $rowtt = $resultadott->fetch_assoc();
                
                
                
                $cant_desc_esteerr = $rowtt['cant_desc_est'];
                
                
                $params = [
                    'usuario_apoderado' => $usuario_apoderado,
                    'usuario_dni_apoderado' => $usuario_dni_apoderado,
                    'usuario_nombre_apoderado' => $usuario_nombre_apoderado,
                    'tipo_documento' => $tipo_documento,
                    'dni' => $dni,
                    'alumno' => $alumno,
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'usuario_alumno' => $usuario_alumno,
                    'correo' => $correo,
                    'password' => $password,
                    'sexo' => $sexo,
                    'rol' => "alumno",
                    'foto_do_identidad' => $foto_do_identidad,
                    'estado_alumno' => $estado_alumno,
                    'foto_libreta' => $foto_libreta,
                    'discapacidad' => $discapacidad,
                    'tipo_discapacidad' => $tipo_discapacidad,
                    'nivel' => $nivel,
                    'grado' => $gradot,
                    'turno' => $turno,
                    'horario' => $horario,
                    'codalu' => $codalu,
                    'ano_inscrip' => $ano_inscrip,
                    'modalidad' => $modalidad,
                    'cant_desc_est' => $cant_desc_esteerr,
                    'estado' => "en proceso",
                    'tiempo_espera' => $tiempo_espera,
                    'fecha_matricula' => $fecha_matricula,
                    'fecha_aceptacion' => $fecha_aceptacion,
                    'estado_foto' => $estado_foto,
                    'estado_libreta' => $estado_libreta,
                    'perfil' => null
                ];

                insertOrUpdateAlumno($conn, $params);
                

        $rol="alumno";
        $ruta = "../alumno/panel_alumno.php";
        // Insertar datos del alumno en la base de datos
        $queryUsuario = "INSERT INTO usuario (correo, clave, usuario,usuario_apalum,rol,ruta) 
        VALUES ('$correo','$password','$usuario_alumno','$usuario_apoderadouu','$rol','$ruta')";
        $resultadoUsuario = $conn->query($queryUsuario);

                $usuarioan = $_REQUEST['usuario'];
                header("Location: ../apoderado/apoderado-matricula.php?usuario=$usuarioan");
                exit;
            } else {
                echo "Error al cargar la foto de la libreta.";
                exit;
            }
        }
    } else {
        echo "No hay vacantes disponibles.";
    }
  
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
