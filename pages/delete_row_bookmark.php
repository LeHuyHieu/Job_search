<?php
require_once('../lib/connect.php');

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $sql = "DELETE FROM bookmark WHERE id = $delete";
}

if ($conn->query($sql) === true) {
    header('location:./bookmark.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
