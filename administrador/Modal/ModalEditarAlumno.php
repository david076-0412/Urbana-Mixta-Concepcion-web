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
        width: 260px;
        border-radius: 10px;
        padding: 12px 10px;
        border: 2px solid #ededed;
        box-sizing: border-box;
        margin: 5px 10px 0px 0px;



    }




    .input-group-box {
        position: relative;
        height: 56px;
        margin: 5px 0;
        border-radius: 10px;
        display: flex;
        text-align: left;
        width: 220px;
        padding: 2px;
        border: 2px solid #bbbbbb;
        box-sizing: border-box;
        margin: 5px 20px 0px 0px;


    }


    .input-group-box input {
        width: 85%;
        height: 95%;
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
<div class="modal fade" id="editaralumno<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="max-width: 780px;" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0B2545 !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Editar Alumno
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="main-content" id="tabla-productos">


                <div class="col-md-12">







                    <form method="POST" enctype="multipart/form-data" action="../administrador/editaralumno.php?usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                        echo "$usuario"; ?>">

                        <input type="hidden" required name="usuario_admin" value="<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                    echo "$usuario"; ?>">

                        <input type="hidden" required name="id" value="<?php echo $data['id'] ?>">


                        <input type="hidden" required name="usuario_apoderado" value="<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                        echo "$usuario_apoderado"; ?>">


                        <input type="hidden" required name="usuario_dni_apoderado" value="<?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                                                                            echo "$usuario_dni_apoderado"; ?>">

                        <input type="hidden" required name="usuario_nombre_apoderado" value="<?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                                                                                echo "$usuario_nombre_apoderado"; ?>">


                        <input type="hidden" required name="estado_foto" value="<?php echo $data['estado_foto'] ?>">

                        <input type="hidden" required name="estado_libreta" value="<?php echo $data['estado_libreta'] ?>">




                        <input type="hidden" class="input-text" required name="usuario_alumnodd" value="<?php echo $data['usuario'] ?>">


                        <div class="input-group">





                            <div class="row">
                                <div class="inline-block right-margin">

                                    <label>Usuario del Apoderado: </label>

                                    <strong class="inp" style="text-align: left !important">
                                        <?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                        echo $usuario_apoderado; ?>
                                    </strong>


                                    <input type="hidden" id="usuario_apoderado" required name="usuario_apoderado" value="<?php $usuario_apoderado = $_REQUEST['usuario_apoderado'];
                                                                                                                            echo $usuario_apoderado; ?>">

                                </div>
<br>


                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    <label>CUI del Apoderado: </label>
                                    <strong class="inp" style="text-align: left !important">
                                        <?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                        echo $usuario_dni_apoderado; ?>
                                    </strong>



                                    <input type="hidden" id="usuario_dni_apoderado" required name="usuario_dni_apoderado" value="<?php $usuario_dni_apoderado = $_REQUEST['usuario_dni_apoderado'];
                                                                                                                                    echo $usuario_dni_apoderado; ?>">
                                </div>
                            </div>




                            <div class="row">
                                <div class="inline-block right-margin">



                                    <label>Apoderado: </label>
                                    <strong class="inp" style="text-align: center !important">

                                        <?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                        echo $usuario_nombre_apoderado; ?>

                                    </strong>



                                    <input type="hidden" id="usuario_nombre_apoderado" required name="usuario_nombre_apoderado" value="<?php $usuario_nombre_apoderado = $_REQUEST['usuario_nombre_apoderado'];
                                                                                                                                        echo $usuario_nombre_apoderado; ?>"><br>




                                </div>

                            </div>

                            <label style="padding: 8px;"></label>


                            <div class="row">
                                <div class="inline-block right-margin">

                                    <label>Tipo de Documento</label><br>

                                    <select style="width: 220px" required name="tipo_documento" id="tipo_documento">


                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedDNI = ($data['tipo_documento'] == 'CUI') ? 'selected' : '';
                                        

                                        ?>
                                        <option value="">SELECCIONE UN DOCUMENTO DE IDENTIDAD</option>
                                        <option value="CUI" <?php echo $selectedDNI ?>>CUI</option>
                                        






                                    </select>
                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">


                                    <label>Numero de Documento</label><br>
                                    <input type="text" class="input-text" required name="dni" id="dni" minlength="8" maxlength="8" value="<?php echo $data['dni'] ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>

                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">

                                    <label>Correo</label><br>

                                    <input type="text" class="input-text" required name="correo" value="<?php echo $data['correo'] ?>">
                                </div>






                            </div>



                            <div class="row">
                                <div class="inline-block right-margin">

                                    <label>Alumno</label><br>
                                    <input type="text" class="input-text" required name="alumno" value="<?php echo $data['alumno'] ?>">

                                </div>

                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">



                                    <label>Fecha de Nacimiento</label><br>
                                    <input type="date" style="width: 220px" class="input-text" required name="fecha_nacimiento" placeholder="dd/mm/yyyy" value="<?php echo $data['fecha_nacimiento'] ?>">

                                </div>

                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">




                                    <label>Usuario</label><br>
                                    <input type="text" class="input-text" required name="usuario_alumno_nuevo" value="<?php echo $data['usuario'] ?>"><br>
                                    <input type="hidden" class="input-text" name="usuario_alumno" value="<?php echo $data['usuario'] ?>"><br>
                                </div>






                            </div>


                            <div class="row">




                                <div class="inline-block right-margin">
                                    <label>Sexo</label><br>

                                    <select style="width: 220px" required name="sexo">

                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedMASCULINO = ($data['sexo'] == 'Masculino') ? 'selected' : '';
                                        $selectedFEMENINO = ($data['sexo'] == 'Femenino') ? 'selected' : '';

                                        ?>
                                        <option value="">SELECCIONAR...</option>

                                        <option value="Masculino" <?php echo $selectedMASCULINO ?>>Masculino</option>
                                        <option value="Femenino" <?php echo $selectedFEMENINO ?>>Femenino</option>




                                    </select>


                                </div>


                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">

                                    <label>Nivel</label><br>

                                    <select style="width: 220px;" id="nivelese" required name="niveles">

                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedPRIMARIA = ($data['nivel'] == 'Primaria') ? 'selected' : '';

                                        ?>
                                        <option value="">SELECCIONAR...</option>

                                        <option value="Primaria" <?php echo $selectedPRIMARIA ?>>Primaria</option>





                                    </select>





                                </div>
                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">



                                    <label>Grado</label><br>

                                    <select style="width: 220px;" id="grados" required name="grados">


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








                                    <input type="hidden" required name="codalu" value="<?php echo $data['codalu'] ?>">


                                </div>










                            </div>




                            <div class="row">

                                <div class="inline-block right-margin">


                                    <label>Password</label><br>

                                    <input class="input-text" type="text" required name="password" value="<?php echo $data['password'] ?>">




                                </div>

                                <label style="padding: 10px;"></label>
<div class="inline-block right-margin">
    <label>Tienes Discapacidad</label><br>
    <select id="discapacidadSelect" style="width: 220px;" required name="discapacidad">
        <?php
        // Verificar si este es el elemento seleccionado
        $selectedSI = ($data['discapacidad'] == 'SI') ? 'selected' : '';
        $selectedNO = ($data['discapacidad'] == 'NO') ? 'selected' : '';
        ?>
        <option value="">SELECCIONAR...</option>
        <option value="SI" <?php echo $selectedSI ?>>SI</option>
        <option value="NO" <?php echo $selectedNO ?>>NO</option>
    </select>
</div>

<label style="padding: 10px;"></label>
<div class="inline-block right-margin" id="tipoDiscapacidadContainer" style="display: <?php echo ($data['discapacidad'] == 'SI') ? 'block' : 'none'; ?>">
    <label>Tipo de Discapacidad</label><br>
    <input type="text" class="input-text" required name="tipo_discapacidad" value="<?php echo $data['tipo_discapacidad'] ?>">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var select = document.getElementById('discapacidadSelect');
        var tipoDiscapacidadContainer = document.getElementById('tipoDiscapacidadContainer');

        // Función para mostrar u ocultar el campo "Tipo de Discapacidad"
        function toggleTipoDiscapacidad() {
            if (select.value === 'SI') {
                tipoDiscapacidadContainer.style.display = 'block';
            } else {
                tipoDiscapacidadContainer.style.display = 'none';
            }
        }

        // Llamar a la función inicialmente
        toggleTipoDiscapacidad();

        // Agregar el evento para escuchar cambios en el select
        select.addEventListener('change', toggleTipoDiscapacidad);
    });
