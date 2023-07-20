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
                            <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-file"></i> Manage Resumer</a></li>
                            <li class="item__profile"><a href="/pages/candidate/add_resumer.php" class="link__profile"><i class="fas fa-file"></i> Add Resume</a></li>
                        </ul>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['user']['employer'] == 1) { ?>
                    <div class="left__block">
                        <h5 class="title__profile">Employer</h5>
                        <ul class="list__profile">
                            <li class="item__profile"><a href="/pages/employer/managae_job.php" class="link__profile"><i class="fas fa-chart-line"></i> Manage Jobs</a></li>
                            <li class="item__profile"><a href="/pages/employer/submit_job.php" class="link__profile"><i class="fas fa-comment-alt"></i> Submit Jobs </a></li>
                            <li class="item__profile"><a href="/pages/employer/manage_companies.php" class="link__profile"><i class="fas fa-bookmark"></i> Manage Companies</a></li>
                            <li class="item__profile"><a href="/pages/employer/add_company.php" class="link__profile color__green"><i class="fas fa-bell"></i> Add Company <span class="notification">1</span></a></li>
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
                    <h3 class="title__content__profile">Add Company</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>Add Company</p>
                    <div class="col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail d-flex justify-content-between align-items-center">
                                <span>Add New Company</span> <a href="view_resumer.php" class="btn btn--green m-0 px-4"><i class="fas fa-file"></i> Xem chi tiết</a>
                            </div>
                            <form action="./process_add_company.php" method="post" class="row form__block p-5" enctype="multipart/form-data">
                                <div class="d-flex">
                                    <div class="flex flex__left w-100">
                                        <div class="data__profile">
                                            <label for="">Tên công ty</label>
                                            <input type="text" value="" name="company_name" placeholder="Tên công ty...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Khẩu hiệu</label>
                                            <input type="text" value="" name="company_tagline" placeholder="Khẩu hiệu công ty...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Trụ sở</label>
                                            <input type="text" value="" name="company_headquarters" placeholder="Trụ sở công ty...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-100">
                                        <div class="data__profile avt">
                                            <span>Logo công ty</span><br>
                                            <label for="avt" class="label_cursor">
                                                <span class="browse"><i class="fas fa-upload"></i> Browse</span>
                                                <img id="blah" alt="your image" src="/images/placeholder.png" width="100" height="100" />
                                            </label>
                                            <input type="file" id="avt" name="company_logo" value="<?php echo (isset($_SESSION['user']['avatar'])) ? $_SESSION['user']['avatar'] : "/images/avt_user.jpg"; ?>" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Email công ty</label>
                                            <input type="text" value="" name="company_email" required placeholder="Email công ty...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Website công ty</label>
                                            <input type="text" value="" name="company_web" required placeholder="Website công ty...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" value="" name="company_phone" required placeholder="Số điện thoại...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span>Lương trung bình</span>
                                            <select name="company_average_salary" id="" class="form-select chosen-select">
                                                <option value="1">Chọn lương trung bình</option>
                                                <option value="1">$15.000 - $20.000</option>
                                                <option value="2">$20.000 - $30.000</option>
                                                <option value="3">$30.000 - $40.000</option>
                                                <option value="4">$40.000 - $50.000</option>
                                                <option value="5">$50.000+</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Facabook</label>
                                            <input type="text" value="" name="company_fb" placeholder="Facebook...">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Twitter</label>
                                            <input type="text" value="" name="company_tw" required placeholder="Twitter...">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <span>Quy mô công ty</span>
                                            <select name="company_size" id="" class="form-select chosen-select">
                                                <option value="0">Chọn quy mô công ty</option>
                                                <option value="1">1 - 5</option>
                                                <option value="2">15 - 30</option>
                                                <option value="3">30 - 50</option>
                                                <option value="4">5 - 15</option>
                                                <option value="5">50+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <span>Doanh thu công ty</span>
                                            <select name="company_revenue" id="" class="form-select chosen-select">
                                                <option value="0">Doanh thu công ty</option>
                                                <option value="1">$70.000</option>
                                                <option value="2">$100.000</option>
                                                <option value="3">$150.000</option>
                                                <option value="4">$300.000</option>
                                                <option value="5">$600.000</option>
                                                <option value="5">$1.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="data__profile">
                                    <label for="">Mô tả ngắn về công ty</label>
                                    <textarea rows="9" required class="form-control" name="company_description"></textarea>
                                </div>
                                <div class="data__profile">
                                    <label for="">Nội dung về công ty</label>
                                    <textarea rows="7" required class="summernote" name="company_content"></textarea>
                                </div>
                                <button class="btn btn--all m-0 ms-3" type="submit" name="add_compamy" id="">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="templateExperience" class="d-none">
        <div class="data__profile--detail p-5 bg-light mb-3">
            <span class="close__card"><i class="fas fa-times"></i></span>
            <div class="experience-content">
                <form action="./process_add_resumer.php" method="post">
                    <input type="hidden" name="save_experience" value="1" />
                    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : ""; ?>">
                    <div class="mb-4">
                        <label for="">Nhà tuyển dụng</label>
                        <input type="text" value="" name="experience_employer">
                    </div>
                    <div class="mb-4">
                        <label for="">Tiêu đề công việc</label>
                        <input type="text" value="" name="experience_job">
                    </div>
                    <div class="mb-4 d-flex">
                        <div class="me-2">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" value="" name="start_experience_date">
                        </div>
                        <div class="ms-2">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" value="" name="end_experience_date">
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn--add save" name="save_experience">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="templateEducation" class="d-none">
        <div class="data__profile--detail p-5 bg-light mb-3">
            <span class="close__card"><i class="fas fa-times"></i></span>
            <div class="experience-content">
                <form action="./process_add_resumer.php" method="post">
                    <input type="hidden" name="save_education" value="1" />
                    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : ""; ?>">
                    <div class="mb-4">
                        <label for="">Tên trường</label>
                        <input type="text" value="" name="education_school">
                    </div>
                    <div class="mb-4">
                        <label for="">Trình độ học vấn</label>
                        <input type="text" value="" name="education_level">
                    </div>
                    <div class="mb-4 d-flex">
                        <div class="me-2">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" value="" name="start_education_date">
                        </div>
                        <div class="ms-2">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" value="" name="end_education_date">
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn--add save" name="save_education">Lưu</button>
                    </div>
                </form>
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