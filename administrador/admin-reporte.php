<?php


include "../conexion.php";

session_start();


if (isset($_SESSION['admin']['usuario'])) {
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
    <!-- Bootstrap CSS -->
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




    <link href="../DataTables/datatables.min.css" rel="stylesheet">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>




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
                    <a href="../administrador/admin-apoderado.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">portrait</i>
                        Apoderados</a>
                </li>



                <li class="dropdown">

                    <a href="../administrador/admin-horario.php?usuario=<?php
                                                                        $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">schedule</i>
                        Horarios</a>



                </li>



                <li class="active">


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
                
                
                <li class="dropdown">


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

                                            $usuario = $_REQUEST['usuario'];


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

                                                <li><a href="../logoutadmin.php">
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
                        <h4 class="page-title">Reportes</h4>

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
                    <div class="row">


                        <div class="inline-block right-margin">


                            <?php
                            include('../conexion.php');

                            $nivel = $_REQUEST['nivel'];
                            // Consulta a la base de datos para obtener los datos
                            $sql = "SELECT * FROM alumno WHERE nivel = '$nivel'";
                            $result = $conn->query($sql);
                            $cantidad = mysqli_num_rows($result);
                            $usuario = $_SESSION['admin']['usuario'];
                            $sqlco = "SELECT * FROM colegio WHERE usuario = '$usuario'";
                            $resultco = $conn->query($sqlco);

                            $rowdd = $resultco->fetch_assoc();

                            $Nombre = "Alumnos";

                            // Crear tabla HTML con los datos
                            $table = '<strong style="text-align: left; text-transform: none">';

                            $table .= 'Cantidad de ' . $Nombre . ': ' . $cantidad . '<br>';
                            $table .= $Nombre . ' Restantes: ' . $rowdd['cant_desc_est'] . '<br>';
                            $table .= 'Total de ' . $Nombre . ' Disponibles: ' . $rowdd['cant_or'] . '<br>';
                            $table .= '</strong><br>';
                            $table .= '<table border="1" class="table-bordered table-hover" style="width:100%">';
                            $table .= '<tr><th>' . $Nombre . '</th><th>Correo Electrónico</th><th>Nivel</th><th>Grado</th></tr>';

                            while ($row = $result->fetch_assoc()) {
                                $table .= '<tr>';
                                $table .= '<td>' . $row['alumno'] . '</td>';
                                $table .= '<td>' . $row['correo'] . '</td>';
                                $table .= '<td>' . $row['nivel'] . '</td>';
                                $table .= '<td>' . $row['grado'] . '</td>';
                                $table .= '</tr>';
                            }


                            $table .= '</table>';

                            // Botón para generar el PDF
                            echo '<form method="post" action="lista_alumnos_pdf.php?nombre_archivo=' . $Nombre . '" target="_blank">';
                            echo '<input type="hidden" name="pdf_content" value="' . htmlentities($table) . '">';
                            echo '<input type="submit" class="btn btn-primary" value="Reporte - Lista de ' . $Nombre . '" >';
                            echo '</form>';

                            $conn->close();
                            ?>

                        </div>



                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <?php
                            include('../conexion.php');

                            $nivel = $_REQUEST['nivel'];
                            // Consulta a la base de datos para obtener los datos
                            $sql = "SELECT * FROM docente WHERE nivel = '$nivel'";
                            $result = $conn->query($sql);
                            $cantidad = mysqli_num_rows($result);
                            $usuario = $_SESSION['admin']['usuario'];
                            $sqlco = "SELECT * FROM colegio WHERE usuario = '$usuario'";
                            $resultco = $conn->query($sqlco);

                            $rowdd = $resultco->fetch_assoc();

                            $Nombre = "Docentes";

                            // Crear tabla HTML con los datos
                            $table = '<strong style="text-align: left; text-transform: none">';

                            $table .= 'Cantidad de ' . $Nombre . ': ' . $cantidad . '<br>';
                            $table .= $Nombre . ' Restantes: ' . $rowdd['cant_docente_desc_est'] . '<br>';
                            $table .= 'Total de ' . $Nombre . ' Disponibles: ' . $rowdd['cant_docente_or'] . '<br>';
                            $table .= '</strong><br>';
                            $table .= '<table border="1" class="table-bordered table-hover" style="width:100%">';
                            $table .= '<tr><th>' . $Nombre . '</th><th>Correo Electrónico</th><th>Nivel</th><th>Grado</th></tr>';

                            while ($row = $result->fetch_assoc()) {
                                $table .= '<tr>';
                                $table .= '<td>' . $row['apellido_paterno'] . " " . $row['apellido_materno'] . " " . $row['nombres'] . '</td>';
                                $table .= '<td>' . $row['correo'] . '</td>';
                                $table .= '<td>' . $row['nivel'] . '</td>';
                                $table .= '<td>' . $row['grado'] . '</td>';
                                $table .= '</tr>';
                            }


                            $table .= '</table>';

                            // Botón para generar el PDF
                            echo '<form method="post" action="lista_docente_pdf.php?nombre_archivo=' . $Nombre . '" target="_blank">';
                            echo '<input type="hidden" name="pdf_content" value="' . htmlentities($table) . '">';
                            echo '<input type="submit" class="btn btn-success" value="Reporte - Lista de ' . $Nombre . '" >';
                            echo '</form>';

                            $conn->close();
                            ?>


                        </div>



                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <?php
                            include('../conexion.php');




                            $tipoasistenciap = "PRESENTE";

                            $nivel = $_REQUEST['nivel'];

                            // Consulta para obtener los datos
                            $sqlpr = "SELECT count(tipoasistencia) as asispresente FROM asistencia 
                                WHERE tipoasistencia = '$tipoasistenciap'
                                AND nivel = '$nivel'";
                            $resultpr = $conn->query($sqlpr);
                            $rowpr = $resultpr->fetch_assoc();

                            $cantidad_presente = $rowpr["asispresente"];


                            $tipoasistenciat = "TARDANZA";

                            $nivel = $_REQUEST['nivel'];

                            // Consulta para obtener los datos
                            $sqlau = "SELECT count(tipoasistencia) as asisausente FROM asistencia 
                                WHERE tipoasistencia = '$tipoasistenciat'
                                AND nivel = '$nivel'";
                            $resultau = $conn->query($sqlau);
                            $rowau = $resultau->fetch_assoc();

                            $cantidad_ausente = $rowau["asisausente"];





                            $tipoasistenciaf = "FALTA";

                            $nivel = $_REQUEST['nivel'];

                            // Consulta para obtener los datos
                            $sqlfa = "SELECT count(tipoasistencia) as asisfalta FROM asistencia 
                                WHERE tipoasistencia = '$tipoasistenciaf'
                                AND nivel = '$nivel'";
                            $resultfa = $conn->query($sqlfa);
                            $rowfa = $resultfa->fetch_assoc();

                            $cantidad_falta = $rowfa["asisfalta"];






                            $nivel = $_REQUEST['nivel'];

                            // Consulta para obtener los datos
                            $sql = "SELECT * FROM asistencia 
                            WHERE nivel = '$nivel'";
                            $result = $conn->query($sql);



                            $Nombre = "Asistencia";






                            $table = '<strong style="text-align: left; text-transform: none">';

                            $table .= 'Cantidad de PRESENTES: ' . $cantidad_presente . '<br>';
                            $table .= 'Cantidad de AUSENTES: ' . $cantidad_ausente. '<br>';
                            $table .= 'Cantidad de FALTAS: ' . $cantidad_falta. '<br>';
                            $table .= '</strong><br>';

                            // Crear tabla HTML con los datos

                            $table .= '<table border="1" class="table-bordered table-hover" style="width:100%">';
                            $table .= '<tr><th>Alumno</th><th>Docente</th><th>Nivel</th><th>Grado</th><th>Fecha</th><th>dia</th><th>Tipo_Asistencia</th></tr>';

                            while ($row = $result->fetch_assoc()) {




                               

                                $table .= '<tr>';
                                $table .= '<td>' . $row['alumno'] . '</td>';
                                $table .= '<td>' . $row['docente'] . '</td>';
                                $table .= '<td>' . $row['nivel'] . '</td>';
                                $table .= '<td>' . $row['grado'] . '</td>';
                                $table .= '<td>' . date('d/m/y', strtotime($row['fecha_asis'])) . '</td>';
                                $table .= '<td>' . $row['dia'] . '</td>';
                                $table .= '<td>' . $row['tipoasistencia'] . '</td>';
                                $table .= '</tr>';
                            }


                            $table .= '</table>';

                            // Botón para generar el PDF
                            echo '<form method="post" action="lista_asistencia_pdf.php?nombre_archivo=' . $Nombre . '" target="_blank">';
                            echo '<input type="hidden" name="pdf_content" value="' . htmlentities($table) . '">';
                            echo '<input type="submit" class="btn btn-info" value="Reporte - Lista de ' . $Nombre . '" >';
                            echo '</form>';

                            $conn->close();
                            ?>


                        </div>



                    </div>



                    <br>

                    <div class="row clearfix">




                        <div class="row">


                            <label style="padding: 15px;"></label>
                            <div class="inline-block right-margin">




                                <canvas id="myChart" width="300" height="300"></canvas>

                                <?php
                               include('../conexion.php');
                                $usuario = $_SESSION['admin']['usuario'];

                                // Consulta para obtener los datos
                                $sql = "SELECT * FROM colegio WHERE usuario = '$usuario'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                $cantidad_disponible = $row["cant_or"];
                                $cantidad_restante = $row["cant_desc_est"];

                                // Cerrar conexión
                                $conn->close();

                                ?>

                                <script>
                                    // Datos para la gráfica
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ['Alumnos Disponible', 'Alumnos Restante'],
                                            datasets: [{
                                                label: 'Alumnos',
                                                data: [<?php echo $cantidad_disponible; ?>, <?php echo $cantidad_restante; ?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">




                                <canvas id="myChartee" width="300" height="300"></canvas>

                                <?php
                                include('../conexion.php');
                                $usuario = $_SESSION['admin']['usuario'];

                                // Consulta para obtener los datos
                                $sql = "SELECT * FROM colegio WHERE usuario = '$usuario'";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();

                                $cantidad_disponible = $row["cant_docente_or"];
                                $cantidad_restante = $row["cant_docente_desc_est"];

                                // Cerrar conexión
                                $conn->close();

                                ?>

                                <script>
                                    // Datos para la gráfica
                                    var ctx = document.getElementById('myChartee').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ['Docentes Disponible', 'Docentes Restante'],
                                            datasets: [{
                                                label: 'Docentes',
                                                data: [<?php echo $cantidad_disponible; ?>, <?php echo $cantidad_restante; ?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>





                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">




                                <canvas id="myCharteis" width="300" height="300"></canvas>

                                <?php
                                include('../conexion.php');


                                $tipoasistenciap = "PRESENTE";

                                $nivel = $_REQUEST['nivel'];

                                // Consulta para obtener los datos
                                $sqlpr = "SELECT count(tipoasistencia) as asispresente FROM asistencia 
                                WHERE tipoasistencia = '$tipoasistenciap'
                                AND nivel = '$nivel'";
                                $resultpr = $conn->query($sqlpr);
                                $rowpr = $resultpr->fetch_assoc();

                                $cantidad_presente = $rowpr["asispresente"];


                                $tipoasistenciat = "TARDANZA";

                                $nivel = $_REQUEST['nivel'];

                                // Consulta para obtener los datos
                                $sqlau = "SELECT count(tipoasistencia) as asisausente FROM asistencia 
                                WHERE tipoasistencia = '$tipoasistenciat'
                                AND nivel = '$nivel'";
                                $resultau = $conn->query($sqlau);
                                $rowau = $resultau->fetch_assoc();

                                $cantidad_ausente = $rowau["asisausente"];





                                $tipoasistenciaf = "FALTA";

                                $nivel = $_REQUEST['nivel'];

                                // Consulta para obtener los datos
                                $sqlfa = "SELECT count(tipoasistencia) as asisfalta FROM asistencia 
                                WHERE tipoasistencia = '$tipoasistenciaf'
                                AND nivel = '$nivel'";
                                $resultfa = $conn->query($sqlfa);
                                $rowfa = $resultfa->fetch_assoc();

                                $cantidad_falta = $rowfa["asisfalta"];



                                // Cerrar conexión
                                $conn->close();

                                ?>

                                <script>
                                    // Datos para la gráfica
                                    var ctx = document.getElementById('myCharteis').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ['PRESENTE', 'TARDANZA', 'FALTA'],
                                            datasets: [{
                                                label: 'Docentes',
                                                data: [<?php echo $cantidad_presente; ?>, <?php echo $cantidad_ausente; ?>, <?php echo $cantidad_falta; ?>],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(125, 252, 5, 0.2)',
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(125, 252, 5, 1)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>










                        </div>




                    </div>
                    
                    
                    <br>
                    
                    <div class="row clearfix">
    <?php
    // Incluir el archivo de conexión
    include "../conexion.php";

    // Verificar la conexión
    if (!$conn) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    // Consulta para obtener alumnos con estado 'aceptado' o 'rechazado'
    $sqlAlumnos = "SELECT usuario_nombre_apoderado, alumno, estado_alumno, fecha_matricula, fecha_aceptacion, tiempo_aceptado, estado 
                   FROM alumno 
                   WHERE estado IN ('aceptado', 'rechazado')";

    // Ejecutar la consulta y verificar errores
    $resultadoAlumnos = $conn->query($sqlAlumnos);
    if (!$resultadoAlumnos) {
        die("Error en la consulta de alumnos: " . $conn->error);
    }

    // Consulta para obtener todos los alumnos
    $sqlAlumnosselect = "SELECT usuario_nombre_apoderado, alumno, estado_alumno, fecha_matricula, fecha_aceptacion, tiempo_aceptado, estado FROM alumno WHERE fecha_aceptacion != '0000-00-00' AND fecha_aceptacion IS NOT NULL";
    $resultadoAlumnosed = $conn->query($sqlAlumnosselect);
    if (!$resultadoAlumnosed) {
        die("Error en la consulta de alumnos select: " . $conn->error);
    }

    // Arreglos para almacenar los resultados de las consultas
    $alumnos = [];
    $alumnosselect = [];
    $meses = [];

    // Meses en español para convertir los números de mes
    $mesesEnEspanol = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];

    // Obtener todos los alumnos de la consulta de selección
    while ($rowed = $resultadoAlumnosed->fetch_assoc()) {
        $alumnosselect[] = $rowed;
    }

    // Obtener alumnos con estado 'aceptado' o 'rechazado' y extraer los meses de matrícula
    while ($row = $resultadoAlumnos->fetch_assoc()) {
        $alumnos[] = $row;
        
        // Extraer el mes de la fecha de matrícula
        $mes = date('m', strtotime($row['fecha_matricula']));
        
        // Si el mes aún no está en el array, lo agregamos con su nombre en español
        if (!isset($meses[$mes])) {
            $meses[$mes] = $mesesEnEspanol[$mes];
        }
    }
    ?>

    <!-- Select para filtrar alumnos -->
    <div class="select-container">
        <label for="SelectAlumnos">Alumnos:</label>
        <select id="SelectAlumnos" onchange="filterAlumnos()">
            <option value="todos">Todos los alumnos</option>
            <?php foreach ($alumnosselect as $alumno): ?>
                <option value="<?php echo htmlspecialchars($alumno['alumno']); ?>"><?php echo htmlspecialchars($alumno['alumno']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<label style="padding: 10px;"></label>
    <!-- Select para filtrar por mes -->
    <div class="select-container">
        <label for="SelectMes">Mes:</label>
        <select id="SelectMes" onchange="filterFechas()">
            <option value="todos">Todos los meses</option>
            <?php foreach ($meses as $mesNumero => $mesNombre): ?>
                <option value="<?php echo $mesNumero; ?>"><?php echo $mesNombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Tabla para mostrar los alumnos filtrados -->
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th>Apoderado</th>
                <th>Hijo</th>
                <th>Estado Alumno</th>
                <th>Fecha de Matricula</th>
                <th>Fecha de Aceptación</th>
                <th>Tiempo de Demora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody id="alumnosTableBody">
            <?php foreach ($alumnos as $alumno): ?>
                <?php if ($alumno['estado'] !== 'en proceso'): // Filtrar solo aceptados o rechazados ?>
                    <tr>
                        <td><?php echo htmlspecialchars($alumno['usuario_nombre_apoderado']); ?></td>
                        <td><?php echo htmlspecialchars($alumno['alumno']); ?></td>
                        <td><?php echo htmlspecialchars($alumno['estado_alumno']); ?></td>
                        <!-- Cambiar formato a d/m/Y -->
                        <td><?php echo date('d/m/Y', strtotime($alumno['fecha_matricula'])); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($alumno['fecha_aceptacion'])); ?></td>
                        <td><?php echo htmlspecialchars($alumno['tiempo_aceptado']); ?></td>
                        <td><?php echo htmlspecialchars($alumno['estado']); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <label style="padding: 10px;"></label>

    <style>
        .select-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 20px;
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }

        select {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        select:focus {
            border-color: #66afe9;
            box-shadow: 0 0 5px rgba(102, 175, 233, .5);
            outline: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <script>
        // Función para filtrar alumnos
        function filterAlumnos() {
            const selectAlumnos = document.getElementById('SelectAlumnos');
            const selectedAlumno = selectAlumnos.value.trim();
            const tableBody = document.getElementById('alumnosTableBody');
            const rows = tableBody.getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const alumno = row.cells[1].innerText.trim();
                if (selectedAlumno === 'todos' || alumno === selectedAlumno) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        // Función para filtrar por mes de matrícula
        function filterFechas() {
            const selectMes = document.getElementById('SelectMes');
            const selectedMes = selectMes.value;
            const tableBody = document.getElementById('alumnosTableBody');
            const rows = tableBody.getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const fechaParts = row.cells[3].innerText.split('/');
                const mesMatricula = fechaParts[1]; // El mes está en la posición 1 del array
                
                if (selectedMes === 'todos' || mesMatricula === selectedMes) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>
</div>

                    
                    
                    
                    
                    
                    
                    



                </div>





            </div>








        </div>

    </div>



    <!-------complete html----------->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../administrador/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../administrador/js/popper.min.js"></script>
    <script src="../administrador/js/bootstrap.min.js"></script>
    <script src="../administrador/js/jquery-3.3.1.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <script src="../DataTables/datatables.min.js"></script>






    <script src="../administrador/package/dist/sweetalert2.all.js"></script>
    <script src="..administrador/package/dist/sweetalert2.all.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>








    <script>
        $(document).ready(function() {
            $('#example').DataTable({


                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },


                "searching": true,
                "columns": [
                    null, // Columna 1
                    null, // Columna 2
                    null, // Columna 3
                    null, // Columna 4
                    null, // Columna 5


                    // ... Agrega null para cada columna
                ]
            });
        });
    </script>
















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





</body>

</html>