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
$sql_conditions = "WHERE 1 "; // điều kiện where 1 là điều kiện luôn đúng
$param = '';
if (isset($_GET['title']) && strlen($_GET['title'])) {
    $sql_conditions .= " AND name LIKE '%" . $_GET['title'] . "%' ";
    $param .= '&title=' . $_GET['title'];
}

$sql = "SELECT COUNT(*) as total FROM company ";
$sql .= $sql_conditions;

$total = getData($sql);
$total = $total[0]['total'];
$num_per_page = 5;
$total_page = ceil($total / $num_per_page);
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$start = ($page - 1) * $num_per_page;

$sql = "SELECT * FROM company ";
$sql .= $sql_conditions;
$sql .= "ORDER BY id DESC LIMIT $start,$num_per_page";
$company_table = getData($sql);
// print_r($sql);die;
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title">Company Admin</h1>
        <a href="./company_add_edit.php" class="btn btn-primary btn--admin ms-auto me-5"><i class="fas fa-plus-circle"></i> Add</a>
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
                        <form method="get" action="company_index.php" class="form__block d-flex align-items-start pt-4 mb-0 pe-4 justify-content-end bg-white rounded">
                            <div class="box__block ms-3 w-25">
                                <input type="text" name="title" class="form-control mb-3 text__headline -size-14 py-2" value="<?php echo (isset($_GET['title'])) ? $_GET['title'] : ""; ?>" placeholder="Title" />
                            </div>
                            <button class="btn btn-primary py-2 px-4 ms-auto" type="submit">Tìm kiếm <i class="fas fa-search ms-3"></i></button>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="60px">Id</th>
                                            <th>Company Name</th>
                                            <th>Company phone</th>
                                            <th>Company Email</th>
                                            <th width="200px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($company_table as $company) { ?>
                                            <tr>
                                                <td><?php echo $company['id']; ?></td>
                                                <td><?php echo $company['name']; ?></td>
                                                <td><?php echo $company['contact_phone']; ?></td>
                                                <td><?php echo $company['contact_email']; ?></td>
                                                <td>
                                                    <a href="./company_delete.php" class="btn btn--action btn-danger" onclick="if (confirm('Bạn chắc chắc muốn xóa?')){return true;}else{event.stopPropagation(); event.preventDefault();};">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </a>
                                                    <a href="./company_add_edit.php?id=<?php echo $company['id']; ?>" class="btn btn--action btn-primary">
                                                        <i class="fa-solid fa-file-pen"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end">
                                <?php if ($page > 1) { ?>
                                    <a class="btn btn-primary ms-3" href="?page=<?php echo $page - 1; ?>&<?php echo $param; ?>"><i class="fas fa-angle-double-left"></i></a>
                                <?php } ?>

                                <?php if (!isset($_GET['page']) || $_GET['page'] <= 5) {
                                    if ($total_page >= 5) {
                                        for ($i = 1; $i <= 5; $i++) { ?>
                                            <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                        <?php }
                                    } else {
                                        for ($i = 1; $i <= $total_page; $i++) { ?>
                                            <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                        <?php }
                                    }
                                } else if ($total_page <= 5) {
                                    for ($i = 1; $i <= $total_page; $i++) { ?>
                                        <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                        <?php }
                                } else {
                                    if ($total_page - $page <= 3) {
                                        for ($i = $total_page - 4; $i <= $total_page; $i++) { ?>
                                            <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                        <?php }
                                    } else {
                                        for ($i = $page - 2; $i <= $page + 2; $i++) { ?>
                                            <a class="btn btn-primary ms-3 px-3
                                        <?php echo (isset($_GET['page']) && $_GET['page'] == $i) ? "btn-danger" : ""; ?>" href="?page=<?php echo $i; ?>&<?php echo $param; ?>"><?php echo $i; ?></a>
                                <?php }
                                    }
                                } ?>
                                <!-- next -->
                                <?php if ($page < $total_page) { ?>
                                    <a class="btn btn-primary ms-3" href="?page=<?php echo $page + 1; ?>&<?php echo $param; ?>"><i class="fas fa-angle-double-right"></i></a>
                                <?php } ?>
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