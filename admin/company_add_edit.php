<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
echo "<title>Company admin</title>";
require_once('../head.php');
if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
}
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title mb-5">Add Company</h1>
        <div class="container">
            <div class="row">
                <div class="col-4 menu__left">
                    <?php require_once('../admin/menu.php'); ?>
                </div>
                <div class="col-8 content__right">
                    <form action="company_process.php" method="post" class="form__block" enctype="multipart/form-data">
                        <?php
                        if (isset($get_id)) {
                            $sql2 = "SELECT * FROM company WHERE id = $get_id";
                            $company_table = getData($sql2);
                        }
                        ?>
                        <?php if (isset($get_id)) {
                            foreach ($company_table as $company) { ?>
                                <div class="input__box mb-5">
                                    <input type="hidden" name="id_company" value="<?php echo $company['id']; ?>">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="company_name" value="<?php echo $company['name']; ?>" id="" />
                                </div>
                                <div class="flex__grid">
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Contact website <i class="fas fa-link"></i></label>
                                    <input type="text" class="form-control" name="company_web" value="<?php echo $company['contact_web']; ?>" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Contact email <i class="fas fa-envelope"></i></label>
                                    <input type="text" class="form-control" name="company_email" value="<?php echo $company['contact_email']; ?>" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Contact phone <i class="fas fa-phone"></i></label>
                                    <input type="text" class="form-control" name="company_phone" value="<?php echo $company['contact_phone']; ?>" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Facebook <i class="fab fa-facebook-f"></i></label>
                                    <input type="text" class="form-control" name="company_fb" value="<?php echo $company['contact_fb']; ?>" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Twitter <i class="fab fa-twitter"></i></label>
                                    <input type="text" class="form-control" name="company_tw" value="<?php echo $company['contact_tw']; ?>" id="" />
                                </div>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="company_description" rows="7" value="<?php echo $company['description']; ?>" id=""><?php echo $company['description']; ?></textarea>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Content</label>
                                <textarea type="text" class="form-control" name="company_content" rows="10" value="<?php echo $company['content']; ?>" id=""><?php echo $company['content']; ?></textarea>
                            </div>
                            <div class="input__box mb-5">
                            <span>Image</span>
                            <div class="input__box--img">
                                <label for="image" class="form-label">Choose File</label>
                                <input type="file" id="image" name="images" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="images" value="<?php echo $company['images']; ?>" id="" />
                                <img id="blah" alt="your image" src="<?php echo $company['images']; ?>" width="100" height="100" />
                            </div>
                        <?php }
                        } ?>
                        <?php if (!isset($get_id)) { ?>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="company_name" value="" id="" />
                            </div>
                            <div class="flex__grid">
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Contact website <i class="fas fa-link"></i></label>
                                    <input type="text" class="form-control" name="company_web" value="" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Contact email <i class="fas fa-envelope"></i></label>
                                    <input type="text" class="form-control" name="company_email" value="" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Contact phone <i class="fas fa-phone"></i></label>
                                    <input type="text" class="form-control" name="company_phone" value="" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Facebook <i class="fab fa-facebook-f"></i></label>
                                    <input type="text" class="form-control" name="company_fb" value="" id="" />
                                </div>
                                <div class="input__box mb-5">
                                    <label for="" class="form-label">Twitter <i class="fab fa-twitter"></i></label>
                                    <input type="text" class="form-control" name="company_tw" value="" id="" />
                                </div>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="company_description" rows="7" value="" id=""></textarea>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Content</label>
                                <textarea type="text" class="form-control" name="company_content" rows="10" value="" id=""></textarea>
                            </div>
                            <div class="input__box mb-5">
                            <span>Image</span>
                            <div class="input__box--img">
                                <label for="image" class="form-label">Choose File</label>
                                <input type="file" id="image" name="images" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="" value="" id="" />
                                <img id="blah" alt="your image" src="/images/1x1.png" width="100" height="100" />
                            </div>
                        </div>
                        <?php } ?>
                        <button class="btn btn--submit" type="submit"><i class="fas fa-save"></i> Lưu</button>
                        <button class="btn btn--submit ms-5" onclick="history.back()"><i class="fas fa-reply"></i> Quay lại </button>
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