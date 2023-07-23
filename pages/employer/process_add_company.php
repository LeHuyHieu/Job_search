<?php 
require_once ('../../lib/connect.php');

if(isset($_POST['add_compamy'])) {
    $company_name           = $_POST['company_name'];
    $company_tagline        = $_POST['company_tagline'];
    $company_headquarters   = $_POST['company_headquarters'];
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
    $category_id           = $_POST['category_id'];
    $target_dir             = '/images/';
    print_r($company_name);
    print_r($company_tagline);
    print_r($company_headquarters);
    print_r($company_email);
    print_r($company_web);
    print_r($company_phone);
    print_r($company_average_salary);
    print_r( $company_fb);
    print_r($company_tw);
    print_r($company_size);
    print_r($company_revenue);
    print_r($company_description);
    print_r($company_content);
    print_r($category_id);
    if(isset($_FILES['company_logo']['tmp_name']) && $_FILES['company_logo']['tmp_name']) {
        $company_logo = $target_dir . basename($_FILES['company_logo']['tmp_name']);
        move_uploaded_file($_FILES['company_logo']['tmp_name'], '../..' . $company_logo);
    }else {
        $company_logo = '';
    }

    if(isset($_POST['company_id']) && $_POST['company_id'] != '') {
        $company_id = $_POST['company_id'];
        if(strlen($company_logo)) {
            $sql = "UPDATE company SET name = '$company_name', category_id = '$category_id', company_tagline = '$company_tagline', company_headquarters = '$company_headquarters', contact_email = '$company_email', contact_web = '$company_web', contact_phone = '$company_phone', company_average_salary = '$company_average_salary', contact_fb = '$company_fb', contact_tw = '$company_tw', company_size = '$company_size', company_revenue = '$company_revenue', description = '$company_description',  content = '$company_content', images = '$company_logo' WHERE id = '$company_id'";
        }else {
            $sql = "UPDATE company SET name = '$company_name', category_id = '$category_id', company_tagline = '$company_tagline', company_headquarters = '$company_headquarters', contact_email = '$company_email', contact_web = '$company_web', contact_phone = '$company_phone', company_average_salary = '$company_average_salary', contact_fb = '$company_fb', contact_tw = '$company_tw', company_size = '$company_size', company_revenue = '$company_revenue', description = '$company_description',  content = '$company_content' WHERE id = '$company_id'";
        }
    }else {
        $user_id = $_POST['user_id'];
        $sql = "INSERT INTO company (user_id , name, category_id, company_tagline, company_headquarters, contact_email, contact_web, contact_phone, company_average_salary, contact_fb, contact_tw, company_size, company_revenue, description, content, images, created_at, updated_at) VALUES ('$user_id', '$company_name', '$category_id', '$company_tagline', '$company_headquarters', '$company_email', '$company_web', '$company_phone', '$company_average_salary', '$company_fb', '$company_tw', '$company_size', '$company_revenue', '$company_description', '$company_content', '$company_logo',NOW(), NOW())";
    }

    if($conn->query($sql) === true) {
        // die;
        header('location:./manage_companies.php');
        exit();
    }else {
        echo "Error: ". $sql. "<br>" . $conn->errno;
    }
}

?>