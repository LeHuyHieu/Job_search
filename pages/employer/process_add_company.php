<?php 
require_once ('../../lib/connect.php');

if(isset($_POST['add_compamy'])) {
    $company_name           = $_POST['company_name'];
    $company_tagline        = $_POST['company_tagline'];
    $company_headquarters   = $_POST['company_headquarters'];
    // $company_logo           = $_POST['company_logo'];
    $company_email          = $_POST['company_email'];
    $company_web            = $_POST['company_web'];
    $company_phone          = $_POST['company_phone'];
    $company_average_salary = $_POST['company_average_salary'];
    $company_fb             = $_POST['company_fb'];
    $company_tw             = $_POST['company_tw'];
    $company_size           = $_POST['company_size'];
    $company_revenue        = $_POST['company_revenue'];
    $company_description    = $_POST['company_description'];
    $company_content        = $_POST['company_content'];
    $target_dir             = $_POST['/images/'];

    if(isset($_FILES['company_logo']['tmp_name']) && $_FILES['company_logo']['tmp_name']) {
        $company_logo = $target_dir . basename($_FILES['company_logo']['tmp_name']);
        move_uploaded_file($_FILES['company_logo']['tmp_name'], '..' . $company_logo);
    }else {
        $company_logo = '';
    }


}

?>