<?php
require_once('../lib/connect.php');

if (strlen($_GET['user_name']) <= 0 || strlen($_GET['user_email']) <= 0 || strlen($_GET['user_content']) <= 0) {
    if (isset($_GET['user_name'])) {
        $user_name = $_GET['user_name'];
    }
    if (isset($_GET['user_email'])) {
        $user_email = $_GET['user_email'];
    }
    if (isset($_GET['user_content'])) {
        $user_content = $_GET['user_content'];
    }
    header('location:contact.php?error=0&user_name='.$_GET['user_name'].'&user_email='.$_GET['user_email'].'&user_content='.$_GET['user_content'].' ');
} else {
    if (isset($_GET['user_name'])) {
        $user_name = $_GET['user_name'];
    }
    if (isset($_GET['user_email'])) {
        $user_email = $_GET['user_email'];
    }
    if (isset($_GET['user_content'])) {
        $user_content = $_GET['user_content'];
    }
    if (isset($_GET['user_name']) && isset($_GET['user_email']) && isset($_GET['user_content'])) {
        $sql = "INSERT INTO contact (user_name, user_email, user_content, created_at, updated_at) VALUES ('$user_name', '$user_email', '$user_content', NOW(), NOW())";
    }
    if ($conn->query($sql) === TRUE) {
        header('location:contact.php?success=1');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
