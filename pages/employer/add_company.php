<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
$selected = "selected";
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../../head.php');
?>

<body class="p-0 position_header">
    <?php
    require_once('../../header.php');
    ?>
    <section class="content connect__profile">
        <?php require_once('../menu_left.php'); ?>
        <div class="right mh-100">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">Thêm công ty</h3>
                    <p class="link__home"><a href="/index.php">Trang chủ <i class="fas fa-angle-right"></i> </a>Thêm công ty</p>
                    <div class="col-12">
                        <?php
                        $user_id = $_SESSION['user']['id'];
                        $sql = "SELECT * FROM company WHERE user_id = '$user_id'";
                        $companies = getData($sql);
                        $company = current($companies);
                        ?>
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail d-flex justify-content-between align-items-center">
                                <span>Thêm mới công ty</span>
                                <a class="btn btn--green" href="/pages/detail_company.php?company_id=<?php echo $company['id']; ?>">Xem chi tiết</a>
                            </div>
                            <form action="./process_add.php" method="post" class="row form__block p-5" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                                <input type="hidden" name="company_id" value="<?php echo (isset($company['id'])) ? $company['id'] : ""; ?>">
                                <div class="d-flex">
                                    <div class="flex flex__left w-100">
                                        <div class="data__profile">
                                            <label for="">Tên công ty</label>
                                            <input type="text" value="<?php echo (isset($company['name'])) ? $company['name'] : ""; ?>" name="company_name" placeholder="Tên công ty...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Khẩu hiệu</label>
                                            <input type="text" value="<?php echo (isset($company['company_tagline'])) ? $company['company_tagline'] : ""; ?>" name="company_tagline" placeholder="Khẩu hiệu công ty...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Trụ sở</label>
                                            <input type="text" value="<?php echo (isset($company['company_headquarters'])) ? $company['company_headquarters'] : ""; ?>" name="company_headquarters" placeholder="Trụ sở công ty...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-100">
                                        <div class="data__profile avt">
                                            <span>Logo công ty</span><br>
                                            <label for="avt" class="label_cursor">
                                                <span class="browse"><i class="fas fa-upload"></i> Browse</span>
                                                <img id="blah" alt="your image" src="<?php echo (isset($company['images'])) ? $company['images'] : "/images/placeholder.png"; ?>" width="100" height="" />
                                            </label>
                                            <input type="file" id="avt" name="company_logo" value="<?php echo (isset($company['images'])) ? $company['images'] : "/images/placeholder.png"; ?>" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Email công ty</label>
                                            <input type="text" value="<?php echo (isset($company['contact_email'])) ? $company['contact_email'] : ""; ?>" name="company_email" required placeholder="Email công ty...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Website công ty</label>
                                            <input type="text" value="<?php echo (isset($company['contact_web'])) ? $company['contact_web'] : ""; ?>" name="company_web" required placeholder="Website công ty...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" value="<?php echo (isset($company['contact_phone'])) ? $company['contact_phone'] : ""; ?>" name="company_phone" required placeholder="Số điện thoại...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span class="d-inline-block">Lương trung bình</span>
                                            <select name="company_average_salary" id="" class="form-select chosen-select">
                                                <option value="">Chọn lương trung bình</option>
                                                <option <?php echo (isset($company['company_average_salary']) && $company['company_average_salary'] == 1) ? "selected" : ""; ?> value="1">$15.000 - $20.000</option>
                                                <option <?php echo (isset($company['company_average_salary']) && $company['company_average_salary'] == 2) ? "selected" : ""; ?> value="2">$20.000 - $30.000</option>
                                                <option <?php echo (isset($company['company_average_salary']) && $company['company_average_salary'] == 3) ? "selected" : ""; ?> value="3">$30.000 - $40.000</option>
                                                <option <?php echo (isset($company['company_average_salary']) && $company['company_average_salary'] == 4) ? "selected" : ""; ?> value="4">$40.000 - $50.000</option>
                                                <option <?php echo (isset($company['company_average_salary']) && $company['company_average_salary'] == 5) ? "selected" : ""; ?> value="5">$50.000+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Facabook</label>
                                            <input type="text" value="<?php echo (isset($company['contact_fb'])) ? $company['contact_fb'] : ""; ?>" name="company_fb" placeholder="Facebook...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Twitter</label>
                                            <input type="text" value="<?php echo (isset($company['contact_tw'])) ? $company['contact_tw'] : ""; ?>" name="company_tw" required placeholder="Twitter...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <span class="d-inline-block">Quy mô công ty</span>
                                            <select name="company_size" id="" class="form-select chosen-select">
                                                <option value="">Chọn quy mô công ty</option>
                                                <option <?php echo (isset($company['company_size']) && $company['company_size'] == 1) ? "selected" : ""; ?> value="1">1 - 5</option>
                                                <option <?php echo (isset($company['company_size']) && $company['company_size'] == 2) ? "selected" : ""; ?> value="2">15 - 30</option>
                                                <option <?php echo (isset($company['company_size']) && $company['company_size'] == 3) ? "selected" : ""; ?> value="3">30 - 50</option>
                                                <option <?php echo (isset($company['company_size']) && $company['company_size'] == 4) ? "selected" : ""; ?> value="4">5 - 15</option>
                                                <option <?php echo (isset($company['company_size']) && $company['company_size'] == 5) ? "selected" : ""; ?> value="5">50+</option>
                                            </select>
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $categories = getData($sql);
                                        ?>
                                        <div class="data__profile">
                                            <span class="d-inline-block">Lĩnh vực công ty</span>
                                            <select name="category_id" id="" class="form-select chosen-select">
                                                <option value="0">Chọn lĩnh vực công ty</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option <?php echo (isset($company['category_id']) && $company['category_id'] == $category['id']) ? "selected" : ""; ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span class="d-inline-block">Doanh thu công ty</span>
                                            <select name="company_revenue" id="" class="form-select chosen-select">
                                                <option value="">Doanh thu công ty</option>
                                                <option <?php echo (isset($company['company_revenue']) && $company['company_revenue'] == 1) ? "selected" : ""; ?> value="1">$70.000</option>
                                                <option <?php echo (isset($company['company_revenue']) && $company['company_revenue'] == 2) ? "selected" : ""; ?> value="2">$100.000</option>
                                                <option <?php echo (isset($company['company_revenue']) && $company['company_revenue'] == 3) ? "selected" : ""; ?> value="3">$150.000</option>
                                                <option <?php echo (isset($company['company_revenue']) && $company['company_revenue'] == 4) ? "selected" : ""; ?> value="4">$300.000</option>
                                                <option <?php echo (isset($company['company_revenue']) && $company['company_revenue'] == 5) ? "selected" : ""; ?> value="5">$600.000</option>
                                                <option <?php echo (isset($company['company_revenue']) && $company['company_revenue'] == 6) ? "selected" : ""; ?> value="6">$1.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="data__profile">
                                    <label for="">Mô tả ngắn về công ty</label>
                                    <textarea rows="9" required class="form-control" name="company_description"><?php echo (isset($company['description'])) ? $company['description'] : ""; ?></textarea>
                                </div>
                                <div class="data__profile">
                                    <label for="">Nội dung về công ty</label>
                                    <textarea rows="7" required class="summernote" name="company_content"><?php echo (isset($company['content'])) ? $company['content'] : ""; ?></textarea>
                                </div>
                                <button class="btn btn--all m-0 ms-3" type="submit" name="add_compamy" id="">Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jquery -->
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/code.jquery.com_ui_1.12.1_jquery-ui.js"></script>
    <script src="/js/numscroller-1.0.js"></script>
    <!-- bootstrap 5 -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="/js/slick.min.js"></script>
    <!-- chosen -->
    <script src="/js/chosen.jquery.min.js"></script>
    <script src="/js/chosen.proto.min.js"></script>
    <!-- summernote -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_summernote_0.8.20_summernote-bs5.min.js"></script>
    <!-- sweetalert2 -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_limonte-sweetalert2_11.7.12_sweetalert2.all.min.js"></script>
    <!-- typed js -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_typed.js_2.0.10_typed.min.js"></script>
    <!-- scrollreveal js -->
    <script src="/js/unpkg.com_scrollreveal@4.0.9_dist_scrollreveal.js"></script>
    <!-- validate -->
    <script src="/js/jquery.validate.min.js"></script>
    <!-- main js -->
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>