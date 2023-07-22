<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM interest WHERE id = '$id'";
$interests = getData($sql);
$interest = current($interests);
?>
<div class="bg-light mb-3">
    <form action="./process_add_resumer.php" method="post">
        <input type="hidden" name="interest_id" value="<?php echo $interest['id']; ?>">
        <div class="mb-4">
            <label for="">Tên sở thích</label>
            <input type="text" value="<?php echo $interest['interest']; ?>" name="interest">
        </div>
        <div class="d-flex">
            <input type="hidden" name="save_interest" value="1" />
            <input type="hidden" name="delete_interest" value="1" />
            <button class="btn btn--add save" name="save_interest">Lưu</button>
            <button class="btn btn--add delete ms-3" name="delete_interest">Xóa</button>
        </div>
    </form>
</div>
