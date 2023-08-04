<?php
session_start();
require_once('../../lib/connect.php');
$id = $_GET['id'];
if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1){
    $send_from = 1;
}else{
    $send_from = 2;
}

if(isset($_GET['is_insert'])){
    if($send_from == 2){
        $send_from = 1;
    }else{
        $send_from = 2;
    }
}

$sql = "SELECT * FROM message where chat_id = $id AND is_read = 0 AND send_from = $send_from";
$messages = getData($sql);
if(!isset($_GET['is_insert'])){
    $sql_update = "UPDATE message SET is_read = 1 WHERE chat_id = $id AND send_from = $send_from";
    $conn->query($sql_update);
}
?>
<?php foreach ($messages as $mess_chat) { ?>
<?php
$class = 'w-50 ms-auto text-end';
if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1){
    // employer 
    if($mess_chat['send_from'] == 1){
        $class = 'w-50';
    }
}else{
    // candidate
    if($mess_chat['send_from'] == 2){
        $class = 'w-50';
    }
}      
?>
<?php 
if (!empty($mess_chat['content'])) { ?>
    <div class="<?php echo $class;?>">
        <span class="text_mess_out mb-3"><?php echo $mess_chat['content']; ?></span>
    </div>
<?php } ?>
<?php
} 
?>