<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../head.php');
$selected = "selected";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
?>

<body>
    <!-- header -->
    <?php
    require_once('../header_white.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <section class="content categories">
        <div class="bg-light">
            <div class="container">
                <div class="categories__block">
                    <h3 class="categories__title text__headline -bold-400 -size-25">
                        Browse Jobs – List Layout
                    </h3>
                    <p class="categories__text">
                        <a href="/index.php" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Browse Jobs – Grid Layout</span>
                    </p>
                </div>
            </div>
        </div>
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
            $sql_conditions .= " AND freelance = " . $_GET['freelance'] . " ";
            $param .= '&freelance=' . $_GET['freelance'];
        }
        if (isset($_GET['full_time']) && $_GET['full_time'] == 1) {
            $full_time = 1;
            $sql_conditions .= " AND full_time = " . $_GET['full_time'] . " ";
            $param .= '&full_time=' . $_GET['full_time'];
        }
        if (isset($_GET['internship']) && $_GET['internship'] == 1) {
            $internship = 1;
            $sql_conditions .= " AND internship = " . $_GET['internship'] . " ";
            $param .= '&internship=' . $_GET['internship'];
        }
        if (isset($_GET['part_time']) && $_GET['part_time'] == 1) {
            $part_time = 1;
            $sql_conditions .= " AND part_time = " . $_GET['part_time'] . " ";
            $param .= '&part_time=' . $_GET['part_time'];
        }
        if (isset($_GET['temporary']) && $_GET['temporary'] == 1) {
            $temporary = 1;
            $sql_conditions .= " AND temporary = " . $_GET['temporary'] . " ";
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

        $sql2 = "SELECT jobs.*, city.city_name as name_city, company.name as name_company FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id ";
        $sql2 .= $sql_conditions;
        $sql2 .= "ORDER BY id DESC LIMIT $start,$num_per_page";
        $jobs = getData($sql2);
        // print_r($sql2);die;
        ?>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="row">
                <div class="col-md-8 col-ms-12 col-12 jobs">
                    <?php foreach ($jobs as $job) { ?>
                        <div class="jobs__item 
                            <?php
                            if ($job['full_time'] == 1) {
                                echo " jobs__item--fulltime";
                            }
                            if ($job['internship'] == 1) {
                                echo " jobs__item--internship";
                            }
                            if ($job['temporary'] == 1) {
                                echo " jobs__item--temporary";
                            }
                            if ($job['freelance'] == 1) {
                                echo " jobs__item--freelance";
                            }
                            if ($job['part_time'] == 1) {
                                echo " jobs__item--part_time";
                            }
                            ?>">
                            <a href="page_detail.php?job_id=<?php echo $job['id']; ?>" class="d-flex">
                                <div class="jobs__item--img">
                                    <img src="<?php echo $job['images']; ?>" class="w-100" alt="">
                                </div>
                                <div class="jobs__item--text">
                                    <h6 class="-size-15 -dark"><?php echo $job['title']; ?></h6>
                                    <ul class="d-flex jobs__item--icon">
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Management"></i> <?php echo $job['name_company']; ?>
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Map2"></i> <?php echo $job['name_city']; ?>
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Money-2"></i> $<?php echo number_format($job['salary_from']); ?> - $<?php echo number_format($job['salary_to']); ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex" style="flex-wrap: wrap;justify-content: end;width: 35%;">
                                    <?php
                                    if ($job['full_time'] == 1) {
                                        echo "<button class=\"btn btn--transparent ms-2 mb-2 btn--fulltime\">Full Time</button>";
                                    }
                                    if ($job['internship'] == 1) {
                                        echo "<button class=\"btn btn--transparent ms-2 mb-2 btn--internship\">Internship</button>";
                                    }
                                    if ($job['temporary'] == 1) {
                                        echo "<button class=\"btn btn--transparent ms-2 mb-2 btn--temporary\">Temporary</button>";
                                    }
                                    if ($job['freelance'] == 1) {
                                        echo "<button class=\"btn btn--transparent ms-2 mb-2 btn--freelance\">Freelance</button>";
                                    }
                                    if ($job['part_time'] == 1) {
                                        echo "<button class=\"btn btn--transparent ms-2 mb-2 btn--parttime\">Part Time</button>";
                                    }
                                    ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="d-flex justify-content-end categories__list--page">
                        <?php if ($page > 1) { ?>
                            <a class="btn btn--page btn--next ms-0 me-auto" href="?page=<?php echo $page - 1; ?>&<?php echo $param; ?>">Prev</a>
                        <?php } ?>

                        <?php if (!isset($_GET['page']) || $_GET['page'] <= 5) {
                            if ($total_page >= 5) {
                                for ($i = 1; $i <= 5; $i++) { ?>
                                    <a class="btn btn--page ms-3 px-3 <?php echo (!isset($_GET['page']) && $i == 1) ? "btn--page--active" : ""; ?> 
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn--page--active" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                <?php }
                            } else {
                                for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <a class="btn btn--page ms-3 px-3 <?php echo (!isset($_GET['page']) && $i == 1) ? "btn--page--active" : ""; ?> 
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn--page--active" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                <?php }
                            }
                        } else if ($total_page <= 5) {
                            for ($i = 1; $i <= $total_page; $i++) { ?>
                                <a class="btn btn--page ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn--page--active" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                <?php }
                        } else {
                            if ($total_page - $page <= 3) {
                                for ($i = $total_page - 4; $i <= $total_page; $i++) { ?>
                                    <a class="btn btn--page ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn--page--active" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                <?php }
                            } else {
                                for ($i = $page - 2; $i <= $page + 2; $i++) { ?>
                                    <a class="btn btn--page ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn--page--active" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                        <?php }
                            }
                        } ?>

                        <?php if ($page < $total_page) { ?>
                            <a class="btn btn--page btn--next" href="?page=<?php echo $page + 1; ?>&<?php echo $param; ?>">Next</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 search__job">
                    <form action="categories.php" method="get" class="search__category">
                        <div class="mb-5">
                            <h5 class="text__headline -size-20 -bold-400">Keywords</h5>
                            <input type="text" class="form-control search__category--keywords" name="keyword" value="<?php echo (isset($_GET['keyword'])) ? $keyword : ""; ?>" placeholder="job title, keywords or company">
                        </div>
                        <div class="mb-5 search__category--select">
                            <h5 class="text__headline -size-20 -bold-400">Location</h5>
                            <?php
                            if (isset($_GET['city_id'])) {
                                $city_id = $_GET['city_id'];
                            }
                            $sql3 = "SELECT * FROM city";
                            $city_table = getData($sql3);
                            ?>
                            <select class="form-select select__box chosen-select" name="city_id" id="" data-placeholder="Choose a country...">
                                <option value="">All Location</option>
                                <?php foreach ($city_table as $city) { ?>
                                    <option value="<?php echo $city['id']; ?>" <?php if (isset($_GET['city_id'])) { if ($city_id == $city['id']) { echo $selected; } } ?>><?php echo $city['city_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <h5 class="text__headline -size-20 -bold-400">Job type</h5>
                        <div class="mb-5">
                            <div class="check__box">
                                <input type="checkbox" name="freelance" value="<?php echo (!isset($_GET['freelance']) || $_GET['freelance'] == 1) ? "1" : "0"; ?>" id="freelance" <?php echo ($freelance == 1) ? "checked" : ""; ?>>
                                <label for="freelance"><span class="check"></span> Freelance</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" name="full_time" value="<?php echo (!isset($_GET['full_time']) || $_GET['full_time'] == 1) ? "1" : "0"; ?>" id="full-time" <?php echo ($full_time == 1) ? "checked" : ""; ?>>
                                <label for="full-time"><span class="check"></span> Full Time</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" name="temporary" value="<?php echo (!isset($_GET['temporary']) || $_GET['temporary'] == 1) ? "1" : "0"; ?>" id="temporary" <?php echo ($temporary == 1) ? "checked" : ""; ?>>
                                <label for="temporary"><span class="check"></span> Temporary</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" name="internship" value="<?php echo (!isset($_GET['internship']) || $_GET['internship'] == 1) ? "1" : "0"; ?>" id="internship" <?php echo ($internship == 1) ? "checked" : ""; ?>>
                                <label for="internship"><span class="check"></span> Internship</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" name="part_time" value="<?php echo (!isset($_GET['part_time']) || $_GET['part_time'] == 1) ? "1" : "0"; ?>" id="part-time" <?php echo ($part_time == 1) ? "checked" : ""; ?>>
                                <label for="part-time"><span class="check"></span> Part Time</label>
                            </div>
                        </div>
                        <div class="mb-5 search__category--select">
                            <h5 class="text__headline -size-20 -bold-400">Categories</h5>
                            <?php
                            if (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];
                            }
                            $sql = "SELECT * FROM categories";
                            $categories = getData($sql);
                            ?>
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
                        <div class="mb-5">
                            <div class="check__box check__range">
                                <input type="checkbox" id="wage">
                                <label for="wage"><span class="check"></span> Filter by Salary</label>
                            </div>
                            <div class="scroll">
                                <span>
                                    $<input type="text" name="salary_from" value="<?php echo (isset($_GET['salary_from'])) ? $_GET['salary_from'] : 15000; ?>" readonly class="sliderValue wage__range" data-index="0" />
                                    -
                                    $<input type="text" name="salary_to" value="<?php echo (isset($_GET['salary_to'])) ? $_GET['salary_to'] : 75000; ?>" readonly class="sliderValue wage__range" data-index="1" />
                                </span>
                                <div id="slider"></div>
                            </div>
                        </div>
                        <h5 class="text__headline -size-20 -bold-400">Filter by tag: </h5>
                        <div class="mb-5 d-flex">
                            <div class="check__box fiter">
                                <input type="checkbox" id="filter_by_tag">
                                <label for="filter_by_tag"><span class="check">PHP</span></label>
                            </div>
                            <button class="btn btn--all mt-0 me-0" type="submit">Tìm Job</button>
                        </div>
                    </form>
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