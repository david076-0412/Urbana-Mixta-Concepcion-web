<style>
    .select-bx {
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









    /*-------modal-style end------*/



    /*-------footer design start------*/
    footer {
        background-color: #eeeeee;
        color: #fff;
        text-align: center;
        padding: 10px 30px;
        position: relative;
        width: 100%;
    }

    /*-------footer design end------*/
</style>


<!--ventana para Update--->
<div class="modal fade" id="verasistencia<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div tyle="max-width: 600px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Asistencia
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">

                        <label style="color: #00B9FF; text-align: center;">Datos de la Asistencia</label><br>


                        <label for="recipient-name" class="col-form-label">Alumno: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['alumno']; ?>
                        </strong><br>

                        <label for="recipient-name" class="col-form-label">Curso: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['curso']; ?>
                        </strong><br>



                        <label for="recipient-name" class="col-form-label">Tema: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['tema']; ?>
                        </strong><br>




                        <label for="recipient-name" class="col-form-label">Docente: </label>

                        <strong style="text-align: center; text-transform: none !important">

                            <?php echo $data['docente'] ?>
                        </strong><br>




                        <label for="recipient-name" class="col-form-label">Nivel: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nivel']; ?>
                        </strong><br>




                        <label for="recipient-name" class="col-form-label">Grado: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['grado']; ?>
                        </strong><br>




                        <label for="recipient-name" class="col-form-label">Tipo de Asistencia: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['tipoasistencia']; ?>
                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Fecha de Inicio: </label>

                        <strong style="text-align: center; text-transform: none !important">

                            <?php
                            // Fecha en formato 'y-m-d'
                            $fechaOriginalii = $data['fecha_inicio'];;

                            // Crear un objeto DateTime
                            $fechaObjetoii = DateTime::createFromFormat('Y-m-d', $fechaOriginalii);

                            // Obtener la fecha en el nuevo formato 'd/m/y'
                            $fechaNuevaii = $fechaObjetoii->format('d/m/y');

                            ?> <?php echo $fechaNuevaii ?>

                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Fecha de Asistencia: </label>

                        <strong style="text-align: center; text-transform: none !important">

                            <?php
                            // Fecha en formato 'y-m-d'
                            $fechaOriginal = $data['fecha_asis'];

                            // Crear un objeto DateTime
                            $fechaObjeto = DateTime::createFromFormat('Y-m-d', $fechaOriginal);

                            // Obtener la fecha en el nuevo formato 'd/m/y'
                            $fechaNueva = $fechaObjeto->format('d/m/y');

                            ?> <?php echo $fechaNueva ?>

                        </strong><br>

                        <label for="recipient-name" class="col-form-label">Fecha Final: </label>

                        <strong style="text-align: center; text-transform: none !important">

                            <?php
                            // Fecha en formato 'y-m-d'
                            $fechaOriginalff = $data['fecha_fin'];

                            // Crear un objeto DateTime
                            $fechaObjetoff = DateTime::createFromFormat('Y-m-d', $fechaOriginalff);

                            // Obtener la fecha en el nuevo formato 'd/m/y'
                            $fechaNuevaff = $fechaObjetoff->format('d/m/y');

                            ?> <?php echo $fechaNuevaff ?>

                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Hora: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['hora']; ?>
                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Dia de la Semana: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['dia']; ?>
                        </strong><br>





                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->