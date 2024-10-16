<link rel="stylesheet" href="../administrador/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">




<!--ventana para Update--->
<div class="modal fade" id="nuevopago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Pago
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="../administrador/registrarpago.php?usuario=<?php $usuario = $_SESSION['admin']['usuario']; echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">



                        <input type="hidden" class="input-text" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario']; echo $usuario; ?>">



                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Pago: </label><br>

                                <input type="text" class="input-text" required name="nombre">



                            </div>


                            <div class="inline-block right-margin">
                                <label style="padding: 10px;"></label>
                                <label>Vencimiento: </label><br>
                                <label style="padding: 10px;"></label>
                                <input type="date" class="input-text" required name="vencimiento">



                            </div>




                        </div>


                        <br>




                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Estado: </label><br>
                                <select required name="estado">




                                    <option value="">SELECCIONAR...</option>
                                    <option value="PAGADO">PAGADO</option>
                                    <option value="EN PROCESO">EN PROCESO</option>
                                    <option value="PENDIENTE">PENDIENTE</option>


                                </select>



                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>cuota: </label><br>

                                <input type="number" class="input-text" required name="cuota" step="0.01" min="0" max="99999999.99" oninput="this.value = this.value.replace(/[^0-9]/g, '');">



                            </div>



                        </div>




                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Alumno: </label><br>
                                <select required name="alumno">



                                    <?php
                                    // Aquí deberías realizar la conexión a la base de datos y la consulta SQL
                                   include('../conexion.php');


                                    $sql = "SELECT usuario,alumno FROM alumno";
                                    $result = $conn->query($sql);



                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            $alumno_dd = $row["usuario"];
                                            echo "<option value='{$alumno_dd}'>{$row["alumno"]}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay Docentes</option>";
                                    }

                                    $conn->close();
                                    ?>






                                </select>





                            </div>
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