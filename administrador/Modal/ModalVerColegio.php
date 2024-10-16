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
</style>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<!--ventana para Update--->
<div class="modal fade" id="vercolegio<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 670px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Colegio
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <input class="input-text" type="hidden" required name="id" value="<?php echo $data['id'] ?>">

                    <div class="row">


                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Institucion: </label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['institucion'] ?>
                            </strong>
                        </div>
                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Encabezado: </label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['encabezado'] ?>
                            </strong>

                        </div>
                    </div>

                    <br>



                    <div class="row">


                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">
                            <label class="inp-label">Teléfono: </label><br>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['telefono'] ?>
                            </strong>
                        </div>
                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Direccion: </label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['direccion'] ?>
                            </strong>
                        </div>
                    </div>

                    <br>

                    <div class="row">


                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Correo: </label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['correo'] ?>
                            </strong>
                        </div>


                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Nivel: </label><br>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['nivel'] ?>
                            </strong>




                        </div>
                    </div>


                    <br>

                    <div class="row">


                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Dias de la Semana: </label><br>


                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['dia_p'] ?> -
                            </strong>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['dia_s'] ?>
                            </strong><br>


                        </div>



                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">
                            <label class="inp-label">Hora: </label><br>


                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo date('h:i A', strtotime($data['hora_ic'])); ?> a
                            </strong>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo date('h:i A', strtotime($data['hora_fc'])); ?>
                            </strong><br>



                        </div>
                    </div>
                    <br>



                    <div class="row">


                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Fecha de Inscripción</label><br>
                            <label style="padding: 2px;"></label>
                            <strong style="text-align: left; text-transform: none !important">

                                <?php
                                // Fecha en formato original (yyyy-mm-dd)
                                $fechaOriginal = $data['fecha_inscrip'];

                                // Crear un objeto DateTime usando la fecha original
                                $fechaDateTime = new DateTime($fechaOriginal);

                                // Formatear la fecha en el nuevo formato (dd/mm/yyyy)
                                $fechaFormateada = $fechaDateTime->format('d/m/Y');

                                // Imprimir la fecha formateada
                                echo $fechaFormateada;
                                ?>
                            </strong><br>

                        </div>




                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Cantidad de Alumnos Disponibles</label><br>

                            <label style="padding: 2px;"></label>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['cant_or'] ?>
                            </strong><br>


                        </div>

                    </div>

                    <br>


                    <div class="row">

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Cantidad de Alumnos Restantes</label><br>
                            <label style="padding: 2px;"></label>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['cant_desc_est'] ?>
                            </strong><br>
                        </div>
                        <label style="padding: 20px;"></label>
                        <div class="inline-block right-margin">


                            <label class="inp-label">Titulo: </label><br>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['titulo'] ?>
                            </strong><br>

                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label class="inp-label">Cantidad de Docentes Disponibles</label><br>

                            <label style="padding: 2px;"></label>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['cant_docente_or'] ?>
                            </strong><br>
                        </div>
                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">


                            <label class="inp-label">Cantidad de Docentes Restantes</label><br>
                            <label style="padding: 2px;"></label>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['cant_docente_desc_est'] ?>
                            </strong><br>

                        </div>
                    </div>


                    <br>


                    <style>
  

    .content-text {
        word-wrap: break-word; /* Rompe las palabras largas para evitar desbordamiento */
    }
</style>

                    <label class="inp-label" style="font-size: 14px; margin-right: 5px;">Contenido:</label>
<strong class="content-text" style="font-size: 10px; text-align: left; text-transform: none !important; line-height: 1.5;">
    <?php echo $data['contenido']; ?>
</strong><br>


                    <?php

                    $estado_logo = $data['estado_logo'];

                    if ($estado_logo == "SUBIDO") {
                    ?>
                        <label class="inp-label">Logo: </label><br>
                        <?php

                        echo '<img src="data:image/png;base64,' . $data['subir_logo'] . '" alt="Logo" width="80" height="80">';

                        echo '<br>';
                        ?>



                    <?php


                    } else if ($estado_logo == "SIN SUBIR") {
                    ?>

                        <label class="inp-label">Logo: </label><br>
                        <img src="../administrador/images/icono_logo.png" alt="Logo" width="80" height="80">


                    <?php

                    }

                    ?>








                    <br>



                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                    </div>





                </div>


            </div>



        </div>
    </div>
</div>
<!---fin ventana Update --->