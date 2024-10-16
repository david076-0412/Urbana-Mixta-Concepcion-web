<?php

include "../conexion.php";

session_start();

if (isset($_SESSION['admin']['usuario'])) {
    // El usuario está autenticado como admin, puedes continuar con la ejecución del código
} else {
    header('Location: ../loginadmin.php'); // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión
    exit();
}

?>






<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Administrador</title>
    <link rel="stylesheet" href="../administrador/css/bootstrap.minsl.css">
    <!----css3---->
    <link rel="stylesheet" href="../administrador/css/custom.css">


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="../administrador/images/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />


    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


    <link href="../DataTables/datatables.min.css" rel="stylesheet">



    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        h1,
        h2,
        h4 {

            text-transform: none;
            /* Esta propiedad quita cualquier transformación del texto */

        }


        td {

            text-transform: none;
            /* Esta propiedad quita cualquier transformación del texto */

        }

        table {
            width: 100%;
            text-align: center;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        
/* Personalización de la barra de desplazamiento en Webkit */
::-webkit-scrollbar {
    width: 12px; /* Ancho de la barra de desplazamiento */
    background-color: #e0f7fa; /* Color de fondo celeste claro */
}

::-webkit-scrollbar-thumb {
    background-color: #00bcd4; /* Color del "pulgar" celeste */
    border-radius: 6px; /* Bordes redondeados para el "pulgar" */
    transition: background-color 0.3s; /* Transición suave para el color */
}

::-webkit-scrollbar-thumb:hover {
    background-color: #0097a7; /* Color del "pulgar" cuando el cursor pasa sobre él */
}

::-webkit-scrollbar-track {
    background-color: #e0f7fa; /* Color de la pista celeste claro */
}
    </style>





</head>

<body style="background-image: url('images/fondo-admin.jpg'); background-size: cover; background-position: center; height: 100vh;">






    <div class="wrapper">
        <?php include('../administrador/Modal/ModalFacebook.php'); ?>
        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        <div id="sidebar">
            <div class="sidebar-header">
                <style>
  h3 {
    display: flex; /* Usamos flexbox para alinear los elementos en una sola línea */
    align-items: center; /* Alinea verticalmente los elementos en el centro */
  }

  h3 img {
    margin-right: 10px; /* Espacio entre la imagen y el texto */
  }
</style>
                <h3><img src="../administrador/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>
            </div>
            <ul class="list-unstyled component m-0">




                <li class="dropdown">
                    <a href="../administrador/panel_admin.php?usuario=<?php
                                                                        $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">school</i>
                        Colegio</a>
                </li>





                <li class="dropdown">


                    <a href="../administrador/admin-docente.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">work</i>
                        Docentes</a>


                </li>



                <li class="dropdown">
                    <a href="../administrador/admin-apoderado.php?usuario=<?php $usuario =$_SESSION['admin']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">portrait</i>
                        Apoderados</a>
                </li>



                <li class="dropdown">

                    <a href="../administrador/admin-horario.php?usuario=<?php
                                                                        $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">schedule</i>
                        Horarios</a>



                </li>



                <li class="dropdown">


                    <?php $usuario = $_SESSION['admin']['usuario']; ?>
                    <a href="../administrador/admin-reporte.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>&nivel=<?php
                                                                                                    if ($usuario == "adminprimaria") {
                                                                                                        echo "Primaria";
                                                                                                    } else if ($usuario == "adminsecundaria") {
                                                                                                        echo "Secundaria";
                                                                                                    }


                                                                                                    ?>" class="dashboard"><i class="material-icons">equalizer</i>
                        Reportes</a>





                </li>
                
                
                <li class="active">


                    <?php $usuario = $_SESSION['admin']['usuario']; ?>
                    <a href="../administrador/admin-encuestas.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>&nivel=<?php
                                                                                                    if ($usuario == "adminprimaria") {
                                                                                                        echo "Primaria";
                                                                                                    } else if ($usuario == "adminsecundaria") {
                                                                                                        echo "Secundaria";
                                                                                                    }


                                                                                                    ?>" class="dashboard"><i class="material-icons">poll</i>

                        Encuestas</a>





                </li>





            </ul>

        </div>

        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content" style="background-color: transparent;">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-3 order-3 order-md-2">

                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">




                                        <li class="dropdown nav-item">



                                            <?php


                                            include('../conexion.php');

                                            $usuario = $_SESSION['admin']['usuario'];


                                            $query = "SELECT perfil,usuario FROM admin WHERE usuario ='$usuario'";

                                            $resultado = mysqli_query($conexion, $query); // Asegúrate de tener una conexión establecida antes de ejecutar la consulta
                                            $fila = mysqli_fetch_assoc($resultado);


                                            ?>



                                            <?php

                                            $imagen_perfil = $fila['perfil'];


                                            if ($imagen_perfil != NULL) {
                                            ?>



                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                    <img src="data:image/jpeg;base64,<?= base64_encode($fila['perfil']) ?>" style="width:40px; border-radius:50%;" />
                                                    <span class="xp-user-live"></span>
                                                </a>



                                            <?php

                                            } else {
                                            ?>

                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                    <img src="../administrador/images/user.png" style="width:40px; border-radius:50%;" />
                                                    <span class="xp-user-live"></span>
                                                </a>

                                            <?php

                                            }

                                            ?>







                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="../administrador/admin-perfil.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                        echo "$usuario"; ?>">
                                                        <span class="material-icons">person_outline</span>
                                                        Perfil
                                                    </a></li>

                                                <li><a href="../logoutadmin.php?rol=admin">
                                                        <span class="material-icons">logout</span>
                                                        Cerrar Sesion
                                                    </a></li>

                                            </ul>
                                        </li>







                                    </ul>
                                </nav>
                            </div>
                        </div>





                    </div>




                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Encuestas</h4>

                        <ol class="breadcrumb">

                            <!--
					<li class="breadcrumb-item"><a href="listarcursosalumnos.php">Cursos</a></li>
					<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
					-->

                        </ol>
                    </div>





                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->

            <div class="main-content">






                <div class="col-md-12">


                    <?php

                    include('../conexion.php');


                    ?>



                    <div class="row clearfix">
                        
<?php
include "../conexion.php"; // Incluimos la conexión a la base de datos

// Consulta SQL para contar cuántos usuarios respondieron cada opción específica, agrupando por la columna 'meses'
$sqlpregunta1 = "SELECT Pregunta_1, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_1, meses";
$resultadopregunta1 = $conn->query($sqlpregunta1);

$respuestaspregunta1 = [];
$cantidadespregunta1 = [];
$dataMapPregunta1 = []; // Mapa para almacenar datos agrupados

// Guardar los datos extraídos en arrays y en el mapa
while ($rowpregunta1 = $resultadopregunta1->fetch_assoc()) {
    $respuestaspregunta1[] = $rowpregunta1['Pregunta_1'];  // Guarda las respuestas
    $cantidadespregunta1[] = $rowpregunta1['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta1[$rowpregunta1['meses']][$rowpregunta1['Pregunta_1']] = $rowpregunta1['cantidad'];
}

// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la segunda pregunta
$sqlpregunta2 = "SELECT Pregunta_2, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_2, meses";
$resultadopregunta2 = $conn->query($sqlpregunta2);

$respuestaspregunta2 = [];
$cantidadespregunta2 = [];
$dataMapPregunta2 = []; // Mapa para almacenar datos agrupados para la segunda pregunta

// Guardar los datos extraídos en arrays y en el mapa
while ($rowpregunta2 = $resultadopregunta2->fetch_assoc()) {
    $respuestaspregunta2[] = $rowpregunta2['Pregunta_2'];  // Guarda las respuestas
    $cantidadespregunta2[] = $rowpregunta2['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta2[$rowpregunta2['meses']][$rowpregunta2['Pregunta_2']] = $rowpregunta2['cantidad'];
}


// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la segunda pregunta
$sqlpregunta3 = "SELECT Pregunta_3, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_3, meses";
$resultadopregunta3 = $conn->query($sqlpregunta3);

$respuestaspregunta3 = [];
$cantidadespregunta3 = [];
$dataMapPregunta3 = []; // Mapa para almacenar datos agrupados para la segunda pregunta

// Guardar los datos extraídos en arrays y en el mapa
while ($rowpregunta3 = $resultadopregunta3->fetch_assoc()) {
    $respuestaspregunta3[] = $rowpregunta3['Pregunta_3'];  // Guarda las respuestas
    $cantidadespregunta3[] = $rowpregunta3['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta3[$rowpregunta3['meses']][$rowpregunta3['Pregunta_3']] = $rowpregunta3['cantidad'];
}


// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la cuarta pregunta, agrupando por meses
$sql = "SELECT Pregunta_4, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_4, meses";

$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta4 = []; // Mapa para almacenar datos agrupados para la cuarta pregunta

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_4'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta4[$row['meses']][$row['Pregunta_4']] = $row['cantidad'];
}



// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la Pregunta 5
$sql = "SELECT Pregunta_5, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_5, meses";

$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta5 = []; // Mapa para almacenar datos agrupados para la Pregunta 5

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_5'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta5[$row['meses']][$row['Pregunta_5']] = $row['cantidad']; // Agrupa por meses y respuesta
}


// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la sexta pregunta
$sql = "SELECT Pregunta_6, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_6, meses";
$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta6 = []; // Mapa para almacenar datos agrupados para la sexta pregunta

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_6'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta6[$row['meses']][$row['Pregunta_6']] = $row['cantidad'];
}


// Consulta SQL para contar cuántos usuarios respondieron cada opción específica, agrupando también por meses
$sql = "SELECT Pregunta_7, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_7, meses";

$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta7 = []; // Mapa para almacenar datos agrupados

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_7'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta7[$row['meses']][$row['Pregunta_7']] = $row['cantidad']; // Agrupación por meses
}

// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la pregunta 8
$sql = "SELECT Pregunta_8, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_8, meses";

$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta8 = []; // Mapa para almacenar datos agrupados para la pregunta 8

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_8'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta8[$row['meses']][$row['Pregunta_8']] = $row['cantidad'];
}



// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la Pregunta 9, agrupado por meses
$sql = "SELECT Pregunta_9, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_9, meses";
$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta9 = []; // Mapa para almacenar datos agrupados para la Pregunta 9

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_9'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];    // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta9[$row['meses']][$row['Pregunta_9']] = $row['cantidad']; // Agrupa por meses
}


// Consulta SQL para contar cuántos usuarios respondieron cada opción específica para la décima pregunta
$sql = "SELECT Pregunta_10, COUNT(*) AS cantidad, meses 
FROM encuestas 
WHERE estado_encuesta = 'Ya encuestado' 
GROUP BY Pregunta_10, meses";

$resultado = $conn->query($sql);

$respuestas = [];
$cantidades = [];
$dataMapPregunta10 = []; // Mapa para almacenar datos agrupados para la décima pregunta

// Guardar los datos extraídos en arrays y en el mapa
while ($row = $resultado->fetch_assoc()) {
    $respuestas[] = $row['Pregunta_10'];  // Guarda las respuestas
    $cantidades[] = $row['cantidad'];      // Guarda cuántos usuarios respondieron cada opción
    $dataMapPregunta10[$row['meses']][$row['Pregunta_10']] = $row['cantidad']; // Agrupando por meses
}




