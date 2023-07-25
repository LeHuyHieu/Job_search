<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once ('../lib/connect.php');
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['apply_job']) && $_POST['full_name_apply'] != '' && $_POST['address_apply'] != '' && $_POST['messge_apply'] != '') {
    $full_name_apply = $_POST['full_name_apply'];
    $address_apply = $_POST['address_apply'];
    $messge_apply = $_POST['messge_apply'];
    $job_id = $_GET['job_id'];
    // Khởi tạo PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lehuyhieupro06182@gmail.com';                     //SMTP username
        $mail->Password   = 'xbpoduxkliejakfm';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;     

        //Recipients
        $sql = "SELECT users.*, jobs.user_id FROM users LEFT JOIN jobs ON jobs.user_id = users.id WHERE jobs.id = '$job_id'";
        $users = getData($sql);
        $user = current($users);
        $mail->setFrom($address_apply, $full_name_apply); // email nguoi gui
        $mail->addAddress($user['user_email'], $user['name']);     //email nguoi nhan
        // Thiết lập tiêu đề email
        $mail->Subject = 'Thong tin ung tuyen tu: ' . $full_name_apply;

        // Thiết lập nội dung email
        $mail->isHTML(true);
        $mail->Body = 'Họ và tên: ' . $full_name_apply . '<br>'
                    . 'Địa chỉ: ' . $address_apply . '<br>'
                    . 'Tin nhắn: ' . $messge_apply;

        // Kiểm tra và xử lý tệp được tải lên
        if (isset($_FILES['file_cv']) && $_FILES['file_cv']['error'] === UPLOAD_ERR_OK) {
            $file_tmp = $_FILES['file_cv']['tmp_name'];
            $file_name = $_FILES['file_cv']['name'];

            // Đính kèm file vào email
            $mail->addAttachment($file_tmp, $file_name);
        }

        // Gửi email
        $mail->send();
        echo 'Email đã được gửi thành công.';
        header('location: ../pages/page_detail?thanhcong=1');
    } catch (Exception $e) {
        echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        header('location: ../pages/page_detail?thatbai=1');
    }
} else {
    header('location: ../pages/page_detail?err=1');
}
