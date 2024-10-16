<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">




<style>
    table {
        width: 100%;
        text-align: center;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
    }


    .select-bx {
        padding: 10px 8px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 2px solid #ededed;
        color: #1b1b1b;
        outline: none;
    }

    .select-bt {
        padding: 8px 8px;
        border-radius: 10px;
        margin-bottom: 2px;
        border: 2px solid #ededed;
        color: #1b1b1b;
        outline: none;
    }

    select {
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





    /*--table design start----*/





    .table-wrapper {
        background-color: #f1f1f1;
        /* padding: 20px 25px; */
        margin: 6px 0px 40px 0px;
        width: 100%;
        overflow: auto;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 43, 233, 0.05);
    }

    .table-title {
        background: #2587ff;
        color: #fff;
        position: sticky;
        top: 0;
        width: 100%;
        left: 0;
        padding: 10px 30px;
        border-radius: 0px 0px 0 0;
    }



    .table-title-rp {
        background: #ffffff;
        color: #303030;
        position: sticky;
        top: 0;
        width: 100%;
        left: 0;
        padding: 10px 30px;
        border-radius: 0px 0px 0 0;
    }



    .table-title h2 {
        margin: 5px 0 0;
        font-size: 17px;
    }

    .table-title .btn-group {
        float: right;
    }

    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: 400;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 100px;
    }

    table.table-stripped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-stripped.table-hover tbody tr:hover {
        background-color: #f5f5f5;
    }

    table.table th i {
        font-size: 17px;
        margin: 6px 5px;
        cursor: pointer;
    }

    table.table td:last-child {
        opacity: 0.9;
        font-size: 22px;
        margin: 0px 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #2587ff;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }

    table.table td a:hover {
        color: #2587ff;
    }

    .edit {
        color: #FFC107;
    }

    .delete {
        color: #F44336;
    }







    table.table td i {
        font-size: 19px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }
</style>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">


<!--ventana para Update--->
<div class="modal fade" id="nuevasistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 1200px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Asistencia
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">


                    <br>

                    <?php

                    include('../conexion.php');


                    ?>



                 <?php
// Obtener el usuario del docente
$usuario = $_SESSION['docente']['usuario'];

// Consulta para obtener el nivel del docente
$sqlCf = "SELECT DISTINCT nivel FROM docente WHERE usuario = '$usuario'";
$queryff = mysqli_query($conexion, $sqlCf);
$rwe = mysqli_fetch_array($queryff);
$nivelDocente = $rwe['nivel'];

// Consulta para obtener los alumnos según el nivel del docente
$sqlClienteff = "SELECT DISTINCT * FROM alumno WHERE nivel = '$nivelDocente' ORDER BY nivel, grado";
$queryClienteff = mysqli_query($conexion, $sqlClienteff);

// Inicializamos un array para agrupar los alumnos por nivel y grado
$alumnosPorGrado = [];

while ($data = mysqli_fetch_array($queryClienteff)) {
    $nivel = $data['nivel'];
    $grado = $data['grado'];
    
    // Agrupamos los alumnos por nivel y grado
    $alumnosPorGrado[$nivel][$grado][] = $data;
}

?>




                    <form method="POST" action="../docente/registrarasistencia.php?usuario=<?php $usuario = $_SESSION['docente']['usuario'];
                                                                                            echo "$usuario"; ?>&docente=<?php $docente = $_REQUEST['docente'];
                                                                                                                        echo $docente; ?>">

                        <input class="input-text" type="time" required name="hora_inicio">
                        <label style="padding: 10px;"></label><input class="input-text" type="time" required name="hora_fin">
                        <label style="padding: 10px;">Fecha de Inicio: </label>

                        <input type="date" class="input-text" required name="fecha_inicio" id="fecha_inicio">


                        <input class="input-text" type="hidden" required name="fecha_asis" id="fecha_asis" value="<?php date_default_timezone_set('America/Mexico_City'); // Cambia 'America/Mexico_City' por tu zona horaria deseada

                                                                                                                    // Obtener la fecha actual y formatearla
                                                                                                                    $fecha_actual = date('Y-m-d'); // Puedes personalizar el formato según tus necesidades

                                                                                                                    // Mostrar la fecha en texto
                                                                                                                    echo $fecha_actual; ?>">


                        <label style="padding: 10px;">Fecha Final: </label>

                        <input type="date" class="input-text" required name="fecha_fin" id="fecha_fin"><br>

                        <?php


                        // Establecer la zona horaria a América/Perú
                        date_default_timezone_set('America/Lima');

                        // Crear un objeto DateTime con la fecha y hora actual
                        $fecha_actual = new DateTime();

                        // Obtener la fecha formateada según tus necesidades
                        $fecha_formateada = $fecha_actual->format('Y-m-d');

                        $fechaActual = $fecha_formateada;
                        $fecha = $fechaActual; // Puedes cambiar la fecha según tus necesidades

                        // Convierte la cadena de fecha a un objeto DateTime
                        $fechaObj = new DateTime($fecha);

                        // Extrae el nombre del día de la semana en inglés
                        $nombreDiaSemanaIngles = $fechaObj->format('l');

                        // Traduce el nombre del día de la semana a español
                        $traducciones = array(
                            'Monday'    => 'Lunes',
                            'Tuesday'   => 'Martes',
                            'Wednesday' => 'Miércoles',
                            'Thursday'  => 'Jueves',
                            'Friday'    => 'Viernes'
                        );

                        $nombreDiaSemanaEspanol = strtr($nombreDiaSemanaIngles, $traducciones);
                        ?>





                        <select class="select-bx" id="dia" required name="dia">



                            <?php
                            // Verificar si este es el elemento seleccionado
                            $selectedLUNES = ($nombreDiaSemanaEspanol == 'Lunes') ? 'selected' : '';
                            $selectedMARTES = ($nombreDiaSemanaEspanol == 'Martes') ? 'selected' : '';
                            $selectedMIERCOLES = ($nombreDiaSemanaEspanol == 'Miércoles') ? 'selected' : '';
                            $selectedJUEVES = ($nombreDiaSemanaEspanol == 'Jueves') ? 'selected' : '';
                            $selectedVIERNES = ($nombreDiaSemanaEspanol == 'Viernes') ? 'selected' : '';
                            ?>
                            <option value="">SELECCIONAR...</option>
                            <option value="Lunes" <?php echo $selectedLUNES ?>>Lunes</option>
                            <option value="Martes" <?php echo $selectedMARTES ?>>Martes</option>
                            <option value="Miércoles" <?php echo $selectedMIERCOLES ?>>Miércoles</option>
                            <option value="Jueves" <?php echo $selectedJUEVES ?>>Jueves</option>
                            <option value="Viernes" <?php echo $selectedVIERNES ?>>Viernes</option>

                        </select>





                       <!-- Select para el nivel -->
<select id="niveles" name="niveles" onchange="cambiarGrados()" required>
    <option value="">Seleccionar Nivel</option>
    <option value="Primaria">Primaria</option>
    <option value="Secundaria">Secundaria</option>
</select>

<!-- Select para el grado -->
<select id="grados" name="grados" onchange="mostrarTablaAlumnos()" required>
    <option value="">SELECCIONAR...</option>
    <!-- Las opciones de grado se llenan dinámicamente con JavaScript -->
</select>








                        <select class="select-bx" id="curso" required name="curso">



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
                                echo "<option value=''>No hay cursos</option>";
                            }

                            $conn->close();
                            ?>






                        </select>






                        <input type="hidden" id="docente" required name="docente" value="<?php $docente = $_REQUEST['docente'];
                                                                                            echo $docente; ?>">

                        <input type="hidden" id="usuario_docente" required name="usuario_docente" value="<?php $usuario_docente = $_REQUEST['usuario'];
                                                                                                            echo $usuario_docente; ?>">




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










                        <div class="row clearfix">



                            
                            
