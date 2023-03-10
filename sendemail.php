<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php'
require 'PHPMailer/src/PHPMailer,php'
require 'PHPMailer/src/SMTP.php'

$mail = new PHPMailer(true):

try
{
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $phpmailer->Username = 'bc7e5e699c184c';
    $phpmailer->Password = '3a8b17d95a14a6';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;


    $mail->setFrom('nicolas02m@gmail.com')
    $mail->addAddress('nicolap02m@gmail.com')

    $mail->isHTML(true)
    $mail->Subjet = 'contacto desde formulario';
    $mail->Body   = 'Este es el contenido del mensajeb';
    $mail->altBody= 'este es el contenido del mensaje'


    //envia el mensaje
    $mail->send();
    echos('El mensaje ha sido envidao');
}catch(Exception $e) {
    echo 'El mensaje no se ha podido enviar, error: ',$mail->ErrorInfo;
}

?>