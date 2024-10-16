<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">




<!--ventana para Update--->
<div class="modal fade" id="versolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Solicitud
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>





            <div class="modal-body" id="cont_modal">



                <div class="form-group-modal">




                    <?php


                    include('../conexion.php');

                    $usuario_admin = $_REQUEST['usuario'];
                    $usuario_apoderado = $_REQUEST['usuario_apoderado'];

                    $qle = "SELECT usuario_admin,periodo,categoria_solicitud,servicio,importe FROM solicitud_apoderado WHERE usuario_admin ='$usuario_admin'";
                    $resultado = $conexion->query($qle);
                    while ($row = $resultado->fetch_assoc()) {

                        $periodo = $row['periodo'];

                        $categoria_solicitud = $row['categoria_solicitud'];

                        $servicio = $row['servicio'];

                        $importe = $row['importe'];




                    ?>


                        <label>//---------------------------------//</label>

                        <label>Periodo: </label>



                        <strong style="text-align: left; text-transform: none !important">
                            <?php echo $periodo ?>
                        </strong>








                        <label>Categoria Solicitud: </label>

                        <strong style="text-align: left; text-transform: none !important">
                            <?php echo $categoria_solicitud ?>
                        </strong>








                        <label>Servicio: </label>
                        <strong style="text-align: left; text-transform: none !important">
                            <?php echo $servicio ?>
                        </strong>





                        <label>Importe: </label>

                        <strong style="text-align: left; text-transform: none !important">
                            <?php echo $importe ?>
                        </strong>


                    <?php
                    }
                    ?>



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