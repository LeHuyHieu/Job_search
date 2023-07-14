<?php
require_once('./lib/connect.php');

session_start();

if (isset($_SESSION['user_email'])) {
    header('loaction:index.php');
}

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $admin = 1;
    $sql = "SELECT user_email, user_password, admin_login from users where user_email='$user_email' and user_password='$user_password' and admin_login='$admin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0 && $admin == 1) {
        $_SESSION['user_email'] = $user_email;
        header('location:admin/job_index.php');
    } else {
        echo "<span class=\"error\">Tài khoản mật khẩu sai!!</span>";
    }
}

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $candidate = 1;
    $employer = 1;
    $sql = "SELECT user_email, user_password, employer, candidate, is_update from users where user_email='$user_email' and user_password='$user_password'";
    $result = mysqli_query($conn, $sql);
    $users = getData($sql);
    $pass_sql = $users[0]['user_password'];
    $email_sql = $users[0]['user_email'];
    $is_update = $users[0]['is_update'];
    // print_r($result);die;
    print_r($sql);
    print_r($is_update);
    print_r($pass_sql);
    print_r($email_sql);
    print_r($user_email);
    print_r($user_password);
    // die;
    if (mysqli_num_rows($result) > 0 && $candidate == 1 || $employer == 1) {
        if ($pass_sql == $user_password && $email_sql == $user_email) {
            if ($is_update == 1) {
                $_SESSION['user_email'] = $user_email;
                header('location:index.php');
            } else {
                $_SESSION['user_email'] = $user_email;
                header('location:/pages/profile.php');
            }
        } else {
            header('location:index.php?err=1');
        }
    } else {
        echo "<span class=\"error\">Tài khoản mật khẩu sai!!</span>";
    }
    print_r($sql);
}
