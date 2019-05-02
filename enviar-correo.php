<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$body = 'Nombre: '.$nombre.'<br>Correo: '.$correo.'<br>Teléfono: '.$telefono.'<br>Mensaje: '.$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // 2: Enable verbose debug output, 0: no muestra bugs
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'diagvan7@gmail.com';                     // SMTP username. Correo de acceso
    $mail->Password   = 'GMirvdl7';                               // SMTP password. Contraseña del correo de acceso
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('diagvan7@gmail.com', $nombre);         //Tu mismo correo de acceso. Desde donde se envía correo
    $mail->addAddress('diagvan7@gmail.com'/*, 'ADiana'*/);     // Add a recipient. Correo a quién se le va a enviar
    /*
    $mail->addAddress('ellen@example.com');               // Name is optional. Correo a quién se le va a enviar, opcional
    $mail->addReplyTo('info@example.com', 'Information');  //Responder
    $mail->addCC('cc@example.com');                        //Con copia  
    $mail->addBCC('bcc@example.com');

    // Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments. Enviar archivo
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name. Enviar imagen
	*/

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML. Permite uso de HTML en el texto
    $mail->Subject = 'Asunto más importante';             //Asunto
    $mail->Body    = $body; //Cuerpo
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; //Cuerpo alternativo
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo "<script>
    alert('El mensaje se envió correctamente');
    window.history.go(-1); //para ir a la página anterior
    </script>";
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}


?>