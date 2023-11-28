<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta según tu estructura de archivos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'code.assurance.QA@gmail.com'; // Tu dirección de correo de Gmail
        $mail->Password = 'bfvh ajkd xedf tvvg'; // La contraseña de tu cuenta de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatario del correo electrónico
        $mail->setFrom($email, $name);
        $mail->addAddress('code.assurance.QA@gmail.com'); // Reemplaza con la dirección a la que deseas enviar el correo
        $mail->Subject = $subject;
        $mail->Body = "<strong>Mensaje de:</strong> $name ($email)<br><br>$message";
        $mail->isHTML(true);

        // Enviar correo
        $mail->send();
        echo '¡El mensaje se ha enviado con éxito!';
    } catch (Exception $e) {
        echo "Hubo un problema al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso denegado.";
}
?>
