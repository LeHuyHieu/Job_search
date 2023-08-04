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
                    <h3 class="title__content__profile">Công ty của tôi</h3>
                    <p class="link__home"><a href="/index.php">Trang chủ <i class="fas fa-angle-right"></i> </a>Công ty của tôi</p>
                    <div class="profile_details bookmark_detail bg-white p-0">
                        <?php
                        $user_id = $_SESSION['user']['id'];
                        $sql = "SELECT * FROM jobs WHERE user_id = '$user_id'";
                        $jobs = getData($sql);
                        ?>
                        <table class="table text__headline -size-15 m-0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="10%"> Image</th>
                                    <th width="33%"> Tên công việc</th>
                                    <th width="20%"> Trạng thái</th>
                                    <th width="20%"> Ngày đăng</th>
                                    <th> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jobs as $job) { ?>
                                    <tr>
                                        <td> <img width="70px" src="<?php echo $job['images']; ?>" alt=""></td>
                                        <td>
                                            <a href="../page_detail.php?job_id=<?php echo $job['id']; ?>">
                                                <p class="me-3"><?php echo $job['title']; ?></p>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo ($job['is_public'] == 0 || $job['is_public'] == '') ? "Chờ duyệt" : "Đã duyệt"; ?>
                                        </td>
                                        <td>
                                            <?php $dateTimeString = $job['created_at'];
                                            $dateTime = new DateTime($dateTimeString);
                                            $newFormat = $dateTime->format("F j, Y");
                                            echo $newFormat; ?>
                                        </td>
                                        <td>
                                            <a href="./delete_job.php?delete_id=<?php echo $job['id']; ?>" class="btn-delete delete text-white"><i class="fas fa-times"></i> Xóa</a> <br>
                                            <a href="../page_detail.php?job_id=<?php echo $job['id']; ?>&category_id=<?php echo $job['category_id']; ?>" class="btn-view view text-white"><i class="fa-solid fa-eye"></i> Deleil</a>
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