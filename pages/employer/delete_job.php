<?php 
require_once ('../../lib/connect.php');

if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM jobs WHERE id = $delete_id";

    if ($conn->query($sql) === true) {
        header('location:./managae_job.php?thanhcong=1');
    } else {
        header('location:./managae_job.php?thatbai=1');
    }
}else {
    header('location:./managae_job.php?thatbai=1');
}

?>
