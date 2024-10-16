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
<div class="modal fade" id="editarasistencia<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 500px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Asistencia
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" action="../docente/editarasistencia.php?usuario=<?php
                                                                                $usuario = $_SESSION['docente']['usuario'];
                                                                                echo "$usuario"; ?>">




                <input type="hidden" id="id" required name="id" value="<?php echo $data['id']; ?>">


                <input type="hidden" id="usuario_docente" required name="usuario_docente" value="<?php echo $data['usuario_docente']; ?>">


                <input type="hidden" id="docente" required name="docente" value="<?php echo $data['docente']; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">




                        <label class="label-txt"><b>Editar Datos de la Asistencia</b></label><br>




                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">



                                <label class="label-label">Tipo de Asistencia</label><br>

                                <select class="select-bx" id="tipoasistencia" required name="tipoasistencia">

                                    <?php

                                    // Verificar si este es el elemento seleccionado
                                    $selectedPRESENTE = ($data['tipoasistencia'] == 'PRESENTE') ? 'selected' : '';
                                    $selectedTARDANZA = ($data['tipoasistencia'] == 'TARDANZA') ? 'selected' : '';
                                    $selectedFALTA = ($data['tipoasistencia'] == 'FALTA') ? 'selected' : '';
                                   



                                    ?>

                                    <option value="">SELECCIONAR...</option>
                                    <option value="PRESENTE" <?php echo $selectedPRESENTE ?>>PRESENTE</option>
                                    <option value="TARDANZA" <?php echo $selectedTARDANZA ?>>TARDANZA</option>
                                    <option value="FALTA" <?php echo $selectedFALTA ?>>FALTA</option>
                                    


                                </select>

                            </div>
                            <label style="padding: 10px;"></label>

                            <div class="inline-block right-margin">

                                <label>Hora</label><br>

                                <select class="select-bx" id="hora" required name="hora">



                                    <?php
                                   include('../conexion.php');



                                    $sql = "SELECT DISTINCT a.hora FROM asistencia a ORDER BY STR_TO_DATE(hora, '%h:%i %p')";
                                    $result = $conn->query($sql);

                                    $selectedId = $data['hora'];



                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        while ($row = $result->fetch_assoc()) {

                                            $selected = ($row["hora"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                            $curso_dd = $row["hora"];
                                            echo "<option value='{$curso_dd}' {$selected}>{$row["hora"]}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay hora</option>";
                                    }

                                    $conn->close();
                                    ?>






                                </select>



                            </div>



                        </div>






                        <div class="row">
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">



                                <label>Fecha de Inicio: </label><br>

                                <input type="date" class="input-text" required name="fecha_inicio" id="fecha_inicio" value="<?php echo $data['fecha_inicio']; ?>">


                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Fecha Final: </label><br>

                                <input type="date" class="input-text" required name="fecha_fin" id="fecha_fin" value="<?php echo $data['fecha_fin']; ?>"><br>



                            </div>



                        </div>
                        <br>


                        <div class="row">
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">



                                <label>Dia de la Semana: </label><br>


                                <select class="select-bx" id="dia" required name="dia">

                                    <?php

                                    // Verificar si este es el elemento seleccionado
                                    $selectedLUNES = ($data['dia'] == 'Lunes') ? 'selected' : '';
                                    $selectedMARTES = ($data['dia'] == 'Martes') ? 'selected' : '';
                                    $selectedMIERCOLES = ($data['dia'] == 'Miércoles') ? 'selected' : '';
                                    $selectedJUEVES = ($data['dia'] == 'Jueves') ? 'selected' : '';
                                    $selectedVIERNES = ($data['dia'] == 'Viernes') ? 'selected' : '';




                                    ?>

                                    <option value="">SELECCIONAR...</option>
                                    <option value="Lunes" <?php echo $selectedLUNES ?>>Lunes</option>
                                    <option value="Martes" <?php echo $selectedMARTES ?>>Martes</option>
                                    <option value="Miércoles" <?php echo $selectedMIERCOLES ?>>Miércoles</option>
                                    <option value="Jueves" <?php echo $selectedJUEVES ?>>Jueves</option>
                                    <option value="Viernes" <?php echo $selectedVIERNES ?>>Viernes</option>



                                </select>




                            </div>





                        </div>





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