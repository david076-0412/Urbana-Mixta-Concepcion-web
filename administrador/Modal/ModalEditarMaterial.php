<link rel="stylesheet" href="../docente/stylecss/stylemaass.css">


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Latest compiled and minified CSS -->


<!--ventana para Update--->
<div class="modal fade" id="editarcurso<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Curso
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="POST" enctype="multipart/form-data" action="../docente/editarcurso.php?usuario=<?php
                                                            $usuario = $_GET['usuario_docente'];
                                                            echo "$usuario"; ?>">
                
                
                <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">


                <input type="hidden" name="usuario" value="<?php
                                                            $usuario = $_GET['usuario_docente'];
                                                            echo "$usuario"; ?>">
                                                            
                <input type="hidden" name="usuario_admin" value="<?php
                                                            $usuario = $_SESSION['admin']['usuario'];
                                                                                                    echo $usuario; ?>">                                            

                <input type="hidden" name="usuario_alumno" value="<?php echo $data['usuario_alumno'] ?>">


                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">

                        <label class="label-txt"><b>Editar Datos del Curso</b></label><br>

                        <label>Nombre del Curso: </label><br>

                        <input type="text" class="input-text" required name="nombre" id="nombre" value="<?php echo $data['nombre'] ?>"><br>
                        <input type="hidden" class="input-text" required name="curso_anterior" id="curso_anterior" value="<?php echo $data['nombre'] ?>"><br>


                        <label>Tema: </label><br>

                        <input type="text" class="input-text" required name="tema" id="tema" value="<?php echo $data['tema'] ?>"><br>




                        <input type="hidden" class="input-text" required name="docente" id="docente" value="<?php echo $data['docente'] ?>">



                        <label>Nivel</label>

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







                        <label>Grado</label>

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



                        <label>Selecciona Alumnos</label>





                        <select id="alumnos" name="alumnos">



                            <?php

                            include('../conexion.php');
                            
                            
                            
                            $usuario_admin = $_SESSION['admin']['usuario'];


 $sql = "SELECT nivel FROM docente WHERE usuario_admin='$usuario_admin'";
                            $result = $conn->query($sql);
                            
                            
$row = $result->fetch_assoc();

$usuario = $row['nivel'];


if($usuario == 'Primaria') {
    
    
    
                            echo '<option value="">SELECCIONAR...</option>';

                            $sql = "SELECT id, usuario_apoderado, alumno, usuario FROM alumno where nivel = 'Primaria'";
                            $result = $conn->query($sql);

                            $selectedId = $data['usuario_alumno'];


                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["usuario"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $alumno_dd = $row["alumno"];
                                    echo "<option  value='{$alumno_dd}' {$selected}>{$row["alumno"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay alumnos</option>";
                            }

                            $conn->close();
    
    
}else if ($usuario == 'Secundaria'){
    
    
                            echo '<option value="">SELECCIONAR...</option>';

                            $sql = "SELECT id, usuario_apoderado, alumno, usuario FROM alumno where nivel = 'Secundaria'";
                            $result = $conn->query($sql);

                            $selectedId = $data['usuario_alumno'];


                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["usuario"] == $selectedId) ? 'selected' : ''; // Compara con el id deseado

                                    $alumno_dd = $row["alumno"];
                                    echo "<option  value='{$alumno_dd}' {$selected}>{$row["alumno"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay alumnos</option>";
                            }

                            $conn->close();
    
}
                            
                            
                            

                            ?>

                        </select>
















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