 <header class="header" id="header">
     <!-- navbar -->
     <nav class="navbar bg-white">
         <div class="navbar__logo">
             <a href="/index.php" class="logo">
                 <img src="/images/logo_dark.png" alt="logo" class="w-100">
             </a>
         </div>
         <ul class="navbar__list">
             <li class="navbar__list--item">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     Home
                 </a>
                 <ul class="list__megamenu">
                     <li class="list__megamenu--item">
                         <a href="/index.php" class="list__megamenu--link">
                             Home 1
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 2
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 3
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 4
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 5
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 6 - Resumes
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     For Candidates
                 </a>
                 <ul class="list__megamenu">
                     <li class="list__megamenu--item active">
                         <a href="#" class="list__megamenu--link">
                             Browse Jobs
                         </a>
                         <ul class="list__megamenu">
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     Half Page Map
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     AJAX Loaded Jobs
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="/pages/categories.php" class="list__megamenu--link">
                                     List Layout
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     Grid Layout
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     Map Above Listings
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Companies
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Categories
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Submit Resume
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Candidate Dashboard
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     For Employers
                 </a>
                 <ul class="list__megamenu">
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Candidates
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Candidates – Half Page Map
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Submit Job
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Add Company
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Employer Dashboard
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     Pages
                 </a>
                 <ul class="list__megamenu">
                     <li class="list__megamenu--item">
                         <a href="/pages/page_detail.php" class="list__megamenu--link">
                             Job Page
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Job Page Alternative
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Resume Page
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Blog
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="./contact.php" class="list__megamenu--link">
                             Contact
                         </a>
                     </li>
                 </ul>
             </li>
         </ul>
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
                             <form action="process_login_register.php" method="post" class="form__block">
                                 <div class="input_box mb-4">
                                     <label class="input__box--item" for=""><i class="fas fa-envelope"></i> Nhập Email</label>
                                     <input class="input__box--item" type="email" name="user_email" value="" placeholder="Nhập Email của bạn" />
                                 </div>
                                 <div class="input_box mb-4">
                                     <label class="input__box--item" for=""><i class="fas fa-lock"></i> Nhập mật khẩu</label>
                                     <input class="input__box--item" type="password" name="user_password" value="" placeholder="Nhập mật khẩu của bạn" />
                                 </div>
                                 <div class="input_box mb-4">
                                     <input type="checkbox" name="" value="" id="remember_me" />
                                     <label for="remember_me">Nhớ tôi</label>
                                 </div>
                                 <button class="btn btn--all m-0">Đăng Nhập</button>
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
                             <form action="process_login_register.php" method="post" class="form__block">
                                 <div class="d-flex mb-3">
                                     <div class="input_box w-50 me-2">
                                         <input type="radio" name="candidate_employer" value="1" id="candidate" class="d-none radio_check">
                                         <label for="candidate"><i class="far fa-user"></i> Candidate</label>
                                     </div>
                                     <div class="input_box w-50 ms-2">
                                         <input type="radio" name="candidate_employer" value="1" id="employer" class="d-none radio_check">
                                         <label for="employer"><i class="ln ln-icon-Management"></i> Employer</label>
                                     </div>
                                 </div>
                                 <div class="input_box mb-4">
                                     <label class="input__box--item" for=""><i class="fas fa-envelope"></i> Nhập Email</label>
                                     <input class="input__box--item" type="email" name="user_email" value="" placeholder="Nhập Email của bạn" />
                                 </div>
                                 <div class="input_box mb-4">
                                     <label class="input__box--item" for=""><i class="fas fa-lock"></i> Nhập Tên</label>
                                     <input class="input__box--item" type="text" name="user_password" value="" placeholder="Nhập tên của bạn" />
                                 </div>
                                 <div class="input_box mb-4">
                                     <input type="checkbox" name="" value="" id="privacy_policy" />
                                     <label for="privacy_policy">Đồng ý với <a class="privacy_policy" href="#">chính sách bảo mật</a></label>
                                 </div>
                                 <button class="btn btn--all m-0">Đăng kí tài khoản</button>
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
         <div class="navbar__icon">
             <i class="fas fa-bars"></i>
         </div>
     </nav>
     <!-- end navbar -->
     <nav class="navbar navbar__responsive">
         <div class="navbar__logo">
             <a href="/index.php" class="logo">
                 <img src="/images/logo.png" alt="logo" class="w-100">
             </a>
         </div>
         <ul class="navbar__list">
             <li class="navbar__list--item click__item--navbar">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     Home
                 </a>
                 <ul class="list__megamenu show_megamenu">
                     <li class="list__megamenu--item">
                         <a href="/index.php" class="list__megamenu--link">
                             Home 1
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 2
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 3
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 4
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 5
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Home 6 - Resumes
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item click__item--navbar1">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     For Candidates
                 </a>
                 <ul class="list__megamenu show_megamenu1">
                     <li class="list__megamenu--item active click__item--navbar4">
                         <a href="javascript:void(0);" class="list__megamenu--link">
                             Browse Jobs
                         </a>
                         <ul class="list__megamenu show_megamenu4">
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     Half Page Map
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     AJAX Loaded Jobs
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="/pages/categories.php" class="list__megamenu--link">
                                     List Layout
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     Grid Layout
                                 </a>
                             </li>
                             <li class="list__megamenu--item">
                                 <a href="#" class="list__megamenu--link">
                                     Map Above Listings
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Companies
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Categories
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Submit Resume
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Candidate Dashboard
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item click__item--navbar2">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     For Employers
                 </a>
                 <ul class="list__megamenu show_megamenu2">
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Candidates
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Browse Candidates – Half Page Map
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Submit Job
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Add Company
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Employer Dashboard
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="navbar__list--item click__item--navbar3">
                 <a href="javascript:void(0);" class="navbar__list--link">
                     Pages
                 </a>
                 <ul class="list__megamenu show_megamenu3">
                     <li class="list__megamenu--item">
                         <a href="/pages/page_detail.php" class="list__megamenu--link">
                             Job Page
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Job Page Alternative
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Resume Page
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="#" class="list__megamenu--link">
                             Blog
                         </a>
                     </li>
                     <li class="list__megamenu--item">
                         <a href="./pages/contact.php" class="list__megamenu--link">
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
             <div class="login--register w-auto right">
                 <button class="btn btn--login">
                     <i class="fas fa-unlock"></i> Log in
                 </button>
                 <button class="btn btn--register">
                     <i class="fas fa-plus-circle"></i> Register
                 </button>
             </div>
         </div>
         <div class="navbar__icon">
             <i class="fas fa-times"></i>
         </div>
     </nav>
 </header>