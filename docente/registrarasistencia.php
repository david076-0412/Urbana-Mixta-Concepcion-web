<?php
include('../conexion.php');

if (
    empty($_POST['docente']) && empty($_POST['curso']) &&
    empty($_POST['niveles']) && empty($_POST['grados']) &&
    empty($_POST['tema']) &&
    empty($_POST['usuario']) &&
    empty($_POST['hora_inicio']) &&
    empty($_POST['hora_fin']) &&
    empty($_POST['fecha_inicio']) &&
    empty($_POST['fecha_asis']) &&
    empty($_POST['fecha_fin'])
) {
    echo "Por favor llene los campos correspondientes";
} else {

    $usuario = $_REQUEST['usuario'];
    $docente = $_POST['docente'];
    $curso = $_POST['curso'];
    $nivel_p = $_POST['niveles'];
    $grado_p = $_POST['grados'];
    $tema = $_POST['tema'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_asis = $_POST['fecha_asis'];
    $fecha_fin = $_POST['fecha_fin'];
    $dia = $_POST['dia'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];

    $horaFormateada_inicio = date("h:i A", strtotime($hora_inicio));
    $horaFormateada_fin = date("h:i A", strtotime($hora_fin));
    $hora = $horaFormateada_inicio . " - " . $horaFormateada_fin;

    $usuario_docente = $_POST['usuario_docente'];

    // Recoge los datos del formulario
    $alumnos = isset($_POST['alumnos']) ? $_POST['alumnos'] : [];
    $tipoasistencias = isset($_POST['tipoasistencia']) ? $_POST['tipoasistencia'] : [];

    // Depuración
    echo "<pre>";
    echo "Alumnos: ";
    print_r($alumnos);
    echo "Tipo de Asistencias: ";
    print_r($tipoasistencias);
    echo "</pre>";

    // Verifica si el número de tipos de asistencia coincide con el número de alumnos
    if (count($alumnos) != count($tipoasistencias)) {
        die("Error: Los datos de alumnos y tipo de asistencia no coinciden.");
    }

    $resultado = true;

    for ($i = 0; $i < count($alumnos); $i++) {
        $alumno = mysqli_real_escape_string($conexion, $alumnos[$i]);
        $tipoasistencia = mysqli_real_escape_string($conexion, $tipoasistencias[$i]);

        // Obtiene datos de usuario del alumno
        $query_alumno = "SELECT a.usuario, a.nivel, a.grado FROM alumno a WHERE a.alumno='$alumno'";
        $resultado_usuario_alumno = $conexion->query($query_alumno);
        $fila_usuario_alumno = $resultado_usuario_alumno->fetch_assoc();
        $usuario_alumno = $fila_usuario_alumno['usuario'];

        // Obtiene el usuario apoderado
        $query_apoderado = "SELECT a.usuario_apoderado FROM alumno a WHERE a.alumno='$alumno'";
        $resultado_apoderado = $conexion->query($query_apoderado);
        $fila_apoderado = $resultado_apoderado->fetch_assoc();
        $usuario_apoderado = $fila_apoderado['usuario_apoderado'];

        // Inserta en la base de datos
        $sqlAsistencia = "INSERT INTO asistencia (
            alumno,
            docente,
            curso,
            nivel,
            tema,
            grado,
            tipoasistencia,
            fecha_inicio,
            fecha_asis,
            fecha_fin,
            dia,
            hora,
            usuario,
            usuario_apoderado,
            usuario_docente
            ) 
            VALUES (
            '$alumno',
            '$docente',
            '$curso',
            '$nivel_p',
            '$tema',
            '$grado_p',
            '$tipoasistencia',
            '$fecha_inicio',
            '$fecha_asis',
            '$fecha_fin',
            '$dia',
            '$hora',
            '$usuario_alumno',
            '$usuario_apoderado',
            '$usuario_docente')";

        if (!mysqli_query($conexion, $sqlAsistencia)) {
            $resultado = false;
            break;
        }
    }

    // Redirige al usuario dependiendo del resultado
    if ($resultado) {
        header("Location: ../docente/docente-asistencia.php?usuario=$usuario&docente=$docente");
    } else {
        echo "Error en la inserción de datos.";
        // Opción para redirigir con un mensaje de error
        // header("Location: ../docente/docente-asistencia.php?usuario=$usuario&docente=$docente&error=1");
    }
}
?>


