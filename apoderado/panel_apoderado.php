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
	<title>Bienvenido</title>
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

	<link href="../apoderado/images/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />


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
				<li class="active">



					<a href="../apoderado/panel_apoderado.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
																		echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">dashboard</i>
						Bienvenido</a>
				</li>

				<li class="dropdown">
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
					<a href="../apoderado/apoderado-tutoria-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
																				echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">extension</i>
						Tutoría</a>
				</li>



				<li class="dropdown">
					<a href="../apoderado/apoderado-notas-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
																				echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">date_range</i>
						Notas</a>
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


<style>
    
    /* Estilo del botón */
.button-container {
    text-align: center;
    margin: 20px 0;
}

#openPopupBtn {
    padding: 15px 30px;
    background-color: #ff9800;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#openPopupBtn:hover {
    background-color: #f57c00;
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

/* Estilo del popup */
.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.popup-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 700px;
    text-align: center;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    transition: transform 0.4s ease;
    max-height: 80%;
    overflow-y: auto;
}

/* Estilo de <h2> en el popup */
.popup-content h2 {
    margin-top: 0;
    font-size: 28px;
    color: #007BFF;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    padding-bottom: 10px;
    border-bottom: 2px solid #007BFF;
    display: inline-block;
}

/* Estilo de <p> en el popup */
.popup-content p {
    font-size: 18px;
    color: #333;
    line-height: 1.6;
    margin: 20px 0;
    font-style: italic;
    border-left: 4px solid #007BFF;
    padding-left: 15px;
}

/* Botón para cerrar el popup */
.close {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 24px;
    cursor: pointer;
    color: #333;
    transition: color 0.3s ease, transform 0.3s ease;
}

.close:hover {
    color: #ff0000;
    transform: scale(1.2);
}

/* Clase para mostrar el popup */
.popup.show {
    display: flex;
    opacity: 1;
}

.popup.show .popup-content {
    transform: scale(1);
}

/* Estilo de las preguntas */
.question {
    margin-bottom: 20px;
    text-align: left;
}

.question p {
    font-weight: bold;
}


/* Estilo de la escala de satisfacción */
.satisfaction-scale {
    display: flex;
    justify-content: space-between; /* Distribuye el espacio entre las caras */
    margin-bottom: 10px; /* Espacio debajo de la escala */
    align-items: center; /* Alinea verticalmente las caras */
}

/* Estilo de las caras */
.face {
    font-size: 24px; /* Tamaño de fuente para las caras */
    cursor: pointer; /* Cursor de mano */
}

/* Grupo de botones de radio */
.radio-group {
    display: flex;
    justify-content: space-between; /* Alinea los botones de radio */
    align-items: center; /* Alinea verticalmente con las caras */
    margin: 0; /* Elimina márgenes por defecto */
}

/* Estilo para los botones de radio */
.radio-group label {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 5px; /* Espacio entre las opciones */
    cursor: pointer; /* Cursor de mano */
}

/* Estilo de los botones de radio en sí */
.radio-group input[type="radio"] {
    display: none; /* Ocultar los botones de radio predeterminados */
}

.radio-group .radio {
    width: 24px;
    height: 24px;
    border: 2px solid #333;
    border-radius: 50%;
    display: inline-block;
    margin-bottom: 5px;
    position: relative;
    transition: background-color 0.3s ease; /* Transición para el fondo */
}

/* Marca cuando está seleccionado */
.radio-group input[type="radio"]:checked + .radio {
    background-color: #ff9800; /* Color de fondo cuando está seleccionado */
    border-color: #ff9800; /* Color del borde cuando está seleccionado */
}



.btn {
    background-color: #007bff; /* Color de fondo azul */
    border: none; /* Sin borde */
    color: #fff; /* Color del texto blanco */
    padding: 10px 20px; /* Espaciado interno */
    text-align: center; /* Centrar el texto */
    text-decoration: none; /* Sin subrayado */
    display: inline-block; /* Para que el tamaño se ajuste al contenido */
    font-size: 16px; /* Tamaño de fuente */
    border-radius: 5px; /* Bordes redondeados */
    transition: background-color 0.3s, transform 0.3s; /* Transiciones suaves */
    cursor: pointer; /* Puntero de mano */
}

.btn:hover {
    background-color: #0056b3; /* Color de fondo en hover */
}

.btn:active {
    transform: scale(0.98); /* Efecto de presionar */
}

