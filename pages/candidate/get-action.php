<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM actions WHERE id = '$id'";
$actions = getData($sql);
$action = current($actions);
?>
<div class="bg-light mb-3">
    <form action="./process_add_resumer.php" method="post">
        <input type="hidden" name="action_id" value="<?php echo $action['id']; ?>">
        <div class="mb-4">
            <label for="">Tên hoạt động</label>
            <input type="text" value="<?php echo $action['name_action']; ?>" name="name_action">
        </div>
        <div class="mb-4">
            <label for="">Mô tả</label>
            <input type="text" value="<?php echo $action['note_action']; ?>" name="note_action">
        </div>
        <div class="mb-4 d-flex">
            <div class="me-2">
                <label for="">Ngày bắt đầu</label>
                <input type="date" value="<?php echo $action['start_action_date']; ?>" name="start_action_date">
            </div>
            <div class="ms-2">
                <label for="">Ngày hết hạn</label>
                <input type="date" value="<?php echo $action['end_action_date']; ?>" name="end_action_date">
            </div>
        </div>
        <div class="d-flex">
            <input type="hidden" name="save_action" value="1" />
            <button class="btn btn--add save" name="save_action">Lưu</button>
            <button class="btn btn--add delete ms-3" name="delete_action">Xóa</button>
        </div>
    </form>
</div>
