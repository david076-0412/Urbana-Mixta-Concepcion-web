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
<div class="modal fade" id="veralumno<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 780px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Alumno
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">









                    <div class="input-group">





                        <div class="row">
                            <div class="inline-block right-margin">

                                <label>Usuario del Apoderado: </label><br>

                                <strong class="inp" style="text-align: left !important">
                                    <?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                    echo $usuario_apoderado; ?>
                                </strong>



                            </div>



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Dni del Apoderado: </label><br>
                                <strong class="inp" style="text-align: left !important">
                                    <?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                    echo $usuario_dni_apoderado; ?>
                                </strong>



                            </div>
                        </div>




                        <div class="row">
                            <label style="padding: 45px;"></label>
                            <div class="inline-block right-margin">



                                <label>Apoderado: </label><br>
                                <strong class="inp" style="text-align: center !important">

                                    <?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                    echo $usuario_nombre_apoderado; ?>

                                </strong>





                            </div>

                        </div>

                        <label style="padding: 8px;"></label>


                        <div class="row">
                            <div class="inline-block right-margin">

                                <label>Tipo de Documento</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['tipo_documento'] ?>

                                </strong>


                            </div>
                            <label style="padding: 25px;"></label>
                            <div class="inline-block right-margin">


                                <label>Numero de Documento</label><br>
                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['dni'] ?>

                                </strong>


                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Correo</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['correo'] ?>

                                </strong>


                            </div>






                        </div>



                        <div class="row">
                            <div class="inline-block right-margin">

                                <label>Alumno</label><br>
                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['alumno'] ?>

                                </strong>



                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">



                                <label>Fecha de Nacimiento</label><br>
                                <strong class="inp" style="text-align: center !important">
                                    <?php echo date('d/m/Y', strtotime($data['fecha_nacimiento'])); ?>
                                </strong>



                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">




                                <label>Usuario</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['usuario'] ?>

                                </strong>
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Tiempo de Espera</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>

                                </strong>

                            </div>







                        </div>


                        <div class="row">




                            <div class="inline-block right-margin">
                                <label>Sexo</label><br>
                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['sexo'] ?>

                                </strong>



                            </div>


                            <label style="padding: 30px;"></label>
                            <div class="inline-block right-margin">

                                <label>Nivel</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['nivel'] ?>

                                </strong>


                            </div>
                            <label style="padding: 30px;"></label>
                            <div class="inline-block right-margin">



                                <label>Grado</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['grado'] ?>

                                </strong>

                            </div>




                            <label style="padding: 30px;"></label>
                            <div class="inline-block right-margin">

                                <label>Cod_Alumno</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['codalu'] ?>

                                </strong>


                            </div>


                            <label style="padding: 45px;"></label>
                            <div class="inline-block right-margin">

                                <label>Estado</label><br>

                                <strong class="inp" style="text-align: center !important">

                                    <?php echo $data['estado_alumno'] ?>

                                </strong>


                            </div>







                        </div>










                    </div>




                    <div class="row">
                        <label style="padding: 1px;"></label>
                        <div class="inline-block right-margin">

                            <label>Password</label><br>
                            <strong class="inp" style="text-align: center !important">

                                <?php echo $data['password'] ?>

                            </strong>




                        </div>


                        <label style="padding: 30px;"></label>
                        <div class="inline-block right-margin">

                            <label>Tienes Discapacidad</label><br>

                            <strong class="inp" style="text-align: center !important">

                                <?php echo $data['discapacidad'] ?>

                            </strong>







                        </div>



                        <label style="padding: 30px;"></label>
                        <div class="inline-block right-margin">
                            <label>Tipo de Discapacidad</label><br>


                            <strong class="inp" style="text-align: center !important">

                                <?php echo $data['tipo_discapacidad'] ?>

                            </strong>



                        </div>
                        <label style="padding: 30px;"></label>
                        <div class="inline-block right-margin">

                            <label>Estado</label><br>


                            <strong class="inp" style="text-align: center !important">

                                <?php echo $data['estado'] ?>

                            </strong>






                        </div>



                    </div>
























                </div>











                <br>


                <div class="modal-footer">

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