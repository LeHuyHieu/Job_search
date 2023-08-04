<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Contact</title>";
require_once('../head.php');
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
                        Tất cả loại công việc
                    </h3>
                    <p class="categories__text">
                        <a href="/index.php" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Loại công việc</span>
                    </p>
                </div>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM categories where parent_id = 0";
        $categories_parent = getData($sql);
        $sql2 = "SELECT * FROM categories where parent_id != 0";
        $categories_child = getData($sql2);
        // print_r($categories_parent);
        // print_r($categories_child);die;
        ?>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <?php foreach ($categories_parent as $category) { ?>
                        <div class="content__categories">
                            <a class="link" href="/pages/categories.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-8 col-sm-6 col-12">
                    <div class="content__categories">
                        <div class="row">
                            <?php foreach ($categories_child as $category2) { ?>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <a class="link" href="/pages/categories.php?category_id=<?php echo $category2['id']; ?>"><?php echo $category2['name']; ?></a>
                                </div>
                            <?php } ?>
                        </div>
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