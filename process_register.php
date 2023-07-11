<?php 
require_once ('./lib/connect.php');
if(isset($_POST['register']) && $_POST['user_email'] != '' && $_POST['user_name'] != '' && $_POST['candidate_employer'] != '') {
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $candidate = 0;
    $employer = 0;
    if($_POST['candidate_employer'] == 1) {
        $candidate = 1;
    }
    if($_POST['candidate_employer'] == 2){
        $employer = 1;
    }
    print_r($user_email);
    print_r($user_name);
    print_r($candidate);
    print_r($employer);
    $sql = "SELECT * FROM login_register where user_email = '$user_email'";
    $register = mysqli_query($conn, $sql);
    if(mysqli_num_rows($register) > 0) {
        header('location:index.php?tontai=1');
        exit;
    }else {
        $sql = "INSERT INTO login_register (name, user_email, candidate, employer, created_at, updated_at) values ('$user_name', '$user_email', '$candidate', '$employer', NOW(), NOW())";
        mysqli_query($conn, $sql);
        header('location:index.php?thanhcong=1');
    }
    // print_r($login_register);die;
}else {
    header('location:index.php');
}

?>