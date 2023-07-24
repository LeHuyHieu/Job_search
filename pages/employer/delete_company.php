<?php 
require_once ('../../lib/connect.php');

if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM company WHERE id = $delete_id";

    if ($conn->query($sql) === true) {
        header('location:./manage_companies.php?thanhcong=1');
    } else {
        header('location:./manage_companies.php?thatbai=1');
    }
}else {
    header('location:./manage_companies.php?thatbai=1');
}

?>
