<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../../head.php');
?>

<body class="p-0 position_header">
    <?php
    require_once('../../header.php');
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
                        <li class="item__profile"><a href="/pages/candidate/manage_jobalert.php" class="link__profile"><i class="fas fa-bell"></i> Job Alerts <span class="notification">1</span></a></li>
                    </ul>
                </div>
                <?php if ($_SESSION['user']['candidate']) { ?>
                    <div class="left__block">
                        <h5 class="title__profile">Candidate</h5>
                        <ul class="list__profile">
                            <li class="item__profile"><a href="#" class="link__profile"><i class="fa-solid fa-rectangle-list"></i> Manage Resumer</a></li>
                            <li class="item__profile"><a href="/pages/candidate/add_resumer.php" class="link__profile"><i class="fa-solid fa-square-plus"></i> Add Resume</a></li>
                        </ul>
                    </div>
                <?php } ?>
                <?php if ($_SESSION['user']['employer'] == 1) { ?>
                    <div class="left__block">
                        <h5 class="title__profile">Employer</h5>
                        <ul class="list__profile">
                            <li class="item__profile"><a href="/pages/employer/managae_job.php" class="link__profile"><i class="fa-solid fa-rectangle-list"></i> Manage Jobs</a></li>
                            <li class="item__profile"><a href="/pages/employer/submit_job.php" class="link__profile"><i class="fa-solid fa-square-plus"></i> Submit Jobs </a></li>
                            <li class="item__profile"><a href="/pages/employer/manage_companies.php" class="link__profile color__green"><i class="fa-solid fa-rectangle-list"></i> Manage Companies</a></li>
                            <li class="item__profile"><a href="/pages/employer/add_company.php" class="link__profile"><i class="fa-solid fa-square-plus"></i> Add Company <span class="notification">1</span></a></li>
                        </ul>
                    </div>
                <?php } ?>
                <div class="left__block">
                    <h5 class="title__profile">Account</h5>
                    <ul class="list__profile">
                        <li class="item__profile"><a href="/pages/profile.php" class="link__profile"><i class="fas fa-user-circle"></i> My Profile</a></li>
                        <li class="item__profile"><a href="/process_logout.php" class="link__profile"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">Công ty của tôi</h3>
                    <p class="link__home"><a href="/index.php">Trang chủ <i class="fas fa-angle-right"></i> </a>Công ty của tôi</p>
                    <div class="profile_details bookmark_detail bg-white p-0">
                        <?php
                        $user_id = $_SESSION['user']['id'];
                        $sql = "SELECT * FROM company WHERE user_id = '$user_id'";
                        $companies = getData($sql);
                        ?>
                        <table class="table text__headline -size-15 m-0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="33%"> Tên công ty</th>
                                    <th width="25%"> Trạng thái</th>
                                    <th width="25%"> Ngày đăng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($companies as $company) { ?>
                                    <tr>
                                        <td>
                                            <a href="../detail_company.php?company_id=<?php echo $company['id']; ?>">
                                                <img width="70px" src="<?php echo $company['images']; ?>" alt="">
                                                <p class="me-3"><?php echo $company['name']; ?></p>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo ($company['status'] == 0 || $company['status'] == '') ? "Chờ xem sét" : "Đã duyệt"; ?></td>
                                        <td>
                                            <?php $dateTimeString = $company['created_at'];
                                            $dateTime = new DateTime($dateTimeString);
                                            $newFormat = $dateTime->format("F j, Y");
                                            echo $newFormat; ?>
                                        </td>
                                        <td>
                                            <a href="./delete_company.php?delete_id=<?php echo $company['id']; ?>" class="btn-delete delete text-white"><i class="fas fa-times"></i> Xóa</a>
                                            <a href="../detail_company.php?company_id=<?php echo $company['id']; ?>" class="btn-view view text-white"><i class="fa-solid fa-eye"></i> Deleil</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="./add_company.php" class="btn btn--all ms-3 mb-3">Thêm mới công ty</a>
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