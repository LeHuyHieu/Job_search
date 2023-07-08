<?php
require_once ('../lib/connect.php');

if (isset($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
}
if (isset($_POST['user_email'])) {
    $user_email = $_POST['user_email'];
}
if (isset($_POST['user_content'])) {
    $user_content = $_POST['user_content'];
} 
if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_content'])) {
    $sql = "INSERT INTO contact (user_name, user_email, user_content, created_at, updated_at) VALUES ('$user_name', '$user_email', '$user_content', NOW(), NOW())";
}
if ($conn->query($sql) === TRUE) {
    header('location:contact.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
