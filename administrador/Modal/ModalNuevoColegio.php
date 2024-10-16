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



<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>


<!--ventana para Update--->
<div class="modal fade" id="nuevocolegio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Colegio
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" enctype="multipart/form-data" action="../administrador/registrarcolegio.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                            echo "$usuario"; ?>">


                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Institucion: </label><br>
                                <input class="input-text" type="text" required name="institucion">
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Encabezado: </label><br>
                                <input class="input-text" type="text" required name="encabezado">


                            </div>
                        </div>

                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Teléfono: </label><br>
                                <input class="input-text" type="text" required name="telefono" maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Direccion: </label><br>
                                <input class="input-text" type="text" required name="direccion">
                            </div>
                        </div>

                        <br>

                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Correo: </label><br>
                                <input class="input-text" type="email" required name="correo">
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
                                    <option value="">SELECCIONAR...</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                </select>
                                <select id="dia_s" required name="dia_s">
                                    <option value="">SELECCIONAR...</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                </select>
                            </div>



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Hora</label><br>
                                <input class="input-text" type="time" required name="hora_i">
                                <input class="input-text" type="time" required name="hora_f">
                            </div>
                        </div>




                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Fecha de Inscripción</label><br>
                                <input type="date" class="input-text" required name="fecha_inscrip" id="fecha_inscrip">
                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Cantidad de Alumnos Disponibles</label><br>
                                <input type="number" class="input-text" required name="cant_or" id="cant_or" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Cantidad de Docente Disponibles</label><br>
                                <input type="number" class="input-text" required name="cant_docente_or" id="cant_docente_or" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Titulo: </label><br>
                                <input class="input-text" type="text" required name="titulo"><br>
                            </div>
                        </div>

                        <label class="inp-label">Contenido: </label>
                        <textarea name="contenido" id="contenido" rows="10" cols="100"></textarea><br>


                        <label class="inp-label">Subir el Logo del Colegio</label>
                        <label>Tamaño recomendable 50M en formato: .png</label>
                        <input type="file" required name="subir_logo" id="subir_logo" accept="image/png"><br>










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