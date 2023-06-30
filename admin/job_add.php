<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
echo "<title>Job admin</title>";
require_once('../head.php');
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
                    <form action="job_process.php" method="post" class="form__block" enctype="multipart/form-data">
                        <div class="input__box--check mb-5">
                            <span class="me-5">
                                <input type="checkbox" name="full_time" value="1" id="full_time">
                                <label for="full_time">Full time</label>
                            </span>
                            <span class="me-5">
                                <input type="checkbox" name="internship" value="1" id="internship">
                                <label for="internship">Internship</label>
                            </span>
                            <span class="me-5">
                                <input type="checkbox" name="temporary" value="1" id="temporary">
                                <label for="temporary">Temporary</label>
                            </span>
                            <span class="me-5">
                                <input type="checkbox" name="freelance" value="1" id="freelance">
                                <label for="freelance"><span class="fa-layers-counter"></span>reelance</label>
                            </span>
                            <span class="me-5">
                                <input type="checkbox" name="part_time" value="1" id="part_time">
                                <label for="part_time">Part time</label>
                            </span>
                            <span>
                                <input type="checkbox" name="is_public" value="1" id="is_public">
                                <label for="is_public">Is public</label>
                            </span>
                            <?php
                            $sql = "SELECT * FROM categories";
                            $categories = getData($sql);
                            ?>
                            <select name="job_category_id" id="" class="chosen-select select__admin w-25">
                                <option value="0">Vui lòng chọn!</option>
                                <?php foreach ($categories as $category) { ?>
                                    <?php if ($category['parent_id'] != 0) { ?>
                                        <option value="<?php echo $category['id']; ?>">---<?php echo $category['name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="d-flex mb-5">
                            <div class="input__box w-50 me-4">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="" id="" />
                            </div>
                            <?php
                            $sql3 = "SELECT * FROM city";
                            $city_table = getData($sql3);
                            ?>
                            <div class="input__box input__box--left me-4 w-25">
                                <select name="city_id" class="chosen-select select__admin" id="">
                                    <option value="0">Vui lòng chọn !</option>
                                    <?php foreach ($city_table as $city) { ?>
                                        <option value="<?php echo $city['id']; ?>"><?php echo $city['city_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php
                            $sql2 = "SELECT * FROM company";
                            $company = getData($sql2);
                            ?>
                            <div class="input__box input__box--left w-25">
                                <select name="company_id" class="chosen-select select__admin" id="">
                                    <option value="0">Vui lòng chọn !</option>
                                    <?php foreach ($company as $company_item) { ?>
                                        <option value="<?php echo $company_item['id']; ?>"><?php echo $company_item['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex mb-5">
                            <div class="input__box w-50 me-3">
                                <label for="" class="form-label">Salary from:</label>
                                <input type="text" class="form-control" name="salary_from" value="" id="" />
                            </div>
                            <div class="input__box w-50 ms-3">
                                <label for="" class="form-label">Salary to:</label>
                                <input type="text" class="form-control" name="salary_to" value="" id="" />
                            </div>
                        </div>
                        <div class="input__box mb-5">
                            <label for="" class="form-label">Expiration date:</label>
                            <input type="date" class="form-control" name="expiration_date" value="" id="" />
                        </div>
                        <div class="input__box mb-5">
                            <label for="" class="form-label">Description:</label>
                            <textarea type="text" rows="7" class="form-control" name="description" value="" id=""></textarea>
                        </div>
                        <div class="input__box mb-5">
                            <label for="" class="form-label">Content:</label>
                            <textarea type="text" rows="10" class="form-control" name="content" value="" id="content"></textarea>
                        </div>
                        <div class="input__box mb-5">
                            <span>Image</span>
                            <div class="input__box--img">
                                <label for="image" class="form-label">Choose File</label>
                                <input type="file" id="image" name="images" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="" value="" id="" />
                                <img id="blah" alt="your image" src="/images/1x1.png" width="100" height="100" />
                            </div>
                        </div>
                        <button class="btn btn--submit" type="submit"><i class="fas fa-save"></i> Thêm </button>
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