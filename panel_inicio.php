<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Inicio</title>
    <link rel="stylesheet" href="css/estilospi.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="imagen/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />



    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




    <style>
        h2,
        h4,
        span,
        div {

            text-transform: none;
            /* Esta propiedad quita cualquier transformación del texto */

        }
    </style>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


</head>

<body style="background-image: url('imagen/fondo-inicio-1.jpg'); background-size: cover; background-position: center; height: 100vh;">

    <div class="container_bot">
    <input type="checkbox" id="btn-mas">
    <div class="redes">
        <?php
        // Aquí deberías realizar la conexión a la base de datos y la consulta SQL
        include("conexion.php");
        
        $sqlp = "SELECT usuario,facebook FROM admin WHERE usuario = 'adminprimaria'";
        $resultp = $conexion->query($sqlp);
        $rowp = $resultp->fetch_assoc();
        $facebook = $rowp['facebook'];
        ?>
        <a href="<?php if ($facebook == NULL) { echo "https://www.facebook.com"; } else { echo $facebook; } ?>" style="text-decoration: none;" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="chatbot/chatbotde.php" class="btn-wsp" target="_blank">
            <i class='fas fa-robot'></i>
        </a>
        <a href="#" id="verwhatsapp" class="btn-wsp"><i class="fa-brands fa-whatsapp"></i></i></a>
        <?php
        include("conexion.php");
        $sqlpri = "SELECT usuario,telefono FROM admin WHERE usuario = 'adminprimaria'";
        $resultpri = $conexion->query($sqlpri);
        $rowpp = $resultpri->fetch_assoc();
        $telefonopri = $rowpp['telefono'];

        $sql = "SELECT usuario,telefono FROM admin WHERE usuario = 'adminsecundaria'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $telefonose = $row['telefono'];
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.getElementById('verwhatsapp').addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "WhatsApp",
                    text: "Selecciona una opción:",
                    showCancelButton: false,
                    buttonsStyling: false,
                    confirmButtonText: `<button style="margin:5px; padding:10px 20px; background-color:#16A3EA; color:#fff; border-radius:5px;">
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $telefonopri; ?>" style="text-decoration: none; color: #fff;" target="_blank">Primaria</a>
                </button>
                <button style="margin:5px; padding:10px 20px; background-color:#d33; color:#fff; border-radius:5px;">
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $telefonose; ?>" style="text-decoration: none; color: #fff;" target="_blank">Secundaria</a>
                </button>`,
                });
            });
        </script>
    </div>
    <div class="btn-mas">
        <label for="btn-mas" class="fa fa-plus"></label>
    </div>
</div>





<div class="container">
    <div id="content">
        <!------top-navbar-start----------->
        <div class="top-navbar">
            <div class="xd-topbar">
                <div class="row">
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="sidebar-header">
                             <style>
  h3 {
    display: flex; /* Usamos flexbox para alinear los elementos en una sola línea */
    align-items: center; /* Alinea verticalmente los elementos en el centro */

  }

  h3 img {
    margin-right: 10px; /* Espacio entre la imagen y el texto */
  }
  h3 span {
    color: white; /* Cambia el color del texto a blanco */
  }
</style>
                <h3><img src="../administrador/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>
                                
                        </div>
                    </div>
                </div>
                <center>
                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Plataforma Virtual</h4>
                    </div>
                </center>
            </div>
        </div>
        <!------top-navbar-end----------->
        <!-- ========================= Main ==================== -->
        <div class="main" style="background-color: transparent;">
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card" onclick="window.open('loginadmin.php','_blank');">
                    <div class="iconBx">
                        <ion-icon name="file-tray-outline"></ion-icon>
                    </div>
                    <div>
                        <div class="numbers"> Administrador</div>
                    </div>
                </div>
                <div class="card" onclick="window.open('logindocentee.php','_blank');">
                    <div class="iconBx">
                        <ion-icon name="people-circle-outline"></ion-icon>
                    </div>
                    <div>
                        <div class="numbers"> Docentes</div>
                    </div>
                </div>
                <div class="card" onclick="window.open('loginalumno.php','_blank');">
                    <div class="iconBx">
                        <ion-icon name="school-outline"></ion-icon>
                    </div>
                    <div>
                        <div class="numbers"> Estudiantes</div>
                    </div>
                </div>
                <div class="card" onclick="window.open('loginapoderado.php','_blank');">
                    <div class="iconBx">
                        <ion-icon name="happy-outline"></ion-icon>
                    </div>
                    <div>
                        <div class="numbers"> Apoderados</div>
                    </div>
                </div>
                <div class="card" onclick="window.open('apoderado/formularioapoderado.php','_blank');">
                    <div class="iconBx">
                        <ion-icon name="newspaper-outline"></ion-icon>
                    </div>
                    <div>
                        <div class="numbers"> Matriculate</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


















</body>

</html>