<div id="contenedor-tablas">
    <?php foreach ($alumnosPorGrado as $nivel => $grados) { ?>
        <?php foreach ($grados as $grado => $alumnos) { ?>
            <div class="tabla-alumnos" data-nivel="<?php echo $nivel; ?>" data-grado="<?php echo $grado; ?>" style="display: none;">
                <h3><?php echo "Nivel: $nivel - Grado: $grado"; ?></h3>
                <div class="table-responsive">
                    <br>
                    <table class="tablasistencia table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <td style="width:120px; text-align: center; background-color: #5DACCD; color:#fff">Seleccionar</td>
                                <td style="width:120px; text-align: center; background-color: #5DACCD; color:#fff">Alumno</td>
                                <th style="width:180px; text-align: center; background-color: #5DACCD; color:#fff">Asistencia 
                                
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alumnos as $index => $data) { ?>
                                <tr id="row-<?php echo $index; ?>">
                                    <td style="text-align: center;">
                                        <input type="checkbox" class="select-alumno" name="alumnos[<?php echo $index; ?>]" value="<?php echo $data['alumno']; ?>" />
                                    </td>
                                    <td><?php echo $data['alumno']; ?></td>
                                    <td>
                                        <div>
                                            <input type="radio" id="presente_<?php echo $index; ?>" name="tipoasistencia[<?php echo $index; ?>]" value="PRESENTE" />
                                            <label for="presente_<?php echo $index; ?>">PRESENTE</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="tardanza_<?php echo $index; ?>" name="tipoasistencia[<?php echo $index; ?>]" value="TARDANZA" />
                                            <label for="tardanza_<?php echo $index; ?>">TARDANZA</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="falta_<?php echo $index; ?>" name="tipoasistencia[<?php echo $index; ?>]" value="FALTA" />
                                            <label for="falta_<?php echo $index; ?>">FALTA</label>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
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
    </div>
</div>
<!---fin ventana Update --->





<script>
    $(document).ready(function() {
        $('#tablasistencia').DataTable({


            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },


            "searching": true,
            "columns": [
                null, // Columna 1
                null, // Columna 2
                null, // Columna 3


                // ... Agrega null para cada columna
            ]
        });
    });
</script>



<script>
    function compartirSeleccion(selectElement) {
        // Obtener el valor seleccionado
        var seleccion = selectElement.value;

        // Obtener todos los radio buttons con nombres que contengan el valor de seleccion
        var radios = document.querySelectorAll('input[type="radio"]');
        radios.forEach(function(radio) {
            // Sincronizar el estado de los radio buttons según el valor seleccionado
            if (radio.value === seleccion) {
                radio.checked = true; // Marcar el radio button
            } else {
                radio.checked = false; // Desmarcar otros radio buttons
            }
        });
    }
</script>




<script>
    function cambiarGrados() {
        var nivelesSeleccionada = $("#niveles").val();
        $("#grados").empty();

        if (nivelesSeleccionada == null || nivelesSeleccionada === "") {
            $("#grados").append('<option value="">SELECCIONAR...</option>');
        } else {
            addGradeOptions(nivelesSeleccionada);
        }
    }

    function addGradeOptions(level) {
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

    function mostrarTablaAlumnos() {
        var nivelSeleccionado = $("#niveles").val();
        var gradoSeleccionado = $("#grados").val();

        $(".tabla-alumnos").hide(); // Ocultamos todas las tablas

        $(".tabla-alumnos").each(function() {
            if ($(this).data("nivel") === nivelSeleccionado && $(this).data("grado") === gradoSeleccionado) {
                $(this).show(); // Mostramos la tabla correspondiente

                var tableElement = $(this).find('.tablasistencia');

                // Verificamos si la tabla ya tiene DataTables inicializado
                if ($.fn.DataTable.isDataTable(tableElement)) {
                    tableElement.DataTable().destroy(); // Destruimos la instancia previa
                }

                // Inicializamos DataTables en la tabla mostrada
                tableElement.DataTable({
                    searching: true, // Habilitamos la búsqueda
                    paging: true, // Habilitamos la paginación
                    info: true, // Mostramos información de la tabla
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" // Traducción al español
                    }
                });
            }
        });
    }

    $(document).ready(function() {
        $("#niveles").change(function() {
            cambiarGrados(); // Llenamos el select de grados según el nivel seleccionado
            mostrarTablaAlumnos(); // Mostramos la tabla correspondiente si hay nivel y grado seleccionados
        });

        $("#grados").change(function() {
            mostrarTablaAlumnos(); // Mostramos la tabla correspondiente si hay nivel y grado seleccionados
        });
        
         // Limpiamos todos los radio buttons en la tabla mostrada
            tableElement.find('input[type="radio"]').each(function() {
                $(this).prop('checked', false);
            });
    });
</script>
