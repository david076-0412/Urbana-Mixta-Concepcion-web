
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $otpvalue = 0;
    session_start();

    if (!empty($email)) {
        // Generar OTP
        $otpvalue = rand(100000, 999999);  // OTP de 6 dígitos

        // Incluir la conexión a la base de datos
        include("conexion.php");
        $query_clave = "SELECT u.clave FROM usuario u WHERE u.correo='$email'";
        $resultado_clave = $conn->query($query_clave);
        $fila_clave = $resultado_clave->fetch_assoc();
        $usuario_clave = $fila_clave['clave'];

        // Crear el mensaje del correo
        $subject = 'Recuperación de contraseña';
        $message = "Hola,\n\nTu OTP es: " . $otpvalue . "\nEmail: " . $email . "\nClave: " . $usuario_clave . "\n\nSaludos.";
       // Configurar encabezados
        $headers = 'From: ' . $email . "\r\n" . 
                   'Reply-To: ' . $email . "\r\n" . 
                   'X-Mailer: PHP/' . phpversion();

        // Enviar el correo
        if (mail($email, $subject, $message, $headers)) {
            echo 'Mensaje enviado con éxito';
        } else {
            echo 'Error al enviar el mensaje';
        }

        // Guardar datos en sesión
        $_SESSION['message'] = 'La OTP se ha enviado a su correo';
        $_SESSION['otp'] = $otpvalue;
        $_SESSION['email'] = $email;

        // Redirigir al siguiente paso
        $dispatcher = '../EnterOtpAdmin.php?email='.$email;
        header("Location: $dispatcher");
        exit;
    }
}
?>
