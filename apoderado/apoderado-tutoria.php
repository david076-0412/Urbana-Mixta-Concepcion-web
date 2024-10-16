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




        .main-content-ct {
            min-height: 100vh;
            /*background-color: #eee;*/
            padding: 30px 30px 0px 30px;

            align-items: center;

        }




        .main-content-ct img {
            height: 200px;
            width: 200p;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 5px;
        }




        .line {
            display: inline-block;
            width: 50px;
            height: 7px;
            background: linear-gradient(90deg,
                    rgb(39, 103, 241) 0%,
                    rgb(1, 18, 254)77%);
        }



        .inp {
            text-transform: none;
            padding: 17px 10px;
            border: 2px solid transparent;
            color: #969696;
            outline: none;
        }


        .inp::placeholder {
            color: #0026ff;
        }



        .label-txt {
            color: #00c3ff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
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
                        Matricula</a>




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



                <li class="active">
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
                        <h4 class="page-title">Tutoría</h4>

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


            <div class="main-content-ct">

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-12 p-0 flex justify-content-lg-start justify-content-center">


                                        <center>
                                            <h2 class="ml-lg-2">Lista de Alumnos - Tutoría</h2>
                                            <span class="line"></span>

                                            <br>




                                            <?php

                                            include('../conexion.php');


                                            //$usuario = $_REQUEST['usuario'];

                                            $nivel = $_GET['nivel'];

                                            $grado = $_GET['grado'];

                                            $rol = "docente";

                                            $usuario_alumno = $_GET['usuario_alumno'];

                                            $curso = $_GET['curso'];

                                            ?>

                                            <?php




                                            $sqlCliente = ("SELECT d.rol, d.nivel, c.grado, c.nombre,
                                            d.perfil, d.sexo, d.apellido_paterno, d.apellido_materno, d.nombres,
                                            d.direccion, d.fechadn, d.telefono, d.dni 
                                            FROM curso c 
                                            INNER JOIN docente d 
                                            ON c.usuario_alumno = '$usuario_alumno'
                                            WHERE d.rol = '$rol'
                                            AND d.nivel = '$nivel'
                                            AND c.grado = '$grado'
                                            AND LOWER(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(c.nombre, 'á', 'a'), 'é', 'e'), 'í', 'i'), 'ó', 'o'), 'ú', 'u')) = LOWER(REPLACE('Tutoría', 'á', 'a'))");

                                            $queryCliente = mysqli_query($conexion, $sqlCliente);
                                            $cantidad = mysqli_num_rows($queryCliente);



                                            ?>


                                            <?php
                                            while ($data = mysqli_fetch_array($queryCliente)) { ?>
                                                <?php
                                                $perfil = $data['perfil'];

                                                if ($perfil == NULL) {
                                                ?>
                                                    <img src="../apoderado/images/user.png" style="width:180px; border-radius:50%;" alt="Foto del Usuario"><br>
                                                    <span class="line"></span><br>

                                                <?php

                                                } else if ($perfil != NULL) {
                                                ?>
                                                    <img src="data:image/jpeg;base64,<?= base64_encode($data['perfil']) ?>" alt="Foto del Usuario"><br>
                                                    <span class="line"></span><br>
                                                <?php
                                                }

                                                ?>


                                                <?php

                                                if ($cantidad > 0) {

                                                    $sexo = $data['sexo'];

                                                    if ($sexo == "Masculino") {
                                                ?>



                                                        <label class="label-txt"><b>Tutor: </b></label>





                                                    <?php


                                                    } else if ($sexo == "Femenino") {
                                                    ?>

                                                        <label class="label-txt"><b>Tutora: </b></label>


                                                    <?php



                                                    }
                                                    ?>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['apellido_paterno']; ?>
                                                        <?php echo $data['apellido_materno']; ?>
                                                        <?php echo $data['nombres']; ?>
                                                    </strong>
                                                    <br>


                                                    <label class="label-txt"><b>Dirección: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['direccion']; ?>

                                                    </strong>

                                                    <br>

                                                    <label class="label-txt"><b>Sexo: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['sexo']; ?>

                                                    </strong>

                                                    <br>


                                                    <label class="label-txt"><b>Fecha de Nacimiento: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">


                                                        <?php echo date("d/m/Y", strtotime($data['fechadn'])); ?>

                                                    </strong>
                                                    <br>

                                                    <label class="label-txt"><b>Teléfono: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['telefono']; ?>

                                                    </strong>

                                                    <br>

                                                    <label class="label-txt"><b>DNI: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['dni']; ?>

                                                    </strong>
                                                    <br>

                                                    <label class="label-txt"><b>Nivel: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['nivel']; ?>

                                                    </strong>
                                                    <br>

                                                    <label class="label-txt"><b>Grado: </b></label>

                                                    <strong class="inp" style="text-align: center; color: #F8F8F8;">
                                                        <?php echo $data['grado']; ?>

                                                    </strong>
                                                    <br>



                                        </center>



                                    <?php


                                                } else {
                                                    echo "No se encontraron datos";
                                                }



                                    ?>








                                <?php
                                            }

                                ?>









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