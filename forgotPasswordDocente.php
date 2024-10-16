<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale-1.0">


	<title>Aula Virtual</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrapValidator.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<link href="imagen/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />


	<style>
		body,
		html {
			height: 100%;
			margin: 0;
		}

		.centered-container {

			justify-content: center;
			align-items: center;
			height: 100%;
			display: flex;
			flex-direction: column;
		}

		.centered-form {
			max-width: 400px;
			width: 100%;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			border-radius: 10px;
			background-color: #fff;
		}


		.button-container {
			display: flex;
			gap: 10px;
			align-items: center;
			justify-content: center;
			/* Ajusta el espacio entre el botón y el enlace según sea necesario */
			margin-top: 20px;
			/* Ajusta el espacio superior según sea necesario */
		}

		.btn {
			margin: 0;
			/* Elimina márgenes predeterminados si es necesario */
		}
	</style>


	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</head>

<body oncontextmenu='return false' class='snippet-body'>
	<div class="centered-container">
		<div class="centered-form">
			<h2 class="font-weight-bold mb-4 text-center">¿Olvidaste tu contraseña?</h2>
			<p class="mb-4 text-center">Cambia tu contraseña en seis sencillos pasos. ¡Esto te ayudará a proteger tu cuenta!</p>
			<ol class="list-unstyled text-left mb-4">
				<li><span class="text-primary text-medium">1. </span>Introduce tu dirección de correo electrónico a continuación.</li>
				<li><span class="text-primary text-medium">2. </span>Nuestro sistema te enviará una OTP a tu correo electrónico.</li>
				<li><span class="text-primary text-medium">3. </span>Introduce la OTP en la página siguiente.</li>
			</ol>
			<form action="../forgotPassword_OTPDocente.php" method="POST">
				<div class="form-group mb-4">
					<label for="email-for-pass" class="sr-only">Ingresa tu email</label>
					<input class="form-control form-control-lg" type="email" name="email" id="email-for-pass" placeholder="Correo electrónico" required="required">
				</div>
			
				<div class="button-container">
					<button class="btn btn-primary btn-block btn-lg" type="submit">Obtener nueva contraseña</button>
				</div>
			</form>
			<div class="button-container">
				<a href="../logindocentee.php" class="btn btn-danger">Atrás para iniciar sesión</a>
			</div>
		</div>
	</div>

	<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
</body>

</html>