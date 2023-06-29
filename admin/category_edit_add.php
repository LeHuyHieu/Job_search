<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
echo "<title>Categories admin</title>";
require_once('../head.php');
if (isset($_GET['category_id'])) {
    $get_category_id = $_GET['category_id'];
}
if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title mb-5">Add Job</h1>
        <div class="container">
            <div class="row">
                <div class="col-4 menu__left">
                    <?php require_once('../admin/menu.php'); ?>
                </div>
                <div class="col-8 content__right">
                    <form action="category_process.php" method="post" class="form__block" enctype="multipart/form-data">
                        <div class="input__box--check mb-5">
                            <?php
                            if (isset($get_id)) {
                                $sql = "SELECT * FROM categories WHERE id = $get_id";
                                $categories = getData($sql);
                            }
                            $sql2 = "SELECT * FROM categories";
                            $category_1 = getData($sql2);
                            ?>
                            <select name="select_id" id="" class="chosen-select select__admin">
                                <option value="0">Vui lòng chọn!</option>
                                <?php foreach ($category_1 as $category_item) { ?>
                                    <?php if (isset($get_id)) {
                                        if ($category_item['parent_id'] == 0) { ?>
                                            <option name="<?php echo $category_item['name']; ?>" value="<?php echo $category_item['id']; ?>" <?php if ($get_category_id != 0 && $get_category_id == $category_item['id']) {
                                                                                                                                                    echo 'selected';
                                                                                                                                                } ?>>
                                                <?php echo $category_item['name']; ?>
                                            </option>
                                    <?php }
                                    } ?>
                                    <?php if (!isset($get_id)) { ?>
                                        <?php if ($category_item['parent_id'] == 0) {
                                            echo '<option name="name" value=" ' . $category_item['id'] .' ">' . $category_item['name'] . '</option>';
                                        } ?>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input__box mb-5">
                            <?php if (isset($get_id)) {
                                foreach ($categories as $category2) { ?>
                                    <input type="hidden" name="id_category" value="<?php echo $category2['id']; ?>">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name_category" value="<?php echo $category2['name']; ?>" id="" />
                            <?php }
                            } ?>
                            <?php if (!isset($get_id)) { ?>
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name_category" value="" id="" />
                            <?php } ?>
                        </div>
                        <button class="btn btn--submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/code.jquery.com_ui_1.12.1_jquery-ui.js"></script>
    <script src="/js/numscroller-1.0.js"></script>
    <!-- bootstrap 5 -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- summernote -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_summernote_0.8.20_summernote-bs5.min.js"></script>
    <!-- slick slider -->
    <script src="/js/slick.min.js"></script>
    <!-- chosen -->
    <script src="/js/chosen.jquery.min.js"></script>
    <script src="/js/chosen.proto.min.js"></script>
    <!-- typed js -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_typed.js_2.0.10_typed.min.js"></script>
    <!-- scrollreveal js -->
    <script src="/js/unpkg.com_scrollreveal@4.0.9_dist_scrollreveal.js"></script>
    <!-- main js -->
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>