<?php
session_start();
require_once('../lib/connect.php');
if (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) {
    $candidate_id = $_SESSION['user']['id'];
}
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
                    <a href="javascript:void(0);" class="content__company--title"><?php echo $company['name'] ?></a> <br>
                    <p class="text__headline -bold-400 -size-16"><?php echo $company['company_tagline']; ?></p>
                    <div class="content__company--flex">
                        <?php if (!empty($company['contact_web'])) { ?>
                            <a href="<?php echo $company['contact_web']; ?>" target="_blank" class="content__company--website"><i class="fas fa-link"></i> Website</a>
                        <?php } ?>
                        <?php if (!empty($company['contact_email'])) { ?>
                            <a href="javascript:void(0);" class="content__company--email"><i class="fas fa-envelope"></i> <?php echo $company['contact_email']; ?></a>
                        <?php } ?>
                        <?php if (!empty($company['contact_tw'])) { ?>
                            <a href="<?php echo $company['contact_tw']; ?>" target="_blank" class="content__company--email"><i class="fab fa-twitter"></i> Twitter</a>
                        <?php } ?>
                        <?php if (!empty($company['contact_fb'])) { ?>
                            <a href="<?php echo $company['contact_fb']; ?>" target="_blank" class="content__company--email"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <?php } ?>
                        <?php if (!empty($company['contact_phone'])) { ?>
                            <a href="javascript:void(0);" target="_blank" class="content__company--email"><i class="fab fa-facebook-f"></i> <?php echo $company['contact_phone']; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row content__description mb-5">
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
        <div class="container">
            <div class="jobs__block">
                <h3 class="text__headline -bold-400 -size-20 -gray -m -mt-5">Vị trí tuyển dụng</h3>
                <?php
                $sql = "SELECT jobs.*, city.city_name as location, company.name as company_name, categories.name AS category_name FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id LEFT JOIN categories ON categories.parent_id = jobs.category_id WHERE jobs.company_id = $company_id";
                $jobs = getData($sql);
                ?>
                <div class="row">
                    <?php
                    if (count($jobs) < 1) {
                        echo "<span class=\"text__headline -bold-400 -size-16 -gray ms-5\">Không có công việc</span>";
                    }
                    ?>
                    <?php foreach ($jobs as $job) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 jobs__item mb-5">
                            <div class="d-flex flex-column border p-5 h-100">
                                <div class="w-100 jobs__item--text">
                                    <h6 class="-size-15 -dark">
                                        <a href="./page_detail.php?job_id=<?php echo $job['id']; ?>&category_id=<?php echo $job['category_id']; ?>" class="-size-15 -dark"><?php echo $job['title']; ?></a>
                                        <?php
                                        if ($job['full_time'] == 1) {
                                            echo "<button class=\"btn btn--transparent ft\">Full Time</button>";
                                        }
                                        if ($job['internship'] == 1) {
                                            echo "<button class=\"btn btn--transparent it\">Internship</button>";
                                        }
                                        if ($job['temporary'] == 1) {
                                            echo "<button class=\"btn btn--transparent tp\">Temporary</button>";
                                        }
                                        if ($job['freelance'] == 1) {
                                            echo "<button class=\"btn btn--transparent fl\">Freelance</button>";
                                        }
                                        if ($job['part_time'] == 1) {
                                            echo "<button class=\"btn btn--transparent pt\">Part Time</button>";
                                        }
                                        ?>
                                    </h6>
                                    <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Management"></i>
                                            <?php echo $job['company_name']; ?>
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Map2"></i>
                                            <?php echo $job['location'] ?>
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Money-2"></i>
                                            $<?php echo number_format($job['salary_from']); ?> -
                                            $<?php echo number_format($job['salary_to']); ?>
                                        </li>
                                    </ul>
                                    <p>
                                        <?php
                                        $substr = $job['description'];
                                        echo substr($substr, 0, 130);
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <?php
            $sql = "SELECT comment_company.*, users.name FROM comment_company LEFT JOIN users ON users.id = comment_company.candidate_id WHERE company_id = $company_id";
            $comment_companis = getData($sql);
            ?>
            <div class="review">
                <h3 class="text__headline -bold-400 -size-20 -gray -m -mt-5">Đánh Giá</h3>
                <?php 
                if(count($comment_companis) < 1) {
                    echo "<sapn class=\"text__headline -bold-400 -size-16 -gray ms-5\">Chưa có đánh giá nào</sapn>";
                }
                ?>
                <div class="list_review">
                    <div class="row">
                        <?php foreach ($comment_companis as $comment_company) { ?>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="p-5 review_item">
                                    <div class="d-flex p-4 bg-white justify-content-between align-items-center">
                                        <div class="heading me-3">
                                            <h3 class="user_name">
                                                <?php echo $comment_company['name']; ?>
                                            </h3>
                                            <?php
                                            $date = date_create($comment_company['created_at']);
                                            ?>
                                            <p class="text__headline -gray -size-15 -bold-400"><?php echo date_format($date, "F j, Y ") . " at " . date_format($date, "G:i a"); ?></p>
                                        </div>
                                        <div class="start">
                                            <ul class="list_start">
                                                <?php for ($i = 1; $i <= $comment_company['rating']; $i++) { ?>
                                                    <li class="text__headline -yellow"><i class="fas fa-star"></i></li>
                                                <?php } ?>
                                                <?php for ($i = 1; $i <= 5 - $comment_company['rating']; $i++) { ?>
                                                    <li class="text__headline -light"><i class="fas fa-star"></i></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content_review p-4">
                                        <p class="text__headline -dark -size-15 -bold-600"><?php echo $comment_company['title']; ?></p>
                                        <p class="text__headline -gray -size-15 -bold-400">
                                            <?php echo $comment_company['comment']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <h3 class="text__headline -bold-400 -size-20 -gray mt-5">Comment</h3>
                <div class="review_comment">
                    <form action="./candidate/process_comment.php" method="post" class="form__block">
                        <div class="d-flex">
                            <div class="box_item mb-4 me-3 w-75">
                                <label for="">Tiêu đề</label>
                                <input type="text" name="title" value="" class="form-control">
                            </div>
                            <div class="box_item mb-4 ms-3 w-25">
                                <span class="text__headline -size-16">Đánh giá</span>
                                <div class="rate">
                                    <input type="radio" id="5" value="5" name="rating" />
                                    <label for="5"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="4" value="4" name="rating" />
                                    <label for="4"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="3" value="3" name="rating" />
                                    <label for="3"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="2" value="2" name="rating" />
                                    <label for="2"><i class="fas fa-star"></i></label>
                                    <input type="radio" id="1" value="1" name="rating" />
                                    <label for="1"><i class="fas fa-star"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="box_item mb-4">
                            <label for="">Nội dung</label>
                            <textarea type="text" rows="5" name="content" class="form-control"></textarea>
                        </div>
                        <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
                        <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
                        <input type="hidden" name="submit_comment" value="1">
                        <button class="btn btn-submit">Gửi</button>
                    </form>
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