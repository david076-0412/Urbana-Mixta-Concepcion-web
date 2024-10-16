<?php


include "../conexion.php";

session_start();


if (isset($_SESSION['apoderado']['usuario'])) {
} else {
  header('Location: ../loginapoderado.php'); // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión

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
  <title>Apoderado</title>
  <!-- Bootstrap CSS -->
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

  <link href="../imagen/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />




  <link rel="stylesheet" href="../apoderado/stylecss/stylemaal.css">


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





  <style>
    /* Agrega un estilo CSS para ocultar el campo de texto */
    .invisible {
      display: none;
    }

    .invisib {
      display: none;
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
                <h3><img src="../apoderado/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>
      </div>
      <ul class="list-unstyled component m-0">
        <li class="dropdown">



          <a href="../apoderado/panel_apoderado.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                            echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">dashboard</i>
            Bienvenido</a>
        </li>

        <li class="active">
          <a href="../apoderado/apoderado-matricula.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">aspect_ratio</i>
            Matrícula</a>




        <li class="dropdown">
          <a href="../apoderado/apoderado-list-alumno-curso.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                        echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">apps</i>
            Cursos</a>
        </li>



        <li class="dropdown">
          <a href="../apoderado/apoderado-horario-cursos.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                      echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">access_time</i>
            Horario</a>
        </li>


        <li class="dropdown">
          <a href="../apoderado/apoderado-alumno-asistencia.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                        echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">equalizer</i>
            Asistencia</a>
        </li>



        <li class="dropdown">
          <a href="listartareaalumnos?name=<c:out value='${sessionScope.alumnos.name} ${sessionScope.alumnos.apellido}' />" class="dashboard"><i class="material-icons">extension</i>
            Tutoría</a>
        </li>



        <li class="dropdown">
          <a href="../apoderado/apoderado-notas-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                    echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">date_range</i>Notas</a>
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
                                                                                echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>">
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
            <h4 class="page-title">Registrar al Alumno</h4>

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
        <div class="row">
          <div class="col-md-12">
            <div class="table-wrapper">

              <div class="table-title">
                <div class="row">
                  <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                    <!--<h1 class="ml-lg-2">Bienvenidos</h1>-->



                    <?php

                    include('../conexion.php');

                    $usuario = $_REQUEST['usuario'];


                    $query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";
                    $resultado = $conexion->query($query);
                    $row = $resultado->fetch_assoc();

                    $apellido_paterno = $row['apellido_paterno'];
                    $apellido_materno = $row['apellido_materno'];
                    $nombres = $row['nombres'];


                    $usuario_nombre_apoderado = $apellido_paterno . " " . $apellido_materno . " " . $nombres;


                    ?>



                    <form action="../apoderado/registraralumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                            echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" method="POST" enctype="multipart/form-data">


                      


                      <h1>Registro de Solicitud de Vacantes</h1>
                      <span class="line"></span>

                      <h2>Formulario para registrar al alumno en Urbana Mixta Concepción</h2>
                      <span class="line"></span>
                      <p>Datos del Alumno</p>


                      <div class="input-group">


                        <label class="label-txt"><b>Datos del representante legal</b></label><br>



                        <left>


                          <strong class="inp" style="text-align: center !important">
                            Usuario: <?php $usuario = $_SESSION['apoderado']['usuario'];
                            echo "$usuario"; ?>
                          </strong><br><br>


                          <input type="hidden" id="usuario_apoderado" required name="usuario_apoderado" value="<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                                              echo "$usuario"; ?>">


                          <strong class="inp" style="text-align: center !important">
                            <?php echo $row['dni']; ?>
                          </strong><br><br>



                          <input type="hidden" id="usuario_dni_apoderado" required name="usuario_dni_apoderado" value="<?php echo $row['dni']; ?>">






                          <strong class="inp" style="text-align: center !important">

                            <?php echo $usuario_nombre_apoderado ?>

                          </strong><br><br>



                          <input type="hidden" id="usuario_nombre_apoderado" required name="usuario_nombre_apoderado" value="<?php echo $usuario_nombre_apoderado ?>"><br>




                        </left>






                        <label class="label-txt"><b>Registrar Datos del estudiante</b></label>


                        <label>Tipo de Documento</label>

                        <select required name="tipo_documento" id="tipo_documento">
                          <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                          <option>CUI</option>

                        </select><br>

                        <label>Numero de Documento</label>
                        <input type="text" required name="dni" id="dni" minlength="8" maxlength="8"><br>

                        <label>Apellido Paterno</label>
                        <input type="text" required name="apellido_paterno" id="apellido_paterno"><br>

                        <label>Apellido Materno</label>
                        <input type="text" required name="apellido_materno" id="apellido_materno"><br>


                        <label>Fecha de Nacimiento</label>
                        <input type="date" required name="fecha_nacimiento" placeholder="dd/mm/yyyy" id="fecha_nacimiento" minlength="7" maxlength="7"><br>

                        <label>Nombres</label>
                        <input type="text" required name="nombres" id="nombres"><br>

                        <label>Usuario</label>
                        <input type="text" required name="usuario_alumno" id="usuario_alumno" onkeyup="verificarUsuario()"><br><span id="error-msg" style="color: red;"></span>


                                <label>Correo</label>
      

                        <input type="text" required name="correo" id="correo_alumno" onkeyup="verificarCorreo()"><br><span id="error_alumno-msg" style="color: red;"></span>

                        <label>Contraseña</label>




                        <div class="input-box">


                          <input id="password" type="password" required name="password" placeholder="Escribe tu Contraseña">

                          <span class="eye" onclick="myFunction()">
                            <i id="hide1" class="bx bx-show" style="color: #757575;"></i>
                            <i id="hide2" class="bx bx-hide" style="color: #757575;"></i>

                          </span>




                        </div>
                        <br>









                        <label>Sexo</label>

                        <select required name="sexo" id="sexo">
                          <option value="">SELECCIONAR...</option>
                          <option>Masculino</option>
                          <option>Femenino</option>
                        </select><br>

                        
                        <label>Foto de documento de identidad</label>
                        <label>Tamaño recomendable 50M en formato: pdf</label>
                        <input class="input-file" type="file" name="foto_do_identidad" id="foto_do_identidad"><br>



                        <label>Estado del Alumno</label>

                        <select required name="estado_alumno" id="estado_alumno" onchange="MostrarCampoEstado()">
                          <option value="">SELECCIONAR...</option>
                          <option value="Antiguo">Antiguo</option>
                          <option value="Nuevo">Nuevo</option>
                        </select><br>



                        <label id="label1">Foto de libreta</label>
                        <label id="label2">Tamaño recomendable 50M en formato: pdf</label>
                        <input class="input-file" type="file" name="foto_libreta" id="foto_libreta"><br>
                    





                        <!--
    
    
                                <div class="form-txt">
                                    <a href="#">Politicas de privacidad</a>
                                    <a href="#">Termino y condiciones</a>
                                </div>
                
                                -->


                        <label class="label-txt">Datos de Priorizacion</label>

                        <label>Tienes Discapacidad</label>

                        <select required name="discapacidad" id="discapacidad" onchange="MostrarCampoSI()">
                          <option value="">SELECCIONAR...</option>
                          <option value="SI">SI</option>
                          <option value="NO">NO</option>
                        </select><br>




                        <input type="text" id="tipo_discapacidad" name="tipo_discapacidad" placeholder="Indique la discapacidad que tiene"><br>




                        <label class="label-txt">Institución Educativa</label>


                        <label>Nivel</label>

                        <select id="niveles" required name="niveles" onchange="cambiarGrados()">
                          <option value="">SELECCIONAR...</option>
                          <option value="Primaria">Primaria</option>
                          <option value="Secundaria">Secundaria</option>
                        </select><br>





                        <label>Grado</label>

                        <select id="grados" required name="grados">

                          <option value="">SELECCIONAR...</option>

                        </select><br>


                        <?php

                        function generarNumeroAleatorio()
                        {
                          // Crear un array con los dígitos del 0 al 9
                          $digitos = range(0, 9);

                          // Barajar aleatoriamente el array
                          shuffle($digitos);

                          // Tomar los primeros 12 dígitos del array
                          $numeroAleatorio = implode('', array_slice($digitos, 0, 12));

                          return $numeroAleatorio;
                        }

                        // Generar un número aleatorio sin dígitos repetidos
                        $numeroSinRepetir = generarNumeroAleatorio();



                        ?>




                        <input type="hidden" required name="codalu" id="codalu" value="<?php echo $numeroSinRepetir ?>"><br>







                        <input class="btnn" type="submit" id="register" name="Guardar" value="Guardar">



                        <a href="../apoderado/apoderado-matricula.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                              echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="rgg" value="Regresar">Regresar</a>







                      </div>








                    </form>












                  </div>
                </div>






              </div>
            </div>





          </div>
        </div>








      </div>

    </div>



    <!-------complete html----------->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../apoderado/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../apoderado/js/popper.min.js"></script>
    <script src="../apoderado/js/bootstrap.min.js"></script>
    <script src="../apoderado/js/jquery-3.3.1.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>







    <script>
      $(document).ready(function() {


        $('#example').DataTable({
            "searching": false

          }


        );
      });
    </script>







<script>
let timeout;
function verificarUsuario() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        const usuario = document.getElementById('usuario_alumno').value.trim(); // Eliminar espacios en blanco
        const errorMsg = document.getElementById('error-msg');
        const submitBtn = document.getElementById('submit-btn');
        
        if (usuario) { // Solo hacer la verificación si el campo no está vacío
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'verificar_usuario.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status === 200) {
                    if (this.responseText === 'exists') {
                        errorMsg.textContent = 'Usuario ya existe';
                        submitBtn.disabled = true; // Deshabilitar el botón de envío
                        usuario.disabled = false;
                    } else {
                        errorMsg.textContent = '';
                        submitBtn.disabled = false; // Habilitar el botón de envío
                        usuario.disabled = false;
                    }
                } else {
                    errorMsg.textContent = 'Error en la verificación';
                    submitBtn.disabled = true; // Deshabilitar el botón de envío en caso de error
                }
            };
            xhr.send('usuario=' + encodeURIComponent(usuario));
        } else {
            errorMsg.textContent = '';
            submitBtn.disabled = false; // Habilitar el botón de envío si el campo está vacío
        }
    }, 500); // Esperar 500ms después de que el usuario haya dejado de escribir
}


