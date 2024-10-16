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





	<link rel="stylesheet" href="../apoderado/css/customss.css">



	<!--google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

	<link href="../apoderado/images/logotiposbp.ico" type="image/x-icon" rel="shortcut icon" />
	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link href="../apoderado/images/logotiposbp.ico" type="image/x-icon" rel="shortcut icon" />





	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<!-- Material Symbols - Outlined Set -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
	<!-- Material Symbols - Rounded Set -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
	<!-- Material Symbols - Sharp Set -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">



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



				<li class="dropdown">
					<a href="../apoderado/apoderado-tutoria-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
																				echo "$usuario"; ?>" class="dashboard"><i class="material-icons">extension</i>
						Tutoria</a>
				</li>



				<li class="dropdown">
					<a href="../apoderado/apoderado-notas-alumno.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
																				echo "$usuario"; ?>" class="dashboard"><i class="material-icons">date_range</i>Notas</a>
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
						<h4 class="page-title">Pagos</h4>

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
						<div class="table-title-rp" style="background-color: #F8F8F8;">


							<div class="col-sm-12 p-0 flex justify-content-lg-start justify-content-center">
								<h1 class="ml-lg-2">Cronograma de Pagos</h1>








							</div>





						</div>







						<div class="main">
							<div class="box-container">

								<?php
								include('../conexion.php');
								$usuario = $_REQUEST['usuario'];
								
								$usuario_alumno = $_REQUEST['usuario_alumno'];

								$sqlCliente = "SELECT * FROM pago 
								WHERE usuario ='$usuario'
								AND usuario_alumno = '$usuario_alumno'";
								$queryCliente = mysqli_query($conexion, $sqlCliente);
								$cantidad = mysqli_num_rows($queryCliente);



								?>


								<?php






								?>




								<?php while ($data = mysqli_fetch_array($queryCliente)) : ?>
									<?php

									include('../conexion.php');


									$hoy = date('Y-m-d');
									$sql = "
    								UPDATE pago
    								SET estado = 
        							CASE
           								WHEN vencimiento > '$hoy' THEN 'PENDIENTE'
            							WHEN vencimiento = '$hoy' THEN 'EN PROCESO'
            							ELSE estado  -- Mantener el estado actual si no se cumplen las condiciones anteriores
        							END
    								WHERE estado IN ('PENDIENTE', 'EN PROCESO')";


									mysqli_query($conexion, $sql);








									include('../apoderado/ModalPagosAlumno.php');

									$boxBackgroundColor = '';

									if ($estado == 'PENDIENTE') {
										$boxBackgroundColor = '#FF0000';
									} elseif ($estado == 'EN PROCESO') {
										$boxBackgroundColor = '#FF5733';
									} elseif ($estado == 'PAGADO') {

										$boxBackgroundColor = '#0CFF00';
									}


									?>


									<div style="background-color: <?php echo $boxBackgroundColor; ?>; height: 200px; width: 240px;" class="box">
										<div style="background-color: #FAFAFA; height: 180px; width: 240px;" class="box-b">
											<div class="text">
												<h2 class="topic-heading">
													<?php echo $data['nombre']; ?>
												</h2>
												<h2 class="topic">Vencimiento:
													<?php echo date("d/m/Y", strtotime($data['vencimiento'])); ?>
												</h2>
												<h2 class="topic">Estado:
													<?php echo $data['estado']; ?>
												</h2>


												<h2 class="topic">Cuota: S/.
													<?php echo $data['cuota']; ?>
												</h2>


												<a type="button" data-toggle="modal" data-target="#verpagos<?php echo $data['id']; ?>">
													<img src="../apoderado/images/payment_icon.png" alt="Pagos">
												</a>
											</div>
										</div>
									</div>

								<?php endwhile; ?>

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






	</div>



</body>



</html>