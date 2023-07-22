<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM experience WHERE id = '$id'";
$experiences = getData($sql);
$experience = current($experiences);
?>
<form action="./process_add_resumer.php" class="form-<?php echo $experience['id']; ?>" method="post">
    <div class="bg-light mb-3">
        <input type="hidden" value="<?php echo $experience['id']; ?>" name="experience_id">
        <div class="mb-4">
            <label for="">Nhà tuyển dụng</label>
            <input type="text" value="<?php echo $experience['experience_employer']; ?>" name="experience_employer">
        </div>
        <div class="mb-4">
            <label for="">Tên công việc</label>
            <input type="text" value="<?php echo $experience['experience_job']; ?>" name="experience_job">
        </div>
        <div class="mb-4 d-flex">
            <div class="me-2">
                <label for="">Ngày bắt đầu</label>
                <input type="date" value="<?php echo $experience['start_experience_date']; ?>" name="start_experience_date">
            </div>
            <div class="ms-2">
                <label for="">Ngày hết hạn</label>
                <input type="date" value="<?php echo $experience['end_experience_date']; ?>" name="end_experience_date">
            </div>
        </div>
        <div class="mb-4">
            <label for="">Mô tả</label>
            <textarea rows="3" name="experience_note"><?php echo $experience['experience_note']; ?></textarea>
        </div>
        <div class="d-flex">
            <input type="hidden" name="save_experience" value="1" />
            <input type="hidden" name="delete_experience" value="1" />
            <button class="btn btn--add save" name="save_experience">Lưu</button>
            <button class="btn btn--add delete ms-3" name="delete_experience">Xóa</button>
        </div>
    </div>
</form>