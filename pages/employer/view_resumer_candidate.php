<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
$user_id = $_GET['user_id'];
$sql = "SELECT users.*, city.city_name  FROM users LEFT JOIN city ON city.id = users.city_id LEFT JOIN education ON education.user_id = users.id LEFT JOIN experience ON experience.user_id = users.id WHERE users.id = '$user_id'";
$users = getData($sql);
$user = current($users);
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('../../head.php'); ?>

<body>
    <div class="cv__block">
        <div class="d-flex mb-5">
            <a class="btn btn--green px-3" href="./list_candidate_apply.php"><i class="fa-solid fa-circle-plus pe-2"></i> Quay Lại Trang</a>
        </div>
        <div class="container p-0" id="exportContent">
            <div class="row bg-white">
                <div class="col-7 p-0">
                    <div class="cv__left">
                        <div class="d-flex bg__linner__gradient">
                            <div class="cv__avatar">
                                <img src="<?php echo isset($user['avatar']) ? $user['avatar'] : "Vui lòng thêm vào cv"; ?>" alt="" class="w-100">
                            </div>
                            <ul class="cv__list">
                                <li class="cv__item"><i class="fas fa-user-circle"></i>: <?php echo (isset($user['male_female'])) ? $user['male_female'] : "Vui lòng thêm vào cv"; ?></li>
                                <li class="cv__item"><i class="fas fa-calendar-alt"></i>: <?php if (isset($user['birthday'])) {
                                                                                                $birthdayString = $user['birthday'];
                                                                                                $birthdayDateTime = new DateTime($birthdayString);
                                                                                                echo $birthdayDateTime->format("d/m/Y");
                                                                                            } else {
                                                                                                echo "Vui lòng thêm vào cv";
                                                                                            } ?>
                                </li>
                                <li class="cv__item"><i class="fas fa-envelope"></i>: <?php echo (isset($user['user_email'])) ? $user['user_email'] : "Vui lòng thêm vào cv"; ?></li>
                                <li class="cv__item"><i class="fas fa-mobile-alt"></i>: <?php echo (isset($user['phone'])) ? $user['phone'] : "Vui lòng thêm vào cv"; ?></li>
                                <li class="cv__item"><i class="fas fa-map-signs"></i>: <?php echo (isset($user['city_name'])) ? $user['city_name'] : "Vui lòng thêm vào cv"; ?></li>
                            </ul>
                        </div>
                        <?php
                        $sql_exp = "SELECT * FROM experience WHERE user_id = '$user_id'";
                        $experiences = getData($sql_exp);
                        ?>
                        <div class="cv__detail">
                            <div class="cv__item">
                                <h3 class="cv__title">// Kinh Nghiệm Làm Việc</h3>
                                <?php foreach ($experiences as $experience) { ?>
                                    <div class="cv__job__detail">
                                        <p class="date_job"><?php echo (isset($experience['start_experience_date'])) ? $experience['start_experience_date'] : "Vui lòng thêm thông tin vào cv"; ?> - <?php echo (isset($experience['end_experience_date'])) ? $experience['end_experience_date'] : "Vui lòng thêm thông tin vào cv"; ?></p>
                                        <h5 class="job__title"><?php echo (isset($experience['experience_employer'])) ? $experience['experience_employer'] : "Vui lòng thêm thông tin vào cv"; ?></h5>
                                        <h5 class="position__job"><?php echo (isset($experience['experience_job'])) ? $experience['experience_job'] : "Vui lòng thêm thông tin vào cv"; ?></h5>
                                        <ul class="list__detail">
                                            <li class="item__detail"><?php echo (isset($experience['experience_note'])) ? $experience['experience_note'] : "Vui lòng thêm thông tin vào cv"; ?></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            $sql_edu = "SELECT * FROM education WHERE user_id = '$user_id'";
                            $educations = getData($sql_edu);
                            ?>
                            <div class="cv__item">
                                <h3 class="cv__title">// Học Vấn</h3>
                                <?php foreach ($educations as $education) { ?>
                                    <div class="cv__job__detail">
                                        <p class="date_job"><span></span> <?php echo (isset($education['start_education_date'])) ? $education['start_education_date'] : "Vui lòng thêm thông tin vào cv"; ?> - <?php echo (isset($education['end_education_date'])) ? $education['end_education_date'] : "Vui lòng thêm thông tin vào cv"; ?></p>
                                        <h5 class="job__title"><?php echo (isset($education['education_school'])) ? $education['education_school'] : "Vui lòng thêm thông tin vào cv"; ?></h5>
                                        <h5 class="position__job"><?php echo (isset($education['education_level'])) ? $education['education_level'] : "Vui lòng thêm thông tin vào cv"; ?></h5>
                                        <ul class="list__detail">
                                            <li class="item__detail"><?php echo (isset($education['education_note'])) ? $education['education_note'] : "Vui lòng thêm thông tin vào cv"; ?></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php
                            $sql_action = "SELECT * FROM actions WHERE user_id = '$user_id'";
                            $actions = getData($sql_action);
                            ?>
                            <div class="cv__item">
                                <h3 class="cv__title">// Hoạt Động</h3>
                                <?php foreach ($actions as $action) { ?>
                                    <div class="cv__job__detail">
                                        <p class="date_job"><span></span> <?php echo (isset($action['start_action_date'])) ? $action['start_action_date'] : "Vui lòng thêm thông tin vào cv"; ?> - <?php echo (isset($action['end_action_date'])) ? $action['end_action_date'] : "Vui lòng thêm thông tin vào cv"; ?></p>
                                        <h5 class="job__title"><?php echo (isset($action['name_action'])) ? $action['name_action'] : "Vui lòng thêm thông tin vào cv"; ?></h5>
                                        <ul class="list__detail">
                                            <li class="item__detail"><?php echo (isset($action['note_action'])) ? $action['note_action'] : "Vui lòng thêm thông tin vào cv"; ?></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $sql = "SELECT * FROM skills WHERE user_id = '$user_id'";
                $skills = getData($sql);
                $skill = current($skills);
                ?>
                <div class="col-5 p-0">
                    <div class="cv__right">
                        <div class="cv__item">
                            <h3 class="name__title"><?php echo (isset($user['name'])) ? $user['name'] : ""; ?></h3>
                            <span class="job__application"><?php echo (isset($user['skills'])) ? $user['skills'] : ""; ?></span>
                            <h3 class="cv__title">// Mục Tiêu Nghề Nghiệp</h3>
                            <p class="career__goals">
                                <?php echo (isset($skill['career_goals'])) ? $skill['career_goals'] : "Vui lòng thêm thông tin vào cv"; ?>
                            </p>
                        </div>
                        <div class="cv__item">
                            <h3 class="cv__title">// Ngoại Ngữ</h3>
                            <div class="mb-3 language">
                                <label for="">Tiếng Anh</label>
                                <input type="range" class="slider" name="t_anh" value="<?php echo (isset($skill['t_anh'])) ? $skill['t_anh'] : ""; ?>" min="1" max="100">
                            </div>
                            <div class="mb-3 language">
                                <label for="">Tiếng Trung</label>
                                <input type="range" class="slider" name="t_trung" value="<?php echo (isset($skill['t_trung'])) ? $skill['t_trung'] : ""; ?>" min="1" max="100">
                            </div>
                        </div>
                        <div class="cv__item">
                            <h3 class="cv__title">// Tin Học</h3>
                            <div class="mb-3 language">
                                <label for="slider_input">Word</label>
                                <span id="slider_line" class="slider_line"></span>
                                <input type="range" class="slider" id="slider_input" name="word" value="<?php echo (isset($skill['word'])) ? $skill['word'] : ""; ?>" min="1" max="100">
                            </div>
                            <div class="mb-3 language">
                                <label for="">Excel</label>
                                <span id="slider_line" class="slider_line"></span>
                                <input type="range" class="slider" name="excel" value="<?php echo (isset($skill['excel'])) ? $skill['excel'] : ""; ?>" min="1" max="100">
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM interest WHERE user_id = '$user_id'";
                        $interests = getData($sql);
                        ?>
                        <div class="cv__item">
                            <h3 class="cv__title">// Sở Thích</h3>
                            <div class="cv__job__detail bf-none">
                                <ul class="list__detail">
                                    <?php foreach ($interests as $interest) { ?>
                                        <li class="item__detail"><?php echo (isset($interest['interest'])) ? $interest['interest'] : "Vui lòng thêm thông tin vào cv"; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT * FROM additional_information WHERE user_id = '$user_id'";
                        $additional_informations = getData($sql);
                        ?>
                        <div class="cv__item">
                            <h3 class="cv__title">// Thông Tin Bổ Xung</h3>
                            <div class="cv__job__detail bf-none">
                                <ul class="list__detail">
                                    <?php foreach ($additional_informations as $additional_information) { ?>
                                        <li class="item__detail"><?php echo (isset($additional_information['additional_information'])) ? $additional_information['additional_information'] : "Vui lòng thêm thông tin vào cv"; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
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
    <!-- slick slider -->
    <script src="/js/slick.min.js"></script>
    <!-- validate -->
    <script src="/js/jquery.validate.min.js"></script>
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