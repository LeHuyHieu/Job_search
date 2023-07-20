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
<div class="data__profile--detail p-0 bg-light mb-3">
    <div class="experience-content">
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Nhà tuyển dụng </div>:
            <div class="experience-name"><?php echo $education['education_school']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Chuyên Nghành </div>:
            <div class="experience-name"><?php echo $education['education_level']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Ngày bắt đầu </div>:
            <div class="experience-name"><?php echo $education['start_education_date']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Ngày hết hạn </div>:
            <div class="experience-name"><?php echo $education['end_education_date']; ?></div>
        </div>
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Mô tả</div>:
            <div class="experience-name"><?php echo $education['education_note']; ?></div>
        </div>
    </div>
</div>