</script>






                            </div>




                            <br>


                            <div class="row">




                                <div class="inline-block right-margin">

                                    <label>Estado</label><br>

                                    <select style="width: 220px;" required name="estado">

                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedACEPTADO = ($data['estado'] == 'aceptado') ? 'selected' : '';
                                        $selectedENPROCESO = ($data['estado'] == 'en proceso') ? 'selected' : '';
                                        $selectedRECHAZADO = ($data['estado'] == 'rechazado') ? 'selected' : '';

                                        ?>
                                        <option value="">SELECCIONAR...</option>

                                        <option value="aceptado" <?php echo $selectedACEPTADO ?>>aceptado</option>
                                        <option value="en proceso" <?php echo $selectedENPROCESO ?>>en proceso</option>
                                        <option value="rechazado" <?php echo $selectedRECHAZADO ?>>rechazado</option>




                                    </select>




                                </div>



                                <label style="padding: 10px;"></label>
                                <div class="inline-block right-margin">
                                    <label>Estado del Alumno</label><br>

                                    <select required name="estado_alumno" id="estado_alumno">


                                        <?php
                                        // Verificar si este es el elemento seleccionado
                                        $selectedANTIGUO = ($data['estado_alumno'] == 'Antiguo') ? 'selected' : '';
                                        $selectedNUEVO = ($data['estado_alumno'] == 'Nuevo') ? 'selected' : '';


                                        ?>
                                        <option value="">SELECCIONAR...</option>

                                        <option value="Antiguo" <?php echo $selectedANTIGUO ?>>Antiguo</option>
                                        <option value="Nuevo" <?php echo $selectedNUEVO ?>>Nuevo</option>

                                    </select><br>








                                </div>





                            </div>

                            <br>





                            <div class="row">


                                <?php

                                $estado_alumno = $data['estado_alumno'];




                                $estado_foto = $data['estado_foto'];

                                $estado_libreta = $data['estado_libreta'];



                                ?>


                               <?php if($estado_alumno == "Antiguo"){ ?>
                                    <?php if($estado_foto == "SUBIDO" && $estado_libreta == "SUBIDO"){ ?>

                                     
                                        
                                        
                                        
                                        
                                        
                                          <label style="padding: 2px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto del Documento de Identidad: </label><br>


                                            <a href="../administrador/mostrar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario =$_SESSION['admin']['usuario'];
                                                                                                                                            echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_foto_iden_alumnoed.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                                echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                        
                                        
                                        
                                        
                                          <label style="padding: 20px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto de la Libreta del Alumno: </label><br>


                                            <a href="../administrador/mostrar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_libreta.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                    echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                       




                                <?php
     
                                     }elseif($estado_foto == "SIN SUBIR" && $estado_libreta == "SIN SUBIR") {
                                         
                                         
                                         ?>
                                         
                                           <div class="inline-block right-margin">

                                            <label>Foto de documento de identidad</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_do_identidad" id="foto_do_identidad">

                                        </div>
                                        
                                        
                                        <div class="inline-block right-margin">

                                            <label>Foto de la libreta</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_libreta" id="foto_libreta">

                                        </div>
                                         
                                         
                                         
                                         <?php
                                        
                                        
                                        }elseif($estado_foto == "SUBIDO" && $estado_libreta == "SIN SUBIR"){
                                            
                                            ?>
                                            
                                             <label style="padding: 2px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto del Documento de Identidad: </label><br>


                                            <a href="../administrador/mostrar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                            echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_foto_iden_alumnoed.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                                echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                        
                                        
                                        
                                        <label style="padding: 2px;"></label>
                                            <div class="inline-block right-margin">

                                            <label>Foto de la libreta</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_libreta" id="foto_libreta">

                                        </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            <?php
                                            
                                            
                                            
                                            
                                        }elseif($estado_foto == "SIN SUBIR" && $estado_libreta == "SUBIDO"){
                                            
                                            
                                            ?>
                                            <div class="inline-block right-margin">

                                            <label>Foto de documento de identidad</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_do_identidad" id="foto_do_identidad">

                                        </div>
                                        
                                        
                                        
                                         <label style="padding: 20px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto de la Libreta del Alumno: </label><br>


                                            <a href="../administrador/mostrar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_libreta.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                    echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <?php
    
    
}



?>

<?php
}elseif($estado_alumno == "Nuevo"){
    ?>
    
     <?php if($estado_foto == "SUBIDO" && $estado_libreta == "SUBIDO"){
      ?>
      
                                        
                                          <label style="padding: 2px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto del Documento de Identidad: </label><br>


                                            <a href="../administrador/mostrar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                            echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_foto_iden_alumnoed.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                                echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                        
                                        
                                        
                                        
                                          <label style="padding: 20px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto de la Libreta del Alumno: </label><br>


                                            <a href="../administrador/mostrar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_libreta.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                    echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                        
      
      
      <?php
         
         
     }elseif($estado_foto == "SIN SUBIR" && $estado_libreta == "SIN SUBIR"){
         ?>
         
         
          <div class="inline-block right-margin">

                                            <label>Foto de documento de identidad</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_do_identidad" id="foto_do_identidad">

                                        </div>
                                        
                                        
                                        <div class="inline-block right-margin">

                                            <label>Foto de documento de identidad</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_libreta" id="foto_libreta">

                                        </div>
         
         
         
         
         <?php
         
         
     }elseif($estado_foto == "SUBIDO" && $estado_libreta == "SIN SUBIR"){
         ?>
         
            <label style="padding: 2px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto del Documento de Identidad: </label><br>


                                            <a href="../administrador/mostrar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                            echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_foto_iden_alumnoed.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_foto_iden_alumno.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                                echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                        
                                        
                                        
                                        <label style="padding: 2px;"></label>
                                            <div class="inline-block right-margin">

                                            <label>Foto de documento de identidad</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_libreta" id="foto_libreta">

                                        </div>
                                            
         
         
         
         <?php
     }elseif($estado_foto == "SIN SUBIR" && $estado_libreta == "SUBIDO"){
         ?>
         
         
         <div class="inline-block right-margin">

                                            <label>Foto de documento de identidad</label><br>
                                            <label>Tamaño recomendable 50M en formato: pdf</label><br>
                                            <input type="file" class="input-text" required name="foto_do_identidad" id="foto_do_identidad">

                                        </div>
                                        
                                        
                                        
                                         <label style="padding: 20px;"></label>
                                        <div class="inline-block right-margin">
                                            <label>Foto de la Libreta del Alumno: </label><br>


                                            <a href="../administrador/mostrar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                echo $usuario; ?>&usuario_alumno=<?php echo $data['usuario'] ?>" target="_blank">
                                                <img src="../administrador/images/archivo_pdf.png" style="width:80px; border-radius:50%;" alt="PDF">

                                            </a>

                                            <p><a href="../administrador/descargar_libreta.php?usuario_alumno=<?php echo $data['usuario'] ?>&alumno=<?php echo $data['alumno'] ?>&nivel=<?php echo $data['nivel'] ?>&grado=<?php echo $data['grado'] ?>" target="_blank">Descargar Archivo</a></p>


                                            <p><a href="../administrador/eliminar_libreta.php?id=<?php echo $data['id']; ?>&usuario=<?php $usuario = $_SESSION['admin']['usuario'];
                                                                                                                                    echo $usuario; ?>&usuario_apoderado=<?php echo $data['usuario_apoderado'] ?>&usuario_alumno=<?php echo $data['usuario'] ?>&usuario_dni_apoderado=<?php echo $data['usuario_dni_apoderado'] ?>&usuario_nombre_apoderado=<?php echo $data['usuario_nombre_apoderado'] ?>">Eliminar Archivo</a></p>
                                        </div>
                                            
                                            
                                            
                                            
         
         
         
         
         
         
         <?php
         
         
         
     }
     
     
     ?>
     
     
     
     
     
     
     
     
    
    <?php
    
    
}
?>

                            </div>


















                        </div>











                        <br>


                        <div class="modal-footer">
                            <button style="border-radius: 10px;" type="submit" class="btn btn-primary">Guardar</button>

                            <button style="border-radius: 10px;" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <!--<button type="submit" class="btn btn-primary">Guardar Cambios</button>-->
                        </div>


                    </form>


                </div>


            </div>



        </div>
    </div>
</div>
<!---fin ventana Update --->