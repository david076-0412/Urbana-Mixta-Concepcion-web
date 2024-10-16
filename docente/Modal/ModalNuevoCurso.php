<link rel="stylesheet" href="../docente/stylecss/stylemaass.css">

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">



<!--ventana para Update--->
<div class="modal fade" id="nuevocurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Curso
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" enctype="multipart/form-data" action="../docente/registrarcurso.php?usuario=<?php
                                                            $usuario = $_GET['usuario'];
                                                            echo "$usuario";?>">



                <input type="hidden" name="usuario" value="<?php
                                                            $usuario = $_GET['usuario'];
                                                            echo "$usuario"; ?>">




<?php
// Inicializa el nivel por defecto
$nivel = '';

if (isset($_SESSION['admin']['usuario'])) {
    $usuario = $_GET['usuario'];

    // Prepara la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT nivel FROM docente WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $resultado_doc = $stmt->get_result();

    // Verifica si se encontraron resultados
    if ($resultado_doc->num_rows > 0) {
        $fila_doct = $resultado_doc->fetch_assoc();
        $nivel = htmlspecialchars($fila_doct['nivel'], ENT_QUOTES, 'UTF-8');
    } else {
        // Si no se encuentra el usuario, manejar el error (opcional)
        // echo "Usuario no encontrado";
    }

    $stmt->close();
}
?>

<input type="hidden" name="usuario_nivel" value="<?php echo $nivel; ?>">



                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">
                        
                        


                        <input type="hidden" name="usuario_docente" value="<?php
                                                                            $usuario = $_GET['usuario_docente'];
                                                                            echo "$usuario"; ?>">


                        <label class="label-txt"><b>Registrar Datos del Curso</b></label><br>

                        <label>Nombre del Curso: </label><br>

                        <input type="text" class="input-text" required name="nombre" id="nombre" onkeypress="soloLetras(event)"><br>


                        <label>Tema: </label><br>

                        <input type="text" class="input-text" required name="tema" id="tema"><br>

                        <?php
                        
                        $usuario = $_GET['usuario_docente'];

                        $query_docente = "SELECT d.usuario, d.apellido_paterno, d.apellido_materno, d.nombres from docente d WHERE d.usuario='$usuario'";
                        $resultado_docente= $conexion->query($query_docente);

                        $fila_docente = $resultado_docente->fetch_assoc();

                        $apellido_paterno = $fila_docente['apellido_paterno'];

                        $apellido_materno = $fila_docente['apellido_materno'];

                        $nombres = $fila_docente['nombres'];

                        ?>


                        <input type="hidden" required name="apellido_paterno_docente" id="apellido_paterno_docente" value="<?php echo $apellido_paterno ?>">


                        <input type="hidden" required name="apellido_materno_docente" id="apellido_materno_docente" value="<?php echo $apellido_materno ?>">


                        <input type="hidden" required name="nombres_docente" id="nombres_docente" value="<?php echo $nombres ?>">



                        <label>Nivel</label>
                        <select id="niveles" required name="niveles" onchange="cambiarGrados()">
                            <option value="">SELECCIONAR...</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select><br>



                       


                        <label>Grado</label>

                        <select id="grados" required name="grados">

                            <option value="">SELECCIONAR...</option>

                        </select><br>






                       <label for="alumnos">Selecciona Alumnos</label>
<select id="alumnos" name="alumnos[]" multiple>
    <?php
    include('../conexion.php');
    
    // Asegúrate de que la sesión esté iniciada
    session_start();
    
    // Consulta para obtener el nivel del docente
    $usuario_admin = $_GET['usuario_docente'];
    $stmt = $conn->prepare("SELECT nivel FROM docente WHERE usuario = ?");
    $stmt->bind_param('s', $usuario_admin);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $usuario = $row['nivel'];
    
    // Consulta para obtener los alumnos según el nivel
    $stmt = $conn->prepare("SELECT alumno, nivel, grado FROM alumno WHERE nivel = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $alumno_dd = htmlspecialchars($row["alumno"], ENT_QUOTES, 'UTF-8');
            $nivel_dd = htmlspecialchars($row["nivel"], ENT_QUOTES, 'UTF-8');
            $grado_dd = htmlspecialchars($row["grado"], ENT_QUOTES, 'UTF-8');
            echo "<option value='{$alumno_dd}'>{$alumno_dd} - {$nivel_dd} - {$grado_dd}</option>";
        }
    } else {
        echo "<option value=''>No hay alumnos</option>";
    }
    
    // Cierra la conexión y el statement
    $stmt->close();
    $conn->close();
    ?>
</select>
<br>














                        <label>Subir Material</label>
                        <label>Tamaño recomendable 50M en formato: pdf</label>
                        <input type="file" required name="subir_material" id="subir_material"><br>








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
    function soloLetras(e) {
        var key = e.keyCode || e.which;
        var tecla = String.fromCharCode(key).toLowerCase();
        // Letras, espacios y caracteres especiales permitidos
        var letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ._/:";

        if (letras.indexOf(tecla) === -1) {
            e.preventDefault();
        }
    }
</script>





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
        placeholder: 'Buscar', // default Search...
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