<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Jobs</title>";
require_once('../head.php');
$selected = "selected";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
?>

<body>
    <!-- header -->
    <?php
    require_once('../header.php');
    ?>
    <!-- end header -->
    <?php
    $sql_conditions = "WHERE 1 "; // điều kiện where 1 là điều kiện luôn đúng
    $param = '';
    if (isset($_GET['keyword']) && strlen($_GET['keyword'])) {
        $sql_conditions .= " AND title LIKE '%" . $_GET['keyword'] . "%' ";
        $param .= '&keyword=' . $_GET['keyword'];
    }
    if (isset($_GET['city_id']) && strlen($_GET['city_id'])) {
        $sql_conditions .= " AND city_id = " . $_GET['city_id'] . " ";
        $param .= '&city_id=' . $_GET['city_id'];
    }
    if (isset($_GET['category_id']) && strlen($_GET['category_id'])) {
        $sql_conditions .= " AND category_id = " . $_GET['category_id'] . " ";
        $param .= '&category_id=' . $_GET['category_id'];
    }
    if (isset($_GET['salary_from']) && strlen($_GET['salary_from'])) {
        $sql_conditions .= " AND salary_from >= " . $_GET['salary_from'] . " AND salary_from <= " . $_GET['salary_to'] . " ";
        $param .= '&salary_from=' . $_GET['salary_from'] . '&salary_to=' . $_GET['salary_to'];
    }
    $freelance = 0;
    $full_time = 0;
    $internship = 0;
    $part_time = 0;
    $temporary = 0;

    if (isset($_GET['freelance']) && $_GET['freelance'] == 1) {
        $freelance = 1;
        $param .= '&freelance=' . $_GET['freelance'];
    }
    if (isset($_GET['full_time']) && $_GET['full_time'] == 1) {
        $full_time = 1;
        $param .= '&full_time=' . $_GET['full_time'];
    }
    if (isset($_GET['internship']) && $_GET['internship'] == 1) {
        $internship = 1;
        $param .= '&internship=' . $_GET['internship'];
    }
    if (isset($_GET['part_time']) && $_GET['part_time'] == 1) {
        $part_time = 1;
        $param .= '&part_time=' . $_GET['part_time'];
    }
    if (isset($_GET['temporary']) && $_GET['temporary'] == 1) {
        $temporary = 1;
        $param .= '&temporary=' . $_GET['temporary'];
    }
    if (isset($_GET['job_type'])) {
        $param .= '&job_type=' . $_GET['job_type'];
    }

    $sql2 = "SELECT COUNT(*) as total FROM jobs ";
    $sql2 .= $sql_conditions;

    $total = getData($sql2);
    $total = $total[0]['total'];
    $num_per_page = 6;
    $total_page = ceil($total / $num_per_page);
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $start = ($page - 1) * $num_per_page;
    // die;
    ?>
    <!-- section -->
    <section class="content categories bg-light">
        <h5 class="-p -pl-5 -pr-5 -pt-5 text__headline -size-16 -gray -bold-400">Find Job</h5>
        <form action="find_job.php" method="get" class="row banner__search banner__btn search__category -p -pl-5 -pr-5">
            <div class="d-grid grid__find--job" style="grid-template-columns: 25% auto 16%;">
                <div class="mb-5">
                    <h5 class="text__headline -size-16 -bold-400">Salary <i class="fas fa-chevron-down"></i></h5>
                    <div class="job__type2">
                        <div class="scroll1">
                            <span>
                                $<input type="text" name="salary_from" value="<?php echo (isset($_GET['salary_from'])) ? $_GET['salary_from'] : 15000; ?>" readonly class="sliderValue wage__range" data-index="0" />
                                -
                                $<input type="text" name="salary_to" value="<?php echo (isset($_GET['salary_to'])) ? $_GET['salary_to'] : 75000; ?>" readonly class="sliderValue wage__range" data-index="1" />
                            </span>
                            <div id="slider"></div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <h5 class="text__headline -size-16 -bold-400 job__type--click">Job type <i class="fas fa-chevron-down"></i></h5>
                    <div class="job__type1 bg-white p-4 d-flex">
                        <div class="check__box">
                            <input type="checkbox" name="freelance" value="<?php echo (!isset($_GET['freelance']) || $_GET['freelance'] == 1) ? "1" : "0"; ?>" id="freelance" <?php echo ($freelance == 1) ? "checked" : ""; ?>>
                            <label for="freelance"><span class="check"></span> Freelance</label>
                        </div>
                        <div class="check__box ms-5">
                            <input type="checkbox" name="full_time" value="<?php echo (!isset($_GET['full_time']) || $_GET['full_time'] == 1) ? "1" : "0"; ?>" id="full-time" <?php echo ($full_time == 1) ? "checked" : ""; ?>>
                            <label for="full-time"><span class="check"></span> Full Time</label>
                        </div>
                        <div class="check__box ms-5">
                            <input type="checkbox" name="temporary" value="<?php echo (!isset($_GET['temporary']) || $_GET['temporary'] == 1) ? "1" : "0"; ?>" id="temporary" <?php echo ($temporary == 1) ? "checked" : ""; ?>>
                            <label for="temporary"><span class="check"></span> Temporary</label>
                        </div>
                        <div class="check__box ms-5">
                            <input type="checkbox" name="internship" value="<?php echo (!isset($_GET['internship']) || $_GET['internship'] == 1) ? "1" : "0"; ?>" id="internship" <?php echo ($internship == 1) ? "checked" : ""; ?>>
                            <label for="internship"><span class="check"></span> Internship</label>
                        </div>
                        <div class="check__box ms-5">
                            <input type="checkbox" name="part_time" value="<?php echo (!isset($_GET['part_time']) || $_GET['part_time'] == 1) ? "1" : "0"; ?>" id="part-time" <?php echo ($part_time == 1) ? "checked" : ""; ?>>
                            <label for="part-time"><span class="check"></span> Part Time</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn--all mt-0 me-0" type="submit">Tìm Job</button>
            </div>
            <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                <input type="text" name="keyword" value="<?php echo (isset($_GET['keyword'])) ? $keyword : ""; ?>" placeholder="Job title, skill, Industry" />
            </div>
            <?php
            if (isset($_GET['city_id'])) {
                $city_id = $_GET['city_id'];
            }
            $sql3 = "SELECT * FROM city";
            $city_table = getData($sql3);
            ?>
            <div class="col-md-4 col-sm-12 col-12 position-relative banner__search--box">
                <select class="form-select select__box chosen-select" name="city_id" id="" data-placeholder="Choose a country...">
                    <option value="">All Location</option>
                    <?php foreach ($city_table as $city) { ?>
                        <option value="<?php echo $city['id']; ?>" <?php if (isset($_GET['city_id'])) {
                                                                        if ($city_id == $city['id']) {
                                                                            echo $selected;
                                                                        }
                                                                    } ?>><?php echo $city['city_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php
            if (isset($_GET['category_id'])) {
                $category_id = $_GET['category_id'];
            }
            $sql = "SELECT * FROM categories";
            $categories = getData($sql);
            ?>
            <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                <select class="form-select select__box chosen-select" name="category_id" id="" data-placeholder="Choose a country...">
                    <option value="">All categories</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id']; ?>" <?php if (isset($_GET['category_id'])) {
                                                                            if ($category_id == $category['id']) {
                                                                                echo $selected;
                                                                            }
                                                                        } ?>><?php echo $category['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

        </form>
        <?php
        $sql2 = "SELECT jobs.*, city.city_name as name_city, company.name as name_company FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id ";
        $sql2 .= $sql_conditions;
        $sql2 .= "ORDER BY id DESC LIMIT $start,$num_per_page";
        $jobs = getData($sql2);
        // print_r($sql2);die;
        ?>
        <div class="bg-white">
            <div class="container content__jobs py-5">
                <div class="row single-item jobs">
                    <?php foreach ($jobs as $job) { ?>
                        <div class="col-md-4 col-sm-6 col-12 mb-5">
                            <div class="jobs__item border--item">
                                <a href="page_detail.php?job_id=<?php echo $job['id']; ?>" class="d-flex flex-column">
                                    <div class="w-100 jobs__item--text">
                                        <h6 class="-size-15 -dark">
                                            <?php echo $job['title']; ?>

                                            <?php
                                            if ($job['full_time'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 btn--fulltime\">Full Time</button>";
                                            }
                                            if ($job['internship'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 btn--internship\">Internship</button>";
                                            }
                                            if ($job['temporary'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 btn--temporary\">Temporary</button>";
                                            }
                                            if ($job['freelance'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 btn--freelance\">Freelance</button>";
                                            }
                                            if ($job['part_time'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 btn--parttime\">Part Time</button>";
                                            }
                                            ?>
                                            </button>
                                        </h6>
                                        <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Management"></i> <?php echo $job['name_city']; ?>
                                            </li>
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Map2"></i> <?php echo $job['name_company']; ?>
                                            </li>
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Money-2"></i> $<?php echo number_format($job['salary_from']); ?> - $<?php echo number_format($job['salary_to']); ?>
                                            </li>
                                        </ul>
                                        <p><?php
                                            $substr = $job['description'];
                                            echo substr($substr, 0, 130);
                                            ?></p>
                                    </div>
                                    <button class="btn--all btn--0">
                                        Apply For This Job
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-end">
                    <?php if ($page > 1) { ?>
                        <a class="btn btn-primary ms-3" href="?page=<?php echo $page - 1; ?>&<?php echo $param; ?>"><i class="fas fa-angle-double-left"></i></a>
                    <?php } ?>

                    <?php if (!isset($_GET['page']) || $_GET['page'] <= 5) {
                        if ($total_page >= 5) {
                            for ($i = 1; $i <= 5; $i++) { ?>
                                <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                            <?php }
                        } else {
                            for ($i = 1; $i <= $total_page; $i++) { ?>
                                <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                            <?php }
                        }
                    } else if ($total_page <= 5) {
                        for ($i = 1; $i <= $total_page; $i++) { ?>
                            <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                            <?php }
                    } else {
                        if ($total_page - $page <= 3) {
                            for ($i = $total_page - 4; $i <= $total_page; $i++) { ?>
                                <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                            <?php }
                        } else {
                            for ($i = $page - 2; $i <= $page + 2; $i++) { ?>
                                <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                    <?php }
                        }
                    } ?>

                    <?php if ($page < $total_page) { ?>
                        <a class="btn btn-primary ms-3" href="?page=<?php echo $page + 1; ?>&<?php echo $param; ?>"><i class="fas fa-angle-double-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- footer -->
    <?php
    require_once('../footer.php');
    ?>
    <!-- end footer -->
</body>

</html>