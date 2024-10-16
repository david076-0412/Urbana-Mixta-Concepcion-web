<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula Virtual</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link href="imagen/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- Include the above in your HEAD tag -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="../css/bootstrapValidator.css">
    <link rel="stylesheet" href="../css/styledd.css" />
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilostt.css">




    <style type="text/css">
        .form-gap {
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3>
                                <i class="fa fa-lock fa-4x"></i>
                            </h3>
                            <h2 class="text-center">Ingrese la OTP</h2>
                            <?php
                            if (isset($_REQUEST["message"])) {
                                echo "<p class='text-danger ml-1'>" . $_REQUEST["message"] . "</p>";
                            }
                            ?>

                            <div class="panel-body">
                                <form id="register-form" action="../ValidateOtpAdmin.php?email=<?php $email=$_REQUEST['email']; echo $email?>" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" class="form-control" type="hidden" required="required" value="<?php $email=$_REQUEST['email'];  echo $email ?>">
                                            <input id="opt" name="otp" placeholder="Enter OTP" class="form-control" type="text" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Restablecer la contraseña" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                    <a href="../loginadmin.php" class="btn btn-danger">Atrás para iniciar sesión</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>