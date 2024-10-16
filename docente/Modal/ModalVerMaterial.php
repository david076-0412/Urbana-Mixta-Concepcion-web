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
<div class="modal fade" id="vercurso<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Materia
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="modal-body" id="cont_modal">

                    <div class="form-group">

                        <label style="color: #00B9FF; text-align: center;">Datos del Curso</label><br>


                        <label for="recipient-name" class="col-form-label">Alumno: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['alumno']; ?>
                        </strong><br>

                        <label for="recipient-name" class="col-form-label">Curso: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nombre']; ?>
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

                        <?php
                        $archivomaterial = $data['archivomaterial'];

                        if ($archivomaterial != NULL) {
                        ?>
                            <a href="../docente/mostrar_material.php?id=<?php echo $data['id']; ?>&nombre=<?php echo $data['nombre']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>" target="_blank">
                                <img src="../docente/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                            </a>

                            <p><a href="../docente/descargar_material.php?nombre=<?php echo $data['nombre']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>" target="_blank">Descargar Archivo</a></p>


                            <p><a href="../docente/eliminar_material_subida.php?id=<?php echo $data['id']; ?>&usuario_docente=<?php echo $data['usuario_docente']; ?>&usuario_alumno=<?php echo $data['usuario_alumno']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>">Eliminar Archivo</a></p>


                        <?php
                        } else {

                        ?>


                            <a href="#" id="verArchivo">
                                <img src="../docente/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">
                            </a>

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                            <script>
                                document.getElementById('verArchivo').addEventListener('click', function(e) {
                                    e.preventDefault();

                                    Swal.fire({
                                        title: "Falta Archivo",
                                        confirmButtonText: "Aceptar",
                                    });
                                });
                            </script>




                            <p><a href="#" id="descargarArchivo">Descargar Archivo</a></p>

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                            <script>
                                document.getElementById('descargarArchivo').addEventListener('click', function(e) {
                                    e.preventDefault();

                                    Swal.fire({
                                        title: "Falta Archivo",
                                        confirmButtonText: "Aceptar",
                                    });
                                });
                            </script>


                            <p><a href="#" id="eliminarArchivo">Eliminar Archivo</a></p>

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                            <script>
                                document.getElementById('eliminarArchivo').addEventListener('click', function(e) {
                                    e.preventDefault();

                                    Swal.fire({
                                        title: "Falta Archivo",
                                        confirmButtonText: "Aceptar",
                                    });
                                });
                            </script>



                        <?php

                        }
                        ?>












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