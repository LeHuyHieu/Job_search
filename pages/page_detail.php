<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../head.php');
?>

<body>
    <!-- header -->
    <?php
    require_once('../header_white.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <?php
    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];
        $sql = "SELECT jobs.*, city.city_name as location, company.name as company_name, categories.name AS category_name FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id LEFT JOIN categories ON categories.parent_id = jobs.category_id where jobs.id='$job_id'";
        $job = getData($sql);
        $job_detail = $job[0];
        $company_id = $job_detail['company_id'];
        $sql2 = "SELECT jobs.* ,company.* FROM jobs LEFT JOIN company ON jobs.company_id = company.id where jobs.company_id = $company_id AND jobs.id = '$job_id'";
        $company = getData($sql2);
    } else {
        $sql = "SELECT jobs.*, city.city_name as location, company.name as company_name, categories.name AS category_name FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id LEFT JOIN categories ON categories.parent_id = jobs.category_id where jobs.id= 1";
        $job = getData($sql);
        $job_detail = $job[0];
        $company_id = $job_detail['company_id'];
        $sql2 = "SELECT jobs.* ,company.* FROM jobs LEFT JOIN company ON jobs.company_id = company.id where jobs.company_id = $company_id AND jobs.id = 1";
        $company = getData($sql2);
    }
    ?>
    <section class="content page_detail">
        <div class="container">
            <div class="content__flex">
                <div class="content__title">
                    <a href="javascript:void(0);" class="content__title--link">
                        <?php echo $job_detail['category_name']; ?>
                    </a>
                    <h4 class="content__title--title">
                        <?php echo $job_detail['title']; ?>
                        <?php
                        if ($job_detail['full_time'] == 1) {
                            echo "<span>Full Time</span>";
                        }
                        if ($job_detail['internship'] == 1) {
                            echo "<span>Internship</span>";
                        }
                        if ($job_detail['temporary'] == 1) {
                            echo "<span>Temporary</span>";
                        }
                        if ($job_detail['freelance'] == 1) {
                            echo "<span>Freelance</span>";
                        }
                        if ($job_detail['part_time'] == 1) {
                            echo "<span>Part Time</span>";
                        }
                        ?>
                    </h4>
                </div>
                <a href="#" class="content__bookmark">
                    Login to bookmark
                </a>
            </div>
            <div class="content__company bg-white">
                <div class="content__company--logo">
                    <img src="<?php echo $job_detail['images']; ?>" alt="" class="w-100">
                </div>
                <div class="content__company--content">
                    <a href="#" class="content__company--title"><?php echo $job_detail['company_name'] ?></a>
                    <div class="content__company--flex">
                        <?php foreach ($company as $company_detail) { ?>
                            <a href="<?php echo $company_detail['contact_web']; ?>" target="_blank" class="content__company--website"><i class="fas fa-link"></i> Website</a>
                            <a href="javascript:void(0);" class="content__company--email"><i class="fas fa-envelope"></i> <?php echo $company_detail['contact_email']; ?></a>
                        <?php } ?>
                    </div>
                    <a href="#" class="content__company--login">
                        <i class="fas fa-envelope"></i> Login to Send Message
                    </a>
                </div>
                <a href="#" class="btn btn--all">Apply for job</a>
            </div>
            <div class="row content__description">
                <div class="col-lg-8 col-md-7 col-sm-12 col-12 content__description--left">
                    <h4 class="content__description--title -m -mt-5 text__headline -dark -bold-600 -size-14">
                        Primary Responsibilities:
                    </h4>
                    <ul class="content__description--list">
                        <?php
                        $content = $job_detail['description'];
                        $content = explode(PHP_EOL, $content);
                        ?>
                        <?php foreach ($content as $li) { ?>
                            <li class="content__description--item">
                                <?php echo $li; ?>
                            </li>
                        <?php } ?>
                    </ul>
                    <h4 class="content__description--title text__headline -dark -bold-600 -size-14">
                        Requirments:
                    </h4>
                    <ul class="content__description--list">
                        <?php
                        $content = $job_detail['content'];
                        $content = explode(PHP_EOL, $content);
                        ?>
                        <?php foreach ($content as $li) { ?>
                            <li class="content__description--item">
                                <?php echo $li; ?>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="content__description--flex -m -mb-5">
                        <?php foreach ($company as $company_detail) { ?>
                            <a href="<?php echo $company_detail['contact_fb']; ?>" target="_blank" class="btn btn--primary">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="<?php echo $company_detail['contact_tw']; ?>" target="_blank" class="btn btn--info ms-2">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-12 content__description--right">
                    <h4 class="text__headline -bold-400 -size-20 -gray -m -mt-5">
                        Job Overview
                    </h4>
                    <ul class="bg-light content__description--list">
                        <li class="content__description--item--flex">
                            <span class="content__description--icon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Date Posted:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php echo date("m.d.Y", strtotime($job_detail['created_at'])); ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Expiration date:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php echo date("M d,Y", strtotime($job_detail['expiration_date'])); ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon">
                                <i class="fa fa-map-marker"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Location:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php echo $job_detail['location']; ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon">
                                <i class="fa fa-user"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Jobs Title:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php echo $job_detail['title']; ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon">
                                <i class="fa fa-clock-o"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Salary:
                                </h6>
                                <p class="content__description--item--txt">
                                    $<?php echo number_format($job_detail['salary_from']); ?> - $<?php echo number_format($job_detail['salary_to']); ?>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <h4 class="content__description--title text__headline -dark -bold-400 -size-25">
                Related Jobs
            </h4>
            <?php
            if (isset($_GET['job_id'])) {
                $sql3 = "SELECT * FROM jobs WHERE jobs.id <> '$job_id' AND jobs.category_id = '$job_id' LIMIT 6";
                $job_relateds = getData($sql3);
            } else {
                $sql3 = "SELECT * FROM jobs WHERE jobs.id <> 1 AND jobs.category_id = 1 LIMIT 6";
                $job_relateds = getData($sql3);
            }
            // print_r($sql3);die;
            ?>
            <div class="row content__description--flex jobs -m -mb-5">
                <?php foreach ($job_relateds as $job_related) { ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 jobs__item">
                        <a href="#" class="d-flex flex-column">
                            <div class="w-100 jobs__item--text">
                                <h6 class="-size-15 -dark">
                                    <?php echo $job_related['title']; ?>
                                    <button class="btn btn--transparent">
                                        <?php
                                        if ($job_detail['full_time'] == 1) {
                                            echo "Full Time";
                                        }
                                        if ($job_detail['internship'] == 1) {
                                            echo "Internship";
                                        }
                                        if ($job_detail['temporary'] == 1) {
                                            echo "Temporary";
                                        }
                                        if ($job_detail['freelance'] == 1) {
                                            echo "Freelance";
                                        }
                                        if ($job_detail['part_time'] == 1) {
                                            echo "Part Time";
                                        }
                                        ?>
                                    </button>
                                </h6>
                                <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Management"></i>
                                        <?php echo $job_detail['company_name']; ?>
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Map2"></i>
                                        <?php echo $job_detail['location'] ?>
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Money-2"></i>
                                        $<?php echo number_format($job_related['salary_from']); ?> - $<?php echo number_format($job_related['salary_to']); ?>
                                    </li>
                                </ul>
                                <p>
                                    <?php
                                    $substr = $job_detail['description'];
                                    echo substr($substr, 0, 130);
                                    ?>
                                </p>
                            </div>
                            <button class="btn--0 btn--all">
                                Apply For This Job
                            </button>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- end section -->

    <?php
    require_once('../footer.php');
    ?>
</body>

</html>