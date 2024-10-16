<link rel="stylesheet" href="../docente/stylecss/stylemaass.css">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">



<!--ventana para Update--->
<div class="modal fade" id="nuevatarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 450px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Curso
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" enctype="multipart/form-data" action="../docente/registrartarea.php?usuario=<?php
                                                                                                            $usuario = $_SESSION['docente']['usuario'];
                                                                                                            echo "$usuario"; ?>">





                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">


                        <input type="hidden" name="usuario_docente" value="<?php
                                                                            $usuario = $_SESSION['docente']['usuario'];
                                                                            echo "$usuario"; ?>">


                        <label class="label-txt"><b>Registrar Datos de la Tarea</b></label><br>

                        <label>Titulo: </label><br>

                        <input type="text" class="input-text" required name="titulo" id="titulo"><br>
                        <label>Fecha de Entrega: </label><br>
                        <input type="date" class="input-text" required name="fecha_entrega" id="fecha_entrega"><br>
                        <label>Hora de Entrega: </label><br>
                        <input class="input-text" type="time" required name="hora_entrega"><br>



                        <label>Descripcion: </label><br>

                        <textarea type="text" class="input-text" required name="descripcion" placeholder="Escribe la descripcion aqui..." id="descripcion"></textarea><br>




                        <label>Selecciona Tema</label>

                        <select id="temas" name="temas">



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



                        <?php
                        include('../conexion.php');

                        $usuario = $_SESSION['docente']['usuario'];

                        $sqlClientett   = ("SELECT usuario,apellido_paterno,apellido_materno,nombres FROM docente WHERE usuario = '$usuario'");
                        $queryClientett = mysqli_query($conexion, $sqlClientett);



                        ?>



                        <?php while ($data = mysqli_fetch_array($queryClientett)) { ?>


                            <input type="hidden" class="input-text" required name="docente" id="docente" value="<?php echo $data['apellido_paterno'] . " " . $data['apellido_materno'] . " " . $data['nombres'] ?>"><br>


                        <?php } ?>



                        <label>Selecciona Materia</label>

                        <select id="materias" name="materias">



                          <?php
include('../conexion.php');

$usuario = $_SESSION['docente']['usuario'];

// Preparar la consulta para obtener el nivel del docente
$stmt = $conn->prepare("SELECT DISTINCT nivel FROM docente WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($nivel);
$stmt->fetch();
$stmt->close();

// Preparar la consulta para obtener los cursos correspondientes al nivel
$sql = "SELECT DISTINCT nombre FROM curso WHERE nivel = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nivel);
$stmt->execute();
$result = $stmt->get_result();

echo "<option value=''>SELECCIONAR...</option>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $curso_nombre = htmlspecialchars($row["nombre"], ENT_QUOTES, 'UTF-8');
        echo "<option value='{$curso_nombre}'>{$curso_nombre}</option>";
    }
} else {
    echo "<option value=''>No hay cursos disponibles</option>";
}

$stmt->close();
$conn->close();
?>







                        </select><br>


                        <label>Nivel</label>

                        <select id="niveles" required name="niveles" onchange="cambiarGrados()">



                            <?php
                            
include('../conexion.php');

$usuario = $_SESSION['docente']['usuario'];

// Preparar la consulta para obtener el nivel del docente
$stmt = $conn->prepare("SELECT DISTINCT nivel FROM docente WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

// Inicializar variables para las opciones seleccionadas
$selectedPrimaria = '';
$selectedSecundaria = '';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nivel = $row['nivel'];

    // Asignar la opción seleccionada basada en el nivel
    if ($nivel === 'Primaria') {
        $selectedPrimaria = 'selected';
    } elseif ($nivel === 'Secundaria') {
        $selectedSecundaria = 'selected';
    }
}

// Generar las opciones del <select>
?>
<option value="">SELECCIONAR...</option>
<option value="Primaria" <?php echo $selectedPrimaria; ?>>Primaria</option>
<option value="Secundaria" <?php echo $selectedSecundaria; ?>>Secundaria</option>
                


                        </select><br>


                        <label>Grado</label>

                        <select id="grados" required name="grados">

                            <option value="">SELECCIONAR...</option>

                        </select><br>





                        <label>Selecciona Alumnos</label>

                        <select id="alumnos" name="alumnos[]" multiple>



                            <?php
include('../conexion.php');

$usuario = $_SESSION['docente']['usuario'];

// Preparar la consulta para obtener el nivel del docente
$stmt = $conn->prepare("SELECT DISTINCT nivel FROM docente WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nivel = $row['nivel'];

    // Preparar la consulta para obtener los alumnos del nivel correspondiente
    $stmt = $conn->prepare("SELECT DISTINCT alumno FROM alumno WHERE nivel = ?");
    $stmt->bind_param("s", $nivel);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $alumno_dd = htmlspecialchars($row["alumno"], ENT_QUOTES, 'UTF-8');
            echo "<option value='{$alumno_dd}'>{$alumno_dd}</option>";
        }
    } else {
        echo "<option value=''>No hay alumnos</option>";
    }
} else {
    echo "<option value=''>Nivel no encontrado</option>";
}

$stmt->close();
$conn->close();
?>



                        </select><br>










                        <label>Subir Documento de la Tarea</label>
                        <label>Tamaño recomendable 50M en formato: pdf</label>
                        <input type="file" required name="subir_do_tarea" id="subir_do_tarea"><br>










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


<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('alumnos', {
        rounded: true, // default true
        shadow: true, // default false
        placeholder: 'Search', // default Search...
        tagColor: {
            textColor: '#327b2c',
            borderColor: '#92e681',
            bgColor: '#eaffe6',
        },
        onChange: function(values) {
            console.log(values)
        }
    })
</script>