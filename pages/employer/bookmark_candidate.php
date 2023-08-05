<?php
require_once('../../lib/connect.php');

if (isset($_POST['bookmark_candidate_save']) && $_POST['bookmark_candidate_save'] == 1) {
    $candidate_id = $_POST['candidate_id'];
    $candidate_note = $_POST['candidate_note'];
    $employer_id = $_POST['employer_id'];

    if (isset($_POST['id']) && $_POST['id'] != '') {
        $id = $_POST['id'];
        $sql = "UPDATE bookmark SET candidate_note = '$candidate_note' where id = '$id'";
    } else {
        $sql = "INSERT INTO bookmark (candidate_id, candidate_note, employer_id, created_at, updated_at) VALUES ($candidate_id, '$candidate_note', $employer_id, NOW(), NOW())";
    }

    if ($conn->query($sql) === true) {
        header('location:./view_resumer_candidate.php?user_id=' . $candidate_id);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
