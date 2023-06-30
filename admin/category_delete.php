<?php 
require_once ('../lib/connect.php');

$delete_id = $_GET['delete_id'];
if(isset($_GET['delete_id'])) {
    $sql = "DELETE FROM categories WHERE id = $delete_id";
}

if ($conn->query($sql) === TRUE) {
    header('location:category_index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>