<?php 
require_once ('./lib/connect.php');

session_start();

if(isset($_SESSION['user_email'])) {
    header('loaction:index.php');
}

if(isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $admin = 1;
    $sql = "SELECT user_email, user_password, admin_login from login_register where user_email='$user_email' and user_password='$user_password' and admin_login='$admin'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0 && $admin == 1) {
        $_SESSION['user_email'] = $user_email;
        header('location:admin/job_index.php');
    }else {
        echo "<span class=\"error\">Tài khoản mật khẩu sai!!</span>";
    }
}

if(isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $candidate = 1;
    $employer = 1;
    $sql = "SELECT user_email, user_password, employer, candidate from login_register where user_email='$user_email' and user_password='$user_password' and employer = '$employer' or candidate = '$candidate'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0 && $candidate == 1 || $employer == 1) {
        $_SESSION['user_email'] = $user_email;
        header('location:index.php');
    }else {
        echo "<span class=\"error\">Tài khoản mật khẩu sai!!</span>";
    }
    print_r($sql);
}

?>