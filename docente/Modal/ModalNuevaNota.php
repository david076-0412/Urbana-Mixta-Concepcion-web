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
    
    
    
    
    
    
    
</style>

<!--ventana para Update--->
<div class="modal fade" id="nuevanota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 410px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Notas
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" action="../docente/registrarnota.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                echo "$usuario"; ?>">







                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">


                        <input type="hidden" required name="usuario_docente" value="<?php $usuario = $_SESSION['docente']['usuario']; echo "$usuario"; ?>">



                        <label class="label-txt"><b>Registrar Datos de las Notas</b></label><br>


                        <?php
                        include('../conexion.php');
                        $usuario = $_SESSION['docente']['usuario'];
                        $query_docente = "SELECT d.usuario,d.apellido_paterno,d.apellido_materno,d.nombres from docente d WHERE d.usuario='$usuario'";
                        $resultado_docente = $conexion->query($query_docente);

                        $fila_docente = $resultado_docente->fetch_assoc();

                        $docente = $fila_docente['apellido_paterno'] . " " . $fila_docente['apellido_materno'] . " " . $fila_docente['nombres'];
                        ?>


                        <input type="hidden" class="input-text" required name="docente" id="docente" value="<?php echo $docente ?>">


                        



                        <label>Tipo de Nota del Promedio: </label><br>
                        <input type="text" class="input-text" required name="tipo_nota_promedio" id="tipo_nota_promedio"><br>


                        <br>





                        <label>Selecciona Alumnos</label><br>

                        <select id="alumnos" required name="alumnos">


<?php
include('../conexion.php');

// Verificar si la sesión está iniciada
if (!isset($_SESSION['docente']['usuario'])) {
    echo "<option value=''>Usuario no autenticado</option>";
    exit();
}

$usuario = $_SESSION['docente']['usuario'];

// Preparar la consulta para obtener el nivel del docente
$stmt = $conn->prepare("SELECT DISTINCT nivel FROM docente WHERE usuario = ?");
if ($stmt === false) {
    echo "<option value=''>Error al preparar la consulta</option>";
    exit();
}

$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($nivel);
$stmt->fetch();
$stmt->close();

// Verificar si se obtuvo un nivel
if (empty($nivel)) {
    echo "<option value=''>Nivel no encontrado</option>";
    exit();
}

// Preparar la consulta para obtener los alumnos
$sql = "SELECT id, usuario_apoderado, alumno, usuario FROM alumno WHERE nivel = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo "<option value=''>Error al preparar la consulta de alumnos</option>";
    exit();
}

$stmt->bind_param("s", $nivel);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<option value=''>SELECCIONAR...</option>";
    while ($row = $result->fetch_assoc()) {
        $alumno_dd = htmlspecialchars($row["alumno"], ENT_QUOTES, 'UTF-8');
        echo "<option value='{$alumno_dd}'>{$alumno_dd}</option>";
    }
} else {
    echo "<option value=''>No hay alumnos</option>";
}

$stmt->close();
$conn->close();
?>







                        </select><br>


                        <div class="row">
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Nivel</label><br>

                                <select id="niveles" required name="niveles" onchange="cambiarGrados()">
                                    <option value="">SELECCIONAR...</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select><br>
                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Grado</label><br>

                                <select id="grados" required name="grados">

                                    <option value="">SELECCIONAR...</option>

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



                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            $curso_dd = $row["nombre"];
                                            echo "<option value='{$curso_dd}'>{$row["nombre"]}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay alumnos</option>";
                                    }

                                    $conn->close();
                                    ?>






                                </select>



                            </div>

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Tema</label><br>

                                <select class="select-bx" id="tema" required name="tema">



                                    <?php
                                    include('../conexion.php');



                                    $sql = "SELECT DISTINCT c.tema FROM curso c";
                                    $result = $conn->query($sql);



                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            $tema_dd = $row["tema"];
                                            echo "<option value='{$tema_dd}'>{$row["tema"]}</option>";
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

                                <input type="number" class="input-text" required name="nota_cuaderno" id="nota_cuaderno" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?"><br>

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Participacion Oral: </label><br>

                                <input type="number" class="input-text" required name="participacion_oral" id="participacion_oral" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?"><br>

                            </div>




                        </div>




                        <br>




                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Examen Mensual: </label><br>

                                <input type="number" class="input-text" required name="examen_mensual" id="examen_mensual" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?"><br>

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Examen Bimestral: </label><br>

                                <input type="number" class="input-text" required name="examen_bimestral" id="examen_bimestral" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?"><br>

                            </div>




                        </div>








                        <br>




                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Comportamiento: </label><br>

                                <input type="number" class="input-text" required name="comportamiento" id="comportamiento" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?"><br>

                            </div>


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Nota Bimestral: </label><br>

                                <input type="number" class="input-text" required name="nota_bimestral" id="nota_bimestral" step="0.01" min="0" max="99999999.99" pattern="\d+(\.\d{2})?"><br>

                            </div>




                        </div>
















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




<script>
    function cambiarGrados() {
        // Obtener el valor seleccionado en la categoría
        var nivelesSeleccionada = $("#niveles").val();

        $("#grados").empty();


        if (nivelesSeleccionada == null) {
            $("#grados").append('<option value="">SELECCIONAR...</option>');
        } else {
            addGradeOptions(nivelesSeleccionada);
        }

    }


    cambiarGrados();


    function addGradeOptions(level) {

        $("#grados").empty();


        $("#grados").append('<option value="">SELECCIONAR...</option>');




        if (level === "Primaria") {


            $("#grados").append('<option value="Primero">Primero</option>');
            $("#grados").append('<option value="Segundo">Segundo</option>');
            $("#grados").append('<option value="Tercero">Tercero</option>');
            $("#grados").append('<option value="Cuarto">Cuarto</option>');
            $("#grados").append('<option value="Quinto">Quinto</option>');
            $("#grados").append('<option value="Sexto">Sexto</option>');



        } else if (level === "Secundaria") {

            $("#grados").append('<option value="Primero">Primero</option>');
            $("#grados").append('<option value="Segundo">Segundo</option>');
            $("#grados").append('<option value="Tercero">Tercero</option>');
            $("#grados").append('<option value="Cuarto">Cuarto</option>');
            $("#grados").append('<option value="Quinto">Quinto</option>');



        }


    }
</script>