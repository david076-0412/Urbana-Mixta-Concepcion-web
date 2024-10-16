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
        width: 260px;
        padding: 5px;
        border: 2px solid #bbbbbb;
        box-sizing: border-box;
        margin: 5px 20px 0px 0px;


    }


    .input-group-box input {
        width: 90%;
        height: 70%;
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
<div class="modal fade" id="nuevoapoderado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Apoderado
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" enctype="multipart/form-data" action="../administrador/registrarapoderado.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                echo "$usuario"; ?>">



                        <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                    echo "$usuario"; ?>">


                        <div class="row">
                            <div class="inline-block right-margin">
                                <label class="label">Tipo de Documento</label><br>
                                <select class="input-field" required name="tipo_documento" id="tipo_documento">

                                    <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                                    <option>CUI</option>

                                </select>


                            </div>


                            <div class="inline-block right-margin">

                                <label class="label">Numero de Documento</label><br>
                                <input type="text" class="input-field" required name="dni" id="dni" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">




                            </div>



                        </div>

                        <br>

                        <div class="row">

                            <div class="inline-block right-margin">



                                <label class="label">Apellido Paterno</label><br>
                                <input type="text" class="input-field" required name="apellido_paterno" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">




                            </div>


                            <div class="inline-block right-margin">




                                <label class="label">Apellido Materno</label><br>
                                <input type="text" class="input-field" required name="apellido_materno" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">




                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="inline-block right-margin">



                                <label class="label">Nombres</label><br>
                                <input type="text" class="input-field" required name="nombres" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');">



                            </div>


                            <div class="inline-block right-margin">




                                <label class="label">Usuario</label><br>
                                <input type="text" class="input-field" required name="usuario" id="usuario" onkeyup="verificarUsuario()"><br>

                                <span id="error-msg" style="color: red;"></span>



                               

                            </div>





                        </div>


                        <br>

                        <div class="row">
                            <div class="inline-block right-margin">





                                <label class="label">Correo</label><br>
                                <input type="text" class="input-field" required name="correo" id="correo" onkeyup="verificarCorreo()"><br>
                                <span id="errorcorreo-msg" style="color: red;"></span>



                            </div>


                            <div class="inline-block right-margin">

                                <label class="label">Password</label><br>
                                <div class="input-group-box">



                                    <input id="password" type="password" class="input-field" required name="password" placeholder="" required>

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





                        </div>

                        <br>

                        <div class="row">
                            <div class="inline-block right-margin">



                                <label class="label">Foto de documento de identidad</label><br>
                                <label class="label">Tamaño recomendable 50M en formato: .pdf</label><br>
                                <input type="file" style="width: 400px" class="input-field" required name="foto_do_identidad"><br><br>



                            </div>









                        </div>














                        <div class="modal-footer">
                            <button style="border-radius: 10px;" type="submit" class="btn btn-primary" id="submit-btn">Guardar</button>

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