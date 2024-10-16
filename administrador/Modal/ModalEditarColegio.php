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
        width: 340px;
        border-radius: 10px;
        padding: 12px 10px;
        border: 2px solid #ededed;
        box-sizing: border-box;
        margin: 5px 10px 0px 0px;



    }




    .input-group-box {
        position: relative;
        height: 52px;
        margin: 5px 0;
        border-radius: 10px;
        display: flex;
        text-align: left;
        width: 220px;
        padding: 5px;
        border: 2px solid #bbbbbb;
        box-sizing: border-box;
        margin: 5px 20px 0px 0px;


    }


    .input-group-box input {
        width: 90%;
        height: 50%;
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
<div class="modal fade" id="editarcolegio<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 680px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Colegio
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" enctype="multipart/form-data" action="../administrador/editarcolegio.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                            echo "$usuario"; ?>">
                        <input class="input-text" type="hidden" required name="id" value="<?php echo $data['id'] ?>">

                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Institucion: </label><br>
                                <input class="input-text" type="text" required name="institucion" value="<?php echo $data['institucion'] ?>">
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Encabezado: </label><br>
                                <input class="input-text" type="text" required name="encabezado" value="<?php echo $data['encabezado'] ?>">


                            </div>
                        </div>

                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Teléfono: </label><br>
                                <input class="input-text" type="text" required name="telefono" value="<?php echo $data['telefono'] ?>">
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Direccion: </label><br>
                                <input class="input-text" type="text" required name="direccion" value="<?php echo $data['direccion'] ?>">
                            </div>
                        </div>

                        <br>

                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Correo: </label><br>
                                <input class="input-text" type="email" required name="correo" value="<?php echo $data['correo'] ?>">
                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">


                                <?php
                                $usuario = $_SESSION['admin']['usuario'];
                                $query_admin = "SELECT a.usuario from admin a WHERE a.usuario='$usuario'";
                                $resultado_admin = $conexion->query($query_admin);

                                $fila_admin = $resultado_admin->fetch_assoc();

                                $usuario_admin = $fila_admin['usuario'];

                                ?>
                                <?php
                                if ($usuario_admin == "adminprimaria") {
                                ?>

                                    <label class="inp-label">Niveles: </label><br>

                                    <select id="nivel" required name="nivel">
                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedPrimaria = ($usuario_admin == 'adminprimaria') ? 'selected' : '';
                                        ?>
                                        <option value="">SELECCIONAR...</option>
                                        <option value="Primaria" <?php echo $selectedPrimaria ?>>Primaria</option>


                                    </select><br>
                                <?php
                                } else if ($usuario_admin == "adminsecundaria") {
                                ?>
                                    <label class="inp-label">Niveles: </label><br>
                                    <select id="nivel" required name="nivel">
                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedSecundaria = ($usuario_admin == 'adminsecundaria') ? 'selected' : '';
                                        ?>
                                        <option value="">SELECCIONAR...</option>
                                        <option value="Secundaria" <?php echo $selectedSecundaria ?>>Secundaria</option>





                                    </select><br>

                                <?php

                                }

                                ?>
                            </div>
                        </div>




                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Dias de la Semana: </label><br>
                                <select id="dia_p" required name="dia_p">
                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedLUNES = ($data['dia_p'] == 'Lunes') ? 'selected' : '';
                                    $selectedMARTES = ($data['dia_p'] == 'Martes') ? 'selected' : '';
                                    $selectedMIERCOLES = ($data['dia_p'] == 'Miercoles') ? 'selected' : '';
                                    $selectedJUEVES = ($data['dia_p'] == 'Jueves') ? 'selected' : '';
                                    $selectedVIERNES = ($data['dia_p'] == 'Viernes') ? 'selected' : '';
                                    ?>
                                    <option value="">SELECCIONAR...</option>

                                    <option value="Lunes" <?php echo $selectedLUNES ?>>Lunes</option>
                                    <option value="Martes" <?php echo $selectedMARTES ?>>Martes</option>
                                    <option value="Miércoles" <?php echo $selectedMIERCOLES ?>>Miércoles</option>
                                    <option value="Jueves" <?php echo $selectedJUEVES ?>>Jueves</option>
                                    <option value="Viernes" <?php echo $selectedVIERNES ?>>Viernes</option>



                                </select>
                                <select id="dia_s" required name="dia_s">
                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedLUNES = ($data['dia_s'] == 'Lunes') ? 'selected' : '';
                                    $selectedMARTES = ($data['dia_s'] == 'Martes') ? 'selected' : '';
                                    $selectedMIERCOLES = ($data['dia_s'] == 'Miercoles') ? 'selected' : '';
                                    $selectedJUEVES = ($data['dia_s'] == 'Jueves') ? 'selected' : '';
                                    $selectedVIERNES = ($data['dia_s'] == 'Viernes') ? 'selected' : '';
                                    ?>
                                    <option value="">SELECCIONAR...</option>

                                    <option value="Lunes" <?php echo $selectedLUNES ?>>Lunes</option>
                                    <option value="Martes" <?php echo $selectedMARTES ?>>Martes</option>
                                    <option value="Miércoles" <?php echo $selectedMIERCOLES ?>>Miércoles</option>
                                    <option value="Jueves" <?php echo $selectedJUEVES ?>>Jueves</option>
                                    <option value="Viernes" <?php echo $selectedVIERNES ?>>Viernes</option>
                                </select>
                            </div>



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Hora</label><br>

                                <input class="input-text" type="time" required name="hora_i" value="<?php echo date('H:i:s', strtotime($data['hora_ic'])); ?>">
                                <input class="input-text" type="time" required name="hora_f" value="<?php echo date('H:i:s', strtotime($data['hora_fc'])); ?>">

                            </div>
                        </div>




                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Fecha de Inscripción</label><br>
                                <input type="date" class="input-text" required name="fecha_inscrip" id="fecha_inscrip" value="<?php echo $data['fecha_inscrip'] ?>">
                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Cantidad de Alumnos Disponibles</label><br>
                                <input type="number" class="input-text" required name="cant_or" id="cant_or" value="<?php echo $data['cant_or'] ?>">

                            </div>

                        </div>

                        <br>


                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Cantidad de Alumnos Restantes</label><br>
                                <input type="number" class="input-text" required name="cant_desc_est" id="cant_desc_est" value="<?php echo $data['cant_desc_est'] ?>">
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Titulo: </label><br>
                                <input class="input-text" type="text" required name="titulo" value="<?php echo $data['titulo'] ?>"><br>
                            </div>
                        </div>

                        <br>

                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Cantidad de Docentes Disponibles</label><br>
                                <input type="number" class="input-text" required name="cant_docente_or" id="cant_docente_or" value="<?php echo $data['cant_docente_or'] ?>">

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Cantidad de Docentes Restantes</label><br>
                                <input type="number" class="input-text" required name="cant_docente_desc_est" id="cant_docente_desc_est" value="<?php echo $data['cant_docente_desc_est'] ?>">
                            </div>

                        </div>

                        <br>

                        <label class="inp-label">Contenido: </label>
                        <textarea name="contenido" id="contenidoed" rows="10" cols="100"><?php echo $data['contenido'] ?></textarea><br>

                        <script>
                            ClassicEditor
                                .create(document.querySelector('#contenidoed'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>

                        <?php

                        $estado_logo = $data['estado_logo'];

                        if ($estado_logo == "SUBIDO") {
                        ?>
                            <label class="inp-label">Logo: </label><br>
                            <?php

                            echo '<img src="data:image/png;base64,' . $data['subir_logo'] . '" alt="Logo" width="80" height="80">';

                            ?>

                            <p><a href="../administrador/eliminar_foto_logo.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                        echo "$usuario"; ?>&id=<?php echo $data['id'] ?>">Eliminar Archivo</a></p>


                        <?php


                        } else if ($estado_logo == "SIN SUBIR") {
                        ?>

                            <label class="inp-label">Subir el Logo del Colegio</label>
                            <label>Tamaño recomendable 50M en formato: .png</label>
                            <input type="file" required name="subir_logo" id="subir_logo" accept="image/png"><br>


                        <?php

                        }

                        ?>



                        <input class="input-text" type="hidden" required name="estado_logo" value="<?php echo $data['estado_logo'] ?>">










                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                        </div>


                    </form>


                </div>


            </div>



        </div>
    </div>
</div>
<!---fin ventana Update --->