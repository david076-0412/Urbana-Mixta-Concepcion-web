<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">



<!--ventana para Update--->
<div class="modal fade" id="editarsolicitud<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar de Solicitud-Alumno
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="../administrador/editarsolicitudalumno.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                            echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">



                        <input type="hidden" class="input-text" required name="usuario_apoderado" value="<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                                            echo $usuario_apoderado; ?>">


                        <input type="hidden" class="input-text" required name="usuario" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                echo $usuario; ?>">



                        <input type="hidden" class="input-text" required name="id" value="<?php echo $data['id']; ?>">





                        <label>Periodo: </label><br>

                        <select required name="periodo" id="periodo">



                            <?php


                            include("../conexion.php");

                            echo '<option value="">SELECCIONAR...</option>';


                            $sql   = ("SELECT DISTINCT periodo FROM solicitud_apoderado");
                            $result = $conn->query($sql);



                            $selectedId = $data['periodo'];



                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["periodo"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $periodo_dd = $row["periodo"];
                                    echo "<option  value='{$periodo_dd}' {$selected}>{$row["periodo"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay Periodo</option>";
                            }



                            ?>




                        </select>




                        <label>Categoria Solicitud: </label><br>







                        <select required name="categoria_solicitud" id="categoria_solicitud">




                            <?php


                            include("../conexion.php");

                            echo '<option value="">SELECCIONAR...</option>';


                            $sqlca   = ("SELECT DISTINCT categoria_solicitud FROM solicitud_apoderado");
                            $resultca = $conn->query($sqlca);


                            $selectedId = $data['categoria_solicitud'];



                            if ($resultca->num_rows > 0) {
                                while ($row = $resultca->fetch_assoc()) {
                                    $selected = ($row["categoria_solicitud"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $categoria_solicitud_dd = $row["categoria_solicitud"];
                                    echo "<option  value='{$categoria_solicitud_dd}' {$selected}>{$row["categoria_solicitud"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay Categoria</option>";
                            }

                            ?>




                        </select><br>





                        <label>Selecciona Alumnos</label>

                        <select id="alumnos" name="alumnos">



                            <?php
                            include("../conexion.php");

                            echo '<option value="">SELECCIONAR...</option>';

                            $sql = "SELECT id, usuario_apoderado, alumno, usuario FROM alumno";
                            $result = $conn->query($sql);

                            $selectedId = $data['alumno'];

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    $selected = ($row["alumno"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado


                                    $alumno_dd = $row["alumno"];
                                    echo "<option value='{$alumno_dd}' {$selected}>{$row["alumno"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay alumnos</option>";
                            }

                            $conn->close();
                            ?>






                        </select><br>











                        <label>Servicio: </label><br>



                        <select required name="servicio" id="servicio">




                            <?php


                          include("../conexion.php");

                            echo '<option value="">SELECCIONAR...</option>';


                            $sqlse   = ("SELECT DISTINCT servicio FROM solicitud_apoderado");
                            $resultse = $conn->query($sqlse);


                            $selectedId = $data['servicio'];



                            if ($resultse->num_rows > 0) {
                                while ($row = $resultse->fetch_assoc()) {
                                    $selected = ($row["servicio"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $servicio_dd = $row["servicio"];
                                    echo "<option  value='{$servicio_dd}' {$selected}>{$row["servicio"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay Servicio</option>";
                            }

                            ?>




                        </select><br>







                        <label>Estado: </label>

                        <select required name="estado" id="estado">




                            <?php

                            // Verificar si este es el elemento seleccionado
                            $selectedACEPTADO = ($data['estado'] == 'aceptado') ? 'selected' : '';
                            $selectedENESPERA = ($data['estado'] == 'en espera') ? 'selected' : '';
                            $selectedRECHAZADO = ($data['estado'] == 'rechazado') ? 'selected' : '';
                            ?>
                            <option value="">SELECCIONAR...</option>
                            <option value="aceptado" <?php echo $selectedACEPTADO ?>>aceptado</option>
                            <option value="en espera" <?php echo $selectedENESPERA ?>>en espera</option>
                            <option value="rechazado" <?php echo $selectedRECHAZADO ?>>rechazado</option>





                        </select>








                    </div>




                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>


            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->