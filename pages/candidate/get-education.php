<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM education WHERE id = '$id'";
$educations = getData($sql);
$education = current($educations);
?>
<div class="bg-light mb-3">
    <form action="./process_add_resumer.php" method="post">
        <input type="hidden" name="education_id" value="<?php echo $education['id']; ?>">
        <div class="mb-4">
            <label for="">Tên trường</label>
            <input type="text" value="<?php echo $education['education_school']; ?>" name="education_school">
        </div>
        <div class="mb-4">
            <label for="">Chuyên Nghành</label>
            <input type="text" value="<?php echo $education['education_level']; ?>" name="education_level">
        </div>
        <div class="mb-4 d-flex">
            <div class="me-2">
                <label for="">Ngày bắt đầu</label>
                <input type="date" value="<?php echo $education['start_education_date']; ?>" name="start_education_date">
            </div>
            <div class="ms-2">
                <label for="">Ngày hết hạn</label>
                <input type="date" value="<?php echo $education['end_education_date']; ?>" name="end_education_date">
            </div>
        </div>
        <div class="mb-4">
            <label for="">Mô tả</label>
            <textarea rows="3" name="education_notes"><?php echo $education['education_note']; ?></textarea>
        </div>
        <div class="d-flex">
            <input type="hidden" name="save_education" value="1" />
            <input type="hidden" name="delete_education" value="1" />
            <button class="btn btn--add save" name="save_education">Lưu</button>
            <button class="btn btn--add delete ms-3" name="delete_education">Xóa</button>
        </div>
    </form>
</div>
