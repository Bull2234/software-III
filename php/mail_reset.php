<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

require_once('conexion.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Validar el campo 'email'
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'El correo electrónico no es válido';
        exit;
    }

    $query = "SELECT * FROM registro where email = '$email'";
    $result = $conexion->query($query);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'recuperarcontrasenabancoalimentos@outlook.es';
            $mail->Password   = 'mangell10';
            $mail->Port       = 587;

            $mail->setFrom('recuperarcontrasenabancoalimentos@outlook.es', 'Banco de alimentos [recuperación contraseña]');
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->addAddress('lenkev01@gmail.com', 'mikosexual');
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; // Establecer codificación de caracteres
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body    = 'Hola , este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="localhost/ProyectoSoftware(eva01)/public/html/cambiar_contrasena.php?id='.$row['num_ide'].'">Recuperación de contraseña</a>';

            $mail->send();
            header("Location: ../html/olvide_contrasena.html");
        } catch (Exception $e) {
            header("Location: ../html/olvide_contrasena.php?message=error");
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No se encontró ninguna cuenta con ese correo electrónico';
    }
} else {
    header("Location: ../html/olvide_contrasena.php?message=not_found");
    echo 'El campo de correo electrónico no fue enviado';
}
?>