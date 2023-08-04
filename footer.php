<footer class="footer" id="footer">
    <div class="footer__block">
        <h3 class="footer__block--title">
            Step inside and see for yourself
        </h3>
        <h3 class="footer__block--title">
            Get Started <i class="fa-solid fa-angle-right"></i>
        </h3>
    </div>
    <div class="footer__bg container-fluid">
        <div class="row footer__bg--flex">
            <div class="footer__bg--logo col-md-8 col-sm-12 col-12">
                <a href="#" class="logo--footer">
                    <img src="/images/logo.png" alt="" class="w-100">
                </a>
            </div>
            <div class="footer__bg--icon ms-auto col-md-2 col-sm-6 col-6">
                <span>
                    <i class="ln ln-icon-Management"></i>
                </span>
                <h6 class="bg__icon--text">
                    <?php 
                    $sql = "SELECT COUNT(id) AS sum_job FROM jobs";
                    $sum_job = getData($sql);
                    ?>
                    <span class='numscroller text-white' data-min='1' data-max='<?php echo $sum_job[0]['sum_job']; ?>' data-delay='5' data-increment='5'>1124</span>
                    <span>
                        Job Listings
                    </span>
                </h6>
            </div>
            <div class="footer__bg--icon col-md-2 col-sm-6 col-6">
                <span>
                    <i class="ln ln-icon-Business-Man"></i>
                </span>
                <h6 class="bg__icon--text">
                <?php 
                    $sql = "SELECT COUNT(id) AS sum_candidate FROM users where candidate = 1";
                    $sum_candidate = getData($sql);
                    ?>
                    <span class='numscroller text-white' data-min='1' data-max='<?php echo $sum_candidate[0]['sum_candidate']; ?>' data-delay='5' data-increment='5'>421</span>
                    <span>
                        Resumes Posted
                    </span>
                </h6>
            </div>
        </div>
    </div>
    <div class="footer__bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <h6 class="footer__title">
                        For Candidates
                    </h6>
                    <ul class="footer__list">
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Browse Jobs
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Browse Categories
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Candidate Dashboard
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Job Alerts
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                My Bookmarks
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <h6 class="footer__title">
                        For Employers
                    </h6>
                    <ul class="footer__list">
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Browse Candidates
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Employer Dashboard
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Add Job
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Job Packages
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <h6 class="footer__title">
                        Other
                    </h6>
                    <ul class="footer__list">
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Job Page
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Job Page Alternative
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Resume Page
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Blog
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="/pages/contact.php" class="footer__list--link">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <h6 class="footer__title">
                        Legal
                    </h6>
                    <ul class="footer__list">
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                Terms of Use
                            </a>
                        </li>
                        <li class="footer__list--item">
                            <a href="#" class="footer__list--link">
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-12 col-12">
                    <h6 class="footer__title">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Sign Up For a Newsletter</span>
                    </h6>
                    <p class="footer__text">
                        Weekly breaking news, analysis and cutting edge advices on job searching.
                    </p>
                    <form action="#" class="footer__form">
                        <div class="d-flex">
                            <input type="email" placeholder="Enter your email here" />
                            <input type="submit" value="Subscribe" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="hr">
        <div class="container footer__bottom">
            <div class="row w-100">
                <p class="footer__bottom--left col-sm-10 col-12">© Theme by Purethemes.net. All Rights Reserved.</p>
                <div class="footer__bottom--right col-sm-2 col-12">
                    <a href="#" class="icon--fb">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon--tw">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

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
<!-- jquery validate -->
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