<?php
session_start();
if (isset($_SESSION['user'])) {
    header('loaction:index.php');
}
require_once('./lib/connect.php');

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $admin = 0;
    $sql = "SELECT user_email, user_password, admin_login from users where user_email='$user_email' and user_password='$user_password'";
    $users = getData($sql);
    $user = current($users);

    if ($user_email = $user['user_email'] && $user_password = md5($user['user_password']) && $admin = $user['admin_login']) {
        $_SESSION['user_email'] = $user_email;
        header('location:admin/job_index.php');
        exit();
    } else {
        echo "<span class=\"error\">Tài khoản mật khẩu sai!!</span>";
    }
}

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $sql = "SELECT * from users where user_email='$user_email' and user_password='$user_password'";
    $users = getData($sql);
    // $pass_sql = $users[0]['user_password'];
    // $email_sql = $users[0]['user_email'];
    // $is_update = $users[0]['is_update'];
    if (count($users)) {
        // $current_user = $users[0];
        $current_user = current($users);
        unset($current_user['user_password']);
        $_SESSION['user'] = $current_user;
        header('location:/pages/profile.php');
        exit;
    }
    header('location:index.php?login_fail=1');
    exit;
}
