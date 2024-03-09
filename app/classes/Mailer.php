<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/Exception.php';

function sendMail($emails) {
$htmlContent = file_get_contents('../../text_message.html');
$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = '';
$mail->Password   = '';
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;


$mail->setFrom('dusannesic28@gmail.com', "GYM Team");
$mail->addReplyTo('dusannesic28@gmail.com', "GYM Team");
$mail->isHTML(true);
$mail->Subject = 'Membership Report';
$mail->Body    = $htmlContent; 


foreach ($emails as $email) {
    $mail->addAddress($email);
}


$mail->send();


}