function verificarCorreo() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        const correo = document.getElementById('correo_alumno').value.trim(); // Eliminar espacios en blanco
        const errorcorreoMsg = document.getElementById('error_alumno-msg');
        const submitBtn = document.getElementById('submit-btn');
        
        if (correo) { // Solo hacer la verificación si el campo no está vacío
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'verificar_correo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status === 200) {
                    if (this.responseText === 'exists') {
                        errorcorreoMsg.textContent = 'Correo ya existe';
                        submitBtn.disabled = true; // Deshabilitar el botón de envío
                        correo.disabled = false;
                    } else {
                        errorcorreoMsg.textContent = '';
                        submitBtn.disabled = false; // Habilitar el botón de envío
                        usuario.disabled = false;
                    }
                } else {
                    errorcorreoMsg.textContent = 'Error en la verificación';
                    submitBtn.disabled = true; // Deshabilitar el botón de envío en caso de error
                }
            };
            xhr.send('correo_alumno=' + encodeURIComponent(correo));
        } else {
            errorcorreoMsg.textContent = '';
            submitBtn.disabled = false; // Habilitar el botón de envío si el campo está vacío
        }
    }, 500); // Esperar 500ms después de que el usuario haya dejado de escribir
}



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



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>











    <script src="../apoderado/package/dist/sweetalert2.all.js"></script>
    <script src="..apoderado/package/dist/sweetalert2.all.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>














    <script>
      function cambiarGrados() {
        // Obtener el valor seleccionado en la categoría
        var nivelesSeleccionada = $("#niveles").val();

        $("#grados").empty();


        if (nivelesSeleccionada == null) {
          $("#grados").append('<option value="">SELECCIONAR...</option>');
        } else {
          addGradeOptions(nivelesSeleccionada);
        }

      }


      cambiarGrados();


      function addGradeOptions(level) {

        $("#grados").empty();


        $("#grados").append('<option value="">SELECCIONAR...</option>');




        if (level === "Primaria") {


          $("#grados").append('<option value="Primero">Primero</option>');
          $("#grados").append('<option value="Segundo">Segundo</option>');
          $("#grados").append('<option value="Tercero">Tercero</option>');
          $("#grados").append('<option value="Cuarto">Cuarto</option>');
          $("#grados").append('<option value="Quinto">Quinto</option>');
          $("#grados").append('<option value="Sexto">Sexto</option>');



        } else if (level === "Secundaria") {

          $("#grados").append('<option value="Primero">Primero</option>');
          $("#grados").append('<option value="Segundo">Segundo</option>');
          $("#grados").append('<option value="Tercero">Tercero</option>');
          $("#grados").append('<option value="Cuarto">Cuarto</option>');
          $("#grados").append('<option value="Quinto">Quinto</option>');



        }


      }
    </script>









    <script>
      function MostrarCampoSI() {
        var mostrar = document.getElementById("discapacidad");
        var textField = document.getElementById("tipo_discapacidad");

        // Si se selecciona "Sí", muestra el TextField; de lo contrario, lo oculta.

        if (textField == null) {
          textField.style.display = (mostrar.value === "NO") ? "block" : "none";
        } else {

          textField.style.display = (mostrar.value === "SI") ? "block" : "none";
        }



      }


      MostrarCampoSI();
    </script>





