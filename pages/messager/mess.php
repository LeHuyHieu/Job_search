<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:/index.php');
}
require_once('../../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once('../../head.php');
$class = "body-employer";
if (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) {
    $class = "body-candidate";
}
?>

<body class="p-0 position_header <?php echo $class; ?>">
    <?php
    require_once('../../header.php');
    ?>
    <section class="content connect__profile">
        <?php require_once('../menu_left.php'); ?>
        <div class="right mh-100">
            <div class="container-fluid">
                <div class="row p-5">
                    <h3 class="title__content__profile">Messages</h3>
                    <p class="link__home"><a href="/index.php">Home <i class="fas fa-angle-right"></i> </a>Messages</p>
                    <div class="profile_details mess__box bg-white p-0">
                        <div class="mess_detail">
                            <h3 class="mess_title bg-light m-0 border-bottom p-5 text__headline -blod-400 -size-16">Hộp thư đến</h3>
                            <?php
                            $user_id = $_SESSION['user']['id'];
                            if (isset($_SESSION['user']['candidate']) && $_SESSION['user']['candidate'] == 1) {
                                $sql = "SELECT jobs.title, jobs.id AS job_id, users.name, users.avatar, users.id AS user_id, chat.*, message.content, message.chat_id FROM chat LEFT JOIN jobs ON jobs.id = chat.job_id LEFT JOIN users ON users.id = chat.employer_id LEFT JOIN message ON message.chat_id = chat.id WHERE chat.candidate_id = $user_id AND message.send_from = 2 GROUP BY message.chat_id ORDER BY message.created_at DESC";
                                $message = getData($sql);
                                // print_r($sql);die;
                            } else {
                                $sql = "SELECT jobs.title, jobs.id AS job_id, users.name, users.avatar, users.id AS user_id, chat.*, message.content, message.chat_id FROM chat LEFT JOIN jobs ON jobs.id = chat.job_id LEFT JOIN users ON users.id = chat.candidate_id LEFT JOIN message ON message.chat_id = chat.id WHERE chat.employer_id = $user_id AND message.send_from = 1 GROUP BY message.chat_id  ORDER BY message.created_at DESC";
                                $message = getData($sql);
                                // print_r($sql);die;
                            }
                            ?>
                            <?php foreach ($message as $mess) { ?>
                                <div class="border-bottom">
                                    <a class="user_detail ajax_mess" href="javascript:void(0);" data-id="<?php echo $mess['chat_id']; ?>">
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="image_user">
                                                <img src="<?php echo $mess['avatar']; ?>" alt="" class="w-100">
                                            </div>
                                            <div class="detail_user">
                                                <div class="_name">
                                                    <h5 class="name_user"><?php echo $mess['name']; ?></h5>
                                                    <h5 class="name_job"><?php echo $mess['title']; ?></h5>
                                                </div>
                                                <div class="mess_user">
                                                    <span><i class="fas fa-share"></i> <?php echo $mess['content']; ?></span>
                                                </div>
                                            </div>
                                            <span class="date_mess">
                                                <?php
                                                $date = date_create($mess['created_at']);
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
    <script>
        $(document).ready(function() {
            $('.user_detail.ajax_mess:first').trigger('click');
        });
    </script>
</body>

</html>