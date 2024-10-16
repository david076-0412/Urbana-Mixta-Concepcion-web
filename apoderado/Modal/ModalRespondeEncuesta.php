

<div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" id="closePopupBtn">&times;</span>
            
            
            
            
             <?php 
                
                include('../conexion.php');
                $usuario = $_SESSION['apoderado']['usuario'];

                // Consultar la cantidad de descuentos y alumnos ordinarios
                $ql = $conn->prepare("SELECT Pregunta_1, Pregunta_2, Pregunta_3, Pregunta_4, Pregunta_5, Pregunta_6, Pregunta_7, Pregunta_8, Pregunta_9, Pregunta_10, estado_encuesta FROM encuestas WHERE usuario = ?");
                $ql->bind_param("s", $usuario);
                $ql->execute();
                $result = $ql->get_result();
                $rowq = $result->fetch_assoc();
                
                
                $Pregunta_1 = $rowq['Pregunta_1'];
                
                $Pregunta_2 = $rowq['Pregunta_2'];
                
                $Pregunta_3 = $rowq['Pregunta_3'];
                
                $Pregunta_4 = $rowq['Pregunta_4'];
                
                $Pregunta_5 = $rowq['Pregunta_5'];
                
                $Pregunta_6 = $rowq['Pregunta_6'];
                
                $Pregunta_7 = $rowq['Pregunta_7'];
                
                $Pregunta_8 = $rowq['Pregunta_8'];
                
                $Pregunta_9 = $rowq['Pregunta_9'];
                
                $Pregunta_10 = $rowq['Pregunta_10'];
                
                
                
                $estado_encuesta = $rowq['estado_encuesta'];
                
             
        
        ?>
        
        
        <?php if($estado_encuesta ==  "Ya encuestado"){
            ?>
            <h2>Respuestas del Cuestionario de Satisfacción</h2>
            <p>1. ¿Qué tan conforme se siente con la simplicidad del proceso de matrícula tras la implementación del sistema inteligente?</p>
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_1; ?>
                </label>
                
            </div>
            
            
            <p>2. ¿Cómo evaluaría su nivel de agrado con la rapidez del proceso de matrícula utilizando el sistema inteligente?</p>
            
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_2; ?>
                </label>
                
            </div>
            
            
            
            
            <p>3. ¿Qué tan satisfecho/a está con la claridad de la información proporcionada por el sistema durante la matrícula?</p>
            
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_3; ?>
                </label>
                
            </div>
            
            
            <p>4. ¿Qué tan complacido/a está con la accesibilidad del sistema inteligente para realizar la matrícula?</p>
            
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_4; ?>
                </label>
                
            </div>
            
            
            <p>5. ¿Qué tan bien atendido/a se sintió con el soporte técnico recibido durante el uso del sistema inteligente?</p>
            
            
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_5; ?>
                </label>
                
            </div>
            
            <p>6. ¿Qué tan conforme se siente con la precisión y exactitud de los datos ingresados y procesados por el sistema inteligente durante la matrícula?</p>
            
            
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_6; ?>
                </label>
                
            </div>
            
            
            <p>7. ¿Qué tan seguro/a se siente respecto a la confidencialidad de su información personal en el sistema inteligente?</p>
            
            
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_7; ?>
                </label>
                
            </div>
            
             <p>8. ¿Qué tan satisfecho/a está con la disminución de errores en el proceso de matrícula gracias al sistema inteligente?</p>
             
             
             <div class="radio-group">
                <label>
                    <?php echo $Pregunta_8; ?>
                </label>
                
            </div>
            
            <p>9. ¿Qué tan cómodo/a se sintió al navegar y usar el sistema inteligente durante la matrícula?</p>
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_9; ?>
                </label>
                
            </div>
            
            
             <p>10. ¿Qué tan satisfecho/a está con la experiencia general de matrícula tras la implementación del sistema inteligente?</p>
            
            <div class="radio-group">
                <label>
                    <?php echo $Pregunta_10; ?>
                </label>
                
            </div>
            
            
            
            
            
            
            
            <?php
        }else{
            ?>
            <h2>Cuestionario de Satisfacción</h2>
            <p>Por favor, responda las siguientes preguntas según su nivel de satisfacción con el sistema inteligente en el proceso de matrícula.</p>
            <form action="../apoderado/action/responderencuesta.php" method="POST">
                
                
                <input type="hidden" required name="usuario_apoderado" value="<?php $usuario = $_SESSION['apoderado']['usuario'];
                                                                                    echo "$usuario"; ?>">


                <input type="hidden" required name="rol" value="<?php $rol = $_GET['rol'];
                                                                                        echo "$rol"; ?>">
                                                                                        
                                                                                        

<?php
// Establecer la zona horaria a Perú
date_default_timezone_set('America/Lima');

// Obtener la fecha actual
$fecha_actual = date('Y-m-d'); // Formato: YYYY-MM-DD
?>

  
                
                <input type="hidden" required name="fecha" value="<?php echo $fecha_actual; ?>" readonly>
                
                
                
                <?php
// Establecer la zona horaria a Perú
date_default_timezone_set('America/Lima');

// Obtener el mes actual
$mes_actual = date('m'); // Formato: MM
$nombre_mes = '';

// Array para obtener el nombre del mes en español
$meses = [
    '01' => 'Enero',
    '02' => 'Febrero',
    '03' => 'Marzo',
    '04' => 'Abril',
    '05' => 'Mayo',
    '06' => 'Junio',
    '07' => 'Julio',
    '08' => 'Agosto',
    '09' => 'Septiembre',
    '10' => 'Octubre',
    '11' => 'Noviembre',
    '12' => 'Diciembre',
];

// Obtener el nombre del mes correspondiente
if (array_key_exists($mes_actual, $meses)) {
    $nombre_mes = $meses[$mes_actual];
}
?>
                
                
                
                
                
                <input type="hidden" required name="meses" value="<?php echo $nombre_mes; ?>" readonly>
                
                <?php 
                
                include('../conexion.php');
                $usuario = $_SESSION['apoderado']['usuario'];

                // Consultar la cantidad de descuentos y alumnos ordinarios
                $ql = $conn->prepare("SELECT nombres, apellido_paterno, apellido_materno FROM apoderado WHERE usuario = ?");
                $ql->bind_param("s", $usuario);
                $ql->execute();
                $result = $ql->get_result();
                $rowq = $result->fetch_assoc();

                $nombres = $rowq['nombres'];
                $apellido_paterno = $rowq['apellido_paterno'];
                $apellido_materno = $rowq['apellido_materno'];
    
                $apoderado= $nombres." ".$apellido_paterno." ".$apellido_materno;
                
                
                ?>
                
                
                
                <input type="hidden" required name="apoderado" value="<?php echo "$apoderado"; ?>">
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                
                <p>1. ¿Qué tan conforme se siente con la simplicidad del proceso de matrícula tras la implementación del sistema inteligente?</p>
    
                
                
                
                
               <div class="radio-group">
                <label>
                    <input type="radio" name="question1" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question1" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question1" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question1" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question1" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            
            <p>2. ¿Cómo evaluaría su nivel de agrado con la rapidez del proceso de matrícula utilizando el sistema inteligente?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question2" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question2" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question2" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question2" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question2" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            <p>3. ¿Qué tan satisfecho/a está con la claridad de la información proporcionada por el sistema durante la matrícula?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question3" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question3" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question3" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question3" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question3" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            <p>4. ¿Qué tan complacido/a está con la accesibilidad del sistema inteligente para realizar la matrícula?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question4" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question4" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question4" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question4" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question4" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            
            
            
             <p>5. ¿Qué tan bien atendido/a se sintió con el soporte técnico recibido durante el uso del sistema inteligente?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question5" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question5" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question5" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question5" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question5" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            
            
            
            
            <p>6. ¿Qué tan conforme se siente con la precisión y exactitud de los datos ingresados y procesados por el sistema inteligente durante la matrícula?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question6" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question6" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question6" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question6" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question6" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            
            <p>7. ¿Qué tan seguro/a se siente respecto a la confidencialidad de su información personal en el sistema inteligente?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question7" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question7" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question7" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question7" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question7" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            
            <p>8. ¿Qué tan satisfecho/a está con la disminución de errores en el proceso de matrícula gracias al sistema inteligente?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question8" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question8" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question8" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question8" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question8" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            <p>9. ¿Qué tan cómodo/a se sintió al navegar y usar el sistema inteligente durante la matrícula?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question9" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question9" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question9" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question9" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question9" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            <p>10. ¿Qué tan satisfecho/a está con la experiencia general de matrícula tras la implementación del sistema inteligente?</p>
    
                
                
                
                <div class="radio-group">
                <label>
                    <input type="radio" name="question10" value="Nada satisfecho">
                    <span class="radio"></span>
                    Nada satisfecho
                </label>
                <label>
                    <input type="radio" name="question10" value="Un poco satisfecho">
                    <span class="radio"></span>
                    Un poco satisfecho
                </label>
                <label>
                    <input type="radio" name="question10" value="Satisfecho">
                    <span class="radio"></span>
                    Satisfecho
                </label>
                <label>
                    <input type="radio" name="question10" value="Muy satisfecho">
                    <span class="radio"></span>
                    Muy satisfecho
                </label>
                <label>
                    <input type="radio" name="question10" value="Totalmente satisfecho">
                    <span class="radio"></span>
                    Totalmente satisfecho
                </label>
            </div>
            
            
            
            
            
            
            
            
            <br>
            
            
            
            
                <div class="modal-footer">
                    <button type="submit" class="btn">Enviar</button>
                </div>
            </form>
            
            
            <?php
        }
        
        ?>
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>