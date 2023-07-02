<?php 
require_once ('../lib/connect.php');
$id_delete = $_GET['id_delete'];

if(isset($_GET['id_delete'])) {
    $sql = "DELETE FROM city WHERE id = '$id_delete'";
}

if($conn -> query($sql) === true) {
    header('location:city_index.php');
}else {
    echo "Error: " . $sql . "<br/>>" . $conn->error;
}
?>