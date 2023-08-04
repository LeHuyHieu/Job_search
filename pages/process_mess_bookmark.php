<?php
require_once('../lib/connect.php');

if (isset($_POST['bookmark_save'])) {
    $job_id = $_GET['job_id'];
    $category_id = $_GET['category_id'];
    $user_id = $_GET['user_id'];
    $bookmark_note = $_POST['bookmark_note'];

    $sql = "UPDATE jobs SET bookmark_note = '$bookmark_note', bookmark = '$user_id' WHERE id = '$job_id'";

    if ($conn->query($sql) === true) {
        header('location:./page_detail.php?job_id=' . $job_id . '&category_id=' . $category_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['message_submit'])) {
    $job_id = $_GET['job_id'];
    $category_id = $_GET['category_id'];
    $user_id = $_GET['user_id'];
    $message_candidate = $_POST['message_candidate'];

    $sql_job = "SELECT jobs.user_id FROM jobs WHERE id = '$job_id'";
    $jobs = getData($sql_job);
    $employer_id = current($jobs);
    $out_msg_id = $employer_id['user_id'];

    $sql = "INSERT INTO message (job_id, in_msg_id, out_msg_id, message_candidate, created_at) VALUES ('$job_id', '$user_id', '$out_msg_id', '$message_candidate', now())";

    if ($conn->query($sql) === true) {
        header('location:./page_detail.php?job_id=' . $job_id . '&category_id=' . $category_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
