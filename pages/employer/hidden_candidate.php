<?php 
require_once ('../../lib/connect.php');

$hidden = $_GET['hidden'];
$id = $_GET['id'];

if($hidden == 1) {
    $sql = "UPDATE alert_job SET hidden = '$hidden' where id = '$id'";
    if($conn->query($sql) === true) {
        header('location:./list_candidate_apply.php');
    }else {
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
}else {
    $sql = "UPDATE alert_job SET hidden = '$hidden' where id = '$id'";
    if($conn->query($sql) === true) {
        header('location:./list_candidate_apply.php');
    }else {
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
}
?>