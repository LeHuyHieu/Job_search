<!DOCTYPE html>
<html lang="en">

<?php
require_once('../head.php');
?>

<body>
    <!-- header -->
    <?php
    require_once('../header_white.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <section class="content categories">
        <div class="bg-light">
            <div class="container">
                <div class="categories__block">
                    <h3 class="categories__title text__headline -bold-400 -size-25">
                        Browse Jobs – List Layout
                    </h3>
                    <p class="categories__text">
                        <a href="#" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Browse Jobs – Grid Layout</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="row">
                <div class="col-md-8 col-ms-12 col-12 jobs">
                    <div class="jobs__item border--left__red">
                        <a href="#" class="d-flex">
                            <div class="jobs__item--img">
                                <img src="/images/company-logo-06-150x150.png" class="w-100" alt="">
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
                            <div class="jobs__item--btn">
                                <button class="btn btn--transparent -yellow">
                                    Full time
                                </button>
                                <button class="btn btn--transparent -blue">
                                    Internship
                                </button>
                                <button class="btn btn--transparent -green">
                                    Temporary
                                </button>
                            </div>
                        </a>
                    </div>
                    <?php for ($i = 0; $i <= 9; $i++) { ?>
                        <div class="jobs__item">
                            <a href="#" class="d-flex">
                                <div class="jobs__item--img">
                                    <img src="/images/company-logo-06-150x150.png" class="w-100" alt="">
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
                                <div class="jobs__item--btn">
                                    <button class="btn btn--transparent -yellow">
                                        Full time
                                    </button>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="categories__list--page">
                        <a href="#" class="btn btn--page btn--page--active">1</a>
                        <a href="#" class="btn btn--page">2</a>
                        <a href="#" class="btn btn--page">3</a>
                        <a href="#" class="btn btn--page btn--next">Next</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12 search__job">
                    <form action="#" class="search__category">
                        <div class="mb-5">
                            <h5 class="text__headline -size-20 -bold-400">Keywords</h5>
                            <input type="text" class="form-control search__category--keywords" placeholder="job title, keywords or company">
                        </div>
                        <div class="mb-5">
                            <h5 class="text__headline -size-20 -bold-400">Location</h5>
                            <input type="text" class="form-control search__category--keywords" placeholder="Location">
                        </div>
                        <h5 class="text__headline -size-20 -bold-400">Job type</h5>
                        <div class="mb-5">
                            <div class="check__box">
                                <input type="checkbox" id="freelance" checked>
                                <label for="freelance"><span class="check"></span> Freelance</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" id="full-time" checked>
                                <label for="full-time"><span class="check"></span> Full Time</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" id="internship" checked>
                                <label for="internship"><span class="check"></span> Internship</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" id="part-time" checked>
                                <label for="part-time"><span class="check"></span> Part Time</label>
                            </div>
                            <div class="check__box">
                                <input type="checkbox" id="temporary" checked>
                                <label for="temporary"><span class="check"></span> Temporary</label>
                            </div>
                        </div>
                        <div class="mb-5">
                            <h5 class="text__headline -size-20 -bold-400">Categories</h5>
                            <select class="form-select select__box chosen-select" data-placeholder="Choose a country...">
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
                        </div>
                        <div class="mb-5">
                            <div class="check__box check__range">
                                <input type="checkbox" id="wage">
                                <label for="wage"><span class="check"></span> Filter by Salary</label>
                            </div>
                            <div class="scroll">
                                <span>
                                    $<input type="text" disabled class="sliderValue wage__range" data-index="0" value="15000" />
                                    -
                                    $<input type="text" disabled class="sliderValue wage__range" data-index="1" value="75000" />
                                </span>
                                <div id="slider"></div>
                            </div>
                        </div>
                        <h5 class="text__headline -size-20 -bold-400">Filter by tag: </h5>
                        <div class="mb-5">
                            <div class="check__box fiter">
                                <input type="checkbox" id="filter_by_tag">
                                <label for="filter_by_tag"><span class="check">PHP</span></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- footer -->
    <?php
    require_once('../footer.php');
    ?>
    <!-- end footer -->
</body>

</html>