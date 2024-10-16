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
        width: 340px;
        border-radius: 10px;
        padding: 12px 10px;
        border: 2px solid #ededed;
        box-sizing: border-box;
        margin: 5px 10px 0px 0px;



    }




    .input-group-box {
        position: relative;
        height: 52px;
        margin: 5px 0;
        border-radius: 10px;
        display: flex;
        text-align: left;
        width: 220px;
        padding: 5px;
        border: 2px solid #bbbbbb;
        box-sizing: border-box;
        margin: 5px 20px 0px 0px;


    }


    .input-group-box input {
        width: 90%;
        height: 50%;
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
<div class="modal fade" id="nuevodocente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Docente
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" id="form" action="../administrador/registrardocente.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                echo "$usuario"; ?>">


                        <input class="input-text" type="hidden" required name="usuario_admin" value="<?php $usuario =$_SESSION['admin']['usuario'];
                                                                                                        echo "$usuario"; ?>">



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Usuario: </label><br>
                                <input class="input-text" type="text" required name="usuario_docente" id="usuario_docente" onkeyup="verificarUsuario()">
                                <br>

                                <span id="error-msg" style="color: red;"></span>

                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Correo: </label><br>
                                <input class="input-text" type="text" required name="correo" id="correo_docente" onkeyup="verificarCorreo()"><br>
                                <span id="errorcorreo-msg" style="color: red;"></span>


                            </div>
                        </div>

                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">password: </label><br>


                                <div class="input-group-box">



                                    <input id="passwordi" type="password" class="input-field" required name="password" placeholder="">

                                    <span class="eye" onclick="myFunctionn()">
                                        <i id="hide12" class="bx bx-show" style="color: #757575;"></i>
                                        <i id="hide22" class="bx bx-hide" style="color: #757575;"></i>

                                    </span>



                                    <script>
                                        function myFunctionn() {
                                            var x = document.getElementById("passwordi");
                                            var y = document.getElementById("hide12");
                                            var z = document.getElementById("hide22");


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

                            <div class="inline-block right-margin">

                                <label class="inp-label">Apellido Paterno: </label><br>
                                <input class="input-text" type="text" required name="apellido_paterno">
                            </div>
                        </div>

                        <br>











                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Apellido Materno: </label><br>
                                <input class="input-text" type="text" required name="apellido_materno">
                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Nombres: </label><br>
                                <input class="input-text" type="text" required name="nombres">

                            </div>
                        </div>

                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Sexo: </label><br>
                                <select style="width: 220px;" class="input-field" required name="sexo" id="sexo">

                                    <option value="">SELECCIONA GENERO</option>
                                    <option>Masculino</option>
                                    <option>Femenino</option>

                                </select>

                            </div>




                            <label style="padding: 5px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Fecha de Nacimiento: </label><br>
                                <input type="date" class="input-text" required name="fechadn" id="fechadn">
                                
                                

                                

                            </div>
                        </div>





                        <br>


                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Telefono: </label><br>
                                <input class="input-text" type="text" required name="telefono" minlength="9" maxlength="9" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Tipo de Documento: </label><br>
                                <select style="width: 220px;" class="input-field" required name="tipo_documento" id="tipo_documento">

                                    <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                                    <option>CUI</option>

                                </select>

                            </div>
                        </div>



                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Documento de Identidad: </label><br>
                                <input class="input-text" type="text" required name="dni" minlength="8" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Nivel: </label><br>
                                <select id="nivel" required name="nivel">
                                    <?php
                                    $usuario_adminee = $_SESSION['admin']['usuario'];
                                    $query_admin = "SELECT d.usuario,d.nivel from docente d WHERE d.usuario_admin='$usuario_adminee'";
                                    $resultado_admin = $conexion->query($query_admin);

                                    $fila_admin = $resultado_admin->fetch_assoc();

                                    $nivel_admin = $fila_admin['nivel'];


                                    // Verificar si este es el elemento seleccionado
                                    $selectedPRIMARIA = ($nivel_admin == 'Primaria') ? 'selected' : '';
                                    
                                   

                                    ?>
                                    
                                    <?php 
                                    
                                    if($usuario_adminee == "adminprimaria"){
                                        ?>
                                        
                                        <option value="">SELECCIONAR...</option>

                                    <option value="Primaria" <?php echo $selectedPRIMARIA ?>>Primaria</option>
                                        
                                        <?php
                                    }else if($usuario_adminee == "adminsecundaria"){
                                        
                                         $usuario_adminee = $_SESSION['admin']['usuario'];
                                    $query_admin = "SELECT d.usuario,d.nivel from docente d WHERE d.usuario_admin='$usuario_adminee'";
                                    $resultado_admin = $conexion->query($query_admin);

                                    $fila_admin = $resultado_admin->fetch_assoc();

                                    $nivel_admin = $fila_admin['nivel'];
                                        
                                        
                                         $selectedSECUNDARIA = ($nivel_admin == 'Secundaria') ? 'selected' : '';
                                        ?>
                                        
                                        
                                        <option value="">SELECCIONAR...</option>

                                    <option value="Secundaria" <?php echo $selectedSECUNDARIA ?>>Secundaria</option>
                                        
                                        
                                        
                                        <?php
                                        
                                    }
                                    
                                    ?>
                                    
                                  




                                </select>
                            </div>
                        </div>


                        <br>



                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Grado: </label><br>
                                <select style="width: 220px;" class="input-field" required name="grado" id="grado">

                                    <option value="">SELECCIONE GRADO</option>
                                    <option>Primero</option>
                                    <option>Segundo</option>
                                    <option>Tercero</option>
                                    <option>Cuarto</option>
                                    <option>Quinto</option>
                                    <option>Sexto</option>

                                </select>

                            </div>


                            <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                        echo $usuario; ?>">


                            <label style="padding: 6px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Direccion: </label><br>
                                <input type="text" class="input-text" required name="direccion">




                            </div>






                        </div>









                </div>





                <br>







                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>


                </form>


            </div>


        </div>



    </div>
</div>
</div>
<!---fin ventana Update --->