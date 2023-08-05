<?php
session_start();
require_once('../../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../../head.php');
$selected = "selected";
if (isset($_GET['skills'])) {
    $skills = $_GET['skills'];
}
?>

<body>
    <!-- header -->
    <?php
    require_once('../../header.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <section class="content categories">
        <div class="bg-light">
            <div class="container">
                <div class="categories__block">
                    <h3 class="categories__title text__headline -bold-400 -size-25">
                        Tìm Ứng Viên
                    </h3>
                    <p class="categories__text">
                        <a href="/index.php" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Tìm ứng viên</span>
                    </p>
                </div>
            </div>
        </div>
        <?php
        $sql_conditions = "WHERE 1 AND candidate = 1 "; // điều kiện where 1 là điều kiện luôn đúng
        $param = '';
        if (isset($_GET['skills']) && strlen($_GET['skills'])) {
            $sql_conditions .= " AND skills LIKE '%" . $_GET['skills'] . "%' ";
            $param .= '&skills=' . $_GET['skills'];
        }
        if (isset($_GET['city_id']) && strlen($_GET['city_id'])) {
            $sql_conditions .= " AND city_id = " . $_GET['city_id'] . " ";
            $param .= '&city_id=' . $_GET['city_id'];
        }
        if (isset($_GET['category_id']) && strlen($_GET['category_id'])) {
            $sql_conditions .= " AND users.category_id = " . $_GET['category_id'] . " ";
            $param .= '&category_id=' . $_GET['category_id'];
        }

        $sql2 = "SELECT COUNT(*) as total FROM users ";
        $sql2 .= $sql_conditions;

        $total = getData($sql2);
        $total = $total[0]['total'];
        $num_per_page = 4;
        $total_page = ceil($total / $num_per_page);
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $start = ($page - 1) * $num_per_page;

        $sql2 = "SELECT users.*, city.city_name as name_city, categories.id as category_id FROM users LEFT JOIN city ON city.id = users.city_id LEFT JOIN categories ON categories.id = users.category_id ";
        $sql2 .= $sql_conditions;
        $sql2 .= "ORDER BY users.id DESC LIMIT $start,$num_per_page";
        $users = getData($sql2);
        // print_r($users);die;
        ?>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="row">
                <div class="col-md-8 col-ms-12 col-12 jobs">
                    <?php if (count($users) < 1) { ?>
                        <span class="text__headline -size-16">Không Tìm thấy</span>
                    <?php } ?>
                    <?php foreach ($users as $user) { ?>
                        <div class="jobs__item">
                            <a href="view_resumer_candidate.php?user_id=<?php echo $user['id']; ?>" class="d-flex justify-content-start">
                                <div class="image_avatar">
                                    <img src="<?php echo $user['avatar']; ?>" class="w-100" alt="">
                                </div>
                                <div class="jobs__item--text">
                                    <h6 class="-size-15 -dark"><?php echo $user['name']; ?></h6>
                                    <ul class="d-flex jobs__item--icon">
                                        <?php if (!empty($user['name_city'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Map2"></i> <?php echo $user['name_city']; ?>
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($user['skills'])) { ?>
                                            <li class="jobs__itemsub">
                                                Skill: <?php echo $user['skills']; ?>
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($user['profession'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="fas fa-briefcase"></i> <?php echo $user['profession']; ?>
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($user['phone'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="fas fa-phone"></i> <?php echo $user['phone']; ?>
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($user['user_email'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="far fa-envelope"></i> <?php echo $user['user_email']; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
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
                    <form action="search_candidate.php" method="get" class="search__category">
                        <div class="mb-5">
                            <h5 class="text__headline -size-20 -bold-400">Kỹ Năng</h5>
                            <input type="text" class="form-control search__category--keywords" name="skills" value="<?php echo (isset($_GET['skills'])) ? $skills : ""; ?>" placeholder="Kỹ Năng">
                        </div>
                        <div class="mb-5 search__category--select">
                            <h5 class="text__headline -size-20 -bold-400">Tỉnh/Thành Phố</h5>
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
                                    <option value="<?php echo $city['id']; ?>" <?php if (isset($_GET['city_id'])) {
                                                                                    if ($city_id == $city['id']) {
                                                                                        echo $selected;
                                                                                    }
                                                                                } ?>><?php echo $city['city_name']; ?></option>
                                <?php } ?>
                            </select>
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
                        <div class="mb-5 d-flex">
                            <button class="btn btn--all mt-0 me-0" type="submit">Tìm Ứng Viên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- footer -->
    <?php
    require_once('../../footer.php');
    ?>
    <!-- end footer -->
</body>

</html>