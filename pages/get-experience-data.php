<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../lib/connect.php');
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM experience WHERE id = '$id'";
$experiences = getData($sql);
$experience = current($experiences);
?>
<div class="data__profile--detail p-0 bg-light mb-3">
    <div class="experience-content">
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Nhà tuyển dụng </div>:
            <div class="experience-name"><?php echo $experience['experience_employer']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Tên công việc </div>:
            <div class="experience-name"><?php echo $experience['experience_job']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Ngày bắt đầu </div>:
            <div class="experience-name"><?php echo $experience['start_experience_date']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Ngày hết hạn </div>:
            <div class="experience-name"><?php echo $experience['end_experience_date']; ?></div>
        </div>
    </div>
</div>