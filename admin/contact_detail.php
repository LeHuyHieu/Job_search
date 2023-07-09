<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
echo "<title>Job admin</title>";
require_once('../head.php');
?>

<?php
$get_id = $_GET['id'];
$sql = "SELECT * FROM contact WHERE id = $get_id";
$contacts = getData($sql);
// print_r($jobs);die;
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title mb-5">Contact Detail</h1>
        <div class="container">
            <div class="row">
                <div class="col-4 menu__left">
                    <?php require_once('../admin/menu.php'); ?>
                </div>
                <div class="col-8 content__right">
                    <form action="contact_process.php" method="post" class="form__block mw-800" enctype="multipart/form-data">
                        <div class="mb-5">
                            <input type="checkbox" name="watched" value="1" <?php echo (isset($_GET['watched']) && $_GET['watched'] == 1) ? "checked" : ""; ?> id="watched" >
                            <label for="watched" style="cursor: pointer;">Đã xem</label>
                        </div>
                        <?php foreach ($contacts as $contact) { ?>
                            <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                            <div class="d-flex mb-5">
                                <div class="input__box w-50 me-3">
                                    <label for="" class="form-label">User Name:</label>
                                    <input type="text" class="form-control" disabled name="user_name" value="<?php echo $contact['user_name']; ?>" id="" />
                                </div>
                                <div class="input__box w-50 ms-3">
                                    <label for="" class="form-label">User Email:</label>
                                    <input type="text" class="form-control" disabled name="user_email" value="<?php echo $contact['user_email']; ?>" id="" />
                                </div>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Content:</label>
                                <textarea type="text" rows="10" class="form-control" style="resize: none;" disabled name="content" id="content"><?php echo $contact['user_content']; ?></textarea>
                            </div>
                        <?php } ?>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn--submit" type="submit"><i class="fas fa-save"></i> Lưu</button>
                            <a class="btn btn--submit ms-5" onclick="history.back()"><i class="fas fa-reply"></i> Quay lại </a>
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