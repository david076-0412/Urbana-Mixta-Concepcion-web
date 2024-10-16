<style>
    select {
        padding: 10px 5px;
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
        color: #969696;
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
    
    
 /* Estilo base para el modal */
.modal-content {
  width: 60%; /* Ajusta el ancho como desees */
  margin: auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.modal-body {
  max-height: 70vh; /* Limita la altura máxima del cuerpo del modal */
  overflow-y: auto; /* Añade scroll si el contenido es demasiado alto */
}

/* Adaptación para pantallas pequeñas (tablets y móviles) */
@media (max-width: 768px) {
  .modal-content {
    width: 80%;
    padding: 15px;
  }

  .modal-body {
    max-height: 60vh;
  }
}

/* Adaptación para pantallas muy pequeñas (móviles) */
@media (max-width: 480px) {
  .modal-content {
    width: 95%;
    padding: 10px;
  }

  .modal-body {
    max-height: 50vh;
  }
}

    
    
    
    
    
</style>

<!--ventana para Update--->
<div class="modal fade" id="editarnota<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Notas
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" action="../docente/editarnota.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                echo "$usuario"; ?>">







                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">


                    <input type="hidden" required name="id" value="<?php echo $data['id'] ?>">


                        <input type="hidden" required name="usuario_docente" value="<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                    echo "$usuario"; ?>">



                        <label class="label-txt"><b>Editar Datos de las Notas</b></label><br>


                        

                        <input type="hidden" class="input-text" required name="docente" id="docente" value="<?php echo $docente ?>" value="<?php $data['docente'] ?>">






                        <label>Tipo de Nota del Promedio: </label><br>
                        <input type="text" class="input-text" required name="tipo_nota_promedio" id="tipo_nota_promedio" value="<?php echo $data['tipo_nota_promedio'] ?>"><br>


                        <br>





                        <label>Selecciona Alumnos</label><br>

                        <select id="alumnos" required name="alumnos">



                     <?php
include('../conexion.php');

// Verificar si la sesión está iniciada
if (!isset($_SESSION['docente']['usuario'])) {
    echo "<option value=''>Usuario no autenticado</option>";
    exit;
}

$usuario = $_SESSION['docente']['usuario'];

try {
    // Preparar la consulta para obtener el nivel del docente
    $stmt = $conn->prepare("SELECT DISTINCT nivel FROM docente WHERE usuario = ?");
    if (!$stmt) {
        throw new Exception("Error al preparar la consulta para obtener el nivel");
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($nivel);
    $stmt->fetch();
    $stmt->close();

    if (!$nivel) {
        throw new Exception("Nivel no encontrado para el usuario");
    }

    // Preparar la consulta para obtener la lista de alumnos
    $stmt = $conn->prepare("SELECT id, usuario_apoderado, alumno, usuario FROM alumno WHERE nivel = ?");
    if (!$stmt) {
        throw new Exception("Error al preparar la consulta para obtener alumnos");
    }

    $stmt->bind_param("s", $nivel);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        throw new Exception("Error al ejecutar la consulta de alumnos");
    }

    $selectedId = $data['alumno'] ?? '';

    echo "<option value=''>SELECCIONAR...</option>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['alumno'] == $selectedId) ? 'selected' : '';
            $alumno_dd = htmlspecialchars($row['alumno'], ENT_QUOTES, 'UTF-8');
            echo "<option value='{$alumno_dd}' {$selected}>{$alumno_dd}</option>";
        }
    } else {
        echo "<option value=''>No hay alumnos</option>";
    }

    $stmt->close();
} catch (Exception $e) {
    echo "<option value=''>" . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</option>";
} finally {
    $conn->close();
}
?>







                        </select><br>


                        <div class="row">
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Nivel</label><br>

                                <select id="niveles" required name="niveles">



                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedPrimaria = ($data['nivel'] == 'Primaria') ? 'selected' : '';
                                    $selectedSecundaria = ($data['nivel'] == 'Secundaria') ? 'selected' : '';
                                    ?>
                                    <option value="">SELECCIONAR...</option>
                                    <option value="Primaria" <?php echo $selectedPrimaria ?>>Primaria</option>
                                    <option value="Secundaria" <?php echo $selectedSecundaria ?>>Secundaria</option>


                                </select><br>
                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Grado</label><br>

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


                            </div>

                        </div>





                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Curso</label><br>



                                <select id="curso" required name="curso">



                                    <?php
                                    include('../conexion.php');



                                    $sql = "SELECT DISTINCT c.nombre FROM curso c";
                                    $result = $conn->query($sql);
                                    $selectedId = $data['curso'];


                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            $selected = ($row["nombre"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                            $curso_dd = $row["nombre"];
                                            echo "<option value='{$curso_dd}' {$selected}>{$row["nombre"]}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay alumnos</option>";
                                    }

                                    $conn->close();
                                    ?>






                                </select>








                            </div>

                            <label style="padding: 20px;"></label>
                            <div class="inline-block right-margin">
                                <label>Tema</label><br>

                                <select class="select-bx" id="tema" required name="tema">



                                    <?php
                                    include('../conexion.php');



                                    $sql = "SELECT DISTINCT c.tema FROM curso c";
                                    $result = $conn->query($sql);

                                    $selectedId = $data['tema'];

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


                                </select>

                            </div>


                        </div>




                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Nota del Cuaderno: </label><br>

                                <input type="number" class="input-text" required name="nota_cuaderno" id="nota_cuaderno" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value="<?php echo $data['nota_cuaderno'] ?>"><br>

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Participacion Oral: </label><br>

                                <input type="number" class="input-text" required name="participacion_oral" id="participacion_oral" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value="<?php echo $data['participacion_oral'] ?>"><br>

                            </div>




                        </div>




                        <br>




                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Examen Mensual: </label><br>

                                <input type="number" class="input-text" required name="examen_mensual" id="examen_mensual" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value="<?php echo $data['examen_mensual'] ?>"><br>

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Examen Bimestral: </label><br>

                                <input type="number" class="input-text" required name="examen_bimestral" id="examen_bimestral" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value="<?php echo $data['examen_bimestral'] ?>"><br>

                            </div>




                        </div>








                        <br>




                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Comportamiento: </label><br>

                                <input type="number" class="input-text" required name="comportamiento" id="comportamiento" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value="<?php echo $data['comportamiento'] ?>"><br>

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Nota Bimestral: </label><br>

                                <input type="number" class="input-text" required name="nota_bimestral" id="nota_bimestral" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?" value ="<?php echo $data['nota_bimestral'] ?>"><br>

                            </div>




                        </div><br>

                        <label style="padding: 1px;"></label>

                        <label for="recipient-name" class="col-form-label">Nota Final: </label>

                        <strong style="text-align: center; text-transform: none !important">
                            <?php echo $data['nota_final']; ?>
                        </strong><br>
















                    </div>




                </div>


                <div class="modal-footer">
                    <button style="border-radius: 10px;" type="submit" class="btn btn-primary">Guardar</button>

                    <button style="border-radius: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                </div>


            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->