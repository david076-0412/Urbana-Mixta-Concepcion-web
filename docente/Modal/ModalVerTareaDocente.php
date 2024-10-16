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
<div class="modal fade" id="vertareadocente<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Tarea
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="../docente/subir_tarea_docente.php?id=<?php echo $data['id']; ?>&usuario=<?php echo $data['usuario']; ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="materia" value="<?php echo $data['materia']; ?>">

                <input type="hidden" name="docente" value="<?php echo $data['docente']; ?>">
                <input type="hidden" name="usuario_docente" value="<?php $usuario = $_SESSION['docente']['usuario']; echo $usuario; ?>">
                <input type="hidden" name="tema" value="<?php echo $data['tema']; ?>">
                <input type="hidden" name="nivel" value="<?php echo $data['nivel']; ?>">
                <input type="hidden" name="grado" value="<?php echo $data['grado']; ?>">

                <input type="hidden" name="alumno" value="<?php echo $data['alumno']; ?>">


                <div class="modal-body" id="cont_modal">

                    <div class="form-group">

                        <label style="color: #00B9FF; text-align: center;">Datos de la Tarea</label><br>

                        <label for="recipient-name" class="col-form-label">Nombre de la Tarea: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['titulo']; ?>
                        </strong><br>


                        <label for="recipient-name" class="col-form-label">Descripcion: </label>

        <strong style="text-align: left; text-transform: none !important; word-wrap: break-word; white-space: normal; overflow-wrap: break-word; display: block;">
            <?php echo $data['descripcion']; ?>
        </strong><br>
   



                        <label for="recipient-name" class="col-form-label">Tema: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['tema']; ?>
                        </strong><br>

                        
                  


                        <label for="recipient-name" class="col-form-label">Docente: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['docente']; ?>
                        </strong><br>
                        <label for="recipient-name" class="col-form-label">Alumno: </label>
                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['alumno']; ?>
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

                        <label for="recipient-name" class="col-form-label">Nota: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nota']; ?>
                        </strong><br>

                        <label for="recipient-name" class="col-form-label">Fecha de Entrega: </label>

                        <strong style="text-align: center; text-transform: none !important">


                            <?php
                            // Obtén la fecha original desde $data['fecha_entrega']
                            $fechaOriginal = $data['fecha_entrega'];

                            // Crea un objeto DateTime con la fecha original
                            $fechaObjeto = new DateTime($fechaOriginal);

                            // Formatea la fecha en el nuevo formato
                            $fechaFormateada = $fechaObjeto->format('d/m/Y');

                            // Imprime la fecha formateada
                            echo $fechaFormateada;
                            ?>


                        </strong><br>

                        <label for="recipient-name" class="col-form-label">Hora de Entrega: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['hora_entrega']; ?>
                        </strong><br>


                        



                        <?php $categoriaentrega = $data['categoriaentrega'];
                        if ($categoriaentrega == "SIN ENTREGAR") {
                        ?>
                            <label for="recipient-name" class="col-form-label">Categoria de Entrega: </label>

                            <strong style="text-align: center; text-transform: none !important">
                                <?php echo $categoriaentrega ?>
                            </strong><br>
                            <label>Subir Tarea</label>
                            <input type="file" required name="subirarchivotarea" id="subirarchivotarea"><br>

                        <?php
                        } else if ($categoriaentrega == "ENTREGADO") {
                        ?>
                        <label for="recipient-name" class="col-form-label">Categoria de Entrega: </label>

                        <strong style="text-transform: none;">
                                <?php echo $categoria_archivo ?>
                            </strong><br>

                            <label>Tarea del Alumno: </label><br>


                            <a href="../docente/mostrar_tarea_subida.php?id=<?php echo $data['id'] ?>&titulo=<?php echo $data['titulo'] ?>&usuario=<?php $usuario = $_SESSION['docente']['usuario']; echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>" target="_blank">
                                <img src="../docente/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                            </a>

                            <p><a href="../docente/descargar_tarea_subida.php?alumno=<?php echo $data['alumno'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&id=<?php echo $data['id'] ?>&materia=<?php echo $data['materia'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>&docente=<?php echo $data['docente'] ?>" target="_blank">Descargar Archivo</a></p>


                            <p><a href="../docente/eliminar_tarea_subida.php?usuario=<?php $usuario = $_SESSION['docente']['usuario']; echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario']; ?>&docente=<?php echo $data['docente']; ?>">Eliminar Archivo</a></p>

                        <?php

                        }
                        ?>










                    </div>




                </div>
                <div class="modal-footer">

                    <?php
                    $subirarchivotarea = $data['subirarchivotarea'];


                    if ($subirarchivotarea == NULL) {
                    ?>
                        <button type="submit" class="btn btn-primary">Guardar</button>


                    <?php
                    } else {
                    ?>
                        <button type="submit" class="invisible">Guardar</button>

                    <?php

                    }

                    ?>


                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->