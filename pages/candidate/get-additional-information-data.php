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
<div class="data__profile--detail p-0 bg-light mb-3">
    <div class="experience-content">
        <div class="d-flex bg-white mb-4">
            <div class="experience-title">Tên sở thích </div>:
            <div class="experience-name"><?php echo $additional_information['additional_information']; ?></div>
        </div>
    </div>
</div>