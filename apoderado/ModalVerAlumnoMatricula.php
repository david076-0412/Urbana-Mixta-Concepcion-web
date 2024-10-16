<style>
  /* Agrega un estilo CSS para ocultar el campo de texto */
  .invisible {
    display: none;
  }

  .invisib {
    display: none;
  }



  h1,
  h2,
  h4 {

    text-transform: none;
    /* Esta propiedad quita cualquier transformación del texto */

  }



  label,
  strong {

    text-transform: none;
    /* Esta propiedad quita cualquier transformación del texto */

  }
</style>


<!--ventana para Update--->
<div class="modal fade" id="vermatriculaalumno<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


      <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <div class="modal-body" id="cont_modal">

          <div class="form-group">

            <label style="color: #00B9FF; text-align: center;">Datos del estudiante</label><br>

            <label for="recipient-name" class="col-form-label">Tipo de Documento: </label>


            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['tipo_documento']; ?>
            </strong><br>

            <label>Numero de Documento: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['dni']; ?>
            </strong><br>

            <label>Alumno: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['alumno']; ?>
            </strong><br>

            <label>Fecha de Nacimiento: </label>

            <strong style="text-align: center !important">
              <?php echo date('d/m/Y', strtotime($data['fecha_nacimiento'])); ?>
            </strong><br>



            <label>Sexo: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['sexo']; ?>
            </strong><br>


            <label style="color: #00B9FF; text-align: center;">Datos de Priorizacion</label><br>


            <label>Tiene discapacidad: </label>



            <?php

            $discapacidad = $data['discapacidad'];

            if ($discapacidad == "SI") {




            ?>

              <strong style="text-align: center; text-transform: none !important">
                <?php echo $data['tipo_discapacidad']; ?>
              </strong><br>




            <?php



            } else if ($discapacidad == "NO") {

            ?>




              <strong style="text-align: center; text-transform: none !important">
                <?php echo $data['discapacidad']; ?>
              </strong><br>



            <?php





            }

            ?>


            <label>Estado del Alumno: </label>

            <strong style="text-transform: none; text-align: center !important">
              <?php echo $data['estado_alumno']; ?>
            </strong><br>








            <label style="color: #00B9FF; text-align: center;">Institución Educativa</label><br>


            <label>Nivel: </label>

            <strong style="text-transform: none; text-align: center !important">
              <?php echo $data['nivel']; ?>
            </strong><br>


            <label>Grado: </label>

            <strong style="text-transform: none; text-align: center !important">
              <?php echo $data['grado']; ?>
            </strong><br>


            <label>Turno: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['turno']; ?>
            </strong><br>





            <?php

            $estado = $data['estado'];


            if ($estado == "aceptado") {


            ?>



              <label>Estado: </label>

              <strong style="text-transform: none; color: #3EFF00; text-align: center !important">
                <?php echo $data['estado']; ?>
              </strong><br>




              <label>Vacantes Disponibles: </label>

              <strong style="text-transform: none; text-align: center !important">
                <?php echo $data['cant_desc_est']; ?>
              </strong><br>

              <label>Tiempo de Espera: </label>

              <strong style="text-transform: none; color: #3EFF00; text-align: center !important">
                <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>
              </strong><br>


            <?php


            } else if ($estado == "en proceso") {



            ?>


              <label>Estado: </label>

              <strong style="text-transform: none; color: #FF7000; text-align: center !important">
                <?php echo $data['estado']; ?>
              </strong><br>




              <label>Vacantes Disponibles: </label>

              <strong style="text-align: center !important">
                <?php echo $data['cant_desc_est']; ?>
              </strong><br>


              <label>Tiempo de Espera: </label>

              <strong style="text-transform: none; color: #FF7000; text-align: center !important">
                <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>
              </strong><br>
            <?php






            } else if ($estado == "rechazado") {


            ?>


              <label>Estado: </label>

              <strong style="text-transform: none; color: #FF0000; text-align: center !important">
                <?php echo $data['estado']; ?>
              </strong><br>




              <label>Alumnos Restantes: </label>

              <strong style="text-align: center !important">
                <?php echo $data['cant_desc_est']; ?>
              </strong><br>


              <label>Tiempo de Espera: </label>

              <strong style="text-transform: none; color: #FF0000; text-align: center !important">
                <?php echo date('d/m/Y', strtotime($data['tiempo_espera'])); ?>
              </strong><br>





            <?php



            }




            ?>














          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->