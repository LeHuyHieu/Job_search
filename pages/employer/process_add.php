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
        header('location:./add_company.php');
        exit();
    }else {
        echo "Error: ". $sql. "<br>" . $conn->error;
    }
}

if(isset($_POST['add_job'])) {
    $title = $_POST['title'];
    $company_id = $_POST['company_id'];
    $city_id = $_POST['city_id'];
    $full_time = 0;
    $freelance = 0;
    $internship = 0;
    $part_time = 0;
    $temporary = 0;
    if(isset($_POST['type_job']) && is_array($_POST['type_job'])) {
        $type_jobs = $_POST['type_job'];
        foreach ($type_jobs as $type_job) {
            if($type_job == 1) {
                $full_time = 1;
            }
            if($type_job == 2) {
                $freelance = 1;
            }
            if($type_job == 3) {
                $internship = 1;
            }
            if($type_job == 4) {
                $part_time = 1;
            }
            if($type_job == 5) {
                $temporary = 1;
            }
        }
    }

    $target_dir = "/images/";
    $category_id = $_POST['category_id'];
    $salary_from = $_POST['salary_from'];
    $salary_to = $_POST['salary_to'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $expiration_date = $_POST['expiration_date'];

    if(isset($_FILES['job_logo']['tmp_name']) && $_FILES['job_logo']['tmp_name']) {
        $job_logo = $target_dir . basename($_FILES['job_logo']['tmp_name']);
        move_uploaded_file($_FILES['job_logo']['tmp_name'], '../..' . $job_logo);
    }else {
        $job_logo = '';
    }

    if(isset($_POST['job_id']) && $_POST['job_id'] != '') {
        $job_id = $_POST['job_id'];
        if(strlen($job_logo)) {
            $sql = "UPDATE jobs SET images = '$job_logo', expiration_date = '$expiration_date', title = '$title', company_id = '$company_id', city_id = '$city_id', category_id = '$category_id', salary_from = '$salary_from', salary_to = '$salary_to', description = '$description', content = '$content', full_time = '$full_time', freelance = '$freelance', internship = '$internship', part_time = '$part_time', temporary = '$temporary' WHERE id = '$job_id'";
        }else {
            $sql = "UPDATE jobs SET title = '$title', expiration_date = '$expiration_date', company_id = '$company_id', city_id = '$city_id', category_id = '$category_id', salary_from = '$salary_from', salary_to = '$salary_to', description = '$description', content = '$content', full_time = '$full_time', freelance = '$freelance', internship = '$internship', part_time = '$part_time', temporary = '$temporary' WHERE id = '$job_id'";
        }
    }else {
        $user_id = $_POST['user_id'];
        $sql = "INSERT INTO jobs (user_id, title, company_id, city_id, category_id, salary_from, salary_to, description, content, full_time, freelance, internship, part_time, temporary, images, expiration_date, created_at, updated_at) VALUES ('$user_id', '$title', '$company_id', '$city_id', '$category_id', '$salary_from', '$salary_to', '$description', '$content', '$full_time', '$freelance', '$internship', '$part_time', '$temporary', '$job_logo', '$expiration_date', NOW(), NOW())";
    }

    if($conn->query($sql) === true) {
        header('location:./submit_job.php');
        exit();
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
