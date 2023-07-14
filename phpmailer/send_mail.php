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

require_once ('../lib/connect.php');
if(isset($_POST['register']) && $_POST['user_email'] != '' && $_POST['user_name'] != '' && $_POST['candidate_employer'] != '') {
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $candidate = 0;
    $employer = 0;
    $is_update = 0;
    if($_POST['candidate_employer'] == 1) {
        $candidate = 1;
    }
    if($_POST['candidate_employer'] == 2){
        $employer = 1;
    }
    print_r($user_email);
    print_r($user_name);
    print_r($candidate);
    print_r($employer);

    $sql = "SELECT * FROM users where user_email = '$user_email'";
    $register = mysqli_query($conn, $sql);
    if(mysqli_num_rows($register) > 0) {
        header('location:../index.php?tontai=1');
        exit;
    }else {
        $user_password = rand(99999, 999999999);
        $pass = md5($user_password);
        
        // send mail
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

        $sql = "INSERT INTO users (name, user_email, user_password, candidate, employer,is_update , created_at, updated_at) values ('$user_name', '$user_email', '$pass', '$candidate', '$employer', '$is_update', NOW(), NOW())";
        mysqli_query($conn, $sql);

        header('location:../index.php?thanhcong=1');
    }
    // print_r($login_register);die;
}else {
    header('location:index.php?err=1');
}


