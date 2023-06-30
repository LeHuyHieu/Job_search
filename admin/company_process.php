<?php 
require_once ('../lib/connect.php');

$company_name = $_POST['company_name'];
$company_web = $_POST['company_web'];
$company_email = $_POST['company_email'];
$company_phone = $_POST['company_phone'];
$company_fb = $_POST['company_fb'];
$company_tw = $_POST['company_tw'];
$company_description = $_POST['company_description'];
$company_content = $_POST['company_content'];
$target_dir = "/images/";

if(isset($_FILES['images']["tmp_name"]) && $_FILES['images']["tmp_name"]) {
    $images = $target_dir . basename($_FILES['images']["name"]);
    move_uploaded_file($_FILES["images"]["tmp_name"], '..' . $images);
}else {
    $images = '';
}

if($_POST['id_company']) {
    $id_company = $_POST['id_company'];
    if(strlen($images)) {
        $sql = "UPDATE company set name = '$company_name', contact_web = '$company_web', contact_email = '$company_email', contact_phone = '$company_phone', contact_fb = '$company_fb', contact_tw = '$company_tw', `description` = '$company_description', `content` = '$company_content', images = '$images' WHERE id = '$id_company'";
    }else {
        $sql = "UPDATE company set name = '$company_name', contact_web = '$company_web', contact_email = '$company_email', contact_phone = '$company_phone', contact_fb = '$company_fb', contact_tw = '$company_tw', `description` = '$company_description', `content` = '$company_content' WHERE id = '$id_company'";
    }
} else {
    $sql = "INSERT INTO company (name, contact_web, contact_email, contact_phone, contact_fb, contact_tw, images, description, content, created_at, updated_at) VALUES ('$company_name', '$company_web', '$company_email', '$company_phone', '$company_fb', '$company_tw', '$images', '$company_description', '$company_content', NOW(), NOW())";
}

if ($conn->query($sql) === TRUE) {
    header('location:company_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
