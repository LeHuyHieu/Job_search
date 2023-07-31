<?php 
require_once ('../lib/connect.php');

$category_id = $_GET['category_id'];
$user_id = $_GET['user_id'];
$job_id = $_GET['job_id'];
$employer = $_GET['employer'];
$sql = "SELECT * FROM alert_job WHERE job_id = '$job_id'";
$alert_jobs = getData($sql);
$alert_job = current($alert_jobs);
// print_r($alert_job);die;
// print_r($user_id);
// print_r($job_id);die;
if($alert_job['user_id'] == $user_id && $alert_job['job_id'] == $job_id && $alert_job['employer'] == $employer) {
    header('location:./page_detail.php?job_id='.$job_id.'&category_id='.$category_id);
}else {
    $sql = "INSERT INTO alert_job (job_id, user_id, employer, created_at, updated_at) VALUES ('$job_id', '$user_id', '$employer', NOW(), NOW())";

    if($conn->query($sql) === true) {
        header('location:./page_detail.php?job_id='.$job_id.'&category_id='.$category_id);
    }else {
        echo "Error: " . "<br>" . $sql;
    }
}