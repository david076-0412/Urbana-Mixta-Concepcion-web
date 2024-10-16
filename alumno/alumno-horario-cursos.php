<?php


include "../conexion.php";

session_start();


if (isset($_SESSION['alumno']['usuario'])) {
} else {

    header('Location: ../loginalumno.php'); // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión

    exit();
}



?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Alumno</title>
    <link rel="stylesheet" type="text/css" href="../alumno/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cargando.css">
    <link rel="stylesheet" type="text/css" href="../alumno/css/maquinawrite.css">

    <link rel="stylesheet" href="../alumno/css/bootstrap.minsl.css">
    <!----css3---->
    <link rel="stylesheet" href="../alumno/css/custom.css">



    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="../alumno/images/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />




    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">




    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />



    <style>
        /* Estilo para alinear a la derecha */
        .select-right {
            float: right;
        }


        h1,
        h2,
        h4 {

            text-transform: none;
            /* Esta propiedad quita cualquier transformación del texto */

        }



        label,
        strong {

            text-transform: none;
            /* Esta propiedad quita cualquier transformación del texto */

        }
    </style>





    <script>
        $(window).on('beforeunload', function() {
            $.ajax({
                type: 'POST',
                url: '../logoutalumno.php?rol=alumno',
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



                    <a href="../alumno/panel_alumno.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                                echo "$usuario"; ?>" class="dashboard"><i class="material-icons">dashboard</i>
                        Bienvenido</a>
                </li>





                <li class="dropdown">


                    <?php
                    include('../conexion.php');

                    $usuario = $_SESSION['alumno']['usuario'];

                    ?>


                    <?php


                    $sqlCliente = ("SELECT * FROM alumno WHERE usuario = '$usuario'");
                    $queryCliente = mysqli_query($conexion, $sqlCliente);
                    $cantidad = mysqli_num_rows($queryCliente);

                    ?>


                    <?php while ($data = mysqli_fetch_array($queryCliente)) { ?>


                        <a href="../alumno/alumno-list-curso.php?usuario=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>" class="dashboard"><i class="material-icons">apps</i>
                            Cursos</a>

                    <?php } ?>










                </li>



                <li class="active">
                    <a href="../alumno/alumno-horario-cursos.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">access_time</i>
                        Horario</a>
                </li>





                <li class="dropdown">

                    <?php
                    include('../conexion.php');

                    $usuario = $_SESSION['alumno']['usuario'];

                    ?>

                    <?php


                    $sqlCliente = ("SELECT * FROM alumno WHERE usuario = '$usuario'");
                    $queryCliente = mysqli_query($conexion, $sqlCliente);
                    $cantidad = mysqli_num_rows($queryCliente);

                    ?>



                    <?php while ($data = mysqli_fetch_array($queryCliente)) { ?>



                        <a href="../alumno/alumno-asistencia-curso.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                                                echo "$usuario"; ?>&alumno=<?php echo $data['alumno'] ?>" class="dashboard"><i class="material-icons">equalizer</i>
                            Asistencia</a>

                    <?php } ?>






                </li>




                <li class="dropdown">
                <?php
					include('../conexion.php');

					$usuario = $_SESSION['alumno']['usuario'];

					?>

					<?php


					$sqlCliente = ("SELECT * FROM alumno WHERE usuario = '$usuario'");
					$queryCliente = mysqli_query($conexion, $sqlCliente);
					$cantidad = mysqli_num_rows($queryCliente);

					?>



					<?php while ($data = mysqli_fetch_array($queryCliente)) { ?>


					<a href="../alumno/alumno-notas-curso.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
																			echo "$usuario"; ?>&alumno=<?php echo $data['alumno'] ?>" class="dashboard"><i class="material-icons">date_range</i>
						Notas</a>

						<?php } ?>
                </li>






				<li class="dropdown">

                <?php
                    include('../conexion.php');

                    $usuario = $_SESSION['alumno']['usuario'];

                    ?>


                    <?php


                    $sqlCliente = ("SELECT * FROM alumno WHERE usuario = '$usuario'");
                    $queryCliente = mysqli_query($conexion, $sqlCliente);
                    $cantidad = mysqli_num_rows($queryCliente);

                    ?>


                    <?php while ($data = mysqli_fetch_array($queryCliente)) { ?>


                    <a href="../alumno/alumno-tarea-curso.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                                                echo "$usuario"; ?>" class="dashboard"><i class="material-icons">extension</i>
                        Tareas</a>

                        <?php } ?>

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


                                            $query = "SELECT perfil,usuario FROM alumno WHERE usuario ='$usuario'";

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
                                                    <img src="../alumno/images/user.png" style="width:40px; border-radius:50%;" />
                                                    <span class="xp-user-live"></span>
                                                </a>

                                            <?php

                                            }

                                            ?>







                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="../alumno/alumno-perfil.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                                                                    echo "$usuario"; ?>">
                                                        <span class="material-icons">person_outline</span>
                                                        Perfil
                                                    </a></li>

                                                <li><a href="../logoutalumno.php?rol=alumno">
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
                        <h4 class="page-title">Alumnos - Horarios</h4>

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


            <div class="main-content" id="tabla-productos">

                <h2 class="ml-lg-2">Lista de Cursos - Horario</h2>


                <div class="col-md-12">

                    <?php

                    include('../conexion.php');


                    $usuario = $_REQUEST['usuario'];

                    ?>

                    <?php



                    $sqlCliente = ("SELECT DISTINCT usuario_alumno, nombre,docente,nivel,grado 
                    FROM curso 
                    WHERE usuario_alumno = '$usuario'");
                    $queryCliente = mysqli_query($conexion, $sqlCliente);
                    $cantidad = mysqli_num_rows($queryCliente);

                    ?>






                    <div class="row clearfix">

                        <div class="table-responsive">


                            <table id="example" class="table table-bordered table-hover" style="width:100%">


                                <thead>
                                    <tr>
                                    <td style="width:180px; background-color: #5DACCD; color:#fff">Curso</td>
                                       
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Docente</td>
                                       
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Nivel</td>
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Grado</td>

                                        <th style="width:180px; background-color: #5DACCD; color:#fff">Accion</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_array($queryCliente)) { ?>
                                        <tr>
                                        <td>
                                            
                                            <?php echo $data['nombre'] ?>
                                        </td>
                                            <td>
                                            
                                                <?php echo $data['docente'] ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $data['nivel'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['grado'] ?>
                                            </td>



                                            <td>

                                                <a href="../alumno/alumno-curso-horario.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                echo "$usuario"; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>&curso=<?php echo $data['nombre']; ?>">

                                                    <span class="material-symbols-outlined">calendar_month</span>
                                                </a>


                                            </td>


                                        </tr>


                                        <!--Ventana Modal para Actualizar--->
                                        <?php include('../apoderado/ModalVerCurso.php'); ?>


                                    <?php } ?>


                            </table>


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