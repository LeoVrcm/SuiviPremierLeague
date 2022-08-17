<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($userMail, $username, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        
        //Server settings
        $mail->SMTPDebug = 1;                                 //Enable verbose debug output
        $mail->isSMTP();                                      //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth = true;                               //Enable SMTP authentication
        $mail->Username = 'leovrcm@gmail.com';                //SMTP username
        $mail->Password = 'E29e086e_';                        //SMTP password
        $mail->SMTPSecure = 'ssl';                            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('DoNotAnswer@SuiviPremierLeague.com', 'Admin Suivi PL');
        
        $mail->addAddress($userMail, $username);              //Add a recipient

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo 'Message has been sent';
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>
