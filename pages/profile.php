<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../lib/connect.php');
?>
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
        <?php require_once ('./menu_left.php'); ?>
        <div class="right mh-100">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">My Profile</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>My Profile</p>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail">
                                Profile Detail
                            </div>
                            <form action="process_profile.php" method="post" class="form__block p-5" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']; ?>" />
                                <div class="data__profile">
                                    <span>Ảnh đại diện</span><br>
                                    <label for="avt" class="label_cursor">
                                        <img id="blah" alt="your image" src="<?php echo (isset($_SESSION['user']['avatar'])) ? $_SESSION['user']['avatar'] : "/images/avt_user.jpg"; ?>" width="100" height="100" />
                                    </label>
                                    <input type="file" id="avt" name="avatar" value="<?php echo (isset($_SESSION['user']['avatar'])) ? $_SESSION['user']['avatar'] : ""; ?>" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="data__profile">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="name" value="<?php echo (isset($_SESSION['user']['name'])) ? $_SESSION['user']['name'] : ""; ?>" placeholder="Họ và tên...">
                                </div>
                                <div class="data__profile">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="phone" value="<?php echo (isset($_SESSION['user']['phone'])) ? $_SESSION['user']['phone'] : ""; ?>" placeholder="Số điện thoại...">
                                </div>
                                <div class="data__profile d-flex">
                                    <div class="me-2 w-50">
                                        <label for="">Giới tính</label>
                                        <input type="text" name="male_female" value="<?php echo (isset($_SESSION['user']['male_female'])) ? $_SESSION['user']['male_female'] : ""; ?>" placeholder="Giới tính...">
                                    </div>
                                    <div class="ms-2 w-50">
                                        <label for="">Ngày tháng năm sinh</label>
                                        <input type="date" name="birthday" value="<?php echo (isset($_SESSION['user']['birthday'])) ? $_SESSION['user']['birthday'] : ""; ?>" placeholder="Ngày/Tháng/Năm Sinh ...">
                                    </div>
                                </div>
                                <div class="data__profile">
                                    <label for="">E-mail</label>
                                    <input type="Email" name="email" readonly value="<?php echo $_SESSION['user']['user_email']; ?>" placeholder="Email...">
                                </div>
                                <div class="data__profile">
                                    <label for="">Về tôi: </label>
                                    <textarea rows="9" cols="" name="about_me" placeholder="Mô tả..."><?php echo $_SESSION['user']['about_me']; ?></textarea>
                                </div>
                                <button class="btn btn--all ms-0" name="save">Lưu thông tin</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail">
                                Change Password
                            </div>
                            <form action="process_profile.php" id="change__password" method="post" class="form__block p-5">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id']; ?>">
                                <p class="password__err<?php echo (!isset($_GET['err'])) ? "d-none" : ""; ?>"><?php echo (isset($_GET['err']) && $_GET['err'] == 1) ? "Bạn Đã nhập mật khẩu cũ vui lòng nhập mật khẩu mới" : ""; ?></p>
                                <p class="password__safe">
                                    Mật khẩu của bạn phải dài ít nhất 12 ký tự ngẫu nhiên để được an toàn
                                </p>
                                <div class="data__profile">
                                    <label for="password">Mật khẩu mới</label>
                                    <input type="text" id="password" name="password" value="">
                                </div>
                                <div class="data__profile">
                                    <label for="re-password">Xác nhận mật khẩu mới</label>
                                    <input type="password" id="re-password" name="re-password" value="">
                                </div>
                                <p class="password__success<?php echo (!isset($_GET['successful_change'])) ? "d-none" : ""; ?>"><?php echo (isset($_GET['successful_change']) && $_GET['successful_change'] == 1) ? "Đổi mật khẩu thành công :33" : ""; ?></p>
                                <button class="btn btn--all ms-0" type="submit" name="reset_pass" id="">Thay Đổi Mật Khẩu</button>
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