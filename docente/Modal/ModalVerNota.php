<style>
    /* Agrega un estilo CSS para ocultar el campo de texto */
    .invisible {
        display: none;
    }

    .invisib {
        display: none;
    }



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


<!--ventana para Update--->
<div class="modal fade" id="vernota<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Notas
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">

                        <label style="color: #00B9FF; text-align: center;">Datos de las Notas</label><br>


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




                        <label for="recipient-name" class="col-form-label">Turno: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['turno']; ?>
                        </strong><br>

                        <label for="recipient-name" class="col-form-label">Nota del Cuaderno: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nota_cuaderno']; ?>
                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Participacion Oral: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['participacion_oral']; ?>
                        </strong><br>



                        <label for="recipient-name" class="col-form-label">Examen Mensual: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['examen_mensual']; ?>
                        </strong><br>



                        <label for="recipient-name" class="col-form-label">Examen Bimestral: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['examen_bimestral']; ?>
                        </strong><br>



                        <label for="recipient-name" class="col-form-label">Comportamiento: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['comportamiento']; ?>
                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Nota Bimestral: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nota_bimestral']; ?>
                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Nota Final: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nota_final']; ?>
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