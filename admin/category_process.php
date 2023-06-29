<?php 
require_once ("../lib/connect.php");
$select_id = $_POST['select_id'];
$name_category = $_POST['name_category'];
// $id = $_POST['id'];
// print_r($_POST['select_id']);
// print_r($_POST['name']);
// print_r($_POST['id']);
// die;
if(isset($_POST['id_category'])) {
    $id_category = $_POST['id_category'];
    $sql = "UPDATE categories SET name = '$name_category', parent_id = '$select_id' WHERE id = $id_category";
} else {
    $sql = "INSERT INTO categories (name, parent_id, created_at, updated_at) VALUES ('$name_category', '$select_id',NOW(), NOW())";
}
// die;
if($conn->query($sql) === TRUE) {
    header('location:category_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>