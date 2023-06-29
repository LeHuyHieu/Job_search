<?php 
require_once ("../lib/connect.php");
$city_name = $_POST['city_name'];
// die;
if(isset($_POST['id_city'])) {
    $id_city = $_POST['id_city'];
    $sql = "UPDATE city SET city_name = '$city_name' WHERE id = $id_city";
} else {
    $sql = "INSERT INTO city (city_name, created_at, updated_at) VALUES ('$city_name',NOW(), NOW())";
}
// die;
if($conn->query($sql) === TRUE) {
    header('location:city_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>