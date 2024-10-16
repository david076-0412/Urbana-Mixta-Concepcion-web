<?php


include "../conexion.php";

session_start();


if (isset($_SESSION['alumno']['usuario'])) {
} else {
	header('Location: ../loginalumno.php'); // Redireccionar al formulario de inicio de sesión si no ha iniciado sesión

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
	<title>Alumno</title>
	<!-- Bootstrap CSS -->
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
                <h3><img src="../alumno/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>
			</div>
			<ul class="list-unstyled component m-0">




				<li class="active">
					<a href="../alumno/panel_alumno.php?usuario=<?php
																$usuario = $_SESSION['alumno']['usuario'];
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



						<a href="../alumno/alumno-asistencia-curso.php?usuario=<?php
																				$usuario = $_SESSION['alumno']['usuario'];
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


						<a href="../alumno/alumno-notas-curso.php?usuario=<?php
																			$usuario = $_SESSION['alumno']['usuario'];
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
						<h4 class="page-title">Plataforma Virtual</h4>

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
	<script src="../alumno/js/jquery-3.3.1.slim.min.js"></script>
	<script src="../alumno/js/popper.min.js"></script>
	<script src="../alumno/js/bootstrap.min.js"></script>
	<script src="../alumno/js/jquery-3.3.1.min.js"></script>


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