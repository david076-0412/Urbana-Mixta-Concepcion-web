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




    .input-field {
        width: 340px;
        border-radius: 10px;
        padding: 12px 10px;
        border: 2px solid #ededed;
        box-sizing: border-box;
        margin: 5px 10px 0px 0px;



    }




    .input-group-box {
        position: relative;
        height: 52px;
        margin: 5px 0;
        border-radius: 10px;
        display: flex;
        text-align: left;
        width: 220px;
        padding: 5px;
        border: 2px solid #bbbbbb;
        box-sizing: border-box;
        margin: 5px 20px 0px 0px;


    }


    .input-group-box input {
        width: 90%;
        height: 50%;
        background: transparent;
        outline: none;
        border: 0px solid rgba(61, 61, 61, 0.2);
        border-radius: 15px;
        font-size: 16px;
        color: #000000;


    }


    .input-group-box input::placeholder {
        color: #000000;
    }

    .input-group-box i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 20px;
    }
</style>






<!--ventana para Update--->
<div class="modal fade" id="editardocente<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 620px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Docente
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" action="../administrador/editardocente.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                            echo "$usuario"; ?>">


                        <input type="hidden" required name="id" value="<?php echo $data['id']; ?>">
                        <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                    echo $usuario; ?>">



<input class="input-text" type="hidden" required name="usuario_docentedd" value="<?php echo $data['usuario'] ?>">



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Usuario: </label><br>
                                <input class="input-text" type="text" required name="usuario_docente" value="<?php echo $data['usuario'] ?>">
                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Correo: </label><br>
                                <input class="input-text" type="text" required name="correo" value="<?php echo $data['correo'] ?>">


                            </div>
                        </div>

                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Password: </label><br>

                                <input id="passwordd" type="text" class="input-text" required name="password" value="<?php echo $data['password'] ?>">





                            </div>
                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Apellido Paterno: </label><br>
                                <input class="input-text" type="text" required name="apellido_paterno" value="<?php echo $data['apellido_paterno'] ?>">
                            </div>
                        </div>

                        <br>











                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Apellido Materno: </label><br>
                                <input class="input-text" type="text" required name="apellido_materno" value="<?php echo $data['apellido_materno'] ?>">
                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Nombres: </label><br>
                                <input class="input-text" type="text" required name="nombres" value="<?php echo $data['nombres'] ?>">

                            </div>
                        </div>

                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Sexo: </label><br>
                                <select style="width: 220px;" class="input-field" required name="sexo" id="sexo">


                                   
                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedMASCULINO = ($data['sexo'] == 'Masculino') ? 'selected' : '';
                                    $selectedFEMENINO = ($data['sexo'] == 'Femenino') ? 'selected' : '';

                                    ?>
                                    <option value="">SELECCIONA GENERO</option>
                                    <option value="Masculino" <?php echo $selectedMASCULINO ?>>Masculino</option>
                                    <option value="Femenino" <?php echo $selectedFEMENINO ?>>Femenino</option>





                                </select>

                            </div>




                            <label style="padding: 5px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Fecha de Nacimiento: </label><br>
                                <input type="date" class="input-text" required name="fechadn" id="fechadn" value="<?php echo $data['fechadn'] ?>">

                            </div>
                        </div>





                        <br>


                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Telefono: </label><br>
                                <input class="input-text" type="text" required name="telefono" minlength="9" maxlength="9" value="<?php echo $data['telefono'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Tipo de Documento: </label><br>
                                <select style="width: 220px;" class="input-field" required name="tipo_documento" id="tipo_documento">



                                    <?php
                                    // Verificar si este es el elemento seleccionado
                                    $selectedDNI = ($data['tipo_documento'] == 'CUI') ? 'selected' : '';
                                    

                                    ?>
                                    <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                                    <option value="CUI" <?php echo $selectedDNI ?>>CUI</option>
                                    




                                </select>

                            </div>
                        </div>



                        <br>



                        <div class="row">


                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Documento de Identidad: </label><br>
                                <input class="input-text" type="text" required name="dni" minlength="8" maxlength="8" value="<?php echo $data['dni'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            </div>




                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Nivel: </label><br>
                                <select id="nivel" required name="nivel">
                                    <?php
                                    $usuario_adminee = $_SESSION['admin']['usuario'];
                                    $query_admin = "SELECT d.usuario,d.nivel from docente d WHERE d.usuario_admin='$usuario_adminee'";
                                    $resultado_admin = $conexion->query($query_admin);

                                    $fila_admin = $resultado_admin->fetch_assoc();

                                    $nivel_admin = $fila_admin['nivel'];


                                    // Verificar si este es el elemento seleccionado
                                    $selectedPRIMARIA = ($nivel_admin == 'Primaria') ? 'selected' : '';

                                    ?>
                                    <option value="">SELECCIONAR...</option>

                                    <option value="Primaria" <?php echo $selectedPRIMARIA ?>>Primaria</option>




                                </select>
                            </div>
                        </div>


                        <br>



                        <div class="row">



                            <label style="padding: 10px;"></label>
                            <div class="inline-block right-margin">

                                <label class="inp-label">Grado: </label><br>
                                <select style="width: 220px;" class="input-field" required name="grado" id="grado">

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




                            <label style="padding: 6px;"></label>
                            <div class="inline-block right-margin">
                                <label class="inp-label">Direccion: </label><br>
                                <input type="text" class="input-text" required name="direccion" value="<?php echo $data['direccion'] ?>">




                            </div>






                        </div>









                </div>





                <br>







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