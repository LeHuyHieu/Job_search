<?php
session_start();
require_once('./lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('./head.php');
?>

<body class="p-0 _bg_transparent">
    <?php
    require_once('./header.php');
    ?>

    <!-- section -->
    <section class="content" id="content">
        <!-- banner section -->
        <div class="position-relative banner">
            <div class="banner__before container">
                <h1 class="banner__title">
                    Tìm Việc
                </h1>
                <h3 class="banner__title">
                    Hire Experts or be hirded in <span class="typed">sales &
                        marketing</span>
                </h3>
                <form action="pages/categories.php" method="get" class="row banner__search banner__btn">
                    <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                        <button class="banner__btn--item">
                            What job are you looking for?
                        </button>
                        <input type="text" name="keyword" class="w-100" placeholder="Tên công việc, Kỹ năng, Nghành nghề">
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 position-relative banner__search--box">
                        <button class="banner__btn--item">
                            Where?
                        </button>
                        <?php
                        if (isset($_GET['city_id'])) {
                            $city_id = $_GET['city_id'];
                        }
                        $sql3 = "SELECT * FROM city";
                        $city_table = getData($sql3);
                        ?>
                        <select class="form-select select__box chosen-select" name="city_id" id="" data-placeholder="Choose a country...">
                            <option value="">Tất cả thành phố</option>
                            <?php foreach ($city_table as $city) { ?>
                                <option value="<?php echo $city['id']; ?>"><?php echo $city['city_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                    $sql = "SELECT * FROM categories";
                    $categories = getData($sql);
                    ?>
                    <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                        <button class="banner__btn--item">
                            Categories
                        </button>
                        <select class="form-select select__box chosen-select" name="category_id" id="" data-placeholder="Choose a country...">
                            <option value="">Tất cả loại công việc</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn--search">
                            <span class="btn__search">Search</span>
                            <i class="fas fa-search icon__search"></i>
                        </button>
                    </div>
                </form>
                <p class="banner__text">Cần thêm tùy chọn tìm kiếm? <a href="./pages/categories.php">Tìm Kiếm nâng cao</a></p>
            </div>
            <div class="banner__after"></div>
        </div>
        <!-- end banner section -->
        <div class="container pt-5">
            <h2 class="pt-5 text__headline -bold-400 -dark -size-25 mb-5">
                Loại Công Việc Phổ Biến
            </h2>
            <?php
            $sql1 = "SELECT * FROM categories WHERE parent_id = 0";
            $categories1 = getData($sql1);
            ?>
            <div class="row">
                <?php foreach ($categories1 as $category) { ?>
                    <div class="col-md-3 col-sm-6 col-12 content__item mb-3">
                        <a href="pages/categories.php?category_id=<?php echo $category['id']; ?>" class="item__flex">
                            <div class="item__flex--left">
                                <?php if ($category['id'] == 2) { ?>
                                    <i class="ln ln-icon-Bar-Chart"></i>
                                <?php }
                                if ($category['id'] == 3) { ?>
                                    <i class="ln ln-icon-Car-3"></i>
                                <?php }
                                if ($category['id'] == 4) { ?>
                                    <i class="ln ln-icon-Worker"></i>
                                <?php }
                                if ($category['id'] == 5) { ?>
                                    <i class="ln ln-icon-Brush"></i>
                                <?php }
                                if ($category['id'] == 13) { ?>
                                    <i class="ln ln-icon-Student-Female"></i>
                                <?php }
                                if ($category['id'] == 14) { ?>
                                    <i class="ln ln-icon-Medical-Sign"></i>
                                <?php }
                                if ($category['id'] == 15) { ?>
                                    <i class="ln ln-icon-Plates"></i>
                                <?php }
                                if ($category['id'] == 16) { ?>
                                    <i class="ln ln-icon-Handshake"></i>
                                <?php }
                                if ($category['id'] == 23) { ?>
                                    <i class="ln ln-icon-Medical-Sign"></i>
                                <?php }
                                if ($category['id'] == 25) { ?>
                                    <i class="ln ln-icon-Brush"></i>
                                <?php }
                                if ($category['id'] == 40) { ?>
                                    <i class="ln ln-icon-Worker"></i>
                                <?php } ?>
                                <p class="-dark -size-20"><?php echo $category['name']; ?></p>
                            </div>
                            <div class="item__flex--right">
                                <span class="-size-32">3</span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <a href="pages/all_category.php" class="btn btn--all">Tất cả loại công việc</a>
        </div>
        <hr class="hr">
        <div class="container">
            <div class="row pb-7">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 jobs">
                    <h2 class="pt-5 mt-5 text__headline -bold-400 -dark -size-25 mb-5">
                        Recent Jobs
                    </h2>
                    <?php
                    $sql2 = "SELECT jobs.*, city.city_name as name_city, company.name as name_company FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id ORDER BY jobs.id DESC LIMIT 5";
                    $jobs = getData($sql2);
                    ?>
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
                        ?>
                        ">
                            <a href="pages/page_detail.php?job_id=<?php echo $job['id']; ?>&category_id=<?php echo $job['category_id']; ?>" class="d-flex">
                                <div class="jobs__item--img">
                                    <img src="<?php echo $job['images']; ?>" class="w-100" alt>
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
                    <a href="pages/categories.php" class="btn btn--all"><i class="fas fa-plus-circle pe-2"></i> Browse Jobs</a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 slider">
                    <h2 class="pt-5 mt-5 text__headline -bold-400 -dark -size-25 mb-5">
                        Featured Jobs
                    </h2>
                    <div class="single-item jobs" data-slick='{"slidesToShow": 1, "slidesToScroll": 1}'>
                        <?php foreach ($jobs as $job) { ?>
                            <div class="jobs__item">
                                <a href="pages/page_detail.php?job_id=<?php echo $job['id']; ?>" class="d-flex flex-column">
                                    <div class="w-100 jobs__item--text">
                                        <h6 class="-size-15 -dark">
                                            <?php echo $job['title']; ?>
                                            <?php
                                            if ($job['full_time'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 mt-2\">Full Time</button>";
                                            }
                                            if ($job['internship'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 mt-2\">Internship</button>";
                                            }
                                            if ($job['temporary'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 mt-2\">Temporary</button>";
                                            }
                                            if ($job['freelance'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 mt-2\">Freelance</button>";
                                            }
                                            if ($job['part_time'] == 1) {
                                                echo "<button class=\"btn btn--transparent ms-2 mt-2\">Part time</button>";
                                            }
                                            ?>
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
                                    <button class="btn--all">
                                        Apply For This Job
                                    </button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="content__bg__dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <h4 class="text__headline -size-30 text-white">
                            Explore a faster, easier, and better job search
                        </h4>
                        <ul class="bg__dark__list">
                            <li class="bg__dark__list--item">
                                <i class="fas fa-check"></i>
                                Unmatched quality of remote, hybrid, and
                                flexible jobs
                            </li>
                            <li class="bg__dark__list--item">
                                <i class="fas fa-check"></i>
                                Premium skills tests, remote courses, career
                                coaching, and more
                            </li>
                            <li class="bg__dark__list--item">
                                <i class="fas fa-check"></i>
                                Unmatched quality of remote, hybrid, and
                                flexible jobs
                            </li>
                        </ul>
                        <a href="pages/categories.php" class="btn m-0 btn--all btn--bgdark">Browse Jobs</a>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12 position-relative">
                        <div class="bg__dark__img">
                            <img width="100%" src="./images/bg_sub_bg-section2.jpg" alt>
                            <img class="img__sub__left" src="./images/img_sub_bg-section1.jpg" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content__slider pt-5">
            <h2 class="pt-5 text-center text__headline -bold-500 -dark -size-30">
                What Our Users Say <img src="./images/haha.svg" width="20px" height="20px" alt="😍">
            </h2>
            <p class="text-center text__headline -gray -size-20 -bold-300">Check
                honest reviews from our customers!</p>
            <div class="center" data-slick='{"slidesToShow": 3, "slidesToScroll": 1}'>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-01.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-02.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-03.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-01.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-02.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr mt-5">
        <h2 class="pt-5 text-center text__headline -bold-400 -dark -size-25">
            Our Blog
        </h2>
        <p class="text-center mb-5 pb-5 text__headline -gray -size-20 -bold-300">
            See how you can up your career status
        </p>
        <div class="container mb-5 pb-5">
            <div class="row">
                <div class="col-md-4 col-sm-16 col-12 our__block">
                    <a href="#" class="our__block--border">
                        <div class="our__block--img">
                            <img src="./images/our_blog1.jpg" alt class="w-100">
                            <span><i class="fa-solid fa-share"></i></span>
                        </div>
                        <div class="p-5">
                            <div class="our__block--title text__headline -size-20 mb-4">
                                11 Tips to Help You Get New Clients Through Cold
                                Calling
                            </div>
                            <div class="our__block--day mb-4 text__headline -gray -size-15">
                                October 25, 2015
                            </div>
                            <div class="our__block--text text__headline -gray -size-14">
                                Objectively innovate empowered manufactured products
                                whereas parallel platforms. Holisticly predominate
                                extensible testing procedures for reliable
                            </div>
                            <button href="#" class="btn ms-0 btn--all">Read More</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-16 col-12 our__block">
                    <a href="#" class="our__block--border">
                        <div class="our__block--img">
                            <img src="./images/our_blog2.jpg" alt class="w-100">
                            <span><i class="fa-solid fa-share"></i></span>
                        </div>
                        <div class="p-5">
                            <div class="our__block--title text__headline -size-20 mb-4">
                                How to “Woo” a Recruiter and Land Your Dream Job
                            </div>
                            <div class="our__block--day mb-4 text__headline -gray -size-14">
                                October 25, 2015
                            </div>
                            <div class="our__block--text text__headline -gray -size-15">
                                Collaboratively administrate empowered markets via
                                plug-and-play networks. Dynamically procrastinate
                                B2C users after installed base benefits.
                            </div>
                            <button href="#" class="btn ms-0 btn--all">Read More</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-16 col-12 our__block">
                    <a href="#" class="our__block--border">
                        <div class="our__block--img">
                            <img src="./images/our_blog3.jpg" alt class="w-100">
                            <span><i class="fa-solid fa-share"></i></span>
                        </div>
                        <div class="p-5">
                            <div class="our__block--title text__headline -size-20 mb-4">
                                Hey Job Seeker, It’s Time To Get Up And Get Hired
                            </div>
                            <div class="our__block--day mb-4 text__headline -gray -size-14">
                                October 25, 2015
                            </div>
                            <div class="our__block--text text__headline -gray -size-15">
                                One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his
                            </div>
                            <btn href="#" class="btn ms-0 btn--all">Read More</btn>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <?php
    require_once('./footer.php');
    ?>
</body>

</html>