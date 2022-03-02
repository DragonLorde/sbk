<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
try {
	$mail = new PHPMailer(true);
	$mail->setLanguage('ru', 'vendor/phpmailer/phpmailer/language/');  
	$mail->SMTPDebug = 1;
	$mail->isSMTP();
	$mail->SMTPSecure = 'ssl';                          // secure transfer enabled REQUIRED for Gmail
    //$mail->Port = 465;                                  // TCP port to connect to
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
   
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->Username = 's4pfiron@gmail.com';               // SMTP username
    $mail->Password = '270027pp';                         // SMTP password
    $mail->SMTPAuth = true;

    //Recipients
    $mail->setFrom('smilegoldsgames@gmail.com', 'USERNAME');
    $mail->addAddress('smilegoldsgames@gmail.com');              // Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test mail to user';
    $mail->Body    = 'This is the very simple HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
   
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>

