<?php
session_start();
require_once('../../lib/connect.php');

if (isset($_POST['login']) && $_POST['login'] == 1) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']);
    $sql = "SELECT * from users where user_email='$user_email' and user_password='$user_password'";
    $users = getData($sql);
    $user = current($users);

    if ($user['admin_login'] == 1 && $user['user_email'] == $user_email && $user['user_password'] == $user_password) {
        unset($user['user_password']);
        $_SESSION['user'] = $user;
        header('location:/admin/job_index.php');
        exit();
    } else {
        header('location:/admin/login/login.php?err=1');
        exit();
    }
}
