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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Apoderado</title>
    <link rel="stylesheet" type="text/css" href="../apoderado/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cargando.css">
    <link rel="stylesheet" type="text/css" href="../apoderado/css/maquinawrite.css">

    <link rel="stylesheet" href="../apoderado/css/bootstrap.minsl.css">
    <!----css3---->
    <link rel="stylesheet" href="../apoderado/css/custom.css">



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

                <li class="active">
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



                <li class="dropdown">
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



                                <form method="post" action="apoderado-list-registro.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                                echo "$usuario"; ?>">








                                    <div class="input-group">



                                        <select name="ano" id="ano" class="form-control">
                                            <option value="">SELECCIONAR...</option>


                                            <?php
                                            // Conexión a la base de datos
                                            include "../conexion.php";

                                            // Consulta para obtener las opciones de la base de datos
                                            $consulta = "SELECT DISTINCT ano_inscrip FROM alumno";
                                            $resultado = mysqli_query($conexion, $consulta);

                                            // Llenar el select con los resultados de la consulta
                                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                                echo "<option value='" . $fila['ano_inscrip'] . "'>" . $fila['ano_inscrip'] . "</option>";
                                            }

                                            // Cerrar la conexión
                                            mysqli_close($conexion);
                                            ?>






                                        </select>

                                        <div class="input-group-append">
                                            <button class="btn" type="submit" name="accion" id="button-addon2">Buscar
                                            </button>
                                        </div>
                                    </div>



                                </form>



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
                        <h4 class="page-title">Registros de Matrículas</h4>

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

                <h2 class="ml-lg-2">Mis Solicitudes registrados</h2>









                <div class="col-md-12">



                    <?php



                    include('../conexion.php');


                    $usuario = $_REQUEST['usuario'];

                    ?>

                    <?php


                    if ($_SERVER["REQUEST_METHOD"] == "POST") {



                        $ano = $_POST['ano'];


                        if ($ano != NULL) {


                            $sqlCliente   = ("SELECT * FROM alumno WHERE usuario_apoderado = '$usuario' AND ano_inscrip = '$ano' ORDER BY ano_inscrip DESC");
                            $queryCliente = mysqli_query($conexion, $sqlCliente);
                            $cantidad     = mysqli_num_rows($queryCliente);

                    ?>


                            <div class="row clearfix">

                                <div class="table-responsive">


                                    <table id="example" class="table table-bordered table-hover" style="width:100%">


                                        <thead>
                                            <tr>
                                                <td style="width:120px; background-color: #5DACCD; color:#fff">Codigo Solicitado
                                                </td>
                                                <td style="width:180px; background-color: #5DACCD; color:#fff">Modalidad</td>
                                                <td style="width:180px; background-color: #5DACCD; color:#fff">Número  de Documento
                                                </td>
                                                <th style="width:180px; background-color: #5DACCD; color:#fff">Apellidos y
                                                    Nombres</th>
                                                <th style="width:180px; background-color: #5DACCD; color:#fff">Fecha de
                                                    Nacimiento</th>

                                                <th style="width:180px; background-color: #5DACCD; color:#fff">Acción</th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                            while ($data = mysqli_fetch_array($queryCliente)) { ?>
                                                <tr>
                                                    <td><?php echo $data['codalu'] ?></td>
                                                    <td><?php echo $data['modalidad'] ?></td>
                                                    <td><?php echo $data['tipo_documento'] ?><?php echo ": " ?><?php echo $data['dni'] ?>
                                                    </td>
                                                    <td><?php echo $data['alumno'] ?>
                                                    </td>
                                                    <td><?php echo date('d/m/Y', strtotime($data['fecha_nacimiento'])); ?></td>



                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vermatriculaalumno<?php echo $data['id']; ?>">
                                                            <span class="material-icons">search</span>

                                                        </button>



                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarmatriculaalumno<?php echo $data['id']; ?>">
                                                            <span class="material-icons">edit</span>

                                                        </button>
                                                    </td>



                                                </tr>


                                                <!--Ventana Modal para Actualizar--->
                                                <?php include('../apoderado/ModalVerAlumnoMatricula.php'); ?>



                                                <?php include('../apoderado/ModalEditarAlumnoMatricula.php'); ?>



                                            <?php } ?>









                                    </table>


                                </div>


                            </div>




















                        <?php


                        } else {



                        ?>



                            <?php

                            $sqlCliente   = ("SELECT * FROM alumno where usuario_apoderado = '$usuario' ORDER BY ano_inscrip DESC");
                            $queryCliente = mysqli_query($conexion, $sqlCliente);
                            $cantidad     = mysqli_num_rows($queryCliente);
                            ?>



                            <div class="row clearfix">


                                <div class="table-responsive">

                                    <table id="example" class="table table-bordered table-hover" style="width:100%">


                                        <thead>
                                            <tr>
                                                <td style="width:120px; background-color: #5DACCD; color:#fff">Codigo Solicitado
                                                </td>
                                                <td style="width:180px; background-color: #5DACCD; color:#fff">Modalidad</td>
                                                <td style="width:180px; background-color: #5DACCD; color:#fff">Número de Documento
                                                </td>
                                                <th style="width:180px; background-color: #5DACCD; color:#fff">Apellidos y
                                                    Nombres</th>
                                                <th style="width:180px; background-color: #5DACCD; color:#fff">Fecha de
                                                    Nacimiento</th>
                                                <th style="width:180px; background-color: #5DACCD; color:#fff">Acción</th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                            while ($data = mysqli_fetch_array($queryCliente)) { ?>
                                                <tr>
                                                    <td><?php echo $data['codalu'] ?></td>
                                                    <td><?php echo $data['modalidad'] ?></td>
                                                    <td><?php echo $data['tipo_documento'] ?><?php echo ": " ?><?php echo $data['dni'] ?>
                                                    </td>
                                                    <td><?php echo $data['alumno'] ?>
                                                    </td>
                                                    <td><?php echo date('d/m/Y', strtotime($data['fecha_nacimiento'])); ?></td>



                                                    <td>


                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vermatriculaalumno<?php echo $data['id']; ?>">
                                                            <span class="material-icons">search</span>

                                                        </button>


                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarmatriculaalumno<?php echo $data['id']; ?>">
                                                            <span class="material-icons">edit</span>

                                                        </button>
                                                    </td>






                                                </tr>


                                                <!--Ventana Modal para Actualizar--->
                                                <?php include('../apoderado/ModalVerAlumnoMatricula.php'); ?>


                                                <?php include('../apoderado/ModalEditarAlumnoMatricula.php'); ?>



                                            <?php } ?>











                                    </table>


                                </div>



                            </div>















                        <?php

                        }
                    } else {




                        ?>




                        <?php

                        $sqlCliente   = ("SELECT * FROM alumno where usuario_apoderado = '$usuario' ORDER BY ano_inscrip DESC");
                        $queryCliente = mysqli_query($conexion, $sqlCliente);
                        $cantidad     = mysqli_num_rows($queryCliente);
                        ?>




                        <div class="row clearfix">







                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td style="width:120px; background-color: #5DACCD; color:#fff">Codigo Solicitado
                                            </td>
                                            <td style="width:180px; background-color: #5DACCD; color:#fff">Modalidad</td>
                                            <td style="width:180px; background-color: #5DACCD; color:#fff">Número de Documento
                                            </td>
                                            <th style="width:180px; background-color: #5DACCD; color:#fff">Apellidos y
                                                Nombres</th>
                                            <th style="width:180px; background-color: #5DACCD; color:#fff">Fecha de
                                                Nacimiento</th>
                                            <th style="width:180px; background-color: #5DACCD; color:#fff">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = mysqli_fetch_array($queryCliente)) { ?>
                                            <tr>
                                                <td><?php echo $data['codalu'] ?></td>
                                                <td><?php echo $data['modalidad'] ?></td>
                                                <td><?php echo $data['tipo_documento'] ?><?php echo ": " ?><?php echo $data['dni'] ?>
                                                </td>
                                                <td><?php echo $data['alumno'] ?>
                                                </td>
                                                <td><?php echo date('d/m/Y', strtotime($data['fecha_nacimiento'])); ?></td>



                                                <td>


                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vermatriculaalumno<?php echo $data['id']; ?>">
                                                        <span class="material-icons">search</span>

                                                    </button>


                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarmatriculaalumno<?php echo $data['id']; ?>">
                                                        <span class="material-icons">edit</span>

                                                    </button>
                                                </td>




                                            </tr>


                                            <!--Ventana Modal para Actualizar--->
                                            <?php include('../apoderado/ModalVerAlumnoMatricula.php'); ?>


                                            <?php include('../apoderado/ModalEditarAlumnoMatricula.php'); ?>



                                        <?php } ?>






                                    <?php   } ?>






















                                </table>
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
                            null // Columna 6
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