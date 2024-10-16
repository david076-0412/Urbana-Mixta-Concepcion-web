<link rel="stylesheet" href="../administrador/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">




<!--ventana para Update--->
<div class="modal fade" id="verpago<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Pago
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>





            <div class="modal-body" id="cont_modal">



                <div class="form-group-modal">


                    <input type="hidden" class="input-text" required name="id" value="<?php echo $data['id'] ?>">

                    <input type="hidden" class="input-text" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                    echo $usuario; ?>">



                    <div class="row">

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label>Pago: </label><br>


                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['nombre'] ?>
                            </strong>


                        </div>

                        <label style="padding: 20px;"></label>
                        <div class="inline-block right-margin">

                            <label>Vencimiento: </label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo date('d/m/Y', strtotime($data['vencimiento'])); ?>
                            </strong>



                        </div>

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">
                            <label>Alumno: </label><br>



                            <?php
                            include("../conexion.php");

                            $usuario_alumno = $data["usuario_alumno"];

                            $sql = "SELECT usuario,alumno FROM alumno WHERE usuario = '$usuario_alumno'";
                            $result = $conn->query($sql);

                            $row = $result->fetch_assoc();


                            $alumno = $row["alumno"];

                            $conn->close();
                            ?>
                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $alumno ?>
                            </strong>










                        </div>



                    </div>



                    <br>



                    <div class="row">

                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label>Estado: </label><br>

                            <strong style="text-align: left; text-transform: none !important">
                                <?php echo $data['estado'] ?>
                            </strong>




                        </div>
                        <label style="padding: 10px;"></label>
                        <div class="inline-block right-margin">

                            <label>cuota: </label><br>
                            <strong style="text-align: left; text-transform: none !important">
                                S/. <?php echo $data['cuota'] ?>
                            </strong>



                        </div>

                        <?php
                        $n_cuenta = $data['n_cuenta'];
                        if ($n_cuenta == NULL) {
                        } else if ($n_cuenta != NULL) {
                        ?>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>N_Cuenta: </label><br>
                                <strong style="text-align: left; text-transform: none !important">
                                    <?php echo $data['n_cuenta'] ?>
                                </strong>


                            </div>

                        <?php
                        }

                        ?>






                    </div>









                </div>










            </div>




        </div>


        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
        </div>




    </div>
</div>
</div>
<!---fin ventana Update --->