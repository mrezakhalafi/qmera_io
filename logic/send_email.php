<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//To send email
function send_email($email_address, $full_name, $subject, $body)
{
    try {

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();                                //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';           //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                       //Enable SMTP authentication
        // $mail->Username   = 'support@qmera.io';         //SMTP username
        // $mail->Password   = '
        ';       //SMTP password
        $mail->Username   = 'support@palio.io';         //SMTP username
        $mail->Password   = '12345easySoft67890';       //SMTP password
        $mail->SMTPSecure = 'tls';                      //Enable implicit TLS encryption
        $mail->Port       = 587;                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        // $mail->setFrom('support@qmera.io', 'Qmera');
        // $mail->addAddress($email_address, $full_name);     //Add a recipient
        // $mail->addReplyTo('support@qmera.io', $subject);
        $mail->setFrom('support@palio.io', 'Qmera');
        $mail->addAddress($email_address, $full_name);     //Add a recipient
        $mail->addReplyTo('support@palio.io', $subject);

        if ($subject == "Palio Email Confirmation") {
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image002.png', 'image002', 'images002.png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image004.png', 'image004', 'images004.png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image006.png', 'image006', 'images006.png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image008.png', 'image008', 'images008.png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image010.png', 'image010', 'images010.png');
            $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image012.png', 'image012', 'images012.png');
        }

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true); //Set email format to HTML
        // $mail->Subject = 'Palio Email Confirmation';
        // $mail->Body    = $_SERVER['DOCUMENT_ROOT'] . "verified.php?h=" . $secret;

        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return 'Message has been sent';

    } catch (Exception $e) {

        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

    }
}
