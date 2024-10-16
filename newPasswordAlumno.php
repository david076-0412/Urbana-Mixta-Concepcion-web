<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Aula Virtual</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="imagen/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />



     <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        .placeicon {
            font-family: fontawesome
        }

        .custom-control-label::before {
            background-color: #dee2e6;
            border: #dee2e6
        }
    </style>
    
    
     <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .placeicon {
            padding-right: 40px; /* Espacio para el ícono */
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
            top: 50%;
            transform: translateY(-50%); /* Centra verticalmente el ícono */
        }
        .form-group {
            position: relative; /* Para el posicionamiento absoluto del ícono */
        }
    </style>
</head>

<body style="background-image: url('imagen/fondo-login-alumno.png'); background-size: cover; background-position: center; height: 100vh;" oncontextmenu='return false' class='snippet-body bg-info'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
    <div>
        <!-- Container containing all contents -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 mt-5">
                    <!-- White Container -->
                    <div class="container bg-white rounded mt-2 mb-2 px-0">
                        <!-- Main Heading -->
                        <div class="row justify-content-center align-items-center pt-3">
                            <h1>
                                <strong>Restablecer la contraseña</strong>
                            </h1>
                        </div>
                        <div class="pt-3 pb-3">
                            <form class="form-horizontal" action="../newPasswordOtpAlumno.php?email=<?php $email=$_REQUEST['email']; echo $email ?>" method="POST">
                                <!-- User Name Input -->
                                <div class="form-group row justify-content-center px-3">
        <div class="col-9 px-0">
            <input type="password" name="password" id="password" placeholder="&#xf084; &nbsp; Nueva Contraseña" class="form-control border-info placeicon" required="">
            <!-- Ícono de Boxicons para mostrar/ocultar contraseña -->
            <i class="bx bx-hide toggle-password" id="togglePassword"></i>
        </div>
    </div>

                                <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Alternar el tipo de input entre 'password' y 'text'
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Alternar el ícono entre 'bx-hide' y 'bx-show'
            this.classList.toggle('bx-hide');
            this.classList.toggle('bx-show');
        });
    </script>
                                <!-- Password Input -->
                                
                                 <div class="form-group row justify-content-center px-3">
        <div class="col-9 px-0">
            <input type="password" name="confPassword" id="confPassword" placeholder="&#xf084; &nbsp; Confirmar Nueva Contraseña" class="form-control border-info placeicon">
            <!-- Ícono de Boxicons para mostrar/ocultar contraseña -->
            <i class="bx bx-hide toggle-password" id="toggleconfPassword"></i>
        </div>
    </div>

                                <script>
        const toggleConfPassword = document.querySelector('#toggleconfPassword');
        const confpasswordInput = document.querySelector('#confPassword');

        toggleConfPassword.addEventListener('click', function () {
            // Alternar el tipo de input entre 'password' y 'text'
            const type = confpasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confpasswordInput.setAttribute('type', type);
            
            // Alternar el ícono entre 'bx-hide' y 'bx-show'
            this.classList.toggle('bx-hide');
            this.classList.toggle('bx-show');
        });
    </script>

                                <!-- Log in Button -->
                                <div class="form-group row justify-content-center">
                                    <div class="col-6 px-3 mt-3">
                                        <input type="submit" value="Resetear Contraseña" class="btn btn-block btn-info">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Alternative Login -->
                        <div class="mx-0 px-0 bg-light">

                            <!-- Horizontal Line -->
                            <div class="px-4 pt-5">
                                <hr>
                            </div>
                            <!-- Register Now -->
                            <div class="pt-2">
                                <div class="row justify-content-center">
                                    <h5>
                                        Regresar al Login?<span><a href="../loginalumno.php" class="text-danger">Regresar a Loguear!</a></span>
                                    </h5>
                                </div>
                                <div class="row justify-content-center align-items-center pt-4 pb-5">
                                    <div class="col-4">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>

</body>

</html>




