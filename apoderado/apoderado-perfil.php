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

	<link href="../apoderado/images/logotiposbp.ico" type="image/x-icon" rel="shortcut icon" />
	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


	<!--google material icon-->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link href="../apoderado/images/logotiposbp.ico" type="image/x-icon" rel="shortcut icon" />




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


		label {

			text-transform: none;
			/* Esta propiedad quita cualquier transformación del texto */

		}





		.input-box-bx input {
			width: 100%;
			height: 80%;
			background: white;
			border: 2px solid #757575;
			border-radius: 10px;
			font-size: 16px;
			color: #757575;
			padding: 15px 30px 15px 15px;


		}





		.form-group-modal .input-box-bx {
			position: relative;

		}



		.input-box-bx input::placeholder {
			color: #e9e9e9;
		}

		.input-box-bx i {
			position: absolute;
			right: 20px;
			top: 42%;
			transform: translateY(-50%);
			font-size: 25px;
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

				<li class="dropdown">
					<a href="../apoderado/apoderado-matricula.php?usuario=<?php $usuario = $_SESSION['apoderado']['usuario'];
																			echo "$usuario"; ?>&rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" class="dashboard"><i class="material-icons">aspect_ratio</i>
						Matricula</a>




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
						Tutoria</a>
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
						<h4 class="page-title">Perfil - Usuario</h4>

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


										<h2 class="ml-lg-2">Informacion Basica</h2>

									</div>
								</div>













								<center>
									<p>



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


											<img src="data:image/jpeg;base64,<?= base64_encode($fila['perfil']) ?>" style="width:180px; border-radius:50%;" alt="Foto del Usuario">





										<?php

										} else {
										?>

											<img src="../apoderado/images/user.png" style="width:180px; border-radius:50%;" alt="Foto del Usuario">


										<?php

										}

										?>


										<a href="#fotoperfil<?php echo $fila['usuario']; ?>" class="edit" data-toggle="modal">
											<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
										<br><br>
										</tr>












									<h4>
										<?php
										include('../conexion.php');

										$usuario = $_REQUEST['usuario'];


										$query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";

										$resultado = mysqli_query($conexion, $query); // Asegúrate de tener una conexión establecida antes de ejecutar la consulta
										$fila = mysqli_fetch_assoc($resultado);

										echo $fila['apellido_paterno'];
										echo " ";
										echo $fila['apellido_materno'];
										echo " ";
										echo $fila['nombres'];
										?>
									</h4>








									</p>


								</center>






								<div class="main-content">
									<div class="row">
										<div class="col-md-12">
											<div class="table-wrapper">
												<div class="table-title">
													<div class="row">
														<div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">

															<table class="table table-striped table-hover">


																<tbody>

																	<tr>

																		<?php


																		include('../conexion.php');

																		$usuario = $_REQUEST['usuario'];


																		$query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";

																		$resultado = mysqli_query($conexion, $query); // Asegúrate de tener una conexión establecida antes de ejecutar la consulta
																		$fila = mysqli_fetch_assoc($resultado);



																		?>



																		<td>Nombre Completo:
																			<?php


																			echo $fila['apellido_paterno'];
																			echo " ";
																			echo $fila['apellido_materno'];
																			echo " ";
																			echo $fila['nombres'];
																			?>

																		</td>


																		<td>
																			<a href="#ModalPerfilApoderado<?php echo $fila['usuario']; ?>" class="edit" data-toggle="modal">
																				<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>



																		</td>


																	</tr>



																</tbody>



															</table>






														</div>

													</div>



													<div class="row">
														<div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">

															<table class="table table-striped table-hover">


																<tbody>

																	<tr>

																		<?php


																		include('../conexion.php');

																		$usuario = $_REQUEST['usuario'];


																		$query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";
																		$resultado = $conexion->query($query);
																		$row = $resultado->fetch_assoc();


																		?>



																		<td>
																			<?php


																			echo $row['tipo_documento'];
																			echo ": ";
																			echo $row['dni'];
																			?>

																		</td>


																		<td>
																			<a href="#ModalPerfilApoderado<?php echo $row['usuario']; ?>" class="edit" data-toggle="modal">
																				<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>



																		</td>


																	</tr>



																</tbody>



															</table>






														</div>

													</div>








													<div class="row">
														<div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">

															<table class="table table-striped table-hover">


																<tbody>

																	<tr>

																		<?php


																		include('../conexion.php');

																		$usuario = $_REQUEST['usuario'];


																		$query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";
																		$resultado = $conexion->query($query);
																		$row = $resultado->fetch_assoc();


																		?>



																		<td>
																			<?php

																			echo "Correo: ";
																			echo $row['correo'];
																			?>

																		</td>


																		<td>
																			<a href="#ModalPerfilApoderado<?php echo $row['usuario']; ?>" class="edit" data-toggle="modal">
																				<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>



																		</td>


																	</tr>



																</tbody>



															</table>

														</div>

													</div>






													<div class="row">
														<div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">

															<table class="table table-striped table-hover">


																<tbody>

																	<tr>

																		<?php


																		include('../conexion.php');

																		$usuario = $_REQUEST['usuario'];


																		$query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";
																		$resultado = $conexion->query($query);
																		$row = $resultado->fetch_assoc();


																		?>



																		<td>
																			<?php

																			echo "Usuario: ";
																			echo $row['usuario'];
																			?>

																		</td>


																		<td>
																			<a href="#ModalPerfilApoderado<?php echo $row['usuario']; ?>" class="edit" data-toggle="modal">
																				<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>



																		</td>


																	</tr>



																</tbody>



															</table>

														</div>

													</div>








													<div class="row">
														<div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">

															<table class="table table-striped table-hover">


																<tbody>

																	<tr>

																		<?php


																		include('../conexion.php');

																		$usuario = $_REQUEST['usuario'];


																		$query = "SELECT * FROM apoderado WHERE usuario ='$usuario'";
																		$resultado = $conexion->query($query);
																		$row = $resultado->fetch_assoc();


																		?>



																		<td>
																			<?php

																			echo "Contraseña: ";
																			echo "************";
																			?>

																		</td>


																		<td>
																			<a href="#ModalPerfilApoderado<?php echo $row['usuario']; ?>" class="edit" data-toggle="modal">
																				<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>



																		</td>


																	</tr>



																</tbody>



															</table>

														</div>

													</div>







												</div>

											</div>

										</div>

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




	<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


	<!--ventana para Update--->
	<div class="modal fade" id="ModalPerfilApoderado<?php echo $row['usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #0B2545 !important;">
					<h6 class="modal-title" style="color: #fff; text-align: center;">
						Perfil
					</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<form method="POST" action="../apoderado/actualizar_perfil.php?usuario=<?php echo $row['usuario']; ?>&rol=<?php $rol=$_GET['rol']; echo "$rol"; ?>">

					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

		
					
					<div class="modal-body" id="cont_modal">



						<div class="form-group-modal">


							<label style="color: #00B9FF; text-align: center;" class="col-form-label">Datos de
								Perfil</label><br>


							<label>Apellido Paterno: </label>

							<input type="text" class="input-text" required name="apellido_paterno" id="apellido_paterno" value="<?php echo $row['apellido_paterno']; ?>" onkeypress="soloLetras(event)"><br>


							<label>Apellido Materno: </label>

							<input type="text" class="input-text" required name="apellido_materno" id="apellido_materno" value="<?php echo $row['apellido_materno']; ?> " onkeypress=soloLetras(event)"><br>


							<label>Nombres: </label>

							<input type="text" class="input-text" required name="nombres" id="nombres" value="<?php echo $row['nombres']; ?>" onkeypress="soloLetras(event)"><br>


							<label>Tipo de Documento</label>


							<select required name="tipo_documento" id="tipo_documento">


                                <?php
                                // Verificar si este es el elemento seleccionado
                                $selectedCUI = ($row['tipo_documento'] == 'CUI') ? 'selected' : '';
                                
                                ?>

                                <option value="">SELECCIONAR...</option>
                                <option value="CUI" <?php echo $selectedCUI ?>>DNI</option>
                                


                            </select>






							<label>Documento de Identidad: </label>

							<input type="text" class="input-text" required name="dni" id="dni" value="<?php echo $row['dni']; ?>" minlength="8" maxlength="8" oninput="validarNumero(this)"><br>



							<label>Correo: </label>

							<input type="email" class="input-text" required name="correo" id="correo" value="<?php echo $row['correo']; ?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"><br>


							<label>Usuario: </label>

							<input type="text" class="input-text" required name="usuario" id="usuario" value="<?php echo $row['usuario']; ?>"><br>




							<label>Password</label>

							<div class="input-box-bx">

								<input id="password" type="password" required name="password" placeholder="" value="<?php echo $row['password']; ?>" required>
								<span class="eye" onclick="myFunction()">
									<i id="hide1" class="bx bx-show" style="color: #757575;"></i>
									<i id="hide2" class="bx bx-hide" style="color: #757575;"></i>

								</span>




							</div>





						</div>




					</div>


					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar Cambios</button>

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
					</div>


				</form>

			</div>
		</div>
	</div>
	<!---fin ventana Update --->






	<!--ventana para Update--->
	<div class="modal fade" id="fotoperfil<?php echo $fila['usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #0B2545 !important;">
					<h6 class="modal-title" style="color: #fff; text-align: center;">
						Perfil
					</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<form method="POST" action="../apoderado/actualizar_foto_perfil.php?usuario=<?php echo $fila['usuario']; ?>" enctype="multipart/form-data">

					<input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

					<input class="invisible" type="hidden" id="usuario" required name="usuario" value="<?php echo $fila['usuario']; ?>" readonly>

					<div class="modal-body" id="cont_modal">



						<div class="form-group-modal">


							<?php

							$imagen_perfil = $fila['perfil'];


							if ($imagen_perfil != NULL) {
							?>


								<img src="data:image/jpeg;base64,<?= base64_encode($fila['perfil']) ?>" style="width:180px; border-radius:50%;" alt="Foto del Usuario">



							<?php

							} else {

							?>

								<img src="../apoderado/images/user.png" style="width:180px; border-radius:50%;" alt="Foto del Usuario">


							<?php

							}

							?>

							<br>

							<label>Foto de Perfil</label>
							<label>Tamaño recomendable 50M en formato: jpg</label><br>
							<input type="file" required name="perfil" id="perfil"><br>







						</div>




					</div>


					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar Cambios</button>

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
					</div>


				</form>

			</div>
		</div>
	</div>
	<!---fin ventana Update --->












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