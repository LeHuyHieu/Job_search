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
<div class="data__profile--detail p-0 bg-light mb-3">
    <div class="experience-content">
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Tên hoạt động </div>:
            <div class="experience-name"><?php echo $action['name_action']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Mô tả </div>:
            <div class="experience-name"><?php echo $action['note_action']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Ngày bắt đầu </div>:
            <div class="experience-name"><?php echo $action['start_action_date']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Ngày hết hạn </div>:
            <div class="experience-name"><?php echo $action['end_action_date']; ?></div>
        </div>
    </div>
</div>