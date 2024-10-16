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

    <link href="../alumno/images/logotiposbp.ico" type="image/x-icon" rel="shortcut icon" />
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="../alumno/images/logotiposbp.ico" type="image/x-icon" rel="shortcut icon" />




    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">





    <style>
        /* Estilo para alinear a la derecha */
        .select-right {
            float: right;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            text-transform: none;
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


                        <a href="../alumno/alumno-list-curso.php?usuario=<?php echo $data['usuario'] ?>" class="dashboard"><i class="material-icons">apps</i>
                            Cursos</a>

                    <?php } ?>










                </li>



                <li class="dropdown">
                    <a href="../alumno/alumno-horario-cursos.php?usuario=<?php $usuario = $_SESSION['alumno']['usuario'];
                                                                            echo "$usuario"; ?>" class="dashboard"><i class="material-icons">access_time</i>
                        Horario</a>
                </li>




                <li class="active">

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
                        <h4 class="page-title">Asistencias</h4>

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

                <?php
                include "../conexion.php";

                $usuario = $_REQUEST['usuario'];

                $alumno = $_REQUEST['alumno'];

                $docente = $_REQUEST['docente'];

                $nivel = $_REQUEST['nivel'];
                $tema = $_REQUEST['tema'];
                $grado = $_REQUEST['grado'];



                $sql = "SELECT tema, hora, dia, fecha_inicio, fecha_asis, DATE_FORMAT(fecha_inicio, '%d') as dis ,fecha_fin, 
                DATE_FORMAT(fecha_fin, '%e de %M de %Y') AS fecha_formateada, fecha_asis,
                tipoasistencia, 
                alumno, 
                docente,
                nivel, grado   
                FROM asistencia 
                WHERE alumno='$alumno'
                AND tema = '$tema' 

                AND docente = '$docente'

                AND nivel = '$nivel' 
                AND grado = '$grado'
                ORDER BY `asistencia`.`id` ASC";

                $result = $conexion->query($sql);

                $sqll = "SELECT DISTINCT tema, hora, dia, fecha_inicio, fecha_asis, DATE_FORMAT(fecha_inicio, '%d') as dis ,fecha_fin, 
                DATE_FORMAT(fecha_fin, '%e de %M de %Y') AS fecha_formateada, fecha_asis,
                tipoasistencia, 
                alumno,
                docente,
                nivel, grado   
                FROM asistencia 
                WHERE alumno = '$alumno' 
                AND docente = '$docente'
                AND tema = '$tema' 
                AND nivel = '$nivel' 
                AND grado = '$grado'
                ORDER BY `asistencia`.`id` ASC";

                $resultt = $conexion->query($sqll);



                ?>

                <h2 class="ml-lg-2">Asistencia de Clases: <?php echo $nivel ?> - <?php echo $grado ?> Grado</h2>




                <?php
                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    $clases = [];


                    while ($row = $result->fetch_assoc()) {
                        $hora = $row['hora'];
                        $dia = $row['dia'];
                        $tipoasistencia = $row['tipoasistencia'];

                        if (!isset($clases[$hora])) {
                            $clases[$hora] = [];
                        }

                        $clases[$hora][$dia] = $tipoasistencia;
                    }








                    $conexion->close();
                ?>

                    <div class="row clearfix">
                        <div class="table-responsive">
                            <table class="table-bordered table-hover" style="width:100%">
                                <thead>


                                    <tr>

                                        <?php


                                        // Process the date information outside of the while loop
                                        if ($data = $resultt->fetch_assoc()) {

                                            $fecha_inicio = $data['fecha_inicio'];
                                            $fecha_dia = $data['dis'];
                                            $fecha_actual = $data['fecha_asis'];
                                            $fecha_fin = str_replace(
                                                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                                ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                                $data['fecha_formateada']
                                            );

                                            echo '<th colspan="6" style="text-align: center;"><h3>' . $fecha_dia . " - " . $fecha_fin . '<h3></th>';
                                        }

                                        ?>

                                    </tr>


                                    <tr>
                                        <th style="width:120px; background-color: #5DACCD; color:#fff">Horario</th>
                                        <th style="width:120px; background-color: #5DACCD; color:#fff">Lunes</th>
                                        <th style="width:120px; background-color: #5DACCD; color:#fff">Martes</th>
                                        <th style="width:120px; background-color: #5DACCD; color:#fff">Miercoles</th>
                                        <th style="width:120px; background-color: #5DACCD; color:#fff">Jueves</th>
                                        <th style="width:120px; background-color: #5DACCD; color:#fff">Viernes</th>
                                    </tr>



                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($clases as $hora => $dias) {
                                        echo "<tr>";
                                        echo "<th>$hora</th>";

                                        $dias_semana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];

                                        foreach ($dias_semana as $dia) {
                                            $style = '';
                                            $content = '';

                                            if (isset($dias[$dia])) {
                                                switch ($dias[$dia]) {
                                                    case "PRESENTE":
                                                        $style = 'background-color: #4CAF50; color: #fff;'; // Verde para Presente
                                                        break;
                                                    case "TARDANZA":
                                                        $style = 'background-color: #FFC107; color: #fff;'; // Amarillo para Tardanza
                                                        break;
                                                    case "FALTA":
                                                        $style = 'background-color: #E53935; color: #fff;'; // Rojo para Falta
                                                        break;
                                                    case "RECREO":
                                                        echo '<td colspan="6" style="text-align:center; background-color: #F3F3F3;">RECREO</td>';
                                                        break 2; // Salir del bucle después de combinar las celdas para "RECREO"
                                                }
                                                $content = $dias[$dia];
                                            }

                                            echo '<td style="' . $style . '">' . $content . '</td>';
                                        }

                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>










                        </div>
                    </div>





                <?php
                } else {
                    echo "No se encontraron resultados.";
                }
                ?>
            </div>
        </div>













    </div>


    </div>



    </div>


    </div>



    <script src="../alumno/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../alumno/js/popper.min.js"></script>
    <script src="../alumno/js/bootstrap.min.js"></script>
    <script src="../alumno/js/jquery-3.3.1.min.js"></script>






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
























</body>

</html>