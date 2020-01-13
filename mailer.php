<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/autoload.php';

function sendMail($to, $subject, $body) {
    $mail = new PHPMailer();

    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.zoho.in';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'admin@foodshala.com';
        $mail->Password   = 'Admin@2510';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('admin@foodshala.com', 'Foodshala');
        $mail->addAddress($to);

        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>