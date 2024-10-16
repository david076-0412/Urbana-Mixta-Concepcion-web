<?php


include "../conexion.php";

session_start();


if (isset($_SESSION['apoderado']['usuario'])) {
} else {

    header('Location: ../loginapoderado.php'); // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión

    exit();
}



?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Apoderado</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../apoderado/css/bootstrap.minsl.css">
    <!----css3---->
    <link rel="stylesheet" href="../apoderado/css/custom.css">





    <link rel="stylesheet" href="../apoderado/css/customss.css">



    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

   
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="../apoderado/images/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />





    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- Material Symbols - Outlined Set -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- Material Symbols - Rounded Set -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <!-- Material Symbols - Sharp Set -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" rel="stylesheet" />



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">



    <style>
        /* Estilo para alinear a la derecha */
        .select-right {
            float: right;
        }
    </style>






    <script>
        $(window).on('beforeunload', function() {
            $.ajax({
                type: 'POST',
                url: '../logoutapoderado.php?rol=apoderado',
                async: false, // Esperar a que se complete la solicitud antes de cerrar la página
            });
        });
    </script>








</head>










<body>


    <div class="wrapper">



        <div class="body-overlay"></div>






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
                <h3><img src="../apoderado/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>
            </div>
            <ul class="list-unstyled component m-0">


                <li class="dropdown">
                    <a href="../apoderado/panel_apoderado.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">dashboard</i>
                        Bienvenido</a>
                </li>

                <li class="dropdown">
                    <a href="../apoderado/apoderado-matricula.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">aspect_ratio</i>
                        Matrícula</a>




                <li class="dropdown">
                    <a href="../apoderado/apoderado-list-alumno-curso.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                    echo "$usuario"; ?>" class="dashboard"><i class="material-icons">apps</i>
                        Cursos</a>
                </li>



                <li class="dropdown">
                    <a href="../apoderado/apoderado-horario-cursos.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                echo "$usuario"; ?>" class="dashboard"><i class="material-icons">access_time</i>
                        Horario</a>
                </li>



                <li class="dropdown">
                    <a href="../apoderado/apoderado-alumno-asistencia.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                    echo "$usuario"; ?>" class="dashboard"><i class="material-icons">equalizer</i>
                        Asistencia</a>
                </li>



                <li class="dropdown">
                    <a href="../apoderado/apoderado-tutoria-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                echo "$usuario"; ?>" class="dashboard"><i class="material-icons">extension</i>
                        Tutoría</a>
                </li>



                <li class="active">
                    <a href="../apoderado/apoderado-notas-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                echo "$usuario"; ?>" class="dashboard"><i class="material-icons">date_range</i>Notas</a>
                </li>


            </ul>
        </div>


















        <div id="content">

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
                            <div class="xp-searchbar">







                            </div>
                        </div>





                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">




                                        <li class="dropdown nav-item">


                                            <?php


                                            include('../conexion.php');

                                            $usuario = $_REQUEST['usuario'];


                                            $query = "SELECT perfil,usuario FROM apoderado WHERE usuario ='$usuario'";

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
                                                    <img src="../apoderado/images/user.png" style="width:40px; border-radius:50%;" />
                                                    <span class="xp-user-live"></span>
                                                </a>

                                            <?php

                                            }

                                            ?>







                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="../apoderado/apoderado-perfil.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                                        echo "$usuario"; ?>">
                                                        <span class="material-icons">person_outline</span>
                                                        Perfil
                                                    </a></li>

                                                <li><a href="../logoutapoderado.php?rol=apoderado">
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
                        <h4 class="page-title">Notas</h4>

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





            <!--



    <div class="row text-center" style="background-color: #cecece">
      
      <div class="col-md-6">
        <strong>Lista de Clientes <span style="color: crimson"> ( <?php echo $cantidad; ?> )</span> </strong>
      </div>



    </div>

