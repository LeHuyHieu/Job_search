<?php 
require_once ('../lib/connect.php');
$watched = 0;
if(isset($_POST['watched'])) {
    $watched = $_POST['watched'];
}

if(isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];
    $sql = "UPDATE contact SET watched = '$watched' where id = '$contact_id'";
}

if($conn->query($sql) === true) {
    header('location:contact_index.php');
}else {
    echo "Error: " .$sql. "<br>" .$conn->error;
}
?>

