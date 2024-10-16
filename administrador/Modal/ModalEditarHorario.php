<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">




<!--ventana para Update--->
<div class="modal fade" id="editarhorario<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Horario
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="../administrador/editarhorario.php?usuario=<?php $usuario =$_SESSION['admin']['usuario'];
                                                                                        echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">


                        <input type="hidden" class="input-text" required name="id" value="<?php echo $data['id']; ?>">


                        <input type="hidden" class="input-text" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                        echo $usuario; ?>">



                        <div class="row" style="text-align: center">

                            <label style="padding: 30px;"></label>
                            <div class="inline-block right-margin">

                                <label>Hora: </label><br>

                                <input type="time" class="input-text" required name="hora_i" value="<?php echo $data['hora_i'] ?>">
                                <label style="padding: 10px;"></label>
                                <input type="time" class="input-text" required name="hora_f" value="<?php echo $data['hora_f'] ?>">



                            </div>
                        </div>


                        <br>




                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Dia de la Semana: </label><br>
                                <select required name="dia">





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
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Materia: </label><br>


                                <select required name="materia">



                                   <?php
// Incluir la conexión a la base de datos
include("../conexion.php");



// Inicializa el nivel por defecto
$nivel = '';

if (isset($_SESSION['admin']['usuario'])) {
    $usuario = $_SESSION['admin']['usuario'];

    // Prepara la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT nivel FROM admin WHERE usuario = ?");
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





// Consulta para obtener los nombres de los cursos
$sql = "SELECT DISTINCT nombre FROM curso WHERE nivel = '$nivel'";
$result = $conn->query($sql);

// Obtener el valor seleccionado previamente desde tu base de datos o el contexto actual
$selectedId = $data['materia']; // Este es el valor que debería estar seleccionado

// Depuración: Mostrar el valor de $selectedId para asegurarnos que contiene lo esperado
echo "Valor de \$selectedId: " . htmlspecialchars($selectedId, ENT_QUOTES, 'UTF-8') . "<br>";

// Verificar si la consulta devolvió resultados
if ($result->num_rows > 0) {
    // Opción por defecto
    echo "<option value=''>SELECCIONAR...</option>";
    echo "<option value='DESCANSO'" . ($selectedId == 'DESCANSO' ? ' selected' : '') . ">DESCANSO</option>";

    // Recorrer los resultados de la consulta
    while ($row = $result->fetch_assoc()) {
        $curso_dd = $row["nombre"];
        
        // Depuración: Mostrar el curso actual y la comparación
        echo "Comparando '{$curso_dd}' con '{$selectedId}'<br>";

        // Marcar la opción como seleccionada si coincide
        $selected = ($curso_dd == $selectedId) ? 'selected' : '';

        // Generar la opción del <select>
        echo "<option value='{$curso_dd}' {$selected}>{$curso_dd}</option>";
    }
} else {
    // Mostrar un mensaje si no hay cursos disponibles
    echo "<option value=''>No hay cursos</option>";
}

// Cerrar la conexión
$conn->close();
?>







                                </select>

                            </div>



                        </div>




                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">




                                <label>Nivel: </label><br>
                                <select id="niveles" required name="niveles">
                                    <?php
include("../conexion.php");

$nivel = '';

if (isset($_SESSION['admin']['usuario'])) {
    $usuario = $_SESSION['admin']['usuario'];

    $stmt = $conexion->prepare("SELECT nivel FROM admin WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $resultado_doc = $stmt->get_result();

    if ($resultado_doc->num_rows > 0) {
        $fila_doct = $resultado_doc->fetch_assoc();
        $nivel = htmlspecialchars($fila_doct['nivel'], ENT_QUOTES, 'UTF-8');
    }

    $stmt->close();
}

// Opciones de niveles
$options = [
    'Primaria' => ($data['nivel'] == 'Primaria') ? 'selected' : '',
    'Secundaria' => ($data['nivel'] == 'Secundaria') ? 'selected' : ''
];

?>

<option value="">SELECCIONAR...</option>

<?php if (array_key_exists($nivel, $options)): ?>
    <option value="<?php echo $nivel; ?>" <?php echo $options[$nivel]; ?>><?php echo $nivel; ?></option>
<?php endif; ?>

     
                                    
                                    




                                </select>

                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">



                                <label>Grado: </label><br>
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


                                </select>


                            </div>
                        </div>



                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Docente: </label><br>
                                <select required name="docente">



                                   <?php
include("../conexion.php");

// Inicializa el nivel por defecto
$nivel = '';

if (isset($_SESSION['admin']['usuario'])) {
    $usuario = $_SESSION['admin']['usuario'];

    // Prepara la consulta para evitar inyecciones SQL
    $stmt = $conexion->prepare("SELECT nivel FROM admin WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $resultado_doc = $stmt->get_result();

    // Verifica si se encontraron resultados
    if ($resultado_doc->num_rows > 0) {
        $fila_doct = $resultado_doc->fetch_assoc();
        $nivel = htmlspecialchars($fila_doct['nivel'], ENT_QUOTES, 'UTF-8');
    } else {
        // Manejar el caso donde no se encuentra el usuario
        // echo "Usuario no encontrado";
    }

    $stmt->close();
}

// Verifica si se obtuvo un nivel válido
if (!empty($nivel)) {
    // Prepara la consulta para seleccionar docentes
    $stmt = $conn->prepare("SELECT DISTINCT d.apellido_paterno, d.apellido_materno, d.nombres, d.usuario FROM docente d WHERE d.nivel = ?");
    $stmt->bind_param('s', $nivel);
    $stmt->execute();
    $result = $stmt->get_result();

    $selectedId = $data['usuario_docente'] ?? '';

    if ($result->num_rows > 0) {
        echo "<option value=''>SELECCIONAR...</option>";
        while ($row = $result->fetch_assoc()) {
            $selected = ($row["usuario"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado
            $docente_dd = htmlspecialchars($row["usuario"], ENT_QUOTES, 'UTF-8');
            $apellido_paterno = htmlspecialchars($row["apellido_paterno"], ENT_QUOTES, 'UTF-8');
            $apellido_materno = htmlspecialchars($row["apellido_materno"], ENT_QUOTES, 'UTF-8');
            $nombres = htmlspecialchars($row["nombres"], ENT_QUOTES, 'UTF-8');
            echo "<option value='{$docente_dd}' {$selected}>{$apellido_paterno} {$apellido_materno} {$nombres}</option>";
        }
    } else {
        echo "<option value=''>No hay Docentes</option>";
    }

    $stmt->close();
} else {
    echo "<option value=''>Nivel no encontrado</option>";
}

// Cierra la conexión
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