<?php
session_start();
require_once('../../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../../head.php');
$selected = "selected";
if (isset($_GET['name'])) {
    $name = $_GET['name'];
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
                        Tìm Công Ty
                    </h3>
                    <p class="categories__text">
                        <a href="/index.php" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Tìm Công Ty</span>
                    </p>
                </div>
            </div>
        </div>
        <?php
        $sql_conditions = "WHERE 1 "; // điều kiện where 1 là điều kiện luôn đúng
        $param = '';
        if (isset($_GET['name']) && strlen($_GET['name'])) {
            $sql_conditions .= " AND company.name LIKE '%" . $_GET['name'] . "%' ";
            $param .= '&name=' . $_GET['name'];
        }
        if (isset($_GET['city_id']) && strlen($_GET['city_id'])) {
            $sql_conditions .= " AND city_id = " . $_GET['city_id'] . " ";
            $param .= '&city_id=' . $_GET['city_id'];
        }
        if (isset($_GET['category_id']) && strlen($_GET['category_id'])) {
            $sql_conditions .= " AND company.category_id = " . $_GET['category_id'] . " ";
            $param .= '&category_id=' . $_GET['category_id'];
        }

        $sql2 = "SELECT COUNT(*) as total FROM company ";
        $sql2 .= $sql_conditions;

        $total = getData($sql2);
        $total = $total[0]['total'];
        $num_per_page = 4;
        $total_page = ceil($total / $num_per_page);
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $start = ($page - 1) * $num_per_page;

        $sql2 = "SELECT company.*, city.city_name as name_city, categories.id as category_id FROM company LEFT JOIN city ON city.id = company.city_id LEFT JOIN categories ON categories.id = company.category_id ";
        $sql2 .= $sql_conditions;
        $sql2 .= "ORDER BY company.id DESC LIMIT $start,$num_per_page";
        $companys = getData($sql2);
        // print_r($users);die;
        ?>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="row">
                <div class="col-md-8 col-ms-12 col-12 jobs">
                    <?php if (count($companys) < 1) { ?>
                        <span class="text__headline -size-16">Không Tìm thấy công ty</span>
                    <?php } ?>
                    <?php foreach ($companys as $company) { ?>
                        <div class="jobs__item">
                            <a href="../detail_company.php?company_id=<?php echo $company['id']; ?>" class="d-flex justify-content-start">
                                <div class="image_logo">
                                    <img src="<?php echo $company['images']; ?>" class="w-100" alt="">
                                </div>
                                <div class="jobs__item--text">
                                    <h6 class="-size-15 -dark"><?php echo $company['name']; ?></h6>
                                    <ul class="d-flex jobs__item--icon">
                                        <?php if (!empty($company['contact_fb'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="fab fa-facebook-f"></i>Facebook
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($company['contact_tw'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="fab fa-twitter"></i> Twitter
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($company['contact_phone'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="fas fa-phone"></i> <?php echo $company['contact_phone']; ?>
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($company['contact_email'])) { ?>
                                            <li class="jobs__itemsub">
                                                <i class="fas fa-envelope"></i> <?php echo $company['contact_email']; ?>
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
                    <form action="./list_company.php" method="get" class="search__category">
                        <div class="mb-5">
                            <h5 class="text__headline -size-20 -bold-400">Tên công ty</h5>
                            <input type="text" class="form-control search__category--keywords" name="name" value="<?php echo (isset($_GET['name'])) ? $name : ""; ?>" placeholder="Tên công ty">
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
                            <button class="btn btn--all mt-0 me-0" type="submit">Tìm Công Ty</button>
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