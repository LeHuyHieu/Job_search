<?php
require_once("../lib/connect.php");
$job_category_id = $_POST['job_category_id'];
$title = $_POST['title'];
$salary_from = $_POST['salary_from'];
$salary_to = $_POST['salary_to'];
$expiration_date = $_POST['expiration_date'];
$description = addslashes($_POST['description']);
$content = addslashes($_POST['content']);
$target_dir = "/images/";
$full_time = 0;
$internship = 0;
$temporary = 0;
$freelance = 0;
$part_time = 0;
$is_public = 0;
if (isset($_POST['full_time']) && $_POST['full_time'] == 1) {
    $full_time = 1;
}
if (isset($_POST['internship']) && $_POST['internship'] == 1) {
    $internship = 1;
}
if (isset($_POST['temporary']) && $_POST['temporary'] == 1) {
    $temporary = 1;
}
if (isset($_POST['freelance']) && $_POST['freelance'] == 1) {
    $freelance = 1;
}
if (isset($_POST['part_time']) && $_POST['part_time'] == 1) {
    $part_time = 1;
}
if (isset($_POST['is_public']) && $_POST['is_public'] == 1) {
    $is_public = 1;
}


if(isset($_FILES['images']["tmp_name"]) && $_FILES['images']["tmp_name"]) {
    $images = $target_dir . basename($_FILES['images']["name"]);
    move_uploaded_file($_FILES["images"]["tmp_name"], '..'.$images);
}else {
    $images = '';
}
// print_r($_POST);
// print_r($_FILES);
// die;
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    if (strlen($images)) {
        $sql = "UPDATE jobs set title = '$title', salary_to = '$salary_to',salary_from = '$salary_from', expiration_date = '$expiration_date', description = '$description', content = '$content', images = '$images', full_time = '$full_time', internship = '$internship', temporary = '$temporary', freelance = '$freelance', part_time = '$part_time', is_public = '$is_public', category_id = '$job_category_id' where id = $id";
    } else {
        $sql = "UPDATE jobs set title = '$title', salary_to = '$salary_to',salary_from = '$salary_from', expiration_date = '$expiration_date', description = '$description', content = '$content', full_time = '$full_time', internship = '$internship', temporary = '$temporary', freelance = '$freelance', part_time = '$part_time', is_public = '$is_public', category_id = '$job_category_id' where id = $id";
    }
    // echo $sql;die;
}else {
    $sql = "INSERT into jobs (title, salary_to, salary_from, expiration_date, description, content, images, full_time, internship, temporary, freelance, part_time, is_public, category_id, created_at, updated_at) values ('$title', '$salary_to', '$salary_from', '$expiration_date', '$description', '$content',  '$images','$full_time','$internship', '$temporary','$freelance', '$part_time', '$is_public', '$job_category_id', NOW(), NOW())";
}
// print_r($_POST['job_category_id']);die;

if ($conn->query($sql) === TRUE) {
    header('location:job_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

