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
<div class="modal fade" id="verapoderado<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Apoderado
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">









                    <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                echo "$usuario"; ?>">


                    <input type="hidden" required name="usuario_apoderado" value="<?php echo $data['usuario'] ?>">


                    <input type="hidden" required name="estado_foto" value="<?php echo $data['estado_foto'] ?>">




                    <div class="row">

                        <div class="inline-block right-margin">
                            <label class="label">Tipo de Documento</label><br>
                            <label style="padding: 1px;"></label>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['tipo_documento'] ?>
                            </strong>



                        </div>

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="label">Numero de Documento</label><br>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['dni'] ?>
                            </strong>



                        </div>



                    </div>

                    <br>

                    <div class="row">
                    <label style="padding: 1px;"></label>
                        <div class="inline-block right-margin">



                            <label class="label">Apellido Paterno</label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['apellido_paterno'] ?>
                            </strong>




                        </div>

                        <label style="padding: 22px;"></label>
                        <div class="inline-block right-margin">


                            <label class="label">Apellido Materno</label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['apellido_materno'] ?>
                            </strong>



                        </div>

                    </div>
                    <br>

                    <div class="row">
                        
                    <label style="padding: 1px;"></label>
                        <div class="inline-block right-margin">



                            <label class="label">Nombres</label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['nombres'] ?>
                            </strong>


                        </div>

                        <label style="padding: 35px;"></label>
                        <div class="inline-block right-margin">

                            <label class="label">Usuario</label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['usuario'] ?>
                            </strong>



                        </div>





                    </div>


                    <br>

                    <div class="row">
                        <div class="inline-block right-margin">





                            <label class="label">Correo</label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['correo'] ?>
                            </strong>




                        </div>

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="label">Password</label><br>


                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['password'] ?>
                            </strong>







                        </div>





                    </div>



                </div>


                <br>











                <div class="modal-footer">

                    <button style="border-radius: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>





            </div>


        </div>



    </div>
</div>
</div>
<!---fin ventana Update --->