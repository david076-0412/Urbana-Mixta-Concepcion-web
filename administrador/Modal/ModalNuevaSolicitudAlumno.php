<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">



<!--ventana para Update--->
<div class="modal fade" id="nuevasolicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar de Solicitud-Alumno
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="../administrador/registrarsolicitudalumno.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                echo "$usuario"; ?>">




                <div class="modal-body" id="cont_modal">



                    <div class="form-group-modal">



                        <input type="hidden" class="input-text" required name="usuario_apoderado" value="<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                                            echo $usuario_apoderado; ?>">


                        <input type="hidden" class="input-text" required name="usuario" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                echo $usuario; ?>">






                        <label>Periodo: </label><br>

                        <select required name="periodo" id="periodo">


                            <option value="">SELECCIONAR...</option>


                            <?php
                            $sqlClientebb   = ("SELECT DISTINCT periodo FROM solicitud_apoderado");
                            $queryClientebb = mysqli_query($conexion, $sqlClientebb);
                            ?>




                            <?php
                            while ($row = mysqli_fetch_array($queryClientebb)) {
                                echo "<option value='" . $row['periodo'] . "'>" . $row['periodo'] . "</option>";
                            }
                            ?>




                        </select>




                        <label>Categoria Solicitud: </label><br>







                        <select required name="categoria_solicitud" id="categoria_solicitud">



                            <option value="">SELECCIONAR...</option>


                            <?php
                            $sqlClientebb   = ("SELECT DISTINCT categoria_solicitud FROM solicitud_apoderado");
                            $queryClientebb = mysqli_query($conexion, $sqlClientebb);
                            ?>




                            <?php
                            while ($row = mysqli_fetch_array($queryClientebb)) {
                                echo "<option value='" . $row['categoria_solicitud'] . "'>" . $row['categoria_solicitud'] . "</option>";
                            }
                            ?>




                        </select><br>






                        <label>Selecciona Alumnos</label>

                        <select id="alumnos" name="alumnos[]" multiple>


<?php
                           include('../conexion.php');



                            $sql = "SELECT id, usuario_apoderado, alumno, usuario FROM alumno";
                            $result = $conn->query($sql);



                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $alumno_dd = $row["alumno"];
                                    echo "<option value='{$alumno_dd}'>{$row["alumno"]}</option>";
                                }
                            } else {
                                echo "<option value=''>No hay alumnos</option>";
                            }

                            $conn->close();
                            ?>






                        </select><br>











                        <label>Servicio: </label><br>



                        <select required name="servicio" id="servicio" onchange="cargarImporte()">



                            <option value="">SELECCIONAR...</option>




                            <?php
                            $sqlClientebb   = ("SELECT DISTINCT servicio FROM solicitud_apoderado");
                            $queryClientebb = mysqli_query($conexion, $sqlClientebb);
                            ?>




                            <?php
                            while ($row = mysqli_fetch_array($queryClientebb)) {
                                echo "<option value='" . $row['servicio'] . "'>" . $row['servicio'] . "</option>";
                            }
                            ?>




                        </select><br>





                        <label>Importe: </label>



                        <input type="text" class="input-text" id="importe" required name="importe" value="0.00" readonly>






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
    document.addEventListener('DOMContentLoaded', function() {
        // Al cargar la página, obtén las categorías y llénalas en el <select>

    });

    function llenarSelect(servicios) {
        var select = document.getElementById('servicio');

        servicios.forEach(function(servicio) {
            var option = document.createElement('option');
            option.value = servicio.importe;
            option.text = servicio.importe;
            select.add(option);
        });

        // Al cargar las categorías, también carga las subcategorías basadas en la primera categoría (si existe)
        cargarImporte();
    }

    function cargarImporte() {
        var idServicioSeleccionada = document.getElementById('servicio').value;

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var importe = JSON.parse(xhr.responseText);
                mostrarImporte(importe);
            }
        };

        xhr.open('GET', 'obtener_subcategorias.php?servicio=' + idServicioSeleccionada, true);
        xhr.send();
    }

    function mostrarImporte(importe) {
        var inputimporte = document.getElementById('importe');

        // Muestra la primera subcategoría (si existe)
        if (importe.length > 0) {
            inputimporte.value = importe[0].importe;
        } else {
            inputimporte.value = '';
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