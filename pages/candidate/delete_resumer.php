<?php
session_start();
// print_r($_SESSION['user']);die;
require_once('../../lib/connect.php');

if (isset($_POST['delete_action']) && isset($_POST['action_id'])) {
    $action_id = $_POST['action_id'];
    $sql = "DELETE FROM actions WHERE id = '$action_id'";
    if ($conn->query($sql) === true) {
        header('location:./get-action-data.php');
        exit();
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_education']) && isset($_POST['education_id'])) {
    $education_id = $_POST['education_id'];
    $sql = "DELETE FROM education WHERE id = '$education_id'";
    if ($conn->query($sql) === true) {
        header('location:./get-education-data.php');
        exit();
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_experience']) && isset($_POST['experience_id'])) {
    $experience_id = $_POST['experience_id'];
    $sql = "DELETE FROM experience WHERE id = '$experience_id'";
    if ($conn->query($sql) === true) {
        header('location:./get-experience-data.php');
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_interest']) && isset($_POST['interest_id'])) {
    $interest_id = $_POST['interest_id'];
    $sql = "DELETE FROM interest WHERE id = '$interest_id'";
    if ($conn->query($sql) === true) {
        header('location:./get-interest-data.php');
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete_additional_information']) && isset($_POST['additional_information_id'])) {
    $additional_information_id = $_POST['additional_information_id'];
    $sql = "DELETE FROM additional_information WHERE id = '$additional_information_id'";
    if ($conn->query($sql) === true) {
        header('location:./get-additional-information-data.php');
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
    }
}
// 