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
                            <li class="item__profile"><a href="/pages/employer/add_company.php" class="link__profile"><i class="fas fa-bell"></i> Add Company <span class="notification">1</span></a></li>
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
                    <h3 class="title__content__profile">Sơ yếu lý lịch</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>Sơ yếu lý lịch</p>
                    <div class="col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail d-flex justify-content-between align-items-center">
                                <span>Thêm mới sơ yếu lý lịch</span> <a href="view_resumer.php" class="btn btn--green m-0 px-4"><i class="fas fa-file"></i> Xem CV</a>
                            </div>
                            <form action="./process_add_resumer.php" method="post" class="row form__block p-5" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : ""; ?>">
                                <div class="d-flex">
                                    <div class="flex flex__left w-50 me-3">
                                        <div class="data__profile">
                                            <label for="">Tên của bạn</label>
                                            <input type="text" readonly value="<?php echo (isset($_SESSION['user']['name'])) ? $_SESSION['user']['name'] : ""; ?>" name="name" placeholder="Tên của bạn...">
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM city";
                                        $city_table = getData($sql);
                                        ?>
                                        <div class="data__profile">
                                            <span>Tỉnh/Thành phố</span>
                                            <select name="city_id" id="" class="form-select chosen-select">
                                                <option value="0">Vui lòng chọn Tỉnh/Thành Phố!</option>
                                                <?php foreach ($city_table as $city) { ?>
                                                    <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $_SESSION['user']['city_id']) ? $selected : ""; ?>><?php echo $city['city_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="data__profile avt">
                                            <span>Ảnh đại diện</span><br>
                                            <label for="avt" class="label_cursor">
                                                <span class="browse"><i class="fas fa-upload"></i> Browse</span>
                                                <img id="blah" alt="your image" src="<?php echo (isset($_SESSION['user']['avatar'])) ? $_SESSION['user']['avatar'] : "/images/avt_user.jpg"; ?>" width="100" height="100" />
                                            </label>
                                            <input type="file" id="avt" name="avatar" value="<?php echo (isset($_SESSION['user']['avatar'])) ? $_SESSION['user']['avatar'] : "/images/avt_user.jpg"; ?>" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                    <div class="flex flex__right w-50 ms-3">
                                        <div class="data__profile">
                                            <label for="">Email của bạn</label>
                                            <input type="text" readonly value="<?php echo (isset($_SESSION['user']['user_email'])) ? $_SESSION['user']['user_email'] : ""; ?>" name="email" placeholder="Email của bạn...">
                                        </div>
                                        <div class="data__profile">
                                            <label for="">Nghề nghiệp của bạn</label>
                                            <input type="text" value="<?php echo (isset($_SESSION['user']) && $_SESSION['user']['profession'] != '') ? $_SESSION['user']['profession'] : ""; ?>" name="professional_title" required placeholder="Nghề nghiệp của bạn...">
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $categories = getData($sql);
                                        // print_r($_SESSION['user']['city_id']);die;
                                        ?>
                                        <div class="data__profile">
                                            <span>Categories</span>
                                            <select name="category_id" id="" class="form-select chosen-select">
                                                <option value="0">Vui lòng chọn!</option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $_SESSION['user']['city_id']) ? $selected : ""; ?>><?php echo ($category['parent_id'] != 0 ? "-" . $category['name'] : $category['name']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="data__profile">
                                    <label for="">Nội dung</label>
                                    <textarea rows="7" cols="" required class="summernote" name="content"><?php echo (isset($_SESSION['user']['content']) && $_SESSION['user']['content'] != '') ? $_SESSION['user']['content'] : ""; ?></textarea>
                                </div>
                                <div class="data__profile input__profile">
                                    <label for="">Kỹ năng</label>
                                    <input type="text" value="<?php echo (isset($_SESSION['user']['skills']) && $_SESSION['user']['skills'] != '') ? $_SESSION['user']['skills'] : ""; ?>" name="skill" placeholder="Kỹ năng...">
                                </div>
                                <button class="btn btn--all m-0 ms-3" type="submit" name="add_resumer" id="">Lưu</button>
                            </form>
                            <hr class="line">
                            <div class="d-flex p-5">
                                <div class="flex flex__left w-50 me-3">
                                    <div class="data__profile mb-5">
                                        <label for="">Kinh nghiệm</label>
                                        <div class="border__input">
                                            <?php
                                            if (isset($_SESSION['user']['id'])) {
                                                $user_id = $_SESSION['user']['id'];
                                                $sql = "SELECT * FROM experience WHERE user_id = '$user_id'";
                                                $experiences = getData($sql);
                                                foreach ($experiences as $experience) { ?>
                                                    <div class="data__profile--detail bg-light mb-3">
                                                        <div class="edit-experience btn btn-experience" data-id="<?php echo $experience['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></div>
                                                        <div class="experience-content">
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Nhà tuyển dụng </div>:
                                                                <div class="experience-name"><?php echo $experience['experience_employer']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Tên công việc </div>:
                                                                <div class="experience-name"><?php echo $experience['experience_job']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Ngày bắt đầu </div>:
                                                                <div class="experience-name"><?php echo $experience['start_experience_date']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Ngày hết hạn </div>:
                                                                <div class="experience-name"><?php echo $experience['end_experience_date']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Mô tả </div>:
                                                                <div class="experience-name"><?php echo $experience['experience_note']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                            <span class="btn btn--add" id="btnCloneExperience"><i class="fas fa-plus"></i> Thêm Kinh Nghiệm</span>
                                        </div>
                                    </div>
                                    <div class="data__profile mb-5">
                                        <label for="">Hoạt động</label>
                                        <div class="border__input">
                                            <?php
                                            if (isset($_SESSION['user']['id'])) {
                                                $user_id = $_SESSION['user']['id'];
                                                $sql = "SELECT * FROM actions WHERE user_id = '$user_id'";
                                                $actions = getData($sql);
                                                foreach ($actions as $action) { ?>
                                                    <div class="data__profile--detail bg-light mb-3">
                                                        <div class="edit-experience btn btn-experience" data-id="<?php echo $action['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></div>
                                                        <div class="experience-content">
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Tên hoạt động </div>:
                                                                <div class="experience-name"><?php echo $action['name_action']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Mô tả</div>:
                                                                <div class="experience-name"><?php echo $action['note_action']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Ngày bắt đầu </div>:
                                                                <div class="experience-name"><?php echo $action['start_action_date']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Ngày hết hạn </div>:
                                                                <div class="experience-name"><?php echo $action['end_action_date']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                            <span class="btn btn--add" id="btnCloneAction"><i class="fas fa-plus"></i> Thêm hoạt động</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex__right w-50 ms-3">
                                    <div class="data__profile">
                                        <label for="">Học vấn</label>
                                        <div class="border__input">
                                            <?php
                                            if (isset($_SESSION['user']['id'])) {
                                                $user_id = $_SESSION['user']['id'];
                                                $sql = "SELECT * FROM education WHERE user_id = '$user_id'";
                                                $educations = getData($sql);
                                                foreach ($educations as $education) { ?>
                                                    <div class="data__profile--detail bg-light mb-3">
                                                        <div class="edit-education btn btn-education" data-id="<?php echo $education['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></div>
                                                        <div class="experience-content">
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Tên trường </div>:
                                                                <div class="experience-name"><?php echo $education['education_school']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Chuyên Nghành </div>:
                                                                <div class="experience-name"><?php echo $education['education_level']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Ngày bắt đầu </div>:
                                                                <div class="experience-name"><?php echo $education['start_education_date']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Ngày hết hạn </div>:
                                                                <div class="experience-name"><?php echo $education['end_education_date']; ?></div>
                                                            </div>
                                                            <div class="d-flex bg-white mb-4">
                                                                <div class="experience-title">Mô tả</div>:
                                                                <div class="experience-name"><?php echo $education['education_note']; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                            <span class="btn btn--add" id="btnCloneEducation"><i class="fas fa-plus"></i> Thêm Học vấn</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <div class="mb-4">
                        <label for="">Mô tả</label>
                        <textarea rows="3" value="" name="experience_notes" class="form-control" placeholder="Mô tả"></textarea>
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
                    <div class="mb-4">
                        <label for="">Mô tả</label>
                        <textarea rows="3" value="" name="education_notes" class="form-control" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn--add save" name="save_education">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="templateAction" class="d-none">
        <div class="data__profile--detail p-5 bg-light mb-3">
            <span class="close__card"><i class="fas fa-times"></i></span>
            <div class="experience-content">
                <form action="./process_add_resumer.php" method="post">
                    <input type="hidden" name="save_action" value="1" />
                    <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : ""; ?>">
                    <div class="mb-4">
                        <label for="">Tên hoạt động</label>
                        <input type="text" value="" name="action_name">
                    </div>
                    <div class="mb-4">
                        <label for="">Mô tả </label>
                        <textarea rows="3" name="action_detail" class="form-control"></textarea>
                    </div>
                    <div class="mb-4 d-flex">
                        <div class="me-2">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" value="" name="start_action_date">
                        </div>
                        <div class="ms-2">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" value="" name="end_action_date">
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn--add save" name="save_action">Lưu</button>
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