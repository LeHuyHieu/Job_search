<?php require_once('../lib/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../head.php');
?>

<body class="p-0 position_header">
    <?php
    require_once('../header.php');
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
                        <li class="item__profile"><a href="/pages/job_alerts.php" class="link__profile"><i class="fas fa-bell"></i> Job Alerts <span class="notification">1</span></a></li>
                    </ul>
                </div>
                <div class="left__block">
                    <h5 class="title__profile">Candidate</h5>
                    <ul class="list__profile">
                        <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-file"></i> Manage Resumes <span class="notification">1</span></a></li>
                        <li class="item__profile"><a href="/pages/add_resumer.php" class="link__profile color__green"><i class="fas fa-file"></i> Add Resume</a></li>
                    </ul>
                </div>
                <div class="left__block">
                    <h5 class="title__profile">Account</h5>
                    <ul class="list__profile">
                        <li class="item__profile"><a href="/pages/profile.php" class="link__profile"><i class="fas fa-user-circle"></i> My Profile</a></li>
                        <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">Job Alerts</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>Resumer</p>
                    <div class="col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail">
                                Add New Resumer
                            </div>
                            <form action="" method="post" class="row form__block p-5" enctype="multipart/form-data">
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Tên của bạn</label>
                                            <input type="text" value="" name="" placeholder="Tên của bạn...">
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM city";
                                        $city_table = getData($sql);
                                        ?>
                                        <div class="data__profile">
                                            <label for="">Tỉnh/Thành phố</label>
                                            <select name="city_id" id="" class="form-select chosen-select">
                                                <option value="0">Vui lòng chọn Tỉnh/Thành Phố!</option>
                                                <?php foreach ($city_table as $city) { ?>
                                                    <option value="<?php echo $city['id']; ?>"><?php echo $city['city_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="data__profile">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" value="" name="" placeholder="Địa chỉ...">
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $categories = getData($sql);
                                        ?>
                                        <div class="data__profile">
                                            <label for="">Danh mục sơ yếu lý lịch</label>
                                            <select name="city_id" id="" class="form-select chosen-select">
                                                <option value="0">Chọn một mục!</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?php echo $category['id']; ?>"><?php echo ($category['parent_id'] != 0 ? "-" . $category['name'] : $category['name']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Email của bạn</label>
                                            <input type="text" value="" name="" placeholder="Email của bạn...">
                                        </div>
                                        <div class="data__profile">
                                            <label for="">Nghề nghiệp của bạn</label>
                                            <input type="text" value="" name="" placeholder="Nghề nghiệp của bạn...">
                                        </div>
                                        <div class="data__profile avt">
                                            <span>Ảnh đại diện</span><br>
                                            <label for="avt" class="label_cursor">
                                                <span><i class="fas fa-upload"></i> Browse</span>
                                                <img id="blah" alt="your image" src="/images/avt_user.jpg" width="50" height="50" />
                                            </label>
                                            <input type="file" id="avt" name="" value="" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                </div>
                                <div class="data__profile">
                                    <label for="">Nội dung</label>
                                    <textarea rows="7" cols="" class="summernote" name="" value=""></textarea>
                                </div>
                                <div class="data__profile input__profile">
                                    <label for="">Kỹ năng</label>
                                    <input type="text" value="" name="" placeholder="Kỹ năng...">
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">URL(s)</label>
                                            <input type="text" name="" value="">
                                        </div>
                                        <div class="data__profile">
                                            <label for="">Kinh nghiệm</label>
                                            <input type="text" name="" value="">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Học vấn</label>
                                            <input type="text" name="" value="">
                                        </div>
                                        <div class="data__profile">
                                            <label for="">CV</label>
                                            <input type="file" name="" value="">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn--all ms-0" type="submit" disabled name="" id="">Thêm</button>
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
    <!-- main js -->
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>