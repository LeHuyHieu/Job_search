<?php
require_once('../../lib/connect.php');

if (isset($_POST['submit_comment']) && $_POST['submit_comment'] == 1) {
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];
    $candidate_id = $_POST['candidate_id'];
    $company_id = $_POST['company_id'];
    // print_r($_POST);
    // die;
    $sql = "INSERT INTO comment_company (company_id, candidate_id, rating, title, comment, created_at, updated_at) VALUES ($company_id, $candidate_id, $rating, '$title', '$content', NOW(), NOW())";

    if ($conn->query($sql) === true) {
        header('location:/pages/detail_company.php?company_id=' . $company_id);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
