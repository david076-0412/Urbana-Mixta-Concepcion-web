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

    select {
        padding: 10px 8px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 2px solid #ededed;
        color: #1b1b1b;
        outline: none;
    }


    .select-tt {
        padding: 10px 8px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 2px solid #ededed;
        color: #1b1b1b;
        outline: none;
        width: 223px;
    }

    .input-text {
        text-transform: none;
        padding: 10px 7px;
        border-radius: 10px;
        border: 2px solid #bbbbbb;
        color: #1b1b1b;
        outline: none;
    }



    .inp-label {
        text-transform: none;
        border: 2px solid transparent;
        color: #969696;
        outline: none;
    }


    .inp-label::placeholder {
        color: #0026ff;
    }



    .input-field {
        width: 260px;
        border-radius: 10px;
        padding: 12px 10px;
        border: 2px solid #ededed;
        box-sizing: border-box;
        margin: 5px 10px 0px 0px;



    }




    .input-group-box {
        position: relative;
        height: 56px;
        margin: 5px 0;
        border-radius: 10px;
        display: flex;
        text-align: left;
        width: 220px;
        padding: 2px;
        border: 2px solid #bbbbbb;
        box-sizing: border-box;
        margin: 5px 20px 0px 0px;


    }


    .input-group-box input {
        width: 85%;
        height: 95%;
        background: transparent;
        outline: none;
        border: 0px solid rgba(61, 61, 61, 0.2);
        border-radius: 15px;
        font-size: 16px;
        color: #000000;


    }


    .input-group-box input::placeholder {
        color: #000000;
    }

    .input-group-box i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
    }
</style>

<!--ventana para Update--->
<div class="modal fade" id="nuevoalumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 780px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Alumno
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form id="form" method="POST" enctype="multipart/form-data" action="../administrador/registraralumno.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                            echo "$usuario"; ?>">

                        <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                    echo "$usuario"; ?>">


                        <input type="hidden" required name="usuario_apoderado" value="<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                        echo "$usuario_apoderado"; ?>">


                        <input type="hidden" required name="usuario_dni_apoderado" value="<?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                                                                            echo "$usuario_dni_apoderado"; ?>">

                        <input type="hidden" required name="usuario_nombre_apoderado" value="<?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                                                                                echo "$usuario_nombre_apoderado"; ?>">

                        <div class="input-group">





                            <div class="row">
                                <div class="inline-block right-margin">

                                    <label>Usuario del Apoderado: </label>

                                    <strong class="inp" style="text-align: left !important">
                                        <?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                        echo $usuario_apoderado; ?>
                                    </strong>


                                    <input type="hidden" id="usuario_apoderado" required name="usuario_apoderado" value="<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                                                            echo $usuario_apoderado; ?>">

                                </div>

