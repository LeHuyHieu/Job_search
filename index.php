<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorkScout - Job Board WordPress Theme</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="./css/workscout.in_wp-content_plugins_elementor_assets_lib_font-awesome_css_fontawesome.min.css">
    <link rel="stylesheet" type="text/css"  href="./css/workscout.in_wp-content_plugins_elementor_assets_lib_font-awesome_css_solid.min.css">
    <link rel="stylesheet" type="text/css"  href="./css/workscout.in_wp-content_themes_workscout_css_font-awesome.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css"  href="./css/slick.css">
    <link rel="stylesheet" type="text/css"  href="./css/slick-theme.css" />
    <!-- chosen -->
    <link rel="stylesheet" type="text/css"  href="./css/chosen.min.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css"  href="./css/font-awesome_6.4.0_css_all.min.css" />
    <!-- bootstrap5 -->
    <link rel="stylesheet" type="text/css"  href="./css/bootstrap.min.css" />
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="scss/main.css?v=<?php echo time(); ?>" />
</head>

<body>
    <!-- header  -->
    <header class="header" id="header">
        <!-- navbar -->
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="#" class="logo">
                    <img src="./images/logo.png" alt="logo" class="w-100 scroll__logo__light">
                    <img src="./images/logo_dark.png" alt="logo" class="w-100 scroll__logo__dark">
                </a>
            </div>
            <ul class="navbar__list">
                <li class="navbar__list--item">
                    <a href="#" class="navbar__list--link">
                        Home
                    </a>
                    <ul class="list__megamenu">
                        <li class="list__megamenu--item">
                            <a href="#" class="list__megamenu--link">
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
                    <a href="#" class="navbar__list--link">
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
                                    <a href="#" class="list__megamenu--link">
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
                    <a href="#" class="navbar__list--link">
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
                    <a href="#" class="navbar__list--link">
                        Pages
                    </a>
                    <ul class="list__megamenu">
                        <li class="list__megamenu--item">
                            <a href="#" class="list__megamenu--link">
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
                            <a href="#" class="list__megamenu--link">
                                Contact
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="login--register">
                <button class="btn btn--login">
                    <i class="fas fa-unlock"></i> Log in
                </button>
                <button class="btn btn--register">
                    <i class="fas fa-plus"></i> Register
                </button>
            </div>
            <div class="navbar__icon">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
        <!-- end navbar -->
        <nav class="navbar navbar__responsive">
            <div class="navbar__logo">
                <a href="#" class="logo">
                    <img src="./images/logo.png" alt="logo" class="w-100">
                </a>
            </div>
            <ul class="navbar__list">
                <li class="navbar__list--item click__item--navbar">
                    <a href="#" class="navbar__list--link">
                        Home
                    </a>
                    <ul class="list__megamenu show_megamenu">
                        <li class="list__megamenu--item">
                            <a href="#" class="list__megamenu--link">
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
                    <a href="#" class="navbar__list--link">
                        For Candidates
                    </a>
                    <ul class="list__megamenu show_megamenu1">
                        <li class="list__megamenu--item active click__item--navbar4">
                            <a href="#" class="list__megamenu--link">
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
                                    <a href="#" class="list__megamenu--link">
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
                    <a href="#" class="navbar__list--link">
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
                    <a href="#" class="navbar__list--link">
                        Pages
                    </a>
                    <ul class="list__megamenu show_megamenu3">
                        <li class="list__megamenu--item">
                            <a href="#" class="list__megamenu--link">
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
                            <a href="#" class="list__megamenu--link">
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
    <!-- end header -->

    <!-- section -->
    <section class="content" id="content">
        <!-- banner section -->
        <div class="position-relative banner">
            <div class="banner__before container">
                <h1 class="banner__title">
                    Find job
                </h1>
                <h3 class="banner__title">
                    Hire Experts or be hirded in <span class="typed">sales &
                        marketing</span>
                </h3>
                <form action="#" class="row banner__search banner__btn">
                    <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                        <button class="banner__btn--item">
                            What job are you looking for?
                        </button>
                        <input type="text" placeholder="Job title, skill, Industry">
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 position-relative banner__search--box">
                        <button class="banner__btn--item">
                            Where?
                        </button>
                        <input type="text" placeholder="City, State, or Zip">
                        <label for>
                            <span class="box__item">type and hit enter
                            </span>
                            <i class="fas fa-map-marker-alt box__item"></i>
                        </label>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                        <button class="banner__btn--item">
                            Categories
                        </button>
                        <select class="form-select select__box chosen-select" name id data-placeholder="Choose a country...">
                            <option value="0">
                                All categories
                            </option>
                            <option value="1">
                                Accounting / Finance
                            </option>
                            <option value="2">
                                Automotive Jobs
                            </option>
                            <option value="3">
                                Construction / Facilities
                            </option>
                            <option value="4">
                                Automotive Jobs
                            </option>
                            <option value="5">
                                Education Training
                            </option>
                            <option value="6">
                                Healthcare
                            </option>
                            <option value="7">
                                Restaurant / Food Service
                            </option>
                            <option value="8">
                                Sales & Marketing
                            </option>
                            <option value="9">
                                - Market & Customer Research
                            </option>
                            <option value="10">
                                Telecommunications
                            </option>
                            <option value="11">
                                Transportation / Logistics
                            </option>
                        </select>
                        <button type="submit" class="btn btn--search">
                            <span class="btn__search">Search</span>
                            <i class="fas fa-search icon__search"></i>
                        </button>
                    </div>
                </form>
                <p class="banner__text">Need more search options? <a href="#">Advanced Search</a></p>
            </div>
            <div class="banner__after"></div>
        </div>
        <!-- end banner section -->
        <div class="container pt-5">
            <h2 class="pt-5 text__headline -bold-400 -dark -size-25 mb-5">
                Popular Categories
            </h2>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Bar-Chart"></i>
                            <p class="-dark -size-20">Accounting / Finance</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Car-3"></i>
                            <p class="-dark -size-20">Automotive Jobs</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Worker"></i>
                            <p class="-dark -size-20">Construction /
                                Facilities</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Brush"></i>
                            <p class="-dark -size-20">Design, Art &
                                Multimedia</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Student-Female"></i>
                            <p class="-dark -size-20">Education Training</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Medical-Sign"></i>
                            <p class="-dark -size-20">Healthcare</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Plates"></i>
                            <p class="-dark -size-20">Restaurant / Food
                                Service</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 content__item">
                    <a href="#" class="item__flex">
                        <div class="item__flex--left">
                            <i class="ln ln-icon-Handshake"></i>
                            <p class="-dark -size-20">Sales & Marketing</p>
                        </div>
                        <div class="item__flex--right">
                            <span class="-size-32">3</span>
                        </div>
                    </a>
                </div>
            </div>
            <a href="#" class="btn btn--all">Browse All Categories</a>
        </div>
        <hr class="hr">
        <div class="container">
            <div class="row pb-7">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 jobs">
                    <h2 class="pt-5 mt-5 text__headline -bold-400 -dark -size-25 mb-5">
                        Recent Jobs
                    </h2>
                    <div class="jobs__item">
                        <a href="#" class="d-flex">
                            <div class="jobs__item--img">
                                <img src="./images/company-logo-06-150x150.png" class="w-100" alt>
                            </div>
                            <div class="jobs__item--text">
                                <h6 class="-size-15 -dark">Senior Health and
                                    Nutrition Advisor</h6>
                                <ul class="d-flex jobs__item--icon">
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Management"></i>
                                        Telimed
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Map2"></i>
                                        Paris, France
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Money-2"></i>
                                        $30,000.00 - $35,000.00
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn--transparent">
                                Full time
                            </button>
                        </a>
                    </div>
                    <div class="jobs__item">
                        <a href="#" class="d-flex">
                            <div class="jobs__item--img">
                                <img src="./images/company-logo-02-1-150x150.png" class="w-100" alt>
                            </div>
                            <div class="jobs__item--text">
                                <h6 class="-size-15 -dark">Senior Health and
                                    Nutrition Advisor</h6>
                                <ul class="d-flex jobs__item--icon">
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Management"></i>
                                        Telimed
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Map2"></i>
                                        Paris, France
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Money-2"></i>
                                        $30,000.00 - $35,000.00
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn--transparent">
                                Full time
                            </button>
                        </a>
                    </div>
                    <div class="jobs__item">
                        <a href="#" class="d-flex">
                            <div class="jobs__item--img">
                                <img src="./images/placeholder.png" class="w-100" alt>
                            </div>
                            <div class="jobs__item--text">
                                <h6 class="-size-15 -dark">Senior Health and
                                    Nutrition Advisor</h6>
                                <ul class="d-flex jobs__item--icon">
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Management"></i>
                                        Telimed
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Map2"></i>
                                        Paris, France
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Money-2"></i>
                                        $30,000.00 - $35,000.00
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn--transparent">
                                Full time
                            </button>
                        </a>
                    </div>
                    <div class="jobs__item">
                        <a href="#" class="d-flex">
                            <div class="jobs__item--img">
                                <img src="./images/placeholder.png" class="w-100" alt>
                            </div>
                            <div class="jobs__item--text">
                                <h6 class="-size-15 -dark">Senior Health and
                                    Nutrition Advisor</h6>
                                <ul class="d-flex jobs__item--icon">
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Management"></i>
                                        Telimed
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Map2"></i>
                                        Paris, France
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Money-2"></i>
                                        $30,000.00 - $35,000.00
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn--transparent">
                                Full time
                            </button>
                        </a>
                    </div>
                    <div class="jobs__item">
                        <a href="#" class="d-flex">
                            <div class="jobs__item--img">
                                <img src="./images/company-logo-01-2-150x150.png" class="w-100" alt>
                            </div>
                            <div class="jobs__item--text">
                                <h6 class="-size-15 -dark">Senior Health and
                                    Nutrition Advisor</h6>
                                <ul class="d-flex jobs__item--icon">
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Management"></i>
                                        Telimed
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Map2"></i>
                                        Paris, France
                                    </li>
                                    <li class="jobs__itemsub">
                                        <i class="ln ln-icon-Money-2"></i>
                                        $30,000.00 - $35,000.00
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn--transparent">
                                Full time
                            </button>
                        </a>
                    </div>
                    <a href="#" class="btn btn--all"><i class="fas fa-plus-circle pe-2"></i> Browse Jobs</a>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 slider">
                    <h2 class="pt-5 mt-5 text__headline -bold-400 -dark -size-25 mb-5">
                        Featured Jobs
                    </h2>
                    <div class="single-item jobs" data-slick='{"slidesToShow": 1, "slidesToScroll": 1}'>
                        <div class="jobs__item">
                            <a href="#" class="d-flex flex-column">
                                <div class="w-100 jobs__item--text">
                                    <h6 class="-size-15 -dark">
                                        Senior Health and Nutrition Advisor
                                        <button class="btn btn--transparent">
                                            Full time
                                        </button>
                                    </h6>
                                    <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Management"></i>
                                            Telimed
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Map2"></i>
                                            Paris, France
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Money-2"></i>
                                            $30,000.00 - $35,000.00
                                        </li>
                                    </ul>
                                    <p>
                                        The Social Media &amp; PR Executive
                                        will be responsible
                                        for increasing hotel marketing
                                        communication across a
                                        variety of social media
                                    </p>
                                </div>
                                <button class="btn--all">
                                    Apply For This Job
                                </button>
                            </a>
                        </div>
                        <div class="jobs__item">
                            <a href="#" class="d-flex flex-column">
                                <div class="w-100 jobs__item--text">
                                    <h6 class="-size-15 -dark">
                                        Senior Health and Nutrition Advisor
                                        <button class="btn btn--transparent">
                                            Full time
                                        </button>
                                    </h6>
                                    <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Management"></i>
                                            Telimed
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Map2"></i>
                                            Paris, France
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Money-2"></i>
                                            $30,000.00 - $35,000.00
                                        </li>
                                    </ul>
                                    <p>
                                        The Social Media &amp; PR Executive
                                        will be responsible
                                        for increasing hotel marketing
                                        communication across a
                                        variety of social media
                                    </p>
                                </div>
                                <button class="btn--all">
                                    Apply For This Job
                                </button>
                            </a>
                        </div>
                        <div class="jobs__item">
                            <a href="#" class="d-flex flex-column">
                                <div class="w-100 jobs__item--text">
                                    <h6 class="-size-15 -dark">
                                        Senior Health and Nutrition Advisor
                                        <button class="btn btn--transparent">
                                            Full time
                                        </button>
                                    </h6>
                                    <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Management"></i>
                                            Telimed
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Map2"></i>
                                            Paris, France
                                        </li>
                                        <li class="jobs__itemsub">
                                            <i class="ln ln-icon-Money-2"></i>
                                            $30,000.00 - $35,000.00
                                        </li>
                                    </ul>
                                    <p>
                                        The Social Media &amp; PR Executive
                                        will be responsible
                                        for increasing hotel marketing
                                        communication across a
                                        variety of social media
                                    </p>
                                </div>
                                <button class="btn--all">
                                    Apply For This Job
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content__bg__dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <h4 class="text__headline -size-30 text-white">
                            Explore a faster, easier, and better job search
                        </h4>
                        <ul class="bg__dark__list">
                            <li class="bg__dark__list--item">
                                <i class="fas fa-check"></i>
                                Unmatched quality of remote, hybrid, and
                                flexible jobs
                            </li>
                            <li class="bg__dark__list--item">
                                <i class="fas fa-check"></i>
                                Premium skills tests, remote courses, career
                                coaching, and more
                            </li>
                            <li class="bg__dark__list--item">
                                <i class="fas fa-check"></i>
                                Unmatched quality of remote, hybrid, and
                                flexible jobs
                            </li>
                        </ul>
                        <a href="#" class="btn m-0 btn--all btn--bgdark">Browse
                            Jobs</a>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12 position-relative">
                        <div class="bg__dark__img">
                            <img width="100%" src="./images/bg_sub_bg-section2.jpg" alt>
                            <img class="img__sub__left" src="./images/img_sub_bg-section1.jpg" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content__slider pt-5">
            <h2 class="pt-5 text-center text__headline -bold-500 -dark -size-30">
                What Our Users Say <img src="./images/haha.svg" width="20px" height="20px" alt="😍">
            </h2>
            <p class="text-center text__headline -gray -size-20 -bold-300">Check
                honest reviews from our customers!</p>
            <div class="center" data-slick='{"slidesToShow": 3, "slidesToScroll": 1}'>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-01.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-02.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-03.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-01.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
                <div class="content__slider--item">
                    <p class="content__slider--text">
                        I have already heard back about the internship I
                        applied through WorkScout, that’s the fastest job
                        reply I’ve ever gotten and it’s so much better than
                        waiting weeks to hear back.
                    </p>
                    <div class="content__slider--img--cicle">
                        <img src="./images/avatar-02.png" class="100%" alt>
                    </div>
                    <div class="content__slider--name">
                        John Smith
                        <span>Jobseeker</span>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr mt-5">
        <h2 class="pt-5 text-center text__headline -bold-400 -dark -size-25">
            Our Blog
        </h2>
        <p class="text-center mb-5 pb-5 text__headline -gray -size-20 -bold-300">
            See how you can up your career status
        </p>
        <div class="container mb-5 pb-5">
            <div class="row">
                <div class="col-md-4 col-sm-16 col-12 our__block">
                    <a href="#" class="our__block--border">
                        <div class="our__block--img">
                            <img src="./images/our_blog1.jpg" alt class="w-100">
                            <span><i class="fa-solid fa-share"></i></span>
                        </div>
                        <div class="p-5">
                            <div class="our__block--title text__headline -size-20 mb-4">
                                11 Tips to Help You Get New Clients Through Cold
                                Calling
                            </div>
                            <div class="our__block--day mb-4 text__headline -gray -size-15">
                                October 25, 2015
                            </div>
                            <div class="our__block--text text__headline -gray -size-14">
                                Objectively innovate empowered manufactured products
                                whereas parallel platforms. Holisticly predominate
                                extensible testing procedures for reliable
                            </div>
                            <button href="#" class="btn ms-0 btn--all">Read More</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-16 col-12 our__block">
                    <a href="#" class="our__block--border">
                        <div class="our__block--img">
                            <img src="./images/our_blog2.jpg" alt class="w-100">
                            <span><i class="fa-solid fa-share"></i></span>
                        </div>
                        <div class="p-5">
                            <div class="our__block--title text__headline -size-20 mb-4">
                                How to “Woo” a Recruiter and Land Your Dream Job
                            </div>
                            <div class="our__block--day mb-4 text__headline -gray -size-14">
                                October 25, 2015
                            </div>
                            <div class="our__block--text text__headline -gray -size-15">
                                Collaboratively administrate empowered markets via
                                plug-and-play networks. Dynamically procrastinate
                                B2C users after installed base benefits.
                            </div>
                            <button href="#" class="btn ms-0 btn--all">Read More</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-16 col-12 our__block">
                    <a href="#" class="our__block--border">
                        <div class="our__block--img">
                            <img src="./images/our_blog3.jpg" alt class="w-100">
                            <span><i class="fa-solid fa-share"></i></span>
                        </div>
                        <div class="p-5">
                            <div class="our__block--title text__headline -size-20 mb-4">
                                Hey Job Seeker, It’s Time To Get Up And Get Hired
                            </div>
                            <div class="our__block--day mb-4 text__headline -gray -size-14">
                                October 25, 2015
                            </div>
                            <div class="our__block--text text__headline -gray -size-15">
                                One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his
                            </div>
                            <btn href="#" class="btn ms-0 btn--all">Read More</btn>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- footer -->
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
                        <img src="./images/logo.png" alt="" class="w-100">
                    </a>
                </div>
                <div class="footer__bg--icon ms-auto col-md-2 col-sm-6 col-6">
                    <span>
                        <i class="ln ln-icon-Management"></i>
                    </span>
                    <h6 class="bg__icon--text">
                        1124
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
                        421
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
                    <div class="col-md-2 col-sm-6 col-6">
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
                    <div class="col-md-2 col-sm-6 col-6">
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
                    <div class="col-md-2 col-sm-6 col-6">
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
                                <a href="#" class="footer__list--link">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6">
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
                    <div class="col-md-4 col-sm-12 col-12">
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
                <p class="footer__bottom--left">© Theme by Purethemes.net. All Rights Reserved.</p>
                <div class="footer__bottom--right">
                    <a href="#" class="icon--fb">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="icon--tw">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- jquery -->
    <script src="./js/jquery-3.7.0.min.js"></script>
    <!-- bootstrap 5 -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="./js/slick.min.js"></script>
    <!-- chosen -->
    <script src="./js/chosen.jquery.min.js"></script>
    <script src="./js/chosen.proto.min.js"></script>
    <!-- typed js -->
    <script src="./js/cdnjs.cloudflare.com_ajax_libs_typed.js_2.0.10_typed.min.js"></script>
    <!-- scrollreveal js -->
    <script src="./js/unpkg.com_scrollreveal@4.0.9_dist_scrollreveal.js"></script>
    <!-- main js -->
    <script src="./js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>