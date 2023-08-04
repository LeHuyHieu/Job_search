<?php
session_start();
require_once('../../lib/connect.php');
if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1) {
    $id = $_GET['id'];
    if (isset($_POST['submit_mess']) && $_POST['submit_mess'] == 1) {
        $chat_id = $_POST['chat_id'];
        $send_from = $_POST['send_from'];
        $content = $_POST['content'];

        $sql = "INSERT INTO message (chat_id, send_from, content, created_at) VALUES ($chat_id, $send_from, '$content', NOW())";

        if ($conn->query($sql) === true) {
            header('location:./ajax_employer_chat.php?is_insert=1&id=' . $id);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    $id = $_GET['id'];
    if (isset($_POST['submit_mess']) && $_POST['submit_mess'] == 1) {
        $chat_id = $_POST['chat_id'];
        $send_from = $_POST['send_from'];
        $content = $_POST['content'];

        $sql = "INSERT INTO message (chat_id, send_from, content, created_at) VALUES ($chat_id, $send_from, '$content', NOW())";

        if ($conn->query($sql) === true) {
            header('location:./ajax_candidate_chat.php?is_insert=1&id=' . $id);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
