<?php
session_start();
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
    require_once('../header.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <?php
    if (isset($_GET['company_id'])) {
        $company_id = $_GET['company_id'];
        $sql = "SELECT company.*, categories.name as category_name FROM company LEFT JOIN categories ON company.category_id = categories.id WHERE company.id = '$company_id'";
        $companies = getData($sql);
        $company = current($companies);
    } else {
    }
    ?>
    <section class="content page_detail mb-5">
        <div class="container">
            <div class="content__company bg-white justify-content-start">
                <div class="content__company--logo">
                    <img src="<?php echo $company['images']; ?>" alt="" class="w-100">
                </div>
                <div class="content__company--content">
                    <a href="#" class="content__company--title"><?php echo $company['name'] ?></a> <br>
                    <p class="text__headline -bold-400 -size-16"><?php echo $company['company_tagline']; ?></p>
                    <div class="content__company--flex">
                        <a href="<?php echo $company['contact_web']; ?>" target="_blank" class="content__company--website"><i class="fas fa-link"></i> Website</a>
                        <a href="javascript:void(0);" class="content__company--email"><i class="fas fa-envelope"></i> <?php echo $company['contact_email']; ?></a>
                        <a href="<?php echo $company['contact_tw']; ?>" target="_blank" class="content__company--email"><i class="fab fa-twitter"></i> Twitter</a>
                        <a href="<?php echo $company['contact_fb']; ?>" target="_blank" class="content__company--email"><i class="fab fa-facebook-f"></i> Facebook</a>
                    </div>
                </div>
            </div>
            <div class="row content__description">
                <div class="col-lg-8 col-md-7 col-sm-12 col-12 content__description--left">
                    <h4 class="text__headline -bold-400 -size-20 -gray -m -mt-5">
                        Về chúng tôi:
                    </h4>
                    <div class="text__headline -bold-300 -size-15"><?php echo $company['content']; ?></div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-12 content__description--right">
                    <h4 class="text__headline -bold-400 -size-20 -gray -m -mt-5">
                        Tông quan công ty
                    </h4>
                    <ul class="bg-light content__description--list">
                        <li class="content__description--item--flex">
                            <span class="content__description--icon text__headline -size-20">
                                <i class="ln ln-icon-Bodybuilding"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Quy Mô Công Ty:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php
                                    if ($company['company_size'] == 1) {
                                        echo "1 - 5";
                                    }
                                    if ($company['company_size'] == 2) {
                                        echo "15 - 30";
                                    }
                                    if ($company['company_size'] == 3) {
                                        echo "30 - 50";
                                    }
                                    if ($company['company_size'] == 4) {
                                        echo "15 - 30";
                                    }
                                    if ($company['company_size'] == 5) {
                                        echo "50+";
                                    }
                                    ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon text__headline -size-20">
                                <i class="ln ln-icon-Folder-Archive"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Nghành Nghề Công Ty:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php
                                    echo $company['category_name'];
                                    ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon text__headline -size-20">
                                <i class="ln ln-icon-Money-2"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Doanh thu:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php
                                    if ($company['company_revenue'] == 1) {
                                        echo "$ 70.000";
                                    }
                                    if ($company['company_revenue'] == 2) {
                                        echo "$ 100.000";
                                    }
                                    if ($company['company_revenue'] == 3) {
                                        echo "$ 150.000";
                                    }
                                    if ($company['company_revenue'] == 4) {
                                        echo "$ 300.000";
                                    }
                                    if ($company['company_revenue'] == 5) {
                                        echo "$ 600.000";
                                    }
                                    if ($company['company_revenue'] == 6) {
                                        echo "$ 1.000.000";
                                    }
                                    ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex">
                            <span class="content__description--icon text__headline -size-20">
                                <i class="ln ln-icon-Money-2"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Trung Bình Lương:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php
                                    if ($company['company_average_salary'] == 1) {
                                        echo "$15.000 - $20.000";
                                    }
                                    if ($company['company_average_salary'] == 2) {
                                        echo "$20.000 - $30.000";
                                    }
                                    if ($company['company_average_salary'] == 3) {
                                        echo "$30.000 - $40.000";
                                    }
                                    if ($company['company_average_salary'] == 4) {
                                        echo "$40.000 - $50.000";
                                    }
                                    if ($company['company_average_salary'] == 5) {
                                        echo "$50.000+";
                                    }
                                    ?>
                                </p>
                            </div>
                        </li>
                        <li class="content__description--item--flex mb-0">
                            <span class="content__description--icon text__headline -size-20">
                                <i class="ln ln-icon-Folder-Archive"></i>
                            </span>
                            <div class="content__description--text">
                                <h6 class="content__description--item--title">
                                    Trụ Sở:
                                </h6>
                                <p class="content__description--item--txt">
                                    <?php
                                    echo $company['company_headquarters'];
                                    ?>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <?php
    require_once('../footer.php');
    ?>
</body>

</html>