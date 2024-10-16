<link rel="stylesheet" href="../administrador/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">




<!--ventana para Update--->
<div class="modal fade" id="editarpago<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Pago
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="../administrador/editarpago.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">


                        <input type="hidden" class="input-text" required name="id" value="<?php echo $data['id'] ?>">

                        <input type="hidden" class="input-text" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                        echo $usuario; ?>">



                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Pago: </label><br>

                                <input type="text" class="input-text" required name="nombre" value="<?php echo $data['nombre'] ?>">



                            </div>
                            <br>
                            <label style="padding: 20px;"></label>
                            <div class="inline-block right-margin">

                                <label>Vencimiento: </label><br>
                                <input type="date" class="input-text" required name="vencimiento" value="<?php echo $data['vencimiento'] ?>">



                            </div>




                        </div>



                        <br>



                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Estado: </label><br>
                                <select required name="estado">


                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedPAGADO = ($data['estado'] == 'PAGADO') ? 'selected' : '';
                                    $selectedENPROCESO = ($data['estado'] == 'EN PROCESO') ? 'selected' : '';
                                    $selectedPENDIENTE = ($data['estado'] == 'PENDIENTE') ? 'selected' : '';

                                    ?>
                                    <option value="">SELECCIONA GENERO</option>
                                    <option value="PAGADO" <?php echo $selectedPAGADO ?>>PAGADO</option>
                                    <option value="EN PROCESO" <?php echo $selectedENPROCESO ?>>EN PROCESO</option>
                                    <option value="PENDIENTE" <?php echo $selectedPENDIENTE ?>>PENDIENTE</option>

                                </select>



                            </div>
                            <label style="padding: 31px;"></label>
                            <div class="inline-block right-margin">

                                <label>cuota: </label><br>

                                <input type="number" class="input-text" required name="cuota" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value="<?php echo $data['cuota'] ?>">



                            </div>



                        </div>


                        <br>

                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Alumno: </label><br>
                                <select required name="alumno">



                                    <?php
                                    include("../conexion.php");



                                    $sql = "SELECT usuario,alumno FROM alumno";
                                    $result = $conn->query($sql);

                                    $selectedId = $data['usuario_alumno'];

                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            $selected = ($row["usuario"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                            $alumno_dd = $row["usuario"];
                                            echo "<option value='{$alumno_dd}' {$selected}>{$row["alumno"]}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay Docentes</option>";
                                    }

                                    $conn->close();
                                    ?>






                                </select>





                            </div>


                            <?php
                            $n_cuenta = $data['n_cuenta'];
                            if ($n_cuenta == NULL) {
                            } else if ($n_cuenta != NULL) {
                            ?>

                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    <label>N_Cuenta: </label><br>

                                    <input type="text" class="input-text" required name="n_cuenta" value="<?php echo $data['n_cuenta'] ?>">



                                </div>


                            <?php
                            }

                            ?>









                        </div>










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