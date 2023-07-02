<?php 
require_once('../lib/connect.php');
$keyword = $_POST['keyword'];
$city_id = $_POST['city_id'];
$category_id = $_POST['category_id'];
$freelance = 0;
$full_time = 0;
$internship = 0;
$part_time = 0;
$temporary = 0;
$salary_from = $_POST['salary_from'];
$salary_to = $_POST['salary_to'];

if (isset($_POST['freelance']) && $_POST['freelance'] == 1) {
    $freelance = 1;
}
if (isset($_POST['full_time']) && $_POST['full_time'] == 1) {
    $full_time = 1;
}
if (isset($_POST['internship']) && $_POST['internship'] == 1) {
    $internship = 1;
}
if (isset($_POST['part_time']) && $_POST['part_time'] == 1) {
    $part_time = 1;
}
if (isset($_POST['temporary']) && $_POST['temporary'] == 1) {
    $temporary = 1;
}

print_r($salary_to);
print_r($salary_from);
print_r($temporary);
print_r($part_time);
print_r($internship);
print_r($full_time);
print_r($freelance);
print_r($city_id);
print_r($category_id);
print_r($keyword);
die;
