<?php
session_start();

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

header('location:/admin/login/login.php');