<br>

                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    <label>CUI del Apoderado: </label>
                                    <strong class="inp" style="text-align: left !important">
                                        <?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                        echo $usuario_dni_apoderado; ?>
                                    </strong>



                                    <input type="hidden" id="usuario_dni_apoderado" required name="usuario_dni_apoderado" value="<?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                                                                                                                    echo $usuario_dni_apoderado; ?>">
                                </div>
                            </div>




                            <div class="row">
                                <div class="inline-block right-margin">



                                    <label>Apoderado: </label>
                                    <strong class="inp" style="text-align: center !important">

                                        <?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                        echo $usuario_nombre_apoderado; ?><br>

                                    </strong>



                                    <input type="hidden" id="usuario_nombre_apoderado" required name="usuario_nombre_apoderado" value="<?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                                                                                                                        echo $usuario_nombre_apoderado; ?>">



                                </div>



                            </div>








                            <div class="row">
                                <div class="inline-block right-margin">

                                    <label>Tipo de Documento</label><br>

                                    <select class="select-tt" required name="tipo_documento" id="tipo_documento">
                                        <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                                        <option>CUI</option>

                                    </select>
                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">


                                    <label>Numero de Documento</label><br>
                                    <input type="text" class="input-text" required name="dni" id="dni" minlength="8" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>

                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    <label>Estado del Alumno</label><br>

                                    <select required name="estado_alumno" id="estado_alumno" onchange="MostrarCampoEstado()">
                                        <option value="">SELECCIONAR...</option>
                                        <option value="Antiguo">Antiguo</option>
                                        <option value="Nuevo">Nuevo</option>
                                    </select><br>



                                    




                                </div>



                            </div>



                            <div class="row">
                                <div class="inline-block right-margin">

                                    <label>Apellido Paterno</label><br>
                                    <input type="text" class="input-text" required name="apellido_paterno" id="apellido_paterno">

                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">

                                    <label>Apellido Materno</label><br>
                                    <input type="text" class="input-text" required name="apellido_materno" id="apellido_materno">
                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">



                                    <label>Fecha de Nacimiento</label><br>
                                    <input type="date" class="input-text" required name="fecha_nacimiento" placeholder="dd/mm/yyyy" id="fecha_nacimiento" minlength="7" maxlength="7">

                                </div>



                            </div>
                            <br>

                            <div class="row">

                                <div class="inline-block right-margin">
                                    <label>Nombres</label><br>
                                    <input type="text" class="input-text" required name="nombres" id="nombres">
                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">




                                    <label>Usuario</label><br>
                                    <input type="text" class="input-text" required name="usuario_alumno" id="usuario_alumno" onkeyup="verificarUsuario()"><br>

                                <span id="error-msg" style="color: red;"></span>
                                    
                                    
                                    
                                    
                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    <label>Sexo</label><br>

                                    <select style="width: 172px" required name="sexo" id="sexo">
                                        <option value="">SELECCIONAR...</option>
                                        <option>Masculino</option>
                                        <option>Femenino</option>
                                    </select><br>


                                </div>






                            </div>




                            <div class="row">

                                <div class="inline-block right-margin">


                                    <label>Password</label><br>


                                    <div class="input-group-box">


                                        <input id="password" type="password" required name="password">

                                        <span class="eye" onclick="myFunction()">
                                            <i id="hide1" class="bx bx-show" style="color: #757575;"></i>
                                            <i id="hide2" class="bx bx-hide" style="color: #757575;"></i>

                                        </span>

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


                                    </div>


                                </div>

                                <label style="padding: 0px;"></label>
                                <div class="inline-block right-margin">

                                    <label>Tienes Discapacidad</label><br>

                                    <select style="width: 220px;" required name="discapacidad" id="discapacidad" onchange="MostrarCampoSI()">
                                        <option value="">SELECCIONAR...</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>


                                   


                                </div>



                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    
                                    <label id="label1">Tipo de Discapacidad</label>
                                    <input type="text" class="input-text" id="tipo_discapacidad" required name="tipo_discapacidad">

                                </div>





                            </div>




                            <br>


                            <div class="row">

                                <div class="inline-block right-margin">

                                    <label>Nivel</label><br>

                                    <select style="width: 220px;" id="niveles" required name="niveles" onchange="cambiarGrados()">
                                        <option value="">SELECCIONAR...</option>
                                        <option value="Primaria">Primaria</option>

                                    </select>





                                    <script>
                                        function cambiarGrados() {
                                            // Obtener el valor seleccionado en la categoría
                                            var nivelesSeleccionada = $("#niveles").val();

                                            $("#grados").empty();


                                            if (nivelesSeleccionada == null) {
                                                $("#grados").append('<option value="">SELECCIONAR...</option>');
                                            } else {
                                                addGradeOptions(nivelesSeleccionada);
                                            }

                                        }


                                        cambiarGrados();


                                        function addGradeOptions(level) {

                                            $("#grados").empty();


                                            $("#grados").append('<option value="">SELECCIONAR...</option>');




                                            if (level === "Primaria") {


                                                $("#grados").append('<option value="Primero">Primero</option>');
                                                $("#grados").append('<option value="Segundo">Segundo</option>');
                                                $("#grados").append('<option value="Tercero">Tercero</option>');
                                                $("#grados").append('<option value="Cuarto">Cuarto</option>');
                                                $("#grados").append('<option value="Quinto">Quinto</option>');
                                                $("#grados").append('<option value="Sexto">Sexto</option>');



                                            }


                                        }
                                    </script>

                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">



                                    <label>Grado</label><br>

                                    <select style="width: 220px;" id="grados" required name="grados">

                                        <option value="">SELECCIONAR...</option>

                                    </select>


                                    <?php

                                    function generarNumeroAleatorio()
                                    {
                                        // Crear un array con los dígitos del 0 al 9
                                        $digitos = range(0, 9);

                                        // Barajar aleatoriamente el array
                                        shuffle($digitos);

                                        // Tomar los primeros 12 dígitos del array
                                        $numeroAleatorio = implode('', array_slice($digitos, 0, 12));

                                        return $numeroAleatorio;
                                    }

                                    // Generar un número aleatorio sin dígitos repetidos
                                    $numeroSinRepetir = generarNumeroAleatorio();



                                    ?>




                                    <input type="hidden" required name="codalu" id="codalu" value="<?php echo $numeroSinRepetir ?>">
                                </div>


                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">

                                    <label>Correo</label><br>

                                    <input type="text" class="input-text" required name="correo" id="correo" onkeyup="verificarCorreo()"><br>
                                <span id="errorcorreo-msg" style="color: red;"></span>
                                </div>



                            </div>



                            <br>

                            <div class="row">

                                <div class="inline-block right-margin">

                                    <label>Foto de documento de identidad</label><br>
                                    <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                    <input type="file" class="input-text" name="foto_do_identidad" id="foto_do_identidad">

                                </div>


                                <div class="inline-block right-margin">

                                    <label id="label3">Foto de libreta</label>
                                    <label id="label4">Tamaño recomendable 50M en formato: pdf</label>
                                    <input type="file" class="input-text" name="foto_libreta" id="foto_libreta"><br>
                                </div>






                            </div>







                        </div>























                        <br>


                        <div class="modal-footer">
                            <button style="border-radius: 10px;" type="submit" class="btn btn-primary">Guardar</button>

                            <button style="border-radius: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                        </div>


                    </form>


                </div>


            </div>



        </div>
    </div>
</div>
<!---fin ventana Update --->