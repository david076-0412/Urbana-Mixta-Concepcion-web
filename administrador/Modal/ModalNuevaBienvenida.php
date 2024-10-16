<style>
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



    .form-control {
        border: none;
        background: #ededed;
    }

    .form-control:active,
    .form-control:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #000;
        background: #f3f3f3;
    }
</style>


<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

<!--ventana para Update--->
<div class="modal fade" id="nuevabienvenida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar Bienvenida
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" action="../administrador/registrarbienvenida.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                echo "$usuario"; ?>">






                        <label class="inp-label">Saludo: </label><br>
                        <textarea class="form-control" name="saludo" id="saludo" rows="4" cols="65" placeholder="Escribe aqui tu saludo...."></textarea><br>


                        <label class="inp-label">Mensaje de Bienvenida: </label><br>
                        <textarea class="form-control" name="mensaje_bienvenida" id="mensaje_bienvenida" rows="4" cols="65" placeholder="Escribe aqui tu mensaje de Bienvenida...."></textarea><br>




                        <label class="inp-label">Opciones: </label><br>
                        <textarea class="form-control" name="opciones" id="opciones" rows="4" cols="65" placeholder="Escribe aqui las opciones para el usuario...."></textarea><br>









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