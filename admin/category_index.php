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
$sql = "SELECT * FROM categories ORDER BY id DESC";
$categories = getData($sql);
?>

<body>
    <div class="section section__admin">
        <h1 class="text-center job__title">Categories Admin</h1>
        <a href="./category_edit_add.php" class="btn btn-primary btn--admin ms-auto me-5"><i class="fas fa-plus-circle"></i> Add</a>
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
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Parent name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $category) { ?>
                                            <tr>
                                                <td><?php echo $category['id']; ?></td>
                                                <td>
                                                    <?php
                                                    echo $category['name'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($category['parent_id']) {
                                                        foreach($categories as $category2) {
                                                            if($category['parent_id'] == $category2['id']) {
                                                                echo "<span>". $category2['name'] . "</span>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="./category_delete.php?delete_id=<?php echo $category['id']; ?>" class="btn btn--action btn-danger" onclick="if (confirm('Bạn chắc chắc muốn xóa?')){return true;}else{event.stopPropagation(); event.preventDefault();};">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </a>
                                                    <a href="./category_edit_add.php?id=<?php echo $category['id']; ?>&category_id=<?php echo $category['parent_id']; ?>" class="btn btn--action btn-primary">
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
    <!-- typed js -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_typed.js_2.0.10_typed.min.js"></script>
    <!-- scrollreveal js -->
    <script src="/js/unpkg.com_scrollreveal@4.0.9_dist_scrollreveal.js"></script>
    <!-- main js -->
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>