<?php 
require_once ('../lib/connect.php');

$delete_id = $_GET['delete_id'];
if(isset($_GET['delete_id'])) {
    $sql = "DELETE FROM jobs WHERE id = $delete_id";
}

if ($conn->query($sql) === TRUE) {
    header('location:job_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>