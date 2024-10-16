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






    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />



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

        select {
            padding: 10px 5px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 2px solid #ededed;
            color: #1b1b1b;
            outline: none;
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

<body>




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
                                                                        $usuario =$_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">school</i>
                        Colegio</a>
                </li>





                <li class="dropdown">


                    <a href="../administrador/admin-docente.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                        echo "$usuario"; ?>" class="dashboard"><i class="material-icons">work</i>
                        Docentes</a>


                </li>



                <li class="active">
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
                                                <li><a href="../administrador/admin-perfil.php?usuario=<?php $usuario =$_SESSION['admin']['usuario'];
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
                        <h4 class="page-title">Solicitud - Alumno</h4>

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


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevasolicitud">
                    Nueva Solicitud

                </button>

                <?php include("../administrador/Modal/ModalNuevaSolicitud.php") ?>



                <a href="../administrador/admin-solicitud-alumno.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                echo $usuario ?>&usuario_apoderado=<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                                                                                        echo $usuario_apoderado; ?>">



                    <button type="button" class="btn btn-success">
                        <span class="material-symbols-outlined">
                            receipt_long
                        </span> Ver Solicitud-Alumno

                    </button>
                </a>



                <div class="col-md-12">


                    <?php

                    include('../conexion.php');


                    ?>








                    <?php

                    $usuario = $_SESSION['admin']['usuario'];


                    $usuario_apoderado = $_REQUEST['usuario_apoderado'];

                    $sqlClienteff   = ("SELECT * FROM solicitud_apoderado WHERE usuario_admin = '$usuario'");
                    $queryClienteff = mysqli_query($conexion, $sqlClienteff);
                    $cantidad     = mysqli_num_rows($queryClienteff);

                    ?>



                    <br>

                    <div class="row clearfix">



                        <div class="table-responsive">



                            <table id="example" class="table-bordered table-hover" style="width:100%">


                                <thead>
                                    <tr>
                                        <td style="width:100px; background-color: #5DACCD; color:#fff">Periodo</td>
                                        <td style="width:100px; background-color: #5DACCD; color:#fff">Fecha</td>
                                        <td style="width:120px; background-color: #5DACCD; color:#fff">Servicio</td>
                                        <td style="width:120px; background-color: #5DACCD; color:#fff">Importe</td>
                                        <th style="width:190px; background-color: #5DACCD; color:#fff">Accion</th>
                                    </tr>
                                </thead>

                                <tbody>



                                    <?php while ($data = mysqli_fetch_array($queryClienteff)) { ?>




                                        <tr>

                                            <td>
                                                <?php echo $data['periodo'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['fecha'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['servicio'] ?>
                                            </td>

                                            <td>
                                                <?php echo $data['importe'] ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarsolicitud<?php echo $data['id']; ?>">
                                                    <span class="material-icons">edit</span>

                                                </button>


                                                <a href="../administrador/eliminarsolicitud.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                        echo $usuario; ?>&usuario_apoderado=<?php echo $usuario_apoderado ?>">
                                                    <button type="button" class="btn btn-danger">
                                                        <span class="material-icons">delete</span>

                                                    </button>
                                                </a>



                                            </td>


                                        </tr>

                                        <!--Ventana Modal para Actualizar--->
                                        <?php include('../administrador/Modal/ModalEditarSolicitud.php'); ?>

                                        <!--Ventana Modal para Actualizar--->
                                        <?php include('../administrador/Modal/ModalVerApoderado.php'); ?>


                                    <?php } ?>


                            </table>

                        </div>

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