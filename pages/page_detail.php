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
    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];
        $sql = "SELECT jobs.*, city.city_name as location, company.name as company_name, categories.name AS category_name FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id LEFT JOIN categories ON categories.parent_id = jobs.category_id where jobs.id='$job_id'";
        $job = getData($sql);
        $job_detail = $job[0];
        $company_id = $job_detail['company_id'];
        $sql2 = "SELECT jobs.* ,company.* FROM jobs LEFT JOIN company ON jobs.company_id = company.id where jobs.company_id = $company_id AND jobs.id = '$job_id'";
        $company = getData($sql2);
    } else {
        $job_id = 1;
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
                            echo "<span class=\"btn--fulltime\">Full Time</span>";
                        }
                        if ($job_detail['internship'] == 1) {
                            echo "<span class=\"btn--internship\">Internship</span>";
                        }
                        if ($job_detail['temporary'] == 1) {
                            echo "<span class=\"btn--temporary\">Temporary</span>";
                        }
                        if ($job_detail['freelance'] == 1) {
                            echo "<span class=\"btn--freelance\">Freelance</span>";
                        }
                        if ($job_detail['part_time'] == 1) {
                            echo "<span class=\"btn--parttime\">Part Time</span>";
                        }
                        ?>
                    </h4>
                </div>
                <a href="javascript:void(0);" class="content__bookmark">
                    <?php echo (isset($_SESSION['user'])) ? "Đánh dấu trang" : "Đăng nhập để đánh dấu"; ?>
                </a>
            </div>
            <div class="content__company bg-white">
                <div class="content__company--logo">
                    <img src="<?php echo $job_detail['images']; ?>" alt="" class="w-100">
                </div>
                <div class="content__company--content">
                    <a href="./detail_company.php?company_id=<?php echo $company_id; ?>"
                        class="content__company--title"><?php echo $job_detail['company_name'] ?></a>
                    <div class="content__company--flex">
                        <?php foreach ($company as $company_detail) { ?>
                        <a href="<?php echo $company_detail['contact_web']; ?>" target="_blank"
                            class="content__company--website"><i class="fas fa-link"></i> Website</a>
                        <a href="javascript:void(0);" class="content__company--email"><i class="fas fa-envelope"></i>
                            <?php echo $company_detail['contact_email']; ?></a>
                        <?php } ?>
                    </div>
                    <?php if (!isset($_SESSION['user'])) { ?>
                    <a href="javascript:void(0);" class="content__company--login">
                        <i class="fas fa-envelope"></i> Đăng nhập đẻ gửi tin nhắn
                    </a>
                    <?php } else { ?>
                    <a href="javascript:void(0);" class="content__company--login">
                        <i class="fas fa-envelope"></i> Gửi tin nhắn
                    </a>
                    <?php } ?>
                </div>
                <!-- Button trigger modal -->
                <a href="javascript:void(0);" class="btn btn--all" data-bs-toggle="modal"
                    data-bs-target="#applyJob">Apply for job</a>
                <!-- Modal -->
                <div class="modal fade" id="applyJob" tabindex="-1" aria-labelledby="applyJobLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-5">
                                <h5 class="modal-title" id="applyJobLabel">Nộp đơn cho công việc</h5>
                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-5 pb-0">
                                <form
                                    action="../phpmailer/apply_job.php?job_id=<?php echo (isset($_GET['job_id'])) ? $job_id : ""; ?>"
                                    method="post" class="form__block" enctype="multipart/form-data">
                                    <div class="mb-4">
                                        <label for="full_name_apply">Họ và tên:</label>
                                        <input type="text" id="full_name_apply" class="form-control"
                                            name="full_name_apply"
                                            value="<?php echo (isset($_SESSION['user']['name'])) ? $_SESSION['user']['name'] : "";  ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="address_apply">Địa chỉ email:</label>
                                        <input type="text" id="address_apply" class="form-control" name="address_apply"
                                            value="<?php echo (isset($_SESSION['user']['user_email'])) ? $_SESSION['user']['user_email'] : "";  ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="file_cv" id="addCV">
                                            <span>Upload CV</span> <br>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="btn btn--add"><i class="fas fa-upload"></i> Browse</span>
                                                <span class="detail__file__cv">Tải lên CV/sơ yếu lý lịch của bạn hoặc
                                                    bất kỳ tệp có liên quan nào khác. tối đa. kích thước tệp: 100
                                                    MB.</span>
                                            </div>
                                        </label>
                                        <input type="file" id="file_cv" name="file_cv" class="d-none" value="">
                                        <span id="showCV" class="text__headline -size-15 -bold-500"></span>
                                    </div>
                                    <div class="mb-4">
                                        <label for="messge_apply">Tin Nhắn:</label>
                                        <textarea id="messge_apply" rows="5"
                                            placeholder="Thư xin việc hoặc tin nhắn đến nhà tuyển dụng"
                                            class="form-control" name="messge_apply" value=""></textarea>
                                    </div>
                                    <button class="btn--all w-100 btn--radius100 m-0" name="apply_job">Gửi đơn</button>
                                </form>
                            </div>
                            <div class="modal-footer d-block border-0 p-5">
                                <p class="text__headline -size-14 mb-3">
                                    Bạn có thể ứng tuyển vào công việc này và những công việc khác bằng cách sử dụng sơ
                                    yếu lý lịch trực tuyến của mình. Nhấp vào liên kết bên dưới để gửi sơ yếu lý lịch
                                    trực tuyến của bạn và gửi đơn đăng ký của bạn qua email cho nhà tuyển dụng này.
                                </p>
                                <?php
                                if(isset($_GET['category_id'])) {
                                    $category_id = $_GET['category_id'];
                                }else {
                                    $category_id = 1;
                                }
                                ?>
                                <a href="./alert_job.php?job_id=<?php echo $job_id; ?>&user_id=<?php echo $_SESSION['user']['id']; ?>&category_id=<?php echo $category_id; ?>&employer=<?php echo $job_detail['user_id']; ?>"
                                    class="btn btn--dark btn--radius100 w-50 ms-0">Nộp Hồ sơ và ứng tuyển</a>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <a href="<?php echo $company_detail['contact_tw']; ?>" target="_blank"
                            class="btn btn--info ms-2">
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
                                    $<?php echo number_format($job_detail['salary_from']); ?> -
                                    $<?php echo number_format($job_detail['salary_to']); ?>
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
            if (isset($_GET['job_id']) && isset($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
                $sql3 = "SELECT jobs.*, city.city_name as location, company.name as company_name, categories.name AS category_name FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id LEFT JOIN categories ON categories.parent_id = jobs.category_id where jobs.id <> '$job_id' AND jobs.category_id = '$category_id' LIMIT 6";
                $job_relateds = getData($sql3);
            } else {
                $sql3 = "SELECT jobs.*, city.city_name as location, company.name as company_name, categories.name AS category_name FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id LEFT JOIN categories ON categories.parent_id = jobs.category_id where jobs.id <> 1 AND jobs.category_id = 1 LIMIT 6";
                $job_relateds = getData($sql3);
            }
            // print_r($sql3);die;
            ?>
            <div class="row content__description--flex jobs -m -mb-5">
                <?php foreach ($job_relateds as $job_related) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 jobs__item">
                    <div class="d-flex flex-column border p-5">
                        <div class="w-100 jobs__item--text">
                            <h6 class="-size-15 -dark">
                                <a href="./page_detail.php?job_id=<?php echo $job_related['id']; ?>&category_id=<?php echo $job_related['category_id']; ?>"
                                    class="-size-15 -dark"><?php echo $job_related['title']; ?></a>
                                <?php
                                    if ($job_related['full_time'] == 1) {
                                        echo "<button class=\"btn btn--transparent\">Full Time</button>";
                                    }
                                    if ($job_related['internship'] == 1) {
                                        echo "<button class=\"btn btn--transparent\">Internship</button>";
                                    }
                                    if ($job_related['temporary'] == 1) {
                                        echo "<button class=\"btn btn--transparent\">Temporary</button>";
                                    }
                                    if ($job_related['freelance'] == 1) {
                                        echo "<button class=\"btn btn--transparent\">Freelance</button>";
                                    }
                                    if ($job_related['part_time'] == 1) {
                                        echo "<button class=\"btn btn--transparent\">Part Time</button>";
                                    }
                                    ?>
                            </h6>
                            <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                <li class="jobs__itemsub">
                                    <i class="ln ln-icon-Management"></i>
                                    <?php echo $job_related['company_name']; ?>
                                </li>
                                <li class="jobs__itemsub">
                                    <i class="ln ln-icon-Map2"></i>
                                    <?php echo $job_related['location'] ?>
                                </li>
                                <li class="jobs__itemsub">
                                    <i class="ln ln-icon-Money-2"></i>
                                    $<?php echo number_format($job_related['salary_from']); ?> -
                                    $<?php echo number_format($job_related['salary_to']); ?>
                                </li>
                            </ul>
                            <p>
                                <?php
                                    $substr = $job_related['description'];
                                    echo substr($substr, 0, 130);
                                    ?>
                            </p>
                        </div>
                        <!-- Button trigger modal -->
                        <button class="btn--0 btn--all mt-0" data-bs-toggle="modal"
                            data-bs-target="#applyJob<?php echo $job_related['id']; ?>">
                            Apply For This Job
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="applyJob<?php echo $job_related['id']; ?>" tabindex="-1"
                            aria-labelledby="applyJobLabel<?php echo $job_related['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-5">
                                        <h5 class="modal-title" id="applyJobLabel<?php echo $job_related['id']; ?>">Nộp
                                            đơn cho công việc</h5>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-5 pb-0">
                                        <form
                                            action="../phpmailer/apply_job.php?job_id=<?php echo (isset($_GET['job_id'])) ? $job_id : ""; ?>"
                                            method="post" class="form__block" enctype="multipart/form-data">
                                            <div class="mb-4">
                                                <label for="full_name_apply">Họ và tên:</label>
                                                <input type="text" id="full_name_apply" class="form-control"
                                                    name="full_name_apply"
                                                    value="<?php echo (isset($_SESSION['user']['name'])) ? $_SESSION['user']['name'] : "";  ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="address_apply">Địa chỉ email:</label>
                                                <input type="text" id="address_apply" class="form-control"
                                                    name="address_apply"
                                                    value="<?php echo (isset($_SESSION['user']['user_email'])) ? $_SESSION['user']['user_email'] : "";  ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="file_cv" id="addCV">
                                                    <span>Upload CV</span> <br>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="btn btn--add"><i class="fas fa-upload"></i>
                                                            Browse</span>
                                                        <span class="detail__file__cv">Tải lên CV/sơ yếu lý lịch của bạn
                                                            hoặc bất kỳ tệp có liên quan nào khác. tối đa. kích thước
                                                            tệp: 100 MB.</span>
                                                    </div>
                                                </label>
                                                <input type="file" id="file_cv" name="file_cv" class="d-none" value="">
                                                <span id="showCV" class="text__headline -size-15 -bold-500"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="messge_apply">Tin Nhắn:</label>
                                                <textarea id="messge_apply" rows="5"
                                                    placeholder="Thư xin việc hoặc tin nhắn đến nhà tuyển dụng"
                                                    class="form-control" name="messge_apply" value=""></textarea>
                                            </div>
                                            <button class="btn--all w-100 btn--radius100 m-0" name="apply_job">Gửi
                                                đơn</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-block border-0 p-5">
                                        <p class="text__headline -size-14 mb-3">
                                            Bạn có thể ứng tuyển vào công việc này và những công việc khác bằng cách sử
                                            dụng sơ yếu lý lịch trực tuyến của mình. Nhấp vào liên kết bên dưới để gửi
                                            sơ yếu lý lịch trực tuyến của bạn và gửi đơn đăng ký của bạn qua email cho
                                            nhà tuyển dụng này.
                                        </p>
                                        <?php
                                            if(isset($_GET['category_id'])) {
                                                $category_id = $_GET['category_id'];
                                            }else {
                                                $category_id = 1;
                                            }
                                            ?>
                                        <a href="./alert_job.php?job_id=<?php echo $job_id; ?>&user_id=<?php echo $_SESSION['user']['id']; ?>&category_id=<?php echo $category_id; ?>"
                                            class="btn btn--dark btn--radius100 w-50 ms-0">Nộp Hồ sơ và ứng tuyển</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                    </div>
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