<script>
  function MostrarCampoEstado() {
    var mostrar = document.getElementById("estado_alumno");
    var fileField = document.getElementById("foto_libreta");
    var label1 = document.getElementById("label1");
    var label2 = document.getElementById("label2");

    // Si se selecciona "Sí", muestra el campo de archivo; de lo contrario, lo oculta.
    fileField.style.display = (mostrar.value === "Nuevo") ? "block" : "none";
    label1.style.display = (mostrar.value === "Nuevo") ? "block" : "none";
    label2.style.display = (mostrar.value === "Nuevo") ? "block" : "none";
  }

  MostrarCampoEstado();
</script>








    <script>
      function myFunction() {
        var x = document.getElementById("password");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");


        if (x.type === 'password') {
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
        } else {
          x.type = "password";
          y.style.display = "none";
          z.style.display = "block";
        }






      }
    </script>









    <script>
      function validarNumero(input) {
        // Elimina cualquier carácter no numérico utilizando una expresión regular
        input.value = input.value.replace(/[^0-9]/g, '');
      }
    </script>








    <script>
      function soloLetras(e) {
        var key = e.keyCode || e.which;
        var tecla = String.fromCharCode(key).toLowerCase();
        var letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";

        if (letras.indexOf(tecla) == -1) {
          e.preventDefault();
        }
      }
    </script>









</body>

</html>