-->

            <style>
                .btn-block-bt {
                    padding: 3%;
                    display: inline-block;
                    cursor: pointer;

                }

                .boton {
                    color: #939393;
                    font-size: 14px;
                    font-weight: 500;
                    padding: 0.5em 1.2em;
                    border-radius: 20px;
                    background: #EDEDED;
                    border: 2px solid;
                    border-color: #EDEDED;
                    position: relative;
                }

                .boton:before {
                    content: "";
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    border-radius: 20px;
                    width: 0px;
                    height: 100%;
                    background: rgba(59, 124, 255, 0.1);
                    transition: all 1s ease;
                }

                td {
                    letter-spacing: 1px;
                }
            </style>




            <div class="main">




                <div class="col-md-12">

                    <div class="box-container">


                        <?php
                        include('../conexion.php');


                        $alumno = $_REQUEST['alumno'];
                        $docente = $_REQUEST['docente'];



                        $nivel = $_REQUEST['nivel'];
                        $grado = $_REQUEST['grado'];
                        $curso = $_REQUEST['curso'];
                        $tema = $_REQUEST['tema'];


                        $sqlCliente = "SELECT * FROM notas 
                        WHERE alumno='$alumno'
                        AND docente='$docente'
                        AND nivel='$nivel' 
                        AND grado='$grado' 
                        AND curso='$curso' 
                        AND tema='$tema'";

                        $queryCliente = mysqli_query($conexion, $sqlCliente);
                        $cantidad = mysqli_num_rows($queryCliente);
                        ?>


                        <?php while ($data = mysqli_fetch_array($queryCliente)) : ?>

                            <div class="row clearfix">

                                <div style="background-color: #ADC8FF; height: 330px; width: 750px;" class="box-bx">

                                    <div style="background-color: #F8FAFD; height: 310px; width: 730px;" class="box-b">

                                        <div class="table-responsive">

                                            <h2 class="topic-heading">
                                                <?php echo $data['tipo_nota_promedio']; ?>
                                            </h2>

                                            <table class="table table-hover" style="width:100%; border-radius: 10px;">

                                                <thead>

                                                </thead>

                                                <tbody>

                                                    <tr>


                                                        <td style="width: 300px;">
                                                            <h2 class="topic">Nota de Cuaderno: </h2>
                                                        </td>
                                                        <td style="width: 300px;">
                                                            <h2 class="topic">
                                                                <?php echo $data['nota_cuaderno']; ?>
                                                            </h2>
                                                        </td>


                                                    </tr>


                                                    <tr>

                                                        <td>
                                                            <h2 class="topic">Participación Oral: </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="topic">
                                                                <?php echo $data['participacion_oral']; ?>
                                                            </h2>
                                                        </td>

                                                    </tr>



                                                    <tr>

                                                        <td>
                                                            <h2 class="topic">Examen Mensual: </h2>
                                                        </td>

                                                        <td>
                                                            <h2 class="topic">
                                                                <?php echo $data['examen_mensual']; ?>
                                                            </h2>
                                                        </td>

                                                    </tr>


                                                    <tr>

                                                        <td>
                                                            <h2 class="topic">Examen Bimestral: </h2>
                                                        </td>

                                                        <td>
                                                            <h2 class="topic">
                                                                <?php echo $data['examen_bimestral']; ?>
                                                            </h2>
                                                        </td>

                                                    </tr>


                                                    <tr>

                                                        <td>
                                                            <h2 class="topic">Comportamiento: </h2>
                                                        </td>

                                                        <td>
                                                            <h2 class="topic">
                                                                <?php echo $data['comportamiento']; ?>
                                                            </h2>
                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>
                                                            <h2 class="topic">Nota Bimestral: </h2>
                                                        </td>

                                                        <td>
                                                            <h2 class="topic">
                                                                <?php echo $data['nota_bimestral']; ?>
                                                            </h2>
                                                        </td>

                                                    </tr>







                                            </table>


                                        </div>

                                    </div>

                                </div>


                            </div>



                        <?php endwhile; ?>



                    </div>

                </div>







                <div class="main">



                    <div class="col-md-12">



                        <div class="box-container">


                            <?php
                            include('../conexion.php');


                            $alumno = $_REQUEST['alumno'];
                            $docente = $_REQUEST['docente'];



                            $nivel = $_REQUEST['nivel'];
                            $grado = $_REQUEST['grado'];
                            $curso = $_REQUEST['curso'];
                            $tema = $_REQUEST['tema'];


                            $sqlCliente = "SELECT * FROM notas 
                            WHERE alumno='$alumno'
                            AND docente='$docente'
                            AND nivel='$nivel' 
                            AND grado='$grado' 
                            AND curso='$curso' 
                            AND tema='$tema'";
                            $queryCliente = mysqli_query($conexion, $sqlCliente);
                            $cantidad = mysqli_num_rows($queryCliente);
                            ?>








                            <div class="row clearfix">

                                <div style="background-color: #ADC8FF; height: 330px; width: 750px;" class="box-bx">

                                    <div style="background-color: #F8FAFD; height: 310px; width: 730px;" class="box-b">





                                        <div class="phppot-container">
                                            <h2>Nota Final :
                                                <?php

                                                if ($data = mysqli_fetch_array($queryCliente)) {
                                                    $nota_promedio = $data['nota_final'];
                                                    echo $nota_promedio;
                                                } else {
                                                    echo "No hay datos en la consulta.";
                                                }

                                                ?>

                                            </h2>
                                            <div style="background-color: #F8FAFD; height: 200px; width: 630px;">
                                                <canvas id="myChart" style="position: relative; height: 40vh; width: 80vw;"></canvas>
                                            </div>
                                        </div>

                                        <?php
                                        include("../conexion.php");


                                        $alumno = $_REQUEST['alumno'];
                                        $docente = $_REQUEST['docente'];



                                        $nivel = $_REQUEST['nivel'];
                                        $grado = $_REQUEST['grado'];
                                        $curso = $_REQUEST['curso'];
                                        $tema = $_REQUEST['tema'];


                                        $sqlCliente = "SELECT * FROM notas 
                                        WHERE alumno='$alumno'
                                        AND docente='$docente'
                                        AND nivel='$nivel' 
                                        AND grado='$grado' 
                                        AND curso='$curso' 
                                        AND tema='$tema'";
                                        $queryCliente = mysqli_query($conexion, $sqlCliente);

                                        foreach ($queryCliente as $data) {
                                            $tipo_nota_promedioss[] = $data['tipo_nota_promedio'];
                                            $nota_promedioss[] = $data['nota_bimestral'];
                                        }

                                        ?>




                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                        <script>
                                            // === include 'setup' then 'config' above ===
                                            const labels = <?php echo json_encode($tipo_nota_promedioss) ?>;
                                            const data = {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Control de Notas',
                                                    data: <?php echo json_encode($nota_promedioss) ?>,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)',
                                                        'rgba(255, 205, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(201, 203, 207, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(75, 192, 192)',
                                                        'rgb(54, 162, 235)',
                                                        'rgb(153, 102, 255)',
                                                        'rgb(201, 203, 207)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            };
                                            const config = {
                                                type: 'bar',
                                                data: data,
                                                options: {
                                                    indexAxis: 'y',
                                                    legend: {
                                                        display: false
                                                    },
                                                    title: {
                                                        display: true,
                                                        text: 'Chart JS Horizontal Bar Chart Example'
                                                    }
                                                },
                                            };

                                            var myChart = new Chart(
                                                document.getElementById('myChart'),
                                                config
                                            );
                                        </script>












                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>


                </div>













            </div>











        </div>


    </div>



    <script src="../apoderado/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../apoderado/js/popper.min.js"></script>
    <script src="../apoderado/js/bootstrap.min.js"></script>
    <script src="../apoderado/js/jquery-3.3.1.min.js"></script>






    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>




    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>






























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

                    // ... Agrega null para cada columna
                ]
            });
        });
    </script>

















</body>

</html>