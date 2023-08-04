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
        <?php require_once('../menu_left.php'); ?>
        <div class="right mh-100">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">Danh sách ứng tuyển</h3>
                    <p class="link__home"><a href="/index.php">Trang chủ <i class="fas fa-angle-right"></i> </a>Danh sách ứng viên đã ẩn</p>
                    <div class="profile_details bookmark_detail bg-white p-0">
                        <?php
                        $user_id = $_SESSION['user']['id'];
                        $sql = "SELECT alert_job.*, jobs.title, jobs.id as id_job, jobs.category_id, jobs.images, users.id AS id_user, users.name FROM alert_job LEFT JOIN jobs ON jobs.id = alert_job.job_id LEFT JOIN users ON users.id = alert_job.user_id WHERE alert_job.employer = '$user_id' AND hidden = 1";
                        $alert_jobs = getData($sql);
                        ?>
                        <table class="table text__headline -size-15 m-0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="33%"><i class="fas fa-briefcase"></i> Tên công việc</th>
                                    <th width="25%"><i class="fas fa-users"></i> Tên người ứng tuyển</th>
                                    <th width="25%"><i class="fas fa-calendar-alt"></i> Ngày đăng công việc</th>
                                    <th width="15%"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alert_jobs as $alert_job) { ?>
                                    <tr>
                                        <td>
                                        <a href="../page_detail.php?job_id=<?php echo $alert_job['id_job']; ?>&category_id=<?php echo $alert_job['category_id']; ?>">
                                                <img width="70px" src="<?php echo $alert_job['images']; ?>" alt="">
                                                <p class="me-3"><?php echo $alert_job['title']; ?></p>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $alert_job['name']; ?>
                                        </td>
                                        <td>
                                            <?php $dateTimeString = $alert_job['created_at'];
                                            $dateTime = new DateTime($dateTimeString);
                                            $newFormat = $dateTime->format("F j, Y");
                                            echo $newFormat; ?>
                                        </td>
                                        <td>
                                        <a href="./hidden_candidate.php?hidden=<?php echo 0; ?>&id=<?php echo $alert_job['id']; ?>" class="btn btn-secondary mb-3 text-white"><i class="fa-solid fa-eye"></i> Hiện</a> <br>
                                            <a href="../employer/view_resumer_candidate.php?user_id=<?php echo $alert_job['user_id']; ?>" class="btn btn-primary text-white"><i class="fa-solid fa-eye"></i> Xem CV</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="./submit_job.php" class="btn btn--all ms-3 mb-3">Thêm mới công việc</a>
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