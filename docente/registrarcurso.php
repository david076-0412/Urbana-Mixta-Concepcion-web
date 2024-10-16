<?php

include('../conexion.php');



$usuario = $_REQUEST['usuario'];
$usuario_nivel = $_REQUEST['usuario_nivel'];




$curso = $_POST['nombre'];
$tema = $_POST['tema'];
$apellido_paterno_docente = $_POST['apellido_paterno_docente'];
$apellido_materno_docente = $_POST['apellido_materno_docente'];
$nombres_docente = $_POST['nombres_docente'];


$docente = $apellido_paterno_docente . " " . $apellido_materno_docente . " " . $nombres_docente;


$niveles = $_POST['niveles'];

if($niveles == "Primaria"){
    $usuario_admin="adminprimaria";
}else if($niveles == "Secundaria"){
    $usuario_admin="adminsecundaria";
    
}
$grados = $_POST['grados'];


$alumnos_seleccionados = $_POST['alumnos'];

// Obtener la fecha actual
$fechaActual = date('Y-m-d');

// Extraer solo el año
$ano_inscrip = date('Y', strtotime($fechaActual));

//$usuario_apoderado= $_POST['usuario_apoderado'];


//$usuario_alumno = $_POST['usuario_alumno'];


$subir_material = file_get_contents($_FILES['subir_material']['tmp_name']);



$usuario_docente = $_POST['usuario_docente'];


// Realizar la inserción en la base de datos
foreach ($alumnos_seleccionados as $alumno_id) {


    $query_alumno = "SELECT a.usuario from alumno a WHERE a.alumno='$alumno_id'";
    $resultado_usuario_alumno = $conexion->query($query_alumno);

    $fila_usuario_alumno = $resultado_usuario_alumno->fetch_assoc();

    $usuario_alumno = $fila_usuario_alumno['usuario'];


    $query_apoderado = "SELECT a.usuario_apoderado from alumno a WHERE a.alumno='$alumno_id'";
    $resultado_usuario_apoderado = $conexion->query($query_apoderado);

    $fila_usuario_apoderado = $resultado_usuario_apoderado->fetch_assoc();

    $usuario_apoderado = $fila_usuario_apoderado['usuario_apoderado'];


$estado_material="SUBIDO";

    $query = "INSERT INTO curso (
    nombre, tema, docente, nivel, 
    grado, turno, modalidad,alumno, 
    ano_inscrip, 
    usuario_apoderado,
    usuario_alumno,
    usuario_docente,
    usuario_admin,
    estado_material,
    archivomaterial)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";


    $turno = "mañana";
    $modalidad = "Presencial";


    $stmt = $conn->prepare($query);

    // Vincular parámetros
    $stmt->bind_param(
        "sssssssssssssss",
        $curso,
        $tema,
        $docente,
        $niveles,
        $grados,
        $turno,
        $modalidad,
        $alumno_id,
        $ano_inscrip,
        $usuario_apoderado,
        $usuario_alumno,
        $usuario_docente,
        $usuario_admin,
        $estado_material,
        $subir_material
    );

    try {
        // Ejecutar la consulta
        $stmt->execute();
        header("Location: ../administrador/admin-curso-material.php?usuario=$usuario&usuario_docente=$usuario_docente");
        // Verificar el resultado de la ejecución

    } catch (Exception $e) {
        // Manejar la excepción, puedes loguear o mostrar un mensaje de error personalizado.
        echo "Error: " . $e->getMessage();
    }
}



// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
