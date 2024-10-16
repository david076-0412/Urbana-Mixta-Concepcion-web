<?php

include "../conexion.php";
?>


<!DOCTYPE html>
<html>

<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Matricula</title>





    <link rel="stylesheet" href="../apoderado/stylecss/styleapod.css">



    <link href="../imagen/logotipoUMC.ico" type="image/x-icon" rel="shortcut icon" />




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>




</head>


<style>


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


<body style="background-image: url('../imagen/fondo-matricula2.jpg'); background-size: cover; background-position: center; height: 150vh;">

<br>
    <div class="form-container">
        <center>
            <h1>Matrícula 2024</h1>
            <span class="line"></span>

            <h2>Formulario de acceso a Urbana Mixta Concepción</h2>
            <span class="line"></span>
            <p>DATOS DEL PADRE DE FAMILIA, APODERADO O REPRESENTANTE LEGAL</p>
        </center>
        <form action="../apoderado/registrarapoderado.php?rol=<?php $rol= $_GET['rol']; echo "$rol"; ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="inline-block right-margin">
                    <label class="label">Tipo de Documento</label>
                    <select class="input-field" required name="tipo_documento" id="tipo_documento">

                        <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                        <option>CUI</option>

                    </select>


                </div>


                <div class="inline-block responsive">

                    <label class="label">Número de Documento</label>
                    <input type="text" class="input-field" required name="dni" id="dni" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">



                </div>



            </div>



            <div class="row">

                <div class="inline-block right-margin">



                    <label class="label">Apellido Paterno</label>
                    <input type="text" class="input-field" required name="apellido_paterno" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">




                </div>


                <div class="inline-block right-margin">




                    <label class="label">Apellido Materno</label>
                    <input type="text" class="input-field" required name="apellido_materno" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">




                </div>

            </div>


            <div class="row">
                <div class="inline-block right-margin">



                    <label class="label">Nombres</label>
                    <input type="text" class="input-field" required name="nombres" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">



                </div>


                <div class="inline-block right-margin">




                    <label class="label">Usuario</label>
                    <input type="text" class="input-field" required name="usuario" id="usuario_apoderado" placeholder="porfavor escribe al nuevo usuario aqui" onkeyup="verificarUsuario()"><br>

                                <span id="error-msg" style="color: red;"></span>




                </div>





            </div>




            <div class="row">
                <div class="inline-block right-margin">





                    <label class="label">Correo</label>
                    <input type="text" class="input-field" required name="correo" id="correo_alumno" placeholder="porfavor escribe al nuevo correo aqui" onkeyup="verificarCorreo()"><br>
                                <span id="errorcorreo-msg" style="color: red;"></span>



                </div>


                <div class="inline-block right-margin">







                    <label class="label">Contraseña</label>
                    <div class="input-group-box">



                        <input id="password" type="password" class="input-field" required name="password" placeholder="" required>

                        <span class="eye" onclick="myFunction()">
                            <i id="hide1" class="bx bx-show" style="color: #757575;"></i>
                            <i id="hide2" class="bx bx-hide" style="color: #757575;"></i>

                        </span>

                    </div>





                </div>





            </div>



            <div class="row">
                <div class="inline-block right-margin">



                    <label class="label">Foto de documento de identidad</label><br>
                    <label class="label">Tamaño recomendable 50 MB en formato: .pdf</label><br>
                    <input type="file" class="input-field" required name="foto_do_identidad"><br><br>



                </div>

                <div class="inline-block right-margin">

                    <br><br>

                    <input class="btn" type="submit" name="Guardar" value="Guardar">


                    <a href="../panel_inicio.php" class="rg" value="Regresar">Regresar</a>

                </div>






            </div>












        </form>
    </div>






<script>
let timeout;
function verificarUsuario() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        const usuario = document.getElementById('usuario_apoderado').value.trim(); // Eliminar espacios en blanco
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
        const errorcorreoMsg = document.getElementById('errorcorreo-msg');
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







    <script src="../apoderado/package/dist/sweetalert2.all.js"></script>
    <script src="..apoderado/package/dist/sweetalert2.all.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>






    <script src="../apoderado/js/scriptalertapoderado.js"></script>





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




</body>

</html>