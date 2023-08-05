 <?php
    require_once('lib/connect.php');
    ?>
 <header class="header bg-white" id="header">
     <!-- navbar -->
     <nav class="navbar">
         <div class="navbar__logo">
             <a href="/index.php" class="logo">
                 <img src="/images/logo.png" alt="logo" class="w-100 scroll__logo__light">
                 <img src="/images/logo_dark.png" alt="logo" class="w-100 scroll__logo__dark">
             </a>
         </div>
         <ul class="navbar__list">
             <li class="navbar__list--item">
                 <a href="/index.php" class="navbar__list--link dn__after">
                     Trang chủ
                 </a>
             </li>
             <?php if (isset($_SESSION['user']) && $_SESSION['user']['candidate'] == 1) { ?>
                 <li class="navbar__list--item">
                     <a href="javascript:void(0);" class="navbar__list--link">
                         Người ứng tuyển
                     </a>
                     <ul class="list__megamenu">
                         <li class="list__megamenu--item active">
                             <a href="javascript:void(0);" class="list__megamenu--link">
                                 Browse Jobs
                             </a>
                             <ul class="list__megamenu">
                                 <li class="list__megamenu--item">
                                     <a href="/pages/categories.php" class="list__megamenu--link">
                                         Danh sách công việc
                                     </a>
                                 </li>
                                 <li class="list__megamenu--item">
                                     <a href="/pages/find_job.php" class="list__megamenu--link">
                                         Grid Layout
                                     </a>
                                 </li>
                             </ul>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="/pages/candidate/list_company.php" class="list__megamenu--link">
                                 Các công ty
                             </a>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="/pages/all_category.php" class="list__megamenu--link">
                                 Các loại công việc
                             </a>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="/pages/candidate/add_resumer.php" class="list__megamenu--link">
                                 Thêm sơ yếu lý lịch
                             </a>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="#" class="list__megamenu--link">
                                 Trang tổng quan
                             </a>
                         </li>
                     </ul>
                 </li>
             <?php } ?>
             <?php if (isset($_SESSION['user']) && $_SESSION['user']['employer'] == 1) { ?>
                 <li class="navbar__list--item">
                     <a href="javascript:void(0);" class="navbar__list--link">
                         Nhà tuyển dụng
                     </a>
                     <ul class="list__megamenu">
                         <li class="list__megamenu--item">
                             <a href="/pages/employer/search_candidate.php" class="list__megamenu--link">
                                 Tìm ứng viên
                             </a>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="/pages/employer/submit_job.php" class="list__megamenu--link">
                                 Thêm công việc
                             </a>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="/pages/employer/add_company.php" class="list__megamenu--link">
                                 Thêm công ty
                             </a>
                         </li>
                         <li class="list__megamenu--item">
                             <a href="#" class="list__megamenu--link">
                                 Trang tông quan
                             </a>
                         </li>
                     </ul>
                 </li>
             <?php } ?>
             <li class="navbar__list--item">
                 <a href="/pages/page_detail.php" class="navbar__list--link dn__after">
                     Chi tiết công việc
                 </a>
             </li>
             <li class="navbar__list--item">
                 <a href="javascript:void(0);" class="navbar__list--link dn__after">
                     Blog
                 </a>
             </li>
             <li class="navbar__list--item">
                 <a href="/pages/contact.php" class="navbar__list--link dn__after">
                     Liên hệ
                 </a>
             </li>
         </ul>
         <?php
            if (isset($_SESSION['user'])) {
            ?>
             <div class="login--register profile">
                 <div class="d-flex click__profile">
                     <img src="<?php echo $_SESSION['user']['avatar']; ?>" />
                     <h5 class="name_profile m-0"><?php echo $_SESSION['user']['name']; ?> </h5><i class="fas fa-angle-down"></i>
                 </div>
                 <ul class="list__profile">
                     <li class="item__profile"><a href="#"><i class="fas fa-chart-line"></i> DashBoard</a></li>
                     <li class="item__profile"><a href="/pages/messager/mess.php"><i class="fas fa-comment-alt"></i> Messages</a></li>
                     <li class="item__profile"><a href="/pages/bookmark.php"><i class="fas fa-bookmark"></i> Bookmarks</a></li>
                     <?php if ($_SESSION['user']['candidate'] == 1) { ?>
                         <li class="item__profile"><a href="/pages/candidate/job_alerts.php"><i class="fas fa-bell"></i> Job Alerts</a></li>
                         <li class="item__profile"><a href="/pages/candidate/add_resumer.php"><i class="fas fa-file"></i> Manage Resumes</a></li>
                     <?php } ?>
                     <?php if ($_SESSION['user']['employer'] == 1) { ?>
                         <li class="item__profile"><a href="/pages/employer/managae_job.php" class="link__profile"><i class="far fa-list-alt"></i> Danh Sách Công Việc</a></li>
                         <li class="item__profile"><a href="/pages/employer/manage_companies.php" class="link__profile"><i class="far fa-list-alt"></i> Danh Sách Công Ty</a></li>
                     <?php } ?>
                     <li class="item__profile"><a href="/pages/profile.php"><i class="fas fa-user-circle"></i> Trang Cá Nhân</a></li>
                     <li class="item__profile"><a href="/process_logout.php"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a></li>
                 </ul>
             </div>
         <?php
            } else {
            ?>
             <div class="login--register">
                 <button class="btn btn--login" type="button" data-bs-toggle="modal" data-bs-target="#login_Modal">
                     <i class="fas fa-unlock"></i> Log in
                 </button>
                 <!-- Modal -->
                 <div class="modal fade" id="login_Modal" tabindex="-1" aria-labelledby="login_Modal_Label" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content pb-5">
                             <div class="modal-header bg-light p-5">
                                 <h5 class="modal-title" id="login_Modal_Label">Đăng Nhập</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                             </div>
                             <div class="modal-body p-5 pb-2">
                                 <form action="/process_login.php" method="post" class="form__block">
                                     <div class="input_box mb-4">
                                         <label class="input__box--item" for=""><i class="fas fa-envelope"></i> Nhập Email</label>
                                         <input class="input__box--item" type="email" name="user_email" value="" placeholder="Nhập Email của bạn" />
                                     </div>
                                     <div class="input_box mb-4">
                                         <label class="input__box--item" for=""><i class="fas fa-lock"></i> Nhập mật khẩu</label>
                                         <input class="input__box--item" type="password" name="user_password" value="" placeholder="Nhập mật khẩu của bạn" />
                                     </div>
                                     <div class="input_box mb-4">
                                         <input type="checkbox" name="" value="" id="remember_me" class="h-auto" />
                                         <label for="remember_me">Nhớ tôi</label>
                                     </div>
                                     <button class="btn btn--all m-0" name="login" type="submit">Đăng Nhập</button>
                                 </form>
                             </div>
                             <div class="modal-footer px-5 border-0 d-block">
                                 <p class="sign_up">Không có tài khoản? <a href="javascript:void((0);">Đăng kí ngay</a></p>
                                 <a href="javascript:void(0);">Quên mật khẩu</a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- end Modal Login -->
                 <button class="btn btn--register" type="button" data-bs-toggle="modal" data-bs-target="#sign-up_Modal">
                     <i class="fas fa-plus"></i> Register
                 </button>
                 <!-- Modal -->
                 <div class="modal fade" id="sign-up_Modal" tabindex="-1" aria-labelledby="sign-up_Modal_Label" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content pb-5">
                             <div class="modal-header bg-light p-5">
                                 <h5 class="modal-title" id="sign-up_Modal_Label">Đăng Ký</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                             </div>
                             <div class="modal-body p-5 pb-2">
                                 <form action="/phpmailer/send_mail.php" method="post" class="form__block">
                                     <div class="d-flex mb-3">
                                         <div class="input_box w-50 me-2">
                                             <input type="radio" name="candidate_employer" value="1" id="candidate" class="d-none radio_check">
                                             <label for="candidate"><i class="far fa-user"></i> Candidate</label>
                                         </div>
                                         <div class="input_box w-50 ms-2">
                                             <input type="radio" name="candidate_employer" value="2" id="employer" class="d-none radio_check">
                                             <label for="employer"><i class="ln ln-icon-Management"></i> Employer</label>
                                         </div>
                                     </div>
                                     <div class="input_box mb-4">
                                         <label class="input__box--item" for=""><i class="fas fa-envelope"></i> Nhập Email</label>
                                         <input class="input__box--item" type="email" name="user_email" value="" placeholder="Nhập Email của bạn" />
                                     </div>
                                     <div class="input_box mb-4">
                                         <label class="input__box--item" for=""><i class="fas fa-user-alt"></i> Tên Của Bạn</label>
                                         <input class="input__box--item" type="text" name="user_name" value="" placeholder="Tên của bạn" />
                                     </div>
                                     <div class="input_box mb-4">
                                         <input type="checkbox" name="agree" value="1" id="privacy_policy" />
                                         <label for="privacy_policy">Đồng ý với <a class="privacy_policy" href="#">chính sách bảo mật</a></label>
                                     </div>
                                     <button class="btn btn--all m-0" disabled id="btnRegister" name="register" type="submit">Đăng kí tài khoản</button>
                                 </form>
                             </div>
                             <div class="modal-footer px-5 border-0 d-block">
                                 <p class="send__password p-4">
                                     Mật khẩu sẻ được gủi về địa chỉ Email của bạn.
                                 </p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- end Modal Sign up -->
             </div>
         <?php } ?>
         <div class="navbar__icon">
             <i class="fas fa-bars"></i>
         </div>
     </nav>
     <!-- end navbar -->
     <nav class="navbar navbar__responsive bg-dark">
         <div class="navbar__logo">
             <a href="/index.php" class="logo">
                 <img src="/images/logo.png" alt="logo" class="w-100">
             </a>
         </div>
         <ul class="navbar__list">
             <li class="navbar__list--item click__item--navbar">
                 <a href="javascript:void(0);" class="navbar__list--link text-white">
                     Home
                 </a>
                 <ul class="list__megamenu show_megamenu bg-dark">
                     <li class="list__megamenu--item bg-dark">
                         <a href="/index.php" class="list__megamenu--link text-white">
                             Home 1
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Home 2
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Home 3
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Home 4
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Home 5
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Home 6 - Resumes
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item click__item--navbar1">
                 <a href="javascript:void(0);" class="navbar__list--link text-white">
                     For Candidates
                 </a>
                 <ul class="list__megamenu show_megamenu1 bg-dark">
                     <li class="list__megamenu--item active click__item--navbar4 bg-dark">
                         <a href="javascript:void(0);" class="list__megamenu--link text-white">
                             Browse Jobs
                         </a>
                         <ul class="list__megamenu show_megamenu4 bg-dark">
                             <li class="list__megamenu--item bg-dark">
                                 <a href="#" class="list__megamenu--link text-white">
                                     Half Page Map
                                 </a>
                             </li>
                             <li class="list__megamenu--item bg-dark">
                                 <a href="#" class="list__megamenu--link text-white">
                                     AJAX Loaded Jobs
                                 </a>
                             </li>
                             <li class="list__megamenu--item bg-dark">
                                 <a href="/pages/categories.php" class="list__megamenu--link text-white">
                                     List Layout
                                 </a>
                             </li>
                             <li class="list__megamenu--item bg-dark">
                                 <a href="#" class="list__megamenu--link text-white">
                                     Grid Layout
                                 </a>
                             </li>
                             <li class="list__megamenu--item bg-dark">
                                 <a href="#" class="list__megamenu--link text-white">
                                     Map Above Listings
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Browse Companies
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Browse Categories
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Submit Resume
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Candidate Dashboard
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item click__item--navbar2 bg-dark">
                 <a href="javascript:void(0);" class="navbar__list--link text-white">
                     For Employers
                 </a>
                 <ul class="list__megamenu show_megamenu2 bg-dark">
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Browse Candidates
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Browse Candidates – Half Page Map
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Submit Job
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Add Company
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Employer Dashboard
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item click__item--navbar3 bg-dark">
                 <a href="javascript:void(0);" class="navbar__list--link text-white">
                     Pages
                 </a>
                 <ul class="list__megamenu show_megamenu3 bg-dark">
                     <li class="list__megamenu--item bg-dark">
                         <a href="/pages/page_detail.php" class="list__megamenu--link text-white">
                             Job Page
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Job Page Alternative
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Resume Page
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="#" class="list__megamenu--link text-white">
                             Blog
                         </a>
                     </li>
                     <li class="list__megamenu--item bg-dark">
                         <a href="/pages/contact.php" class="list__megamenu--link text-white">
                             Contact
                         </a>
                     </li>
                 </ul>
             </li>
             <hr class="hr">
         </ul>
         <div class="d-flex justify-content-between flex-wrap">
             <div class="left">
                 <h4 class="navbar__title">
                     Our Office
                 </h4>
                 <p class="navbar__text">
                     Riverside Building, Londo SE1 7PB, UK
                 </p>
                 <p class="navbar__text">
                     Phone (123) 123-456
                 </p>
                 <a href="#" class="navbar__email">mail@example.com</a>
             </div>
         </div>
         <div class="navbar__icon">
             <i class="fas fa-times"></i>
         </div>
     </nav>
 </header>