.btn:focus {
    outline: none; /* Eliminar el borde azul por defecto del foco */
    box-shadow: 0 0 0 2px rgba(38, 143, 255, 0.5); /* Sombra azul clara */
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


 <?php 
                
                include('../conexion.php');
                $usuario = $_SESSION['apoderado']['usuario'];

                // Consultar la cantidad de descuentos y alumnos ordinarios
                $ql = $conn->prepare("SELECT estado_encuesta FROM encuestas WHERE usuario = ?");
                $ql->bind_param("s", $usuario);
                $ql->execute();
                $result = $ql->get_result();
                $rowq = $result->fetch_assoc();

                $estado_encuesta = $rowq['estado_encuesta'];
                
             
        
        ?>
        
        
        <?php include("../apoderado/Modal/ModalRespondeEncuesta.php"); ?>
            







					<div class="xp-breadcrumbbar text-center">
						<h4 class="page-title">Urbana Mixta Concepción</h4>

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




										<?php


										include('../conexion.php');

										$usuario = $_REQUEST['usuario'];


										$query = "SELECT c.titulo, c.contenido FROM colegio c";

										$resultado = mysqli_query($conexion, $query); // Asegúrate de tener una conexión establecida antes de ejecutar la consulta
										$fila = mysqli_fetch_assoc($resultado);
										$cantidad     = mysqli_num_rows($resultado);



										$resultado_colegio = $conexion->query($query);

										$fila_colegio = $resultado_colegio->fetch_assoc();





										if ($cantidad > 0) {

											$titulo = $fila_colegio['titulo'];
											$contenido = $fila_colegio['contenido'];
										?>

											<h1><?php echo $titulo ?></h1>
											<h2 style="text-align: left; text-transform: none !important">
												<?php echo $contenido ?>
											</h2><br>
											<?php


											?>


										<?php


										} else {

										?>

											<h1>Titulo</h1>

											<h2 class="ml-lg-2">Contenido</h2>
										<?php

										}



										?>



      <div class="button-container">
        
        <button id="openPopupBtn">📋 Responde la Encuesta</button>
        
    </div>  


<?php
include('../conexion.php');
$usuario = $_SESSION['apoderado']['usuario']; // Obtener el usuario de la sesión

// Consulta para obtener el estado de la encuesta
$qlyen = "SELECT estado_encuesta FROM encuestas WHERE usuario = '$usuario'";
$resultado_encuesta = $conexion->query($qlyen);

// Verificar si no se encontró ninguna fila
if ($resultado_encuesta->num_rows == 0) {
    // No hay filas, se debe abrir el popup
    $abrirPopup = 'true';
} else {
    // Obtener el estado de la encuesta
    $respondido = $resultado_encuesta->fetch_assoc();
    
    // Verificar si el estado es diferente de 'Ya encuestado'
    $abrirPopup = ($respondido['estado_encuesta'] !== 'Ya encuestado') ? 'true' : 'false';
}

// Para depuración, imprime el valor de la variable:
echo "<script>console.log('Abrir popup: $abrirPopup');</script>";
?>





<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Obtener los elementos del DOM
    const openPopupBtn = document.getElementById('openPopupBtn');
    const popup = document.getElementById('popup');
    const closePopupBtn = document.getElementById('closePopupBtn');

    // Mostrar el popup al hacer clic en el botón
    openPopupBtn.addEventListener('click', () => {
        popup.style.display = 'flex'; // Cambia a visible
        setTimeout(() => {
            popup.classList.add('show'); // Añade clase para animación
        }, 10);
    });

    // Cerrar el popup al hacer clic en la "x"
    closePopupBtn.addEventListener('click', () => {
        popup.classList.remove('show'); // Quita la clase de animación
        setTimeout(() => {
            popup.style.display = 'none'; // Oculta el popup
        }, 400); // Temporizador para la animación
    });

    // Cerrar el popup al hacer clic fuera del contenido
    window.addEventListener('click', (event) => {
        if (event.target === popup) {
            popup.classList.remove('show'); // Quita la clase de animación
            setTimeout(() => {
                popup.style.display = 'none'; // Oculta el popup
            }, 400); // Temporizador para la animación
        }
    });

    // Abrir el popup al cargar la página si el estado es diferente a 'Ya encuestado'
    const abrirPopup = <?php echo json_encode($abrirPopup); ?>;  // Pasar la variable PHP a JavaScript
    console.log("Valor de abrirPopup:", abrirPopup);  // Verificar en la consola

    if (abrirPopup === true || abrirPopup === 'true') {
        openPopupBtn.click();  // Ejecuta el click para abrir el popup
    }
});
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