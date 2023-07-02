<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Jobs</title>";
require_once('../head.php');
$selected = "selected";
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}
?>

<body>
    <!-- header -->
    <?php
    require_once('../header_white.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <section class="content categories bg-light">
        <h5 class="-p -pl-5 -pr-5 -pt-5 text__headline -size-16 -gray -bold-400">Find Job</h5>
        <form action="process_search_job.php" method="post" class="row banner__search banner__btn search__category -p -pl-5 -pr-5">
            <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                <input type="text" name="keyword" value="<?php echo (isset($_GET['keyword'])) ? $keyword : ""; ?>" placeholder="Job title, skill, Industry" />
            </div>
            <?php
            if(isset($_GET['city_id'])) {
                $city_id = $_GET['city_id'];
            }
            $sql3 = "SELECT * FROM city";
            $city_table = getData($sql3);
            ?>
            <div class="col-md-4 col-sm-12 col-12 position-relative banner__search--box">
                <select class="form-select select__box chosen-select" name="city_id" id="" data-placeholder="Choose a country...">
                    <option value="0">All Location</option>
                    <?php foreach ($city_table as $city) { ?>
                       <option value="<?php echo $city['id']; ?>" <?php if(isset($_GET['city_id'])) { if($city_id == $city['id']){ echo $selected; }} ?> ><?php echo $city['city_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php
            if(isset($_GET['category_id'])){
                $category_id = $_GET['category_id'];
            }
            $sql = "SELECT * FROM categories";
            $categories = getData($sql);
            ?>
            <div class="col-md-4 col-sm-12 col-12 banner__search--box">
                <select class="form-select select__box chosen-select" name="category_id" id="" data-placeholder="Choose a country...">
                    <option value="0">All categories</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id']; ?>" <?php if(isset($_GET['category_id'])){if($category_id == $category['id']) { echo $selected; }} ?> ><?php echo $category['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-grid grid__find--job mt-5" style="grid-template-columns: 20% 25% auto;">
                <div class="mb-5">
                    <h5 class="text__headline -size-16 -bold-400 job__type--click">Job type <i class="fas fa-chevron-down"></i></h5>
                    <div class="job__type">
                        <div class="check__box">
                            <input type="checkbox" name="freelance" value="1" id="freelance" checked>
                            <label for="freelance"><span class="check"></span> Freelance</label>
                        </div>
                        <div class="check__box">
                            <input type="checkbox" name="full_time" value="1" id="full-time" checked>
                            <label for="full-time"><span class="check"></span> Full Time</label>
                        </div>
                        <div class="check__box">
                            <input type="checkbox" name="internship" value="1" id="internship" checked>
                            <label for="internship"><span class="check"></span> Internship</label>
                        </div>
                        <div class="check__box">
                            <input type="checkbox" name="part_time" value="1" id="part-time" checked>
                            <label for="part-time"><span class="check"></span> Part Time</label>
                        </div>
                        <div class="check__box">
                            <input type="checkbox" name="temporary" value="1" id="temporary" checked>
                            <label for="temporary"><span class="check"></span> Temporary</label>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="text__headline -size-16 -bold-400 job__type--click2">Salary <i class="fas fa-chevron-down"></i></h5>
                    <div class="job__type2">
                        <div class="check__box check__range">
                            <input type="checkbox" name="" value="" id="wage">
                            <label for="wage"><span class="check"></span> Filter by Salary</label>
                        </div>
                        <div class="scroll">
                            <span>
                                $<input type="text" name="salary_from" value="15000" readonly class="sliderValue wage__range" data-index="0" />
                                -
                                $<input type="text" name="salary_to" value="75000" readonly class="sliderValue wage__range" data-index="1" />
                            </span>
                            <div id="slider"></div>
                        </div>
                    </div>
                </div>
                <button class="btn btn--all mt-0">Tìm Job</button>
            </div>
        </form>
        <?php
        $sql2 = "SELECT jobs.*, city.city_name as name_city, company.name as name_company FROM jobs LEFT JOIN city ON city.id = jobs.city_id LEFT JOIN company ON company.id = jobs.company_id ORDER BY id DESC LIMIT 5";
        $jobs = getData($sql2);
        ?>
        <div class="bg-white">
            <div class="container content__jobs py-5">
                <div class="row single-item jobs">
                    <?php foreach ($jobs as $job) { ?>
                        <div class="col-md-4 col-sm-6 col-12 mb-5">
                            <div class="jobs__item border--item">
                                <a href="page_detail.php?job_id=<?php echo $job['id']; ?>" class="d-flex flex-column">
                                    <div class="w-100 jobs__item--text">
                                        <h6 class="-size-15 -dark">
                                            <?php echo $job['title']; ?>
                                            <button class="btn btn--transparent">
                                                <?php
                                                if ($job['full_time'] == 1) {
                                                    echo "Full Time";
                                                }
                                                if ($job['internship'] == 1) {
                                                    echo "Internship";
                                                }
                                                if ($job['temporary'] == 1) {
                                                    echo "Temporary";
                                                }
                                                if ($job['freelance'] == 1) {
                                                    echo "Freelance";
                                                }
                                                if ($job['part_time'] == 1) {
                                                    echo "Part time";
                                                }
                                                ?>
                                            </button>
                                        </h6>
                                        <ul class="d-flex mb-4 flex-column align-items-start jobs__item--icon">
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Management"></i> <?php echo $job['name_city']; ?>
                                            </li>
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Map2"></i> <?php echo $job['name_company']; ?>
                                            </li>
                                            <li class="jobs__itemsub">
                                                <i class="ln ln-icon-Money-2"></i> $<?php echo number_format($job['salary_from']); ?> - $<?php echo number_format($job['salary_to']); ?>
                                            </li>
                                        </ul>
                                        <p><?php
                                            $substr = $job['description'];
                                            echo substr($substr, 0, 130);
                                            ?></p>
                                    </div>
                                    <button class="btn--all btn--0">
                                        Apply For This Job
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
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