?>

<style>
    /* Estilo general del contenedor del select */
    .select-container {
        display: flex;
        justify-content: center; /* Centra el select */
        margin: 20px 0; /* Espacio arriba y abajo */
    }

    /* Estilo del select */
    select {
        padding: 10px 15px; /* Espacio interno */
        border: 2px solid #007bff; /* Color del borde */
        border-radius: 5px; /* Bordes redondeados */
        background-color: #f8f9fa; /* Color de fondo */
        color: #333; /* Color del texto */
        font-size: 16px; /* Tamaño de la fuente */
        transition: border-color 0.3s, background-color 0.3s; /* Transición suave para efectos */
        outline: none; /* Sin borde al enfocar */
    }

    /* Estilo al pasar el mouse */
    select:hover {
        border-color: #0056b3; /* Color del borde al pasar el mouse */
    }

    /* Estilo al enfocar */
    select:focus {
        border-color: #0056b3; /* Color del borde al enfocar */
        background-color: #ffffff; /* Color de fondo al enfocar */
    }
</style>

<div style="width: 100%; max-width: 600px; margin: 0 auto;">
<div class="select-container">
    <select id="mesSelectPregunta1" onchange="filterTransactionsPregunta1()">
        <option value="todos">Todos los meses</option>
        <option value="Enero">Enero</option>
        <option value="Febrero">Febrero</option>
        <option value="Marzo">Marzo</option>
        <option value="Abril">Abril</option>
        <option value="Mayo">Mayo</option>
        <option value="Junio">Junio</option>
        <option value="Julio">Julio</option>
        <option value="Agosto">Agosto</option>
        <option value="Septiembre">Septiembre</option>
        <option value="Octubre">Octubre</option>
        <option value="Noviembre">Noviembre</option>
        <option value="Diciembre">Diciembre</option>
    </select>
