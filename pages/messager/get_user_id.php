<?php
session_start();
require_once('../../lib/connect.php');
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}

if (isset($_GET['job_id']) && $_GET['job_id']) {
    $job_id = $_GET['job_id'];
    $candidate_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM jobs where id = '$job_id'";
    $jobs = getData($sql);
    $employer_id = $jobs[0]['user_id'];

    $sql = "SELECT * FROM chat where job_id = $job_id and candidate_id = $candidate_id and employer_id = $employer_id";
    $count_chat = getData($sql);

    if (empty($count_chat) || count($count_chat) == 0) {
        $sql_insert = "INSERT INTO chat (job_id, candidate_id, employer_id, created_at, updated_at) VALUES ($job_id, $candidate_id, $employer_id, now(), now())";

        if ($conn->query($sql_insert) === true) {
            $count_chat = getData($sql);
            $id = $count_chat[0]['id'];
            header('location:./mess.php');
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        $id = $count_chat[0]['id'];
        header('location:./mess.php');
    }
}
if (isset($_GET['id']) && $_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM message where chat_id = $id";
    $messages = getData($sql);

    $sql_update = "UPDATE message SET is_read = 1 WHERE chat_id = $id AND send_from = 2";
    $conn->query($sql_update);
}
?>
<div class="mess_detail">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_SESSION['user']['employer'])) {
            $sql2 = "SELECT users.name , jobs.title, chat.* FROM chat LEFT JOIN jobs ON jobs.id = chat.job_id LEFT JOIN users ON users.id = chat.candidate_id WHERE chat.id = '$id'";
            $users = getData($sql2);
            $user_chat = current($users);
        } else {
            $sql2 = "SELECT users.name , jobs.title, chat.* FROM chat LEFT JOIN jobs ON jobs.id = chat.job_id LEFT JOIN users ON users.id = chat.employer_id WHERE chat.id = '$id'";
            $users = getData($sql2);
            $user_chat = current($users);
        }
    }
    ?>
    <h3 class="mess_title bg-light m-0 border-bottom p-5 text__headline -blod-400 -size-16">
        <?php echo $user_chat['name'];?>
        <span class="name_job"><?php echo $user_chat['title']; ?></span>
    </h3>
    <div class="d-flex pb-3 bg-light">
        <!-- list user -->
        <div class="col-md-4 col-sm-4 col-12 bg-light">
            <div class="mess_left">
                <?php
                $user_id = $_SESSION['user']['id'];
                if (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) {
                    $sql = "SELECT jobs.title, jobs.id AS job_id, users.name, users.avatar, users.id AS user_id, chat.*, message.content, message.chat_id FROM chat LEFT JOIN jobs ON jobs.id = chat.job_id LEFT JOIN users ON users.id = chat.employer_id LEFT JOIN message ON message.chat_id = chat.id WHERE chat.candidate_id = $user_id AND message.send_from = 2 GROUP BY message.chat_id ORDER BY message.created_at DESC";
                    $message_list = getData($sql);
                } else {
                    $sql = "SELECT jobs.title, jobs.id AS job_id, users.name, users.avatar, users.id AS user_id, chat.*, message.content, message.chat_id FROM chat LEFT JOIN jobs ON jobs.id = chat.job_id LEFT JOIN users ON users.id = chat.candidate_id LEFT JOIN message ON message.chat_id = chat.id WHERE chat.employer_id = $user_id AND message.send_from = 1 GROUP BY message.chat_id  ORDER BY message.created_at DESC";
                    $message_list = getData($sql);
                }
                ?>
                <?php foreach ($message_list as $mess_list) { ?>
                    <div class="border-end border-bottom">
                        <a class="user_detail chat ajax_mess" href="javascript:void(0);" data-id="<?php echo $mess_list['chat_id']; ?>">
                            <div class="d-flex align-items-center position-relative">
                                <div class="image_user">
                                    <img src="<?php echo $mess_list['avatar']; ?>" alt="" class="w-100">
                                </div>
                                <div class="detail_user">
                                    <div class="_name">
                                        <h5 class="name_user"><?php echo $mess_list['name']; ?></h5>
                                    </div>
                                    <div class="mess_user">
                                        <?php if (isset($_SESSION['user']['employer']) && $_SESSION['user']['candidate'] == 1) { ?>
                                            <span><i class="fas fa-share"></i> <?php echo $mess_list['content']; ?></span>
                                        <?php } ?>
                                        <?php if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1) { ?>
                                            <span><i class="fas fa-share"></i> <?php echo $mess_list['content']; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <span class="date_mess">
                                    <?php
                                    $date = date_create($mess_list['created_at']);
                                    echo date_format($date, "d");
                                    ?>
                                    Day ago
                                </span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- end list user -->

        <!-- chat -->
        <div class="col-md-8 col-sm-8 col-12 bg-light" id="chatMessage" data-chat-id="<?php echo $id; ?>">
            <div class="mess_right">
                <div class="scroll_mess px-3 pt-3">
                    <?php foreach ($messages as $mess_chat) { ?>
                        <?php if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1) { ?>
                            <?php if ($mess_chat['send_from'] == 1) { ?>
                                <?php if (!empty($mess_chat['content'])) { ?>
                                    <div class="w-50 output_mess">
                                        <span class="text_mess_out mb-3"><?php echo $mess_chat['content']; ?></span>
                                    </div>
                                <?php }
                            } else { ?>
                                <?php if (!empty($mess_chat['content'])) { ?>
                                    <div class="w-50 ms-auto text-end input_mess">
                                        <span class="text_mess_in mb-3"><?php echo $mess_chat['content']; ?></span>
                                    </div>
                            <?php }
                            } ?>
                        <?php }
                        if (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) {
                        ?>
                            <?php if ($mess_chat['send_from'] == 2) { ?>
                                <?php if (!empty($mess_chat['content'])) { ?>
                                    <div class="w-50 output_mess">
                                        <span class="text_mess_out mb-3"><?php echo $mess_chat['content'];?></span>
                                    </div>
                                <?php }
                                ?>
                            <?php
                            } else { ?>
                                <?php if (!empty($mess_chat['content'])) { ?>
                                    <div class="w-50 ms-auto text-end input_mess">
                                        <span class="text_mess_in mb-3"><?php echo $mess_chat['content']; ?></span>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                    <?php
                        }
                    }
                    ?>
                </div>
                <form action="./process_mess.php?id=<?php echo $id; ?>" class="form__block" method="post" autocomplete="off">
                    <div class="icon_form_mess">
                        <input type="text" name="content" id="messageChat" placeholder="Nhập tin nhắn" autocomplete="off">
                        <?php if (isset($_SESSION['user']['employer']) && $_SESSION['user']['employer'] == 1) { ?>
                            <input type="hidden" name="send_from" value="2">
                        <?php } elseif (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) { ?>
                            <input type="hidden" name="send_from" value="1">
                        <?php } ?>
                        <input type="hidden" name="chat_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="submit_mess" value="1">
                        <button class="btn btn-mess" id="btnMessage">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end chat -->
    </div>
</div>