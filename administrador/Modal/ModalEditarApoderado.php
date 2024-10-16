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
<div class="modal fade" id="editarapoderado<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Apoderado
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" enctype="multipart/form-data" action="../administrador/editarapoderado.php">



                        <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                    echo "$usuario"; ?>">


<input type="hidden" required name="usuario_apoderado" value="<?php echo $data['usuario'] ?>">


                        <input type="hidden" required name="estado_foto" value="<?php echo $data['estado_foto'] ?>">




                        <div class="row">
                            <div class="inline-block right-margin">
                                <label class="label">Tipo de Documento</label><br>
                                <select class="input-field" required name="tipo_documento" id="tipo_documento">

                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedDNI = ($data['tipo_documento'] == 'CUI') ? 'selected' : '';
                                    
                                    ?>
                                    <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                                    <option value="CUI" <?php echo $selectedDNI ?>>CUI</option>
                                    





                                </select>


                            </div>


                            <div class="inline-block right-margin">

                                <label class="label">Numero de Documento</label><br>
                                <input type="text" class="input-field" required name="dni" id="dni" value="<?php echo $data['dni'] ?>" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">




                            </div>



                        </div>

                        <br>

                        <div class="row">

                            <div class="inline-block right-margin">



                                <label class="label">Apellido Paterno</label><br>
                                <input type="text" class="input-field" required name="apellido_paterno" value="<?php echo $data['apellido_paterno'] ?>">




                            </div>


                            <div class="inline-block right-margin">




                                <label class="label">Apellido Materno</label><br>
                                <input type="text" class="input-field" required name="apellido_materno" value="<?php echo $data['apellido_materno'] ?>">




                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="inline-block right-margin">



                                <label class="label">Nombres</label><br>
                                <input type="text" class="input-field" required name="nombres" value="<?php echo $data['nombres'] ?>">



                            </div>


                            <div class="inline-block right-margin">




                                <label class="label">Usuario</label><br>
                                <input type="text" class="input-field" required name="usuario" value="<?php echo $data['usuario'] ?>">




                            </div>





                        </div>


                        <br>

                        <div class="row">
                            <div class="inline-block right-margin">





                                <label class="label">Correo</label><br>
                                <input type="text" class="input-field" required name="correo" value="<?php echo $data['correo'] ?>">




                            </div>


                            <div class="inline-block right-margin">

                                <label class="label">Password</label><br>
                                
                                <input id="passworde" type="text" class="input-field" required name="password" placeholder="" value="<?php echo $data['password'] ?>">

                                





                            </div>





                        </div>

                        <br>

                        <div class="row">
                            <div class="inline-block right-margin">

                                <?php
                                $estado_foto = $data['estado_foto'];
                                if ($estado_foto == "SIN SUBIR") {
                                ?>

                                    <label class="label">Foto de documento de identidad</label><br>
                                    <label class="label">Tamaño recomendable 50M en formato: .pdf</label><br>
                                    <input type="file" style="width: 400px" class="input-field" required name="foto_do_identidad"><br><br>



                                <?php
                                } else if ($estado_foto == "SUBIDO") {
                                ?>

                                    <label>Foto de Documento de Identidad: </label><br>


                                    <a href="../administrador/mostrar_foto_iden.php?id=<?php echo $data['id']; ?>&usuario_apoderado=<?php echo $data['usuario'] ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                                                            echo $usuario; ?>" target="_blank">
                                        <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                    </a>

                                    <p><a href="../administrador/descargar_foto_iden.php?usuario_apoderado=<?php echo $data['usuario'] ?>&apellido_paterno=<?php echo $data['apellido_paterno'] ?>&apellido_materno=<?php echo $data['apellido_materno'] ?>&nombres=<?php echo $data['nombres'] ?>&tipo_documento=<?php echo $data['tipo_documento'] ?>" target="_blank">Descargar Archivo</a></p>


                                    <p><a href="../administrador/eliminar_foto_iden.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                echo $usuario; ?>">Eliminar Archivo</a></p>


                                <?php
                                }
                                ?>







                            </div>









                        </div>














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