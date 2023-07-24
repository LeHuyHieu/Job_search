<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

require_once('../lib/connect.php');
if (isset($_POST['apply_job']) && $_POST['full_name_apply'] != '' && $_POST['address_apply'] != '' && $_POST['file_cv'] != '' && $_POST['messge_apply'] != '') {
    $full_name_apply = $_POST['full_name_apply'];
    $address_apply = $_POST['address_apply'];
    $file_cv = $_POST['file_cv'];
    $messge_apply = $_POST['messge_apply'];

    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lehuyhieupro06182@gmail.com';                     //SMTP username
        $mail->Password   = 'xbpoduxkliejakfm';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lehuyhieupro06182@gmail.com', 'LE HUY HIEU'); // email nguoi gui
        $mail->addAddress($user_email, 'Le Huy Hieu');     //email nguoi nhan

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Mat khau cua ban la: ';
        $mail->Body    = $user_password;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        // print_r($pass);die;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // end send mail

} else {
    header('location:../index.php?err=1');
}
