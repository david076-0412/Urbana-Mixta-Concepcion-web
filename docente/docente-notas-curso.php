<?php


include "../conexion.php";

session_start();


if (isset($_SESSION['docente']['usuario'])) {
} else {

    header('Location: ../logindocentee.php'); // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión

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
    <title>Docente</title>
    <link rel="stylesheet" type="text/css" href="../docente/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cargando.css">
    <link rel="stylesheet" type="text/css" href="../docente/css/maquinawrite.css">

    <link rel="stylesheet" href="../docente/css/bootstrap.minsl.css">
    <!----css3---->
    <link rel="stylesheet" href="../docente/css/custom.css">



    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

   
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="../docente/images/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />




    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">















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
                url: '../logoutdocente.php?rol=docente',
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
                <h3><img src="../docente/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>
            </div>
            <ul class="list-unstyled component m-0">



                <li class="dropdown">

                    <a href="../docente/panel_docente.php?usuario=<?php $usuario =$_SESSION['docente']['usuario'];
                                                                    echo "$usuario"; ?>" class="dashboard"><i class="material-icons">dashboard</i>
                        Bienvenido</a>
                </li>



                <li class="dropdown">

                    <a href="../docente/docente-curso-material.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">aspect_ratio</i>
                        Curso</a>
                </li>


                <li class="dropdown">

                    <a href="../docente/docente-horario-curso.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">apps</i>
                        Horario</a>
                </li>


                <li class="active">

                    <a href="../docente/docente-notas-curso.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">access_time</i>
                        Notas</a>
                </li>


                <li class="dropdown">

                    <?php
                    include('../conexion.php');

                    $usuario = $_SESSION['docente']['usuario'];

                    ?>

                    <?php


                    $sqlCliente = ("SELECT * FROM docente WHERE usuario = '$usuario'");
                    $queryCliente = mysqli_query($conexion, $sqlCliente);
                    $cantidad = mysqli_num_rows($queryCliente);

                    ?>



                    <?php while ($data = mysqli_fetch_array($queryCliente)) { ?>


                        <a href="../docente/docente-asistencia.php?usuario=<?php
                                                                            $usuario = $_SESSION['docente']['usuario'];
                                                                            echo "$usuario"; ?>&docente=<?php echo $data['apellido_paterno'] ?> <?php echo $data['apellido_materno'] ?> <?php echo $data['nombres'] ?>" class="dashboard"><i class="material-icons">date_range</i>
                            Asistencia</a>

                    <?php } ?>
                </li>



                <li class="dropdown">

                    <a href="../docente/docente-tarea-alumno.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">equalizer</i>
                        Tarea</a>
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

                        </div>


                        <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar p-0">
                                    <ul class="nav navbar-nav flex-row ml-auto">

                                        <li class="dropdown nav-item">

                                            <?php
                                            include('../conexion.php');

                                            $usuario = $_REQUEST['usuario'];

                                            // Asegúrate de escapar el valor del usuario para evitar SQL Injection
                                            $usuario_escapado = mysqli_real_escape_string($conexion, $usuario);

                                            $query = "SELECT perfil, usuario FROM docente WHERE usuario ='$usuario_escapado'";
                                            $resultado = mysqli_query($conexion, $query); // Asegúrate de tener una conexión establecida antes de ejecutar la consulta
                                            $fila = mysqli_fetch_assoc($resultado);

                                            // Asegúrate de que se haya obtenido una fila de la consulta
                                            if ($fila) {
                                                $imagen_perfil = $fila['perfil'];
                                            } else {
                                                $imagen_perfil = NULL;
                                            }
                                            ?>

                                            <?php
                                            if ($imagen_perfil && !empty($imagen_perfil)) {
                                                // Mostrar imagen desde el campo LONG BLOB
                                                $imagen_base64 = base64_encode($imagen_perfil);
                                                $imagen_src = "data:image/jpeg;base64,$imagen_base64";
                                            } else {
                                                // Mostrar imagen por defecto
                                                $imagen_src = "../docente/images/user.png";
                                            }
                                            ?>

                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <img src="<?= $imagen_src ?>" style="width:40px; border-radius:50%;" />
                                                <span class="xp-user-live"></span>
                                            </a>








                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="../docente/docente-perfil.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                                    echo "$usuario"; ?>">
                                                        <span class="material-icons">person_outline</span>
                                                        Perfil
                                                    </a></li>

                                                <li><a href="../logoutdocente.php?rol=docente">
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
















            <style>
                table {
                    width: 100%;
                }

                th,
                td {
                    padding: 8px;
                    text-align: center;
                    border: 1px solid #ddd;
                }
            </style>




            <div class="main-content" id="tabla-productos">


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevanota">
                    Nueva Nota

                </button>

                <?php include("../docente/Modal/ModalNuevaNota.php") ?>





                <div class="col-md-12">



                    <?php

                    include('../../conexion.php');


                    ?>








                    <?php




                    $sqlClienteff   = ("SELECT * FROM notas");
                    $queryClienteff = mysqli_query($conexion, $sqlClienteff);
                    $cantidad     = mysqli_num_rows($queryClienteff);

                    ?>









                    <br>

                    <div class="row clearfix">



                        <div class="table-responsive">



                            <table id="example" class="table-bordered table-hover" style="width:100%">

                                <thead>
                                    <tr>
                                        <td style="width:120px; background-color: #5DACCD; color:#fff">Curso</td>
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Tema</td>
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Alumno</td>

                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Nivel</td>
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Grado</td>
                                        <td style="width:180px; background-color: #5DACCD; color:#fff">Nota Final</td>
                                        <th style="width:350px; background-color: #5DACCD; color:#fff">Accion</th>
                                    </tr>
                                </thead>

                                <tbody>



                                    <?php while ($data = mysqli_fetch_array($queryClienteff)) { ?>




                                        <tr>
                                            <td>
                                                <?php echo $data['curso'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['tema'] ?>
                                            </td>
                                            <td>

                                                <?php echo $data['alumno'] ?>
                                            </td>

                                            <td>
                                                <?php echo $data['nivel'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['grado'] ?>
                                            </td>

                                            <td>
                                                <?php echo $data['nota_final'] ?>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarnota<?php echo $data['id']; ?>">
                                                    <span class="material-icons">edit</span>

                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vernota<?php echo $data['id']; ?>">
                                                    <span class="material-icons">search</span>

                                                </button>

                                                <a href="../docente/eliminarnota.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                                                            echo $usuario; ?>">
                                                    <button type="button" class="btn btn-danger">
                                                        <span class="material-icons">delete</span>

                                                    </button>
                                                </a>



                                            </td>


                                        </tr>



                                        <!--Ventana Modal para Actualizar--->
                                        <?php include('../docente/Modal/ModalEditarNota.php'); ?>

                                        <!--Ventana Modal para Actualizar--->
                                        <?php include('../docente/Modal/ModalVerNota.php'); ?>

                                    <?php } ?>



                            </table>



                        </div>



                    </div>
















                </div>


            </div>










        </div>



        <script src="../docente/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../docente/js/popper.min.js"></script>
        <script src="../docente/js/bootstrap.min.js"></script>
        <script src="../docente/js/jquery-3.3.1.min.js"></script>






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
                        null, // Columna 6
                        null, // Columna 7

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