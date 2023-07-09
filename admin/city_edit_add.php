<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
echo "<title>Categories admin</title>";
require_once('../head.php');
if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title mb-5">Add City</h1>
        <div class="container">
            <div class="row">
                <div class="col-4 menu__left">
                    <?php require_once('../admin/menu.php'); ?>
                </div>
                <div class="col-8 content__right">
                    <form action="city_process.php" method="post" class="form__block mw-800" enctype="multipart/form-data">
                        <?php 
                        if(isset($get_id)) {
                            $sql2 = "SELECT * FROM city WHERE id = $get_id";
                            $city_table = getData($sql2);
                        }
                        ?>
                        <div class="input__box mb-5">
                            <?php if (isset($get_id)) {
                                foreach ($city_table as $city) { ?>
                                    <input type="hidden" name="id_city" value="<?php echo $city['id']; ?>">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="city_name" value="<?php echo $city['city_name']; ?>" id="" />
                            <?php }
                            } ?>
                            <?php if (!isset($get_id)) { ?>
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="city_name" value="" id="" />
                            <?php } ?>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn--submit" type="submit"><i class="fas fa-save"></i> Lưu</button>
                        <button class="btn btn--submit ms-5" onclick="history.back()"><i class="fas fa-reply"></i> Quay lại </button>
                        </div>
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
    <!-- sweetalert2 -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_limonte-sweetalert2_11.7.12_sweetalert2.all.min.js"></script>
    <!-- typed js -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_typed.js_2.0.10_typed.min.js"></script>
    <!-- scrollreveal js -->
    <script src="/js/unpkg.com_scrollreveal@4.0.9_dist_scrollreveal.js"></script>
    <!-- main js -->
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>