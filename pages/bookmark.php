<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../head.php');
?>

<body class="p-0 position_header">
    <?php
    require_once('../header.php');
    ?>
    <section class="content connect__profile">
        <?php require_once('./menu_left.php'); ?>
        <div class="right mh-100">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">My BookMarks</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>My BookMarks</p>
                    <div class="profile_details bookmark_detail bg-white p-0">
                        <table class="table text__headline -size-15 m-0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="50%"><i class="fas fa-heart"></i> BookMark</th>
                                    <th><i class="fas fa-clipboard"></i> Ghi chú</th>
                                    <th width="15%"></th>
                                </tr>
                            </thead>
                            <?php 
                            $user_id = $_SESSION['user']['id'];
                            $sql = "SELECT jobs.title, jobs.id, jobs.category_id, jobs.bookmark_note FROM jobs where jobs.bookmark = '$user_id'";
                            $jobs = getData($sql);
                            ?>
                            <tbody>
                                <?php foreach ($jobs as $job) { ?>
                                    <tr>
                                        <td><a href="./page_detail.php?job_id=<?php echo $job['id'] ?>&category_id<?php echo $job['category_id']; ?>"><?php echo $job['title']; ?></a></td>
                                        <td><?php echo $job['bookmark_note']; ?></td>
                                        <td><a href="#"><i class="fas fa-times"></i> Xóa</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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