</div>

</div>

<p>1. ¿Qué tan conforme se siente con la simplicidad del proceso de matrícula tras la implementación del sistema inteligente?</p>





<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart1"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript para la primera pregunta
    var respuestas1 = <?php echo json_encode($respuestaspregunta1); ?>; 
    var cantidades1 = <?php echo json_encode($cantidadespregunta1); ?>;
    var dataMapPregunta1 = <?php echo json_encode($dataMapPregunta1); ?>; // Mapa de datos agrupados por mes

    // Inicializar el gráfico sin filtro al cargar la página
    var chart1 = createChart(respuestas1, cantidades1);

    function createChart(respuestas, cantidades) {
        var ctx1 = document.getElementById('respuestasChart1').getContext('2d');
        return new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: respuestas,
                datasets: [{
                    label: 'Respuestas de la Pregunta 1',
                    data: cantidades,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)', 
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 205, 86, 0.4)', 
                        'rgba(75, 192, 192, 0.4)', 
                        'rgba(54, 162, 235, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', 
                        'rgba(255, 159, 64, 1)', 
                        'rgba(255, 205, 86, 1)', 
                        'rgba(75, 192, 192, 1)', 
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) { 
                                if (Number.isInteger(value)) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta1() {
        const selectedMonth = document.getElementById('mesSelectPregunta1').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas1;
            filteredCantidades = cantidades1;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta1[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        chart1.destroy();
        chart1 = createChart(filteredRespuestas, filteredCantidades);
    }
</script>
<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    
  <div class="select-container">
    <select id="mesSelectPregunta2" onchange="filterTransactionsPregunta2()">
        <option value="todos">Todos los meses</option>
        <option value="Enero">Enero</option>
        <option value="Febrero">Febrero</option>
        <option value="Marzo">Marzo</option>
        <option value="Abril">Abril</option>
        <option value="Mayo">Mayo</option>
        <option value="Junio">Junio</option>
        <option value="Julio">Julio</option>
        <option value="Agosto">Agosto</option>
        <option value="Septiembre">Septiembre</option>
        <option value="Octubre">Octubre</option>
        <option value="Noviembre">Noviembre</option>
        <option value="Diciembre">Diciembre</option>
    </select>  
    
    
    </div>


</div>
<p>2. ¿Cómo evaluaría su nivel de agrado con la rapidez del proceso de matrícula utilizando el sistema inteligente?</p>
<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart2"></canvas>
</div>

<script>
    // Datos de PHP convertidos a formato JavaScript para la segunda pregunta
    var respuestas2 = <?php echo json_encode($respuestaspregunta2); ?>; 
    var cantidades2 = <?php echo json_encode($cantidadespregunta2); ?>;
    var dataMapPregunta2 = <?php echo json_encode($dataMapPregunta2); ?>; // Mapa de datos agrupados por mes para la segunda pregunta

    // Inicializar el gráfico sin filtro al cargar la página
    var chart2 = createChartPregunta2(respuestas2, cantidades2);

    function createChartPregunta2(respuestas, cantidades) {
        var ctx2 = document.getElementById('respuestasChart2').getContext('2d');
        return new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: respuestas,
                datasets: [{
                    label: 'Respuestas de la Pregunta 2',
                    data: cantidades,
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.4)', 
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)', 
                        'rgba(255, 205, 86, 0.4)', 
                        'rgba(75, 192, 192, 0.4)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)', 
                        'rgba(255, 99, 132, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(255, 205, 86, 1)', 
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) { 
                                if (Number.isInteger(value)) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta2() {
        const selectedMonth = document.getElementById('mesSelectPregunta2').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas2;
            filteredCantidades = cantidades2;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta2[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        chart2.destroy();
        chart2 = createChartPregunta2(filteredRespuestas, filteredCantidades);
    }
</script>


<br>

<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta3" onchange="filterTransactionsPregunta3()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>3. ¿Qué tan satisfecho/a está con la claridad de la información proporcionada por el sistema durante la matrícula?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart3"></canvas>
</div>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas3 = <?php echo json_encode($respuestaspregunta3); ?>;  // Opciones de respuestas
    var cantidades3 = <?php echo json_encode($cantidadespregunta3); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta3 = <?php echo json_encode($dataMapPregunta3); ?>; // Mapa de datos agrupados por mes para la segunda pregunta

    

    // Inicializar el gráfico sin filtro al cargar la página
    var chart3 = createChartPregunta3(respuestas3, cantidades3);

    function createChartPregunta3(respuestas, cantidades) {
        var ctx3 = document.getElementById('respuestasChart3').getContext('2d');
        return new Chart(ctx3, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 3', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.4)', 
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(54, 162, 235, 0.4)', 
                        'rgba(255, 205, 86, 0.4)', 
                        'rgba(75, 192, 192, 0.4)'
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)', 
                        'rgba(255, 99, 132, 1)', 
                        'rgba(54, 162, 235, 1)', 
                        'rgba(255, 205, 86, 1)', 
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta3() {
        const selectedMonth = document.getElementById('mesSelectPregunta3').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas3;
            filteredCantidades = cantidades3;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta3[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart3) { // Asegurarse de que chart3 está definido
            chart3.destroy();
        }
        chart3 = createChartPregunta3(filteredRespuestas, filteredCantidades);
    }
</script>


<br>


<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta4" onchange="filterTransactionsPregunta4()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>4. ¿Qué tan complacido/a está con la accesibilidad del sistema inteligente para realizar la matrícula?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart4"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas4 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades4 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta4 = <?php echo json_encode($dataMapPregunta4); ?>; // Mapa de datos agrupados por mes

    // Asignamos colores claros para cada respuesta
    var colores = [
        'rgba(255, 99, 132, 0.4)',  // Nada Satisfecho - rojo claro
        'rgba(255, 159, 64, 0.4)',  // Un Poco Satisfecho - naranja claro
        'rgba(255, 205, 86, 0.4)',  // Satisfecho - amarillo claro
        'rgba(75, 192, 192, 0.4)',  // Muy Satisfecho - verde claro
        'rgba(54, 162, 235, 0.4)'   // Totalmente Satisfecho - azul claro
    ];

    // Borde para cada barra
    var borderColors = [
        'rgba(255, 99, 132, 1)',  // Borde rojo
        'rgba(255, 159, 64, 1)',  // Borde naranja
        'rgba(255, 205, 86, 1)',  // Borde amarillo
        'rgba(75, 192, 192, 1)',  // Borde verde
        'rgba(54, 162, 235, 1)'   // Borde azul
    ];

    // Inicializar el gráfico sin filtro al cargar la página
    var chart4 = createChartPregunta4(respuestas4, cantidades4);

    function createChartPregunta4(respuestas, cantidades) {
        var ctx4 = document.getElementById('respuestasChart4').getContext('2d');
        return new Chart(ctx4, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 4', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: colores.slice(0, respuestas.length),  // Colores claros
                    borderColor: borderColors.slice(0, respuestas.length), // Bordes más oscuros
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta4() {
        const selectedMonth = document.getElementById('mesSelectPregunta4').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas4;
            filteredCantidades = cantidades4;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta4[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart4) { // Asegurarse de que chart4 está definido
            chart4.destroy();
        }
        chart4 = createChartPregunta4(filteredRespuestas, filteredCantidades);
    }
</script>


<br>
<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta5" onchange="filterTransactionsPregunta5()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>5. ¿Qué tan bien atendido/a se sintió con el soporte técnico recibido durante el uso del sistema inteligente?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart5"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas5 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades5 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta5 = <?php echo json_encode($dataMapPregunta5); ?>; // Mapa de datos agrupados por mes para la pregunta 5

    // Colores para cada respuesta
    var colores = [
        'rgba(255, 99, 132, 0.4)',  // Nada Satisfecho - rojo claro
        'rgba(255, 159, 64, 0.4)',  // Un Poco Satisfecho - naranja claro
        'rgba(255, 205, 86, 0.4)',  // Satisfecho - amarillo claro
        'rgba(75, 192, 192, 0.4)',  // Muy Satisfecho - verde claro
        'rgba(54, 162, 235, 0.4)'   // Totalmente Satisfecho - azul claro
    ];

    // Bordes para cada barra
    var borderColors = [
        'rgba(255, 99, 132, 1)',  // Borde rojo
        'rgba(255, 159, 64, 1)',  // Borde naranja
        'rgba(255, 205, 86, 1)',  // Borde amarillo
        'rgba(75, 192, 192, 1)',  // Borde verde
        'rgba(54, 162, 235, 1)'   // Borde azul
    ];

    // Inicializar el gráfico sin filtro al cargar la página
    var chart5 = createChartPregunta5(respuestas5, cantidades5);

    function createChartPregunta5(respuestas, cantidades) {
        var ctx5 = document.getElementById('respuestasChart5').getContext('2d');
        return new Chart(ctx5, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 5', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: colores.slice(0, respuestas.length),  // Colores claros
                    borderColor: borderColors.slice(0, respuestas.length), // Bordes más oscuros
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta5() {
        const selectedMonth = document.getElementById('mesSelectPregunta5').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas5;
            filteredCantidades = cantidades5;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta5[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart5) { // Asegurarse de que chart5 está definido
            chart5.destroy();
        }
        chart5 = createChartPregunta5(filteredRespuestas, filteredCantidades);
    }
</script>



<br>
<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta6" onchange="filterTransactionsPregunta6()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>6. ¿Qué tan conforme se siente con la precisión y exactitud de los datos ingresados y procesados por el sistema inteligente durante la matrícula?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart6"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas6 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades6 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta6 = <?php echo json_encode($dataMapPregunta6); ?>; // Mapa de datos agrupados por mes para la pregunta 6

    // Inicializar el gráfico sin filtro al cargar la página
    var chart6 = createChartPregunta6(respuestas6, cantidades6);

    function createChartPregunta6(respuestas, cantidades) {
        var ctx6 = document.getElementById('respuestasChart6').getContext('2d');
        return new Chart(ctx6, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 6', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',  // Nada Satisfecho
                        'rgba(255, 159, 64, 0.4)',  // Un Poco Satisfecho
                        'rgba(255, 205, 86, 0.4)',  // Satisfecho
                        'rgba(75, 192, 192, 0.4)',  // Muy Satisfecho
                        'rgba(54, 162, 235, 0.4)'   // Totalmente Satisfecho
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',  
                        'rgba(255, 159, 64, 1)',  
                        'rgba(255, 205, 86, 1)',  
                        'rgba(75, 192, 192, 1)',  
                        'rgba(54, 162, 235, 1)'   
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta6() {
        const selectedMonth = document.getElementById('mesSelectPregunta6').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas6;
            filteredCantidades = cantidades6;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta6[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart6) { // Asegurarse de que chart6 está definido
            chart6.destroy();
        }
        chart6 = createChartPregunta6(filteredRespuestas, filteredCantidades);
    }
</script>


<br>


<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta7" onchange="filterTransactionsPregunta7()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>7. ¿Qué tan seguro/a se siente respecto a la confidencialidad de su información personal en el sistema inteligente?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart7"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas7 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades7 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta7 = <?php echo json_encode($dataMapPregunta7); ?>; // Mapa de datos agrupados por mes para la pregunta 7

    // Inicializar el gráfico sin filtro al cargar la página
    var chart7 = createChartPregunta7(respuestas7, cantidades7);

    function createChartPregunta7(respuestas, cantidades) {
        var ctx7 = document.getElementById('respuestasChart7').getContext('2d');
        return new Chart(ctx7, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 7', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',  // Nada Satisfecho - rojo claro
                        'rgba(255, 159, 64, 0.4)',  // Un Poco Satisfecho - naranja claro
                        'rgba(255, 205, 86, 0.4)',  // Satisfecho - amarillo claro
                        'rgba(75, 192, 192, 0.4)',  // Muy Satisfecho - verde claro
                        'rgba(54, 162, 235, 0.4)'   // Totalmente Satisfecho - azul claro
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',  // Borde rojo
                        'rgba(255, 159, 64, 1)',  // Borde naranja
                        'rgba(255, 205, 86, 1)',  // Borde amarillo
                        'rgba(75, 192, 192, 1)',  // Borde verde
                        'rgba(54, 162, 235, 1)'   // Borde azul
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta7() {
        const selectedMonth = document.getElementById('mesSelectPregunta7').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas7;
            filteredCantidades = cantidades7;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta7[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart7) { // Asegurarse de que chart7 está definido
            chart7.destroy();
        }
        chart7 = createChartPregunta7(filteredRespuestas, filteredCantidades);
    }
</script>



<br>

<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta8" onchange="filterTransactionsPregunta8()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>8. ¿Qué tan satisfecho/a está con la disminución de errores en el proceso de matrícula gracias al sistema inteligente?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart8"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas8 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades8 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta8 = <?php echo json_encode($dataMapPregunta8); ?>; // Mapa de datos agrupados por mes para la pregunta 8

    // Inicializar el gráfico sin filtro al cargar la página
    var chart8 = createChartPregunta8(respuestas8, cantidades8);

    function createChartPregunta8(respuestas, cantidades) {
        var ctx8 = document.getElementById('respuestasChart8').getContext('2d');
        return new Chart(ctx8, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 8', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)',  // Nada Satisfecho - rojo claro
                        'rgba(255, 159, 64, 0.4)',  // Un Poco Satisfecho - naranja claro
                        'rgba(255, 205, 86, 0.4)',  // Satisfecho - amarillo claro
                        'rgba(75, 192, 192, 0.4)',  // Muy Satisfecho - verde claro
                        'rgba(54, 162, 235, 0.4)'   // Totalmente Satisfecho - azul claro
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',  // Borde rojo
                        'rgba(255, 159, 64, 1)',  // Borde naranja
                        'rgba(255, 205, 86, 1)',  // Borde amarillo
                        'rgba(75, 192, 192, 1)',  // Borde verde
                        'rgba(54, 162, 235, 1)'   // Borde azul
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta8() {
        const selectedMonth = document.getElementById('mesSelectPregunta8').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas8;
            filteredCantidades = cantidades8;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta8[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart8) { // Asegurarse de que chart8 está definido
            chart8.destroy();
        }
        chart8 = createChartPregunta8(filteredRespuestas, filteredCantidades);
    }
</script>


<br>
<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta9" onchange="filterTransactionsPregunta9()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>9. ¿Qué tan cómodo/a se sintió al navegar y usar el sistema inteligente durante la matrícula?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart9"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas9 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades9 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta9 = <?php echo json_encode($dataMapPregunta9); ?>; // Mapa de datos agrupados por mes para la pregunta 9

    // Inicializar el gráfico sin filtro al cargar la página
    var chart9 = createChartPregunta9(respuestas9, cantidades9);

    function createChartPregunta9(respuestas, cantidades) {
        var ctx9 = document.getElementById('respuestasChart9').getContext('2d');
        return new Chart(ctx9, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 9', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)', 
                        'rgba(255, 159, 64, 0.4)', 
                        'rgba(255, 205, 86, 0.4)', 
                        'rgba(75, 192, 192, 0.4)', 
                        'rgba(54, 162, 235, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', 
                        'rgba(255, 159, 64, 1)', 
                        'rgba(255, 205, 86, 1)', 
                        'rgba(75, 192, 192, 1)', 
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta9() {
        const selectedMonth = document.getElementById('mesSelectPregunta9').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas9;
            filteredCantidades = cantidades9;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta9[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart9) { // Asegurarse de que chart9 está definido
            chart9.destroy();
        }
        chart9 = createChartPregunta9(filteredRespuestas, filteredCantidades);
    }
</script>



<br>

<div style="width: 100%; max-width: 600px; margin: 0 auto;">
    <div class="select-container">
        <select id="mesSelectPregunta10" onchange="filterTransactionsPregunta10()">
            <option value="todos">Todos los meses</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        </select>  
    </div>
</div>

<p>10. ¿Qué tan satisfecho/a está con la experiencia general de matrícula tras la implementación del sistema inteligente?</p>

<div style="width: 50%; margin: 0 auto;">
    <canvas id="respuestasChart10"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Datos de PHP convertidos a formato JavaScript
    var respuestas10 = <?php echo json_encode($respuestas); ?>;  // Opciones de respuestas
    var cantidades10 = <?php echo json_encode($cantidades); ?>;  // Cantidades de respuestas para cada opción
    var dataMapPregunta10 = <?php echo json_encode($dataMapPregunta10); ?>; // Mapa de datos agrupados por mes para la pregunta 10

    // Inicializar el gráfico sin filtro al cargar la página
    var chart10 = createChartPregunta10(respuestas10, cantidades10);

    function createChartPregunta10(respuestas, cantidades) {
        var ctx10 = document.getElementById('respuestasChart10').getContext('2d');
        return new Chart(ctx10, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: respuestas, // Etiquetas de las respuestas desde PHP
                datasets: [{
                    label: 'Respuestas de la Pregunta 10', // Etiqueta del dataset
                    data: cantidades, // Cantidades correspondientes a cada respuesta
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.4)', 
                        'rgba(255, 159, 64, 0.4)', 
                        'rgba(255, 205, 86, 0.4)', 
                        'rgba(75, 192, 192, 0.4)', 
                        'rgba(54, 162, 235, 0.4)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', 
                        'rgba(255, 159, 64, 1)', 
                        'rgba(255, 205, 86, 1)', 
                        'rgba(75, 192, 192, 1)', 
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Gráfico de barras horizontal
                scales: {
                    x: {
                        beginAtZero: true, // Comienza el eje X en 0
                        ticks: {
                            stepSize: 1,  // Paso de 1 entre los valores del eje X
                            callback: function(value) { 
                                if (Number.isInteger(value)) {  // Solo mostrar enteros
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        });
    }

    function filterTransactionsPregunta10() {
        const selectedMonth = document.getElementById('mesSelectPregunta10').value;

        let filteredRespuestas = [];
        let filteredCantidades = [];

        if (selectedMonth === 'todos') {
            // Si se selecciona "todos", utilizamos los datos originales
            filteredRespuestas = respuestas10;
            filteredCantidades = cantidades10;
        } else {
            // Filtrar los datos basados en el mes seleccionado
            const monthData = dataMapPregunta10[selectedMonth] || {};

            // Recopilar las respuestas y cantidades del mes seleccionado
            filteredRespuestas = Object.keys(monthData);
            filteredCantidades = Object.values(monthData);
        }

        // Actualiza el gráfico con los datos filtrados
        if (chart10) { // Asegurarse de que chart10 está definido
            chart10.destroy();
        }
        chart10 = createChartPregunta10(filteredRespuestas, filteredCantidades);
    }
</script>



<br>





                        

                    </div>






                </div>





            </div>








        </div>




    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../administrador/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../administrador/js/popper.min.js"></script>
    <script src="../administrador/js/bootstrap.min.js"></script>
    <script src="../administrador/js/jquery-3.3.1.min.js"></script>



    <script src="jQuery-3.7.0/jquery-3.7.0.js"></script>

    <script src="../DataTables/datatables.min.js"></script>





    <script type="text/javascript">
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });

        });
    </script>





    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#contenido'), {
                // Configura la edición para permitir <br>
                allowedContent: true,
            })
            .then(editor => {
                console.log('Editor cargado correctamente', editor);
            })
            .catch(error => {
                console.error('Hubo un error al cargar el editor', error);
            });
    </script>




</body>

</html>