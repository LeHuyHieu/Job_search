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
        <div class="left">
        <div class="left__position">
                <div class="left__block">
                    <h5 class="title__profile">Main</h5>
                    <ul class="list__profile">
                        <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-chart-line"></i> Dashboard</a></li>
                        <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-comment-alt"></i> Messages </a></li>
                        <li class="item__profile"><a href="/pages/bookmark.php" class="link__profile"><i class="fas fa-bookmark"></i> Bookmarks</a></li>
                        <li class="item__profile"><a href="/pages/candidate/manage_jobalert.php" class="link__profile"><i class="fas fa-bell"></i> Job Alerts <span class="notification">1</span></a></li>
                    </ul>
                </div>
                <?php if ($_SESSION['user']['candidate']) { ?>
                    <div class="left__block">
                        <h5 class="title__profile">Candidate</h5>
                        <ul class="list__profile">
                            <li class="item__profile"><a href="#" class="link__profile"><i class="fa-solid fa-rectangle-list"></i> Manage Resumer</a></li>
                            <li class="item__profile"><a href="/pages/candidate/add_resumer.php" class="link__profile"><i class="fa-solid fa-square-plus"></i> Add Resume</a></li>
                        </ul>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['user']['employer'] == 1) { ?>
                    <div class="left__block">
                        <h5 class="title__profile">Employer</h5>
                        <ul class="list__profile">
                            <li class="item__profile"><a href="/pages/employer/managae_job.php" class="link__profile color__green"><i class="fa-solid fa-rectangle-list"></i> Manage Jobs</a></li>
                            <li class="item__profile"><a href="/pages/employer/submit_job.php" class="link__profile"><i class="fa-solid fa-square-plus"></i> Submit Jobs </a></li>
                            <li class="item__profile"><a href="/pages/employer/manage_companies.php" class="link__profile"><i class="fa-solid fa-rectangle-list"></i> Manage Companies</a></li>
                            <li class="item__profile"><a href="/pages/employer/add_company.php" class="link__profile"><i class="fa-solid fa-square-plus"></i> Add Company <span class="notification">1</span></a></li>
                        </ul>
                    </div>
                <?php } ?>
                <div class="left__block">
                    <h5 class="title__profile">Account</h5>
                    <ul class="list__profile">
                        <li class="item__profile"><a href="/pages/profile.php" class="link__profile"><i class="fas fa-user-circle"></i> My Profile</a></li>
                        <li class="item__profile"><a href="/process_logout.php" class="link__profile"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">Thêm công ty</h3>
                    <p class="link__home"><a href="/index.php">Trang chủ <i class="fas fa-angle-right"></i> </a>Thêm công ty</p>
                    <div class="col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail d-flex justify-content-between align-items-center">
                                <span>Thêm mới công việc</span>
                            </div>
                            <form action="./process_add.php" method="post" class="row form__block p-5" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>">
                                <input type="hidden" name="job_id" value="">
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Tên công việc</label>
                                            <input type="text" value="" name="title" placeholder="Tên công việc">
                                        </div>
                                    </div>
                                    <?php 
                                    $sql = "SELECT * FROM company";
                                    $companies = getData($sql);
                                    ?>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span>Chọn công ty</span>
                                            <select name="company_id" id="" class="form-select chosen-select" data-placeholder="Chọn công ty">
                                                <?php foreach ($companies as $company) { ?>
                                                    <option value="<?php echo $company['id']; ?>"><?php echo $company['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $sql = "SELECT * FROM city";
                                $citys = getData($sql);
                                ?>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <span>Chọn tỉnh</span>
                                            <select name="city_id" id="" class="form-select chosen-select" data-placeholder="Chọn tỉnh">
                                                <?php foreach ($citys as $city) { ?>
                                                    <option value="<?php echo $city['id']; ?>"><?php echo $city['city_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span>Loại công việc</span>
                                            <select name="type_job[]" multiple class="form-select chosen-select" data-placeholder="Chọn loại công việc">
                                                <option value="1">Full time</option>
                                                <option value="2">Freelance</option>
                                                <option value="3">Internship</option>
                                                <option value="4">Part Time</option>
                                                <option value="5">Temporary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile avt">
                                            <span>Logo công việc</span><br>
                                            <label for="avt" class="label_cursor">
                                                <span class="browse"><i class="fas fa-upload"></i> Browse</span>
                                                <img id="blah" alt="your image" src="/images/placeholder.png" width="100" height="100" />
                                            </label>
                                            <input type="file" id="avt" name="job_logo" value="" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                    <?php 
                                    $sql = "SELECT * FROM categories";
                                    $categories = getData($sql);
                                    ?>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span>Chọn nghành nghề</span>
                                            <select name="category_id" id="" class="form-select chosen-select" data-placeholder="Chọn nghành nghề">
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Lương tối thiểu</label>
                                            <input type="text" value="" name="salary_from" required placeholder="Lương tối thiểu">
                                        </div>
                                        <div class="data__profile">
                                            <label for="">Ngày hết hạn</label>
                                            <input type="date" value="" name="expiration_date" required placeholder="Ngày hết hạn">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Lương tối đa</label>
                                            <input type="text" value="" name="salary_to" required placeholder="Lương tối đa">
                                        </div>
                                    </div>
                                </div>
                                <div class="data__profile">
                                    <label for="">Mô tả công việc</label>
                                    <textarea rows="7" required class="summernote" name="description"></textarea>
                                </div>
                                <div class="data__profile">
                                    <label for="">Nội dung về công ty</label>
                                    <textarea rows="7" required class="summernote" name="content"></textarea>
                                </div>
                                <button class="btn btn--all m-0 ms-3" type="submit" name="add_job" id="">Thêm</button>
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