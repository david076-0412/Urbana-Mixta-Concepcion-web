<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">




<!--ventana para Update--->
<div class="modal fade" id="nuevohorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


            <form method="POST" action="../administrador/registrarhorario.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                        echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">



                        <input type="hidden" class="input-text" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                echo $usuario; ?>">



                        <div class="row" style="text-align: center">

                            <label style="padding: 30px;"></label>
                            <div class="inline-block right-margin">

                                <label>Hora: </label><br>

                                <input type="time" class="input-text" required name="hora_i">
                                <label style="padding: 10px;"></label>
                                <input type="time" class="input-text" required name="hora_f">



                            </div>

                            
                        </div>


                        <br>




                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label>Dia de la Semana: </label><br>
                                <select required name="dia">




                                    <option value="">SELECCIONAR...</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>

                                </select>



                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Materia: </label><br>


                                <select required name="materia">



                                    <?php
                                   include('../conexion.php');



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





                                    $sql = "SELECT DISTINCT c.nombre FROM curso c WHERE nivel = '$nivel'";
                                    $result = $conn->query($sql);



                                    if ($result->num_rows > 0) {
                                        echo "<option value=''>SELECCIONAR...</option>";
                                        echo "<option value='DESCANSO'>DESCANSO</option>";
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

                            </div>



                        </div>




                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">




                                <label>Nivel: </label><br>
                                <select id="niveles" required name="niveles" onchange="cambiarGrados()">
                                    <option value="">SELECCIONAR...</option>
                                    <?php

                                    $usuario = $_SESSION['admin']['usuario'];

                                    if ($usuario == "adminprimaria") {
                                    ?>
                                        <option value="Primaria">Primaria</option>

                                    <?php

                                    } else if ($usuario == "adminsecundaria") {
                                    ?>
                                        <option value="Secundaria">Secundaria</option>


                                    <?php
                                    }


                                    ?>





                                </select>

                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">



                                <label>Grado: </label><br>
                                <select class="select-bx" id="grados" required name="grados">

                                    <option value="">SELECCIONAR...</option>


                                </select>


                            </div>
                        </div>



                        <div class="row">

                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label>Docente: </label><br>
                                <select required name="docente">



                                 <?php
include('../conexion.php');

function obtenerNivelUsuario($conexion, $usuario) {
    $stmt = $conexion->prepare("SELECT nivel FROM admin WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        return htmlspecialchars($fila['nivel'], ENT_QUOTES, 'UTF-8');
    }
    
    return null; // Nivel no encontrado
}

function obtenerDocentesPorNivel($conexion, $nivel) {
    $stmt = $conexion->prepare("SELECT DISTINCT apellido_paterno, apellido_materno, nombres, usuario FROM docente WHERE nivel = ?");
    $stmt->bind_param('s', $nivel);
    $stmt->execute();
    return $stmt->get_result();
}

try {
    // Inicializa el nivel por defecto
    $nivel = '';

    if (isset($_SESSION['admin']['usuario'])) {
        $usuario = $_SESSION['admin']['usuario'];
        $nivel = obtenerNivelUsuario($conexion, $usuario);

        if ($nivel) {
            $result = obtenerDocentesPorNivel($conexion, $nivel);

            if ($result->num_rows > 0) {
                echo "<option value=''>SELECCIONAR...</option>";
                while ($row = $result->fetch_assoc()) {
                    $docente_dd = htmlspecialchars($row["usuario"], ENT_QUOTES, 'UTF-8');
                    echo "<option value='{$docente_dd}'>" . htmlspecialchars($row["apellido_paterno"], ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($row["apellido_materno"], ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($row["nombres"], ENT_QUOTES, 'UTF-8') . "</option>";
                }
            } else {
                echo "<option value=''>No hay Docentes</option>";
            }
        } else {
            echo "<option value=''>Nivel no encontrado</option>";
        }
    } else {
        echo "<option value=''>Usuario no autenticado</option>";
    }
} catch (Exception $e) {
    echo "<option value=''>Error al obtener los datos</option>";
} finally {
    $conexion->close();
}
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



        }else if (level === "Secundaria") {


            $("#grados").append('<option value="Primero">Primero</option>');
            $("#grados").append('<option value="Segundo">Segundo</option>');
            $("#grados").append('<option value="Tercero">Tercero</option>');
            $("#grados").append('<option value="Cuarto">Cuarto</option>');
            $("#grados").append('<option value="Quinto">Quinto</option>');
            



        }


    }
</script>
