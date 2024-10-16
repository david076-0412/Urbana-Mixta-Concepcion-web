<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">


<!--ventana para Update--->
<div class="modal fade" id="editarmatriculaalumno<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0B2545 !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Solicitud<?php echo "#" ?><?php echo $data['codalu']; ?><?php echo "/" ?><?php echo $data['modalidad']; ?>
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="../apoderado/modificar_info_vacante.php?id=<?php echo $data['id']; ?>">

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <input class="invisible" type="hidden" id="usuario_apoderado" required name="usuario_apoderado" value="<?php echo $data['usuario_apoderado']; ?>" readonly>

        <div class="modal-body" id="cont_modal">



          <div class="form-group-modal">


            <label style="color: #00B9FF; text-align: center;" class="col-form-label">Datos del estudiante</label><br>



            <label for="recipient-name" class="col-form-label">Tipo de Documento: </label><br>





            <select required name="tipo_documento" id="tipo_documento">


              <?php
              // Verificar si este es el elemento seleccionado
              $selectedCUI = ($data['tipo_documento'] == 'CUI') ? 'selected' : '';
             
              ?>

              <option value="">SELECCIONAR...</option>
              <option value="CUI" <?php echo $selectedCUI ?>>CUI</option>
             


            </select>






            <br><label>Numero de Documento: </label>

            <input type="text" class="input-text" required name="dni" id="dni" value="<?php echo $data['dni']; ?>" minlength="8" maxlength="8"><br>


            <label>Alumno: </label>

            <input type="text" class="input-text" required name="alumno" id="alumno" value="<?php echo $data['alumno']; ?>"><br>




            <label>Fecha de Nacimiento: </label>
            <br>



            <input type="date" class="input-text" required name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $data['fecha_nacimiento'] ?>"><br>




            <label>Sexo: </label><br>



            <select required name="sexo" id="sexo">


              <?php
              // Verificar si este es el elemento seleccionado
              $selectedMasculino = ($data['sexo'] == 'Masculino') ? 'selected' : '';
              $selectedFemenino = ($data['sexo'] == 'Femenino') ? 'selected' : '';
              ?>

              <option value="">SELECCIONAR...</option>
              <option value="Masculino" <?php echo $selectedMasculino ?>>Masculino</option>
              <option value="Femenino" <?php echo $selectedFemenino ?>>Femenino</option>


            </select><br>





            <label style="color: #00B9FF; text-align: center;">Datos de Priorizacion</label><br>


            <label>Tiene discapacidad: </label><br>


            <select required name="discapacidad" id="discapacidad" onchange="MostrarCampoSI()">
              <option value="">SELECCIONAR...</option>


              <?php
              // Verificar si este es el elemento seleccionado
              $selectedSI = ($data['discapacidad'] == 'SI') ? 'selected' : '';
              $selectedNO = ($data['discapacidad'] == 'NO') ? 'selected' : '';
              ?>

              <option value="SI" <?php echo $selectedSI ?>>SI</option>
              <option value="NO" <?php echo $selectedNO ?>>NO</option>





            </select>



            <input type="text" class="input-text" id="tipo_discapacidad" name="tipo_discapacidad" value="<?php echo $data['tipo_discapacidad']; ?>">




            <br>


            <label>Estado del Alumno: </label>

            <strong style="text-transform: none; text-align: left !important">
              <?php echo $data['estado_alumno']; ?>
            </strong><br>







            <label style="color: #00B9FF; text-align: center;">Institución Educativa</label><br>





            <label>Nivel: </label>

            <strong style="text-align: left !important" class="inp-label">
              <?php echo $data['nivel']; ?>
            </strong><br>


            <label>Grado: </label>

            <strong style="text-align: left !important" class="inp-label">
              <?php echo $data['grado']; ?>
            </strong><br>


            <label>Turno: </label>

            <strong style="text-align: left !important" class="inp-label">
              <?php echo $data['turno']; ?>
            </strong><br>





            <?php

            $estado = $data['estado'];


            if ($estado == "admitido") {


            ?>



              <label>Estado: </label>

              <strong style="text-transform: none; color: #3EFF00; text-align: left !important" class="inp-label">
                <?php echo $data['estado']; ?>
              </strong><br>


              <label>Tiempo de Espera: </label>

              <strong style="text-transform: none; text-align: left !important">
                <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>
              </strong><br>

              <label>Vacantes Disponibles: </label>

              <strong style="text-align: left !important" class="inp-label">
                <?php echo $data['cant_desc_est']; ?>
              </strong><br>




            <?php


            } else if ($estado == "en proceso") {



            ?>


              <label>Estado: </label>

              <strong style="text-transform: none; color: #FF7000; text-align: left !important" class="inp-label">
                <?php echo $data['estado']; ?>
              </strong><br>

              <label>Tiempo de Espera: </label>

              <strong style="text-transform: none; text-align: left !important">
                <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>
              </strong><br>


              <label>Vacantes Disponibles: </label>

              <strong style="text-align: left !important" class="inp-label">
                <?php echo $data['cant_desc_est']; ?>
              </strong><br>



            <?php






            } else if ($estado == "no admitido") {


            ?>


              <label>Estado: </label>

              <strong style="text-transform: none; color: #FF0000; text-align: left !important" class="inp-label">
                <?php echo $data['estado']; ?>
              </strong><br>

              <label>Tiempo de Espera: </label>

              <strong style="text-transform: none; text-align: left !important">
                <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>
              </strong><br>


              <label>Vacantes Disponibles: </label>

              <strong style="text-align: left !important" class="inp-label">
                <?php echo $data['cant_desc_est']; ?>
              </strong><br>







            <?php



            }




            ?>














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


<script>
  function MostrarCampoSI() {
    var mostrar = document.getElementById("discapacidad");
    var textField = document.getElementById("tipo_discapacidad");

    // Si se selecciona "Sí", muestra el TextField; de lo contrario, lo oculta.

    if (textField == null) {
      textField.style.display = (mostrar.value === "NO") ? "block" : "none";
    } else {

      textField.style.display = (mostrar.value === "SI") ? "block" : "none";
    }



  }


  MostrarCampoSI();
</script>