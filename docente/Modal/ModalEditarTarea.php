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



    /*-------modal-style start------*/
    .modal .modal-dialog {
        max-width: 600px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
        padding: 20px 30px;
    }

    .modal .modal-content {
        border-radius: 3px;
    }

    .modal .modal-footer {
        background: #ffffff;
        border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #ffffff;
    }

    .modal textarea.form-control {
        resize: vertical;
    }





    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal form label {
        font-weight: normal;
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
<div class="modal fade" id="editartarea<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 400px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Asistencia
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" enctype="multipart/form-data" action="../docente/editartarea.php?usuario=<?php
                                                                                                            $usuario = $_SESSION['docente']['usuario'];
                                                                                                            echo "$usuario"; ?>">




                <input type="hidden" id="id" required name="id" value="<?php echo $data['id']; ?>">


                <input type="hidden" id="usuario_docente" required name="usuario_docente" value="<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                                    echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">




                        <label class="label-txt"><b>Editar Datos de la Tarea</b></label><br>

                        <label>Titulo: </label><br>

                        <input type="text" class="input-text" required name="titulo" id="titulo" value="<?php echo $data['titulo'] ?>"><br>



                        <label>Fecha de Entrega: </label><br>
                        <input type="date" class="input-text" required name="fecha_entrega" id="fecha_entrega" value=<?php echo $data['fecha_entrega'] ?>><br>
                        <label>Hora de Entrega: </label><br>
                        <input class="input-text" type="time" required name="hora_entrega" id="hora_entrega" value=<?php echo $data['hora_entrega'] ?>><br>




                        <label>Descripcion: </label><br>

                        <textarea class="input-text" required name="descripcion" id="descripcion"><?php echo $data['descripcion']; ?></textarea><br>






                        <input type="hidden" class="input-text" required name="docente" id="docente" value="<?php echo $data['docente'] ?>">

                        




                        <label>Nota: </label><br>

                        <input type="number" class="input-text" required name="nota" id="nota" step="0.01" pattern="\d+(\.\d{2})?" value="<?php echo $data['nota']; ?>"><br>


                        <input type="hidden" class="input-text" required name="usuario_alumno" id="usuario_alumno" value="<?php echo $data['usuario'] ?>">




                        <label>Selecciona Tema</label>

                        <select id="temas" name="temas">



                            <?php
                            include('../conexion.php');

                            $selectedId = $data['tema'];

                            $sql = "SELECT DISTINCT c.tema FROM curso c";
                            $result = $conn->query($sql);



                            if ($result->num_rows > 0) {
                                echo "<option value=''>SELECCIONAR...</option>";
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["tema"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $tema_dd = $row["tema"];
                                    echo "<option value='{$tema_dd}' {$selected}>{$row["tema"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay alumnos</option>";
                            }

                            $conn->close();
                            ?>






                        </select><br>


                        <label>Selecciona Materia</label>

                        <select id="materias" name="materias">



                            <?php
                            include('../conexion.php');



                            $sql = "SELECT DISTINCT c.nombre FROM curso c";
                            $result = $conn->query($sql);

                            $selectedId = $data['materia'];

                            if ($result->num_rows > 0) {
                                echo "<option value=''>SELECCIONAR...</option>";
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["nombre"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $curso_dd = $row["nombre"];

                                    echo "<option value='{$curso_dd}' {$selected}>{$row["nombre"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay cursos</option>";
                            }

                            $conn->close();
                            ?>






                        </select><br>



                        <label>Nivel</label>

                        <select id="niveles" required name="niveles" onchange="cambiarGrados()">



                            <?php
                            // Verificar si este es el elemento seleccionado
                            $selectedPrimaria = ($data['nivel'] == 'Primaria') ? 'selected' : '';
                            $selectedSecundaria = ($data['nivel'] == 'Secundaria') ? 'selected' : '';
                            ?>
                            <option value="">SELECCIONAR...</option>
                            <option value="Primaria" <?php echo $selectedPrimaria ?>>Primaria</option>
                            <option value="Secundaria" <?php echo $selectedSecundaria ?>>Secundaria</option>


                        </select><br>

                        <label>Grado</label>

                        <select id="grados" required name="grados">
                            <?php
                            // Verificar si este es el elemento seleccionado
                            $selectedPrimero = ($data['grado'] == 'Primero') ? 'selected' : '';
                            $selectedSegundo = ($data['grado'] == 'Segundo') ? 'selected' : '';
                            $selectedTercero = ($data['grado'] == 'Tercero') ? 'selected' : '';

                            $selectedCuarto = ($data['grado'] == 'Cuarto') ? 'selected' : '';
                            $selectedQuinto = ($data['grado'] == 'Quinto') ? 'selected' : '';
                            $selectedSexto = ($data['grado'] == 'Sexto') ? 'selected' : '';
                            ?>
                            <option value="">SELECCIONAR...</option>
                            <option value="Primero" <?php echo $selectedPrimero ?>>Primero</option>
                            <option value="Segundo" <?php echo $selectedSegundo ?>>Segundo</option>
                            <option value="Tercero" <?php echo $selectedTercero ?>>Tercero</option>

                            <option value="Cuarto" <?php echo $selectedCuarto ?>>Cuarto</option>
                            <option value="Quinto" <?php echo $selectedQuinto ?>>Quinto</option>
                            <option value="Sexto" <?php echo $selectedSexto ?>>Sexto</option>

                        </select><br>


                        <input type="hidden" class="input-text" required name="categoriaentrega" id="categoriaentrega" value="<?php echo $data['categoriaentrega'] ?>">


                        <input type="hidden" class="input-text" required name="estado_archivo" id="estado_archivo" value="<?php echo $data['estadoarchivo'] ?>">



                        <?php

                        $estado_archivo = $data['estadoarchivo'];



                        if ($estado_archivo == "SIN SUBIR") {
                        ?>
                            <label>Subir Material de la Tarea</label>
                            <label>Tamaño recomendable 50M en formato: pdf</label>
                            <input type="file" required name="subir_material_tarea" id="subir_material_tarea"><br>





                        <?php
                        } else if ($estado_archivo == "SUBIDO") {
                        ?>




                            <label>Material de la Tarea: </label>


                            <a href="../docente/mostrar_material_tarea.php?id=<?php echo $data['id']; ?>&titulo=<?php echo $data['titulo']; ?>&usuario_alumno=<?php echo $data['usuario']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>" target="_blank">
                                <img src="../docente/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                            </a>

                            <p><a href="../docente/descargar_material_tarea.php?titulo=<?php echo $data['titulo']; ?>&usuario_alumno=<?php echo $data['usuario']; ?>&materia=<?php echo $data['materia']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>" target="_blank">Descargar Archivo</a></p>


                            <p><a href="../docente/eliminar_material_tarea.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                        echo "$usuario"; ?>&id=<?php echo $data['id']; ?>&titulo=<?php echo $data['titulo']; ?>&usuario_alumno=<?php echo $data['usuario']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>">Eliminar Archivo</a></p>


                        <?php

                        }
                        ?>


                        <?php
                        $categoria_archivo = $data['categoriaentrega'];


                        if ($categoria_archivo == "SIN ENTREGAR") {


                        ?>
                            <br>
                            <label for="recipient-name" class="col-form-label">Categoria de Entrega: </label>

                            <strong style="text-transform: none;">
                                <?php echo $categoria_archivo ?>
                            </strong><br>
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
                        } else if ($categoria_archivo == "ENTREGADO") {
                        ?>
                            <br>
                            <label>Categoria de Entrega: </label>
                            <strong style="text-transform: none;">
                                <?php echo $categoria_archivo ?>
                            </strong><br>

                            <label>Tarea del Alumno: </label>


                            <a href="../docente/mostrar_tarea_subida.php?id=<?php echo $data['id']; ?>&titulo=<?php echo $data['titulo']; ?>&usuario_alumno=<?php echo $data['usuario']; ?>&docente=<?php echo $data['docente']; ?>&tema=<?php echo $data['tema']; ?>&nivel=<?php echo $data['nivel']; ?>&grado=<?php echo $data['grado']; ?>" target="_blank">
                                <img src="../docente/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                            </a>

                            <p><a href="../docente/descargar_tarea_subida.php?id=<?php echo urlencode($data['id']); ?>&materia=<?php echo urlencode($data['materia']); ?>&alumno=<?php echo urlencode($data['alumno']); ?>&usuario_alumno=<?php echo urlencode($data['usuario']); ?>&docente=<?php echo urlencode($data['docente']); ?>&tema=<?php echo urlencode($data['tema']); ?>&nivel=<?php echo urlencode($data['nivel']); ?>&grado=<?php echo urlencode($data['grado']); ?>" target="_blank">Descargar Archivo</a></p>


                            <p><a href="../docente/eliminar_tarea_subida.php?usuario=<?php $usuario=$_SESSION['docente']['usuario']; echo $usuario ?>&usuario_alumno=<?php echo $data['usuario']; ?>&docente=<?php echo $data['docente']; ?>">Eliminar Archivo</a></p>


                        <?php
                        }
                        ?>












                    </div>




                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>


            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->