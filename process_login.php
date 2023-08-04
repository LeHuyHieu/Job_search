<?php
session_start();
if (isset($_SESSION['user'])) {
    header('loaction:index.php');
}
require_once('./lib/connect.php');

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $sql = "SELECT * from users where user_email='$user_email' and user_password='$user_password'";
    $users = getData($sql);
    if (count($users)) {
        $current_user = current($users);
        unset($current_user['user_password']);
        $_SESSION['user'] = $current_user;
        header('location:/pages/profile.php');
        exit;
    }
    header('location:index.php?login_fail=1');
    exit;
}
