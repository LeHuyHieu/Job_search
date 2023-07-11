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
                        <li class="item__profile"><a href="/pages/add_resumer.php" class="link__profile"><i class="fas fa-file"></i> Add Resume</a></li>
                    </ul>
                </div>
                <div class="left__block">
                    <h5 class="title__profile">Account</h5>
                    <ul class="list__profile">
                        <li class="item__profile"><a href="/pages/profile.php" class="link__profile color__green"><i class="fas fa-user-circle"></i> My Profile</a></li>
                        <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">My Profile</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>My Profile</p>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail">
                                Profile Detail
                            </div>
                            <form action="" method="post" class="form__block p-5" enctype="multipart/form-data">
                                <div class="data__profile">
                                    <span>Ảnh đại diện</span><br>
                                    <label for="avt" class="label_cursor">
                                        <img id="blah" alt="your image" src="/images/avt_user.jpg" width="100" height="100" />
                                    </label>
                                    <input type="file" id="avt" name="" value="" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="data__profile">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="" value="" placeholder="Họ và tên...">
                                </div>
                                <div class="data__profile">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="" value="" placeholder="Số điện thoại...">
                                </div>
                                <div class="data__profile">
                                    <label for="">E-mail</label>
                                    <input type="Email" value="" name="" placeholder="Email...">
                                </div>
                                <div class="data__profile">
                                    <label for="">Về tôi: </label>
                                    <textarea rows="9" cols="" placeholder="Mô tả..."></textarea>
                                </div>
                                <button class="btn btn--all ms-0" type="submit" disabled name="" id="">Lưu thông tin</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="profile_details bg-white">
                            <div class="bg-light title__detail">
                                Change Password
                            </div>
                            <form action="" method="post" class="form__block p-5">
                                <p class="password__safe">
                                    Mật khẩu của bạn phải dài ít nhất 12 ký tự ngẫu nhiên để được an toàn
                                </p>
                                <div class="data__profile">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="text" name="" value="">
                                </div>
                                <div class="data__profile">
                                    <label for="">Xác nhận mật khẩu mới</label>
                                    <input type="text" name="" value="">
                                </div>
                                <button class="btn btn--all ms-0" type="submit" disabled name="" id="">Lưu Mật Khẩu</button>
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