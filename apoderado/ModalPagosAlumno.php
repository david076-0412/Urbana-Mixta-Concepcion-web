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

<link rel="stylesheet" href="../apoderado/stylecss/stylemaass.css">




<!--ventana para Update--->
<div class="modal fade" id="verpagos<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0B2545 !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Realizar Pago
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="../apoderado/pagar_alumno.php?id=<?php echo $data['id']; ?>">

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <input type="hidden" name="usuario_alumno" value="<?php $usuario_alumno = $_REQUEST['usuario_alumno'];
                                                          echo $usuario_alumno; ?>">

        <input type="hidden" name="nivel" value="<?php $nivel = $_REQUEST['nivel'];
                                                  echo $nivel; ?>">

        <div class="modal-body" id="cont_modal">

          <div class="form-group">



            <label for="recipient-name" class="col-form-label">Detalle de Pagos: </label><br>




            <label>Pagos </label>




            <input type="text" class="invisible" required name="usuario" id="usuario" value="<?php echo $data['usuario']; ?>"><br>







            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['nombre']; ?>
            </strong><br>



            <label>Estado: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['estado']; ?>
            </strong><br>



            <label>Costo: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo $data['cuota']; ?>
            </strong><br>

            <label>Vencimiento: </label>

            <strong style="text-align: center; text-transform: none !important">
              <?php echo date("d/m/Y", strtotime($data['vencimiento'])); ?>
            </strong><br>





            <?php

            $estado = $data['estado'];

            if ($estado == "PENDIENTE") {

            ?>

              <label>Numero de Cuenta: </label>

              <input type="text" class="input-text" required name="n_cuenta" id="n_cuenta"><br>


            <?php

            } else if ($estado == "EN PROCESO") {

            ?>

              <label>Numero de Cuenta: </label>
              <input type="text" class="input-text" required name="n_cuenta" id="n_cuenta"><br>

            <?php



            } else if ($estado == "PAGADO") {

            ?>
              <label>Numero de Cuenta: </label>

              <strong style="text-align: center; text-transform: none !important">
                <?php

                $nivel = $_REQUEST['nivel'];

                if ($nivel == "Primaria") {
                  include('../conexion.php');

                  $ql = "SELECT * FROM admin WHERE usuario = 'adminprimaria'";
                  $resultado = $conexion->query($ql);
                  $row = $resultado->fetch_assoc();

                  $n_cuenta_admin = $row['n_cuenta'];

                ?>
                  <?php echo $n_cuenta_admin; ?>
                  <br>
                  <?php echo "Por favor, aguarde 24 horas para que el pago se procese correctamente."; ?>


                <?php
                } else if ($nivel == "Secundaria") {

                  include('../conexion.php');

                  $qle = "SELECT * FROM admin WHERE usuario = 'adminsecundaria'";
                  $resultadoe = $conexion->query($qle);
                  $rowe = $resultadoe->fetch_assoc();

                  $n_cuenta_admine = $rowe['n_cuenta'];

                ?>
                  <?php echo $n_cuenta_admine; ?>
                  <br>
                  <?php echo "Por favor, aguarde 24 horas para que el pago se procese correctamente."; ?>



                <?php

                }
                ?>

              </strong><br>


            <?php



            }


            ?>











          </div>




        </div>
        <div class="modal-footer">


          <?php


          $estado = $data['estado'];

          if ($estado == "PENDIENTE") {

          ?>

            <input type="submit" class="btn btn-primary" value="Pagar">

          <?php



          } elseif ($estado == "EN PROCESO") {
          ?>

            <input type="submit" class="btn btn-primary" value="Pagar">

          <?php
          } elseif ($estado == "PAGADO") {
          ?>


            <input type="submit" class="btn btn-primary invisible" value="Detalles">

          <?php


          }
          ?>





          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
        </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>