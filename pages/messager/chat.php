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
            $sql_insert2 = "INSERT INTO message (chat_id, `send_from`, `is_read`, `created_at`) VALUES ($id, 1,1, now())";
            $sql_insert3 = "INSERT INTO message (chat_id, `send_from`, `is_read`, `created_at`) VALUES ($id, 2,1, now())";
            $conn->query($sql_insert2);
            $conn->query($sql_insert3);
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
// echo $_GET['id'];die;
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../../head.php');
?>

<body class="p-0 position_header">
    <?php
    require_once('../../header.php');
    ?>
    <section class="content connect__profile">
        <?php require_once('../menu_left.php'); ?>
        <div class="right mh-100">
            <div class="container-fluid pb-5">
                <div class="row p-5">
                    <h3 class="title__content__profile">Messages</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>Messages</p>
                    <div class="profile_details mess__box bg-white p-0">
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
                                <?php echo $user_chat['name']; ?>
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
                                                <a class="user_detail" href="./chat.php?id=<?php echo $mess_list['chat_id']; ?>">
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
                                <div class="col-md-8 col-sm-8 col-12 bg-light">
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
                                        <form action="./process_mess.php?id=<?php echo $id; ?>" class="form__block" method="post">
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
                                </div>
                                <!-- end chat -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jquery -->
    <script src="/js/jquery-3.7.0.min.js"></script>
    <script src="/js/code.jquery.com_ui_1.12.1_jquery-ui.js"></script>
    <script src="/js/numscroller-1.0.js"></script>
    <!-- bootstrap 5 -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="/js/slick.min.js"></script>
    <!-- chosen -->
    <script src="/js/chosen.jquery.min.js"></script>
    <script src="/js/chosen.proto.min.js"></script>
    <!-- sweetalert2 -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_limonte-sweetalert2_11.7.12_sweetalert2.all.min.js"></script>
    <!-- typed js -->
    <script src="/js/cdnjs.cloudflare.com_ajax_libs_typed.js_2.0.10_typed.min.js"></script>
    <!-- scrollreveal js -->
    <script src="/js/unpkg.com_scrollreveal@4.0.9_dist_scrollreveal.js"></script>
    <!-- main js -->
    <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</body>

</html>