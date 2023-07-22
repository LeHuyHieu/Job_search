<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM additional_information WHERE id = '$id'";
$additional_informations = getData($sql);
$additional_information = current($additional_informations);
?>
<div class="bg-light mb-3">
    <form action="./process_add_resumer.php" method="post">
        <input type="hidden" name="additional_information_id" value="<?php echo $additional_information['id']; ?>">
        <div class="mb-4">
            <label for="">Thông tin bổ xung</label>
            <textarea class="form-control" rows="3" name="additional_information"><?php echo $additional_information['additional_information']; ?></textarea>
        </div>
        <div class="d-flex">
            <input type="hidden" name="save_additional_information" value="1" />
            <input type="hidden" name="delete_additional_information" value="1" />
            <button class="btn btn--add save" name="save_additional_information">Lưu</button>
            <button class="btn btn--add delete ms-3" name="delete_additional_information">Xóa</button>
        </div>
    </form>
</div>
