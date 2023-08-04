<?php
if (isset($_GET['id']) && $_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM message where chat_id = $id";
    $messages = getData($sql);
    
    $sql_update = "UPDATE message SET is_read = 1 WHERE chat_id = $id AND send_from = 2";
    $conn->query($sql_update);
}
?>
<div class="mess_right">
    <div class="scroll_mess px-3 pt-3">
        <?php foreach ($messages as $mess_chat) { ?>
            <?php if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1) { ?>
                <?php if ($mess_chat['send_from'] == 1) { ?>
                    <?php if (!empty($mess_chat['content'])) { ?>
                        <div class="w-50">
                            <span class="text_mess_out mb-3"><?php echo $mess_chat['content']; ?></span>
                        </div>
                    <?php } else { ?>
                        <?php if (!empty($mess_chat['content'])) { ?>
                            <div class="w-50 ms-auto text-end">
                                <span class="text_mess_in mb-3"><?php echo $mess_chat['content']; ?></span>
                            </div>
                    <?php }
                    } ?>
                <?php } elseif (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) { ?>
                    <?php if ($mess_chat['send_from'] == 2) { ?>
                        <?php if (!empty($mess_chat['content'])) { ?>
                            <div class="w-50">
                                <span class="text_mess_out mb-3"><?php echo $mess_chat['content']; ?></span>
                            </div>
                    <?php }
                    } ?>
                <?php } else { ?>
                    <?php if (!empty($mess_chat['content'])) { ?>
                        <div class="w-50 ms-auto text-end">
                            <span class="text_mess_in mb-3"><?php echo $mess_chat['content']; ?></span>
                        </div>
                    <?php } ?>
                <?php } ?>
        <?php }
        } ?>
    </div>
    <form action="./process_mess.php?id=<?php echo $id; ?>" class="form__block" method="post" autocomplete="off">
        <div class="icon_form_mess">
            <input type="text" name="content" placeholder="Nhập tin nhắn" autocomplete="off">
            <?php if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1) { ?>
                <input type="hidden" name="send_from" value="2">
            <?php } elseif (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) { ?>
                <input type="hidden" name="send_from" value="1">
            <?php } ?>
            <input type="hidden" name="chat_id" value="<?php echo $id; ?>">
            <input type="hidden" name="submit_mess" value="1">
            <button class="btn btn-mess">Gửi</button>
        </div>
    </form>
</div>