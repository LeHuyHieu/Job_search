<?php
session_start();
require_once('../lib/connect.php');
if (isset($_SESSION['user']) && isset($_POST['reset_pass'])) {
    $user_email = $_SESSION['user_email'];
    $sql = "SELECT * FROM users where user_email = '$user_email'";
    $users = getData($sql);
    $pass = $users[0]['user_password'];
    $user_password = md5($_POST['re-password']);
    if ($pass == $user_password) {
        header('location:profile.php?err=1');
        exit;
    }
    // die;
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE users SET user_password = '$user_password' WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            unset($users[0]['user_password']);
            $_SESSION['user'] = $users[0];
            header('location:profile.php?successful_change=1');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            exit;
        }
    }
}

if (isset($_POST['user_id']) && isset($_POST['save'])) {
    $is_update = 1;
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $about_me = $_POST['about_me'];
    $target_dir = "/images/";
    // print_r($phone);
    // print_r($name);
    // print_r($email);
    // print_r($about_me);
    // die;
    if(isset($_FILES['avatar']["tmp_name"]) && $_FILES['avatar']['tmp_name']) {
        $avatar = $target_dir . basename($_FILES['avatar']["name"]);
        move_uploaded_file($_FILES['avatar']["tmp_name"], '..'.$avatar);
    }else {
        $avatar = '';
    }
    // print_r($_FILES['avatar']);

    $user_id = $_POST['user_id'];
    // print_r($user_id);die;
    if(isset($_POST['user_id'])) {
        if(strlen($avatar)) {
            $sql = "UPDATE users SET avatar = '$avatar', phone = '$phone', name = '$name', user_email = '$email', about_me = '$about_me', is_update = '$is_update' where id = '$user_id'";
        } else {
            $sql = "UPDATE users SET phone = '$phone', name = '$name', user_email = '$email', about_me = '$about_me', is_update = '$is_update' where id = '$user_id'";
        }
    }
    // print_r($sql);
    // die;
    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT * FROM users where user_email = '$user_email'";
        $users = getData($sql);
        $_SESSION['user'] = $users[0];
        header('location:profile.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}