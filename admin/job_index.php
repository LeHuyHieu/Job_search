<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
echo "<title>Job admin</title>";
require_once('../head.php');
?>

<?php
$sql = "SELECT city.city_name, company.name AS company_name ,jobs.* FROM jobs LEFT JOIN company on company.id = jobs.company_id LEFT JOIN city on city.id = jobs.city_id ORDER BY id DESC";
$jobs = getData($sql);
// $jobs2 = getData($sql2);
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title">Job Admin</h1>
        <a href="./job_add.php" class="btn btn-primary btn--admin ms-auto me-5"><i class="fas fa-plus-circle"></i> Add</a>
        <div class="container">
            <div class="row">
                <div class="col-4 menu__left">
                    <?php require_once('../admin/menu.php'); ?>
                </div>
                <div class="col-8 content__right">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="30px">Id</th>
                                            <th>Title</th>
                                            <th>Company</th>
                                            <th width="100px">Salary from</th>
                                            <th width="90px">Salary to</th>
                                            <th>City</th>
                                            <th width="90px">Public</th>
                                            <th width="160px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jobs as $job) { ?>
                                            <tr>
                                                <td><?php echo $job['id']; ?></td>
                                                <td><?php echo $job['title']; ?></td>
                                                <td><?php echo $job['company_name']; ?></td>
                                                <td>$<?php echo $job['salary_from']; ?></td>
                                                <td>$<?php echo $job['salary_to']; ?></td>
                                                <td><?php echo $job['city_name']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($job['is_public'] == 1) {
                                                        echo "<button class='btn btn-success'>Còn hạn</button>";
                                                    } else {
                                                        echo "<button class='btn btn-danger'>Hết hạn</button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="./job_delete.php?delete_id=<?php echo $job['id']; ?>" class="btn btn--action btn-danger" onclick="if (confirm('Bạn chắc chắc muốn xóa?')){return true;}else{event.stopPropagation(); event.preventDefault();};">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </a>
                                                    <a href="./job_edit.php?id=<?php echo $job['id']; ?>&category_id=<?php echo $job['category_id']; ?>&company_id=<?php echo $job['company_id']; ?>&city_id=<?php echo $job['city_id']; ?>" class="btn btn--action btn-primary">
                                                        <i class="fa-solid fa-file-pen"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/code.jquery.com_ui_1.12.1_jquery-ui.js"></script>
    <script src="/js/numscroller-1.0.js"></script>
    <!-- bootstrap 5 -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- summernote -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_summernote_0.8.20_summernote-bs5.min.js"></script>
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