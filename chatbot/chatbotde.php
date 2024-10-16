<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot</title>
    <link rel="stylesheet" href="../chatbot/style.css">

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

    <link href="../apoderado/images/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />



    <!--Icon-Font-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

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

<body>



    <!-- =============== Navigation ================ -->
    <div class="container">









        <div id="content">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="sidebar-header">
                                <a href="../panel_inicio.php" style="text-decoration: none; color: inherit;">
                                    
                                    
                                    <style>
  h3 {
    display: flex; /* Usamos flexbox para alinear los elementos en una sola línea */
    align-items: center; /* Alinea verticalmente los elementos en el centro */
  }

  h3 img {
    margin-right: 10px; /* Espacio entre la imagen y el texto */
  }

  h3 span {
    color: white; /* Color del texto blanco */
    font-family: 'Roboto', sans-serif; /* Cambia la tipografía si prefieres otra */
    font-size: 24px; /* Tamaño de fuente ajustado para elegancia */
    font-weight: 300; /* Ligero para un estilo más refinado */
    letter-spacing: 1px; /* Espaciado entre letras para mayor claridad */
    text-transform: uppercase; /* Todo el texto en mayúsculas */
  }
</style>

<h3><img src="../apoderado/images/logoUMC.png" class="img-fluid" /><span>Urbana Mixta Concepción</span></h3>

                                    
                                    
                                    
                                </a>

                            </div>
                        </div>








                    </div>



                    <!--
                    <center>
                        <div class="xp-breadcrumbbar text-center">
                            <h4 class="page-title">Plataforma Virtual</h4>


                        </div>
                    </center>

    -->


                </div>
            </div>
        </div>
        <!------top-navbar-end----------->

        <!-- ========================= Main ==================== -->
        <div class="main">


            <div class="wrapper">
                <div class="title">ChatBot</div>
                <div class="form">
                    <div class="bot-inbox inbox">
                        <div class="icon">
                            <i class="fa-solid fa-user-secret"></i>
                        </div>
                        <div class="msg-header">

                            <?php

                            include('../conexion.php');


                            ?>


                            <?php

                            



                            $sqlClienteff   = ("SELECT DISTINCT saludo,mensaje_bienvenida,opciones FROM chatbot_bienvenida");
                            $queryClienteff = mysqli_query($conexion, $sqlClienteff);


                            ?>


                            <?php while ($data = mysqli_fetch_array($queryClienteff)) {
                            ?>


                                <p><?php echo $data['saludo'] ?></p><br>
                                <p><?php echo $data['mensaje_bienvenida'] ?></p><br>
                                
                                <p><?php echo $data['opciones'] ?></p>

                            <?php
                            } ?>

                            
                        </div>
                    </div>
                </div>
                <div class="typing-field">
                    <div class="input-data">
                        <input id="data" type="text" placeholder="Escribe aquí.." required>
                        <button id="send-btn">Enviar</button>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {

                    function showInactiveMessage() {
                        var inactiveMsg = '<div class="bot-inbox inbox"><div class="icon"><i class="fa-solid fa-user-secret"></i></div><div class="msg-header"><p>¡Hey! Parece que has estado inactivo por más de 5 minutos. ¿En qué más puedo ayudarte?</p></div></div>';
                        $(".form").append(inactiveMsg);
                        // Puedes agregar más lógica aquí según tus necesidades
                    }


                    // Inicializar el temporizador al cargar la página
                    var inactivityTimer = setTimeout(showInactiveMessage, 300000); // 5 minutos en milisegundos







                    $("#send-btn").on("click", function() {
                        // Reiniciar el temporizador cada vez que se envía un mensaje
                        clearTimeout(inactivityTimer);
                        $value = $("#data").val();
                        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                        $(".form").append($msg);
                        $("#data").val('');


                        // iniciar el código ajax
                        $.ajax({
                            url: '../chatbot/message.php',
                            type: 'POST',
                            data: 'text=' + $value,
                            success: function(result) {
                                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa-solid fa-user-secret"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                                $(".form").append($replay);
                                // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                                $(".form").scrollTop($(".form")[0].scrollHeight);


                                // Reiniciar el temporizador después de recibir una respuesta
                                inactivityTimer = setTimeout(showInactiveMessage, 300000); // 5 minutos en milisegundos
                            }
                        });
                    });








                });
            </script>





        </div>
    </div>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


















</body>

</html>