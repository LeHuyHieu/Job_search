<!DOCTYPE html>
<html lang="en">

<?php 
require_once ('./head.php');
?>

<body>
    <?php
    require_once('./header_dark.php');
    ?>

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

    <?php
    require_once('./footer.php');
    ?>
</body>

</html>