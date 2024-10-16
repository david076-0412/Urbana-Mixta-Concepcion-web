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




                <li class="active">
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
                        <h4 class="page-title">Colegio</h4>

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





                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevocolegio">
                    Nuevo Colegio

                </button>

                <?php include("../administrador/Modal/ModalNuevoColegio.php") ?>


                <div class="col-md-12">


                    <?php

                    include('../conexion.php');


                    ?>








                    <?php

                    $usuario = $_SESSION['admin']['usuario'];



                    $sqlClienteff   = ("SELECT c.institucion,c.encabezado,
                    c.telefono,c.direccion,c.correo,c.nivel, c.dia_p,c.dia_s,
                    TIME_FORMAT(c.hora_i, '%h:%i %p') AS hora_ic, TIME_FORMAT(c.hora_f, '%h:%i %p') AS hora_fc,
                    c.id,c.fecha_inscrip,c.usuario, c.estado_logo,c.subir_logo, 
                    c.cant_or, c.cant_desc_est,c.cant_docente_or,
                    c.cant_docente_desc_est,c.titulo,c.contenido 
                    FROM colegio c 
                    WHERE c.usuario = '$usuario'
                    ORDER BY c.nivel ASC");
                    $queryClienteff = mysqli_query($conexion, $sqlClienteff);


                    ?>



                    <br>

                    <div class="row clearfix">



                        <div class="table-responsive">



                            <table id="example" class="table-bordered table-hover" style="width:100%">



                                <thead>
                                    <tr>
                                        <td style="width:120px; background-color: #5DACCD; color:#fff">Institucion</td>
                                        <td style="width:100px; background-color: #5DACCD; color:#fff">Nivel</td>
                                        <td style="width:100px; background-color: #5DACCD; color:#fff">Horario</td>
                                        <td style="width:100px; background-color: #5DACCD; color:#fff">Cantidad de Alumnos</td>
                                        <td style="width:120px; background-color: #5DACCD; color:#fff">Logo</td>
                                        <th style="width:160px; background-color: #5DACCD; color:#fff">Accion</th>
                                    </tr>
                                </thead>

                                <tbody>



                                    <?php while ($data = mysqli_fetch_array($queryClienteff)) { ?>




                                        <tr>
                                            <td>
                                                <?php echo $data['institucion'] ?>
                                            </td>

                                            <td>
                                                <?php echo $data['nivel'] ?>
                                            </td>

                                            <td>
                                                <?php echo $data['dia_p'] ?> a <?php echo $data['dia_s'] ?> <?php echo $data['hora_ic'] ?>-<?php echo $data['hora_fc'] ?>
                                            </td>


                                            <td>
                                                <?php echo $data['cant_desc_est'] ?>
                                            </td>



                                            <?php

                                            $usuario = $_SESSION['usuario'];


                                            $subir_logo = $data['subir_logo'];


                                            ?>


                                            <?php
                                            if ($subir_logo != NULL) {

                                                echo "<td>";

                                                echo '<img src="data:image/png;base64,' . $subir_logo . '" alt="Logo" width="80" height="80">';
                                                echo "</td>";
                                            } else {
                                            ?>
                                                <td>
                                                    <img src="../administrador/images/icono_logo.png" alt="Logo" width="80" height="80">

                                                </td>
                                            <?php
                                            }
                                            ?>





                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editarcolegio<?php echo $data['id']; ?>">
                                                    <span class="material-icons">edit</span>

                                                </button>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#vercolegio<?php echo $data['id']; ?>">
                                                    <span class="material-icons">search</span>

                                                </button>

                                                <a href="../administrador/eliminarcolegio.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                    echo $usuario; ?>">
                                                    <button type="button" class="btn btn-danger">
                                                        <span class="material-icons">delete</span>

                                                    </button>
                                                </a>



                                            </td>


                                        </tr>

                                        <?php include('../administrador/Modal/ModalEditarColegio.php'); ?>

                                        <?php include('../administrador/Modal/ModalVerColegio.php'); ?>



                                    <?php } ?>


                            </table>




                        </div>

                    </div>






                </div>





            </div>








        </div>




    </div>



    <!-------complete html----------->
    <div class="container_bot">
        <input type="checkbox" id="btn-mas">
        <div class="redes">

            <a href="#facebook<?php $usuario = $_SESSION['admin']['usuario'];
                                echo $usuario; ?>" data-toggle="modal">
                                 <i class="fab fa-facebook-f"></i>

            </a>




            <a href="../administrador/chatbot.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                            echo $usuario; ?>" class="btn-wsp" target="_blank">
                <i class="fa-solid fa-robot"></i>
            </a>








        </div>
        <div class="btn-mas">
            <label for="btn-mas" class="fa fa-plus"></label>
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



    <script>
        $(document).ready(function() {
            $('#example').DataTable({


                "language": {
                    "url": "//cdn.datatables.net/plug-ins/2.0.2/i18n/es-ES.json"
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
