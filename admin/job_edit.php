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
$get_category_id = $_GET['category_id'];
$sql = "SELECT * FROM jobs WHERE id = $get_id";
$jobs = getData($sql);
// print_r($jobs);die;
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title mb-5">Edit Job</h1>
        <div class="container">
            <div class="row">
                <div class="col-4 menu__left">
                    <?php require_once('../admin/menu.php'); ?>
                </div>
                <div class="col-8 content__right">
                    <form action="job_process.php" method="post" class="form__block" enctype="multipart/form-data">
                        <div class="input__box--check mb-5">
                            <?php foreach ($jobs as $job) { ?>
                                <input type="hidden" name="id" value="<?php echo $job['id']; ?>" />
                                <span class="me-5">
                                    <input type="checkbox" value="1" <?php if ($job['full_time'] == 1) {
                                                                            echo "checked";
                                                                        } ?> name="full_time" id="full_time">
                                    <label for="full_time">Full time</label>
                                </span>
                                <span class="me-5">
                                    <input type="checkbox" value="1" <?php if ($job['internship'] == 1) {
                                                                            echo "checked";
                                                                        } ?> name="internship" id="internship">
                                    <label for="internship">Internship</label>
                                </span>
                                <span class="me-5">
                                    <input type="checkbox" value="1" <?php if ($job['temporary'] == 1) {
                                                                            echo "checked";
                                                                        } ?> name="temporary" id="temporary">
                                    <label for="temporary">Temporary</label>
                                </span>
                                <span class="me-5">
                                    <input type="checkbox" value="1" <?php if ($job['freelance'] == 1) {
                                                                            echo "checked";
                                                                        } ?> name="freelance" id="freelance">
                                    <label for="freelance"><span class="fa-layers-counter"></span>reelance</label>
                                </span>
                                <span class="me-5">
                                    <input type="checkbox" value="1" <?php if ($job['part_time'] == 1) {
                                                                            echo "checked";
                                                                        } ?> name="part_time" id="part_time">
                                    <label for="part_time">Part time</label>
                                </span>
                                <span>
                                    <input type="checkbox" value="1" <?php if ($job['is_public'] == 1) {
                                                                            echo "checked";
                                                                        } ?> name="is_public" id="is_public">
                                    <label for="is_public">Is public</label>
                                </span>
                            <?php } ?>
                            <?php
                            $sql = "SELECT * FROM categories";
                            $categories = getData($sql);
                            ?>
                            <select name="job_category_id" id="" class="chosen-select select__admin">
                                <option value="0">Vui lòng chọn!</option>
                                <?php foreach ($categories as $category) { ?>
                                    <?php if ($category['parent_id'] != 0) { ?>
                                        <option name="<?php echo $category['name']; ?>" value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $get_category_id) {
                                                                                                                                    echo "selected";
                                                                                                                                } ?>>---<?php echo $category['name']; ?></option>
                                    <?php } else { ?>
                                        <option name="<?php echo $category['name']; ?>" value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $get_category_id) {
                                                                                                                                    echo "selected";
                                                                                                                                } ?>><?php echo $category['name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <?php foreach ($jobs as $job) { ?>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $job['title']; ?>" id="" />
                            </div>
                            <div class="d-flex mb-5">
                                <div class="input__box w-50 me-3">
                                    <label for="" class="form-label">Salary from:</label>
                                    <input type="text" class="form-control" name="salary_from" value="<?php echo $job['salary_from']; ?>" id="" />
                                </div>
                                <div class="input__box w-50 ms-3">
                                    <label for="" class="form-label">Salary to:</label>
                                    <input type="text" class="form-control" name="salary_to" value="<?php echo $job['salary_to']; ?>" id="" />
                                </div>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Expiration date:</label>
                                <input type="date" class="form-control" name="expiration_date" value="<?php echo $job['expiration_date']; ?>" id="" />
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Description:</label>
                                <textarea type="text" rows="7" name="description" class="form-control"><?php echo $job['description']; ?></textarea>
                            </div>
                            <div class="input__box mb-5">
                                <label for="" class="form-label">Content:</label>
                                <textarea type="text" rows="10" class="form-control" name="content" id="content"><?php echo $job['content']; ?></textarea>
                            </div>
                            <div class="input__box mb-5">
                                <span>Image</span>
                                <div class="input__box--img">
                                    <label for="image" class="form-label">Choose File</label>
                                    <input type="file" id="image" name="images" class="form-control" value="<?php echo $job['images']; ?>" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                                    <img id="blah" alt="your image" src="<?php echo $job['images']; ?>" width="100" height="100" />
                                </div>
                            </div>
                        <?php } ?>
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