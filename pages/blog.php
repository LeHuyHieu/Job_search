<?php
session_start();
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../head.php');
$selected = "selected";
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
?>

<body>
    <!-- header -->
    <?php
    require_once('../header.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <section class="content categories">
        <div class="bg-light">
            <div class="container">
                <div class="categories__block">
                    <h3 class="categories__title text__headline -bold-400 -size-25">
                        Blog
                    </h3>
                    <p class="categories__text">
                        <a href="/index.php" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Blog</span>
                    </p>
                </div>
            </div>
        </div>
        <?php
        $sql_conditions = "WHERE 1 "; // điều kiện where 1 là điều kiện luôn đúng
        $param = '';
        if (isset($_GET['title']) && strlen($_GET['title'])) {
            $sql_conditions .= " AND blog.title LIKE '%" . $_GET['title'] . "%' ";
            $param .= '&title=' . $_GET['title'];
        }

        $sql2 = "SELECT COUNT(*) as total FROM blog ";
        $sql2 .= $sql_conditions;

        $total = getData($sql2);
        $total = $total[0]['total'];
        $num_per_page = 4;
        $total_page = ceil($total / $num_per_page);
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $start = ($page - 1) * $num_per_page;

        $sql2 = "SELECT * FROM blog ";
        $sql2 .= $sql_conditions;
        $sql2 .= "ORDER BY blog.id DESC LIMIT $start,$num_per_page";
        $blogs = getData($sql2);
        // print_r($users);die;
        ?>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="row">
                <div class="col-md-8 col-ms-12 col-12 jobs">
                    <?php if (count($blogs) < 1) { ?>
                        <span class="text__headline -size-16">Không Tìm thấy tin</span>
                    <?php } ?>
                    <?php foreach ($blogs as $blog) { ?>

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
                    <form action="./list_company.php" method="get" class="search__category mb-5">
                        <h5 class="text__headline -size-20 -bold-400 -gray">Tiêu đề tin tức</h5>
                        <div class="bg-light p-5">
                            <div class="mb-5">
                                <input type="text" class="form-control search__category--keywords" name="title" value="<?php echo (isset($_GET['title'])) ? $title : ""; ?>" placeholder="Tiêu đề tin tức">
                            </div>
                            <div class="mb-0 d-flex">
                                <button class="btn btn--all w-100 m-0" type="submit">Tìm tin tức</button>
                            </div>
                        </div>
                    </form>
                    <h5 class="text__headline -size-20 -bold-400 -gray">Bạn có câu hỏi nào không?</h5>
                    <div class="bg-light p-5 mb-5">
                        <p class="text__headline -size-15 -bold-400 -gray">Nếu bạn có câu hỏi nào xin vui lòng bấn vào nút bên dưới</p>
                        <a href="./contact.php" class="btn btn--all w-100 mt-0"><i class="fas fa-envelope me-3"></i> Đặt câu hỏi</a>
                    </div>
                    <h5 class="text__headline -size-20 -bold-400 -gray">Thông tin về chúng tôi</h5>
                    <div class="bg-light p-5 mb-5">
                        <p class="text__headline -size-15 -bold-400 -gray">Morbi eros bibendum lorem ipsum dolor pellentesque pellentesque bibendum.</p>
                        <p class="text__headline -size-15 -bold-400 -gray">45 Park Avenue, Apt. 303 <br> New York, NY 10016</p>
                        <ul class="list text__headline -size-15 -bold-400 -gray">
                            <li><i class="fas fa-phone"></i> +48 880 440 110</li>
                            <li><i class="fas fa-envelope me-3"></i> mail@example.com</li>
                            <li><i class="fas fa-link"></i> www.example.com</li>
                        </ul>
                    </div>
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