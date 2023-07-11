<?php
require_once('../lib/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Contact</title>";
require_once('../head.php');
?>

<body>
    <!-- header -->
    <?php
    require_once('../header.php');
    ?>
    <!-- end header -->

    <!-- section -->
    <section class="content categories">
        <div class="bg-light">
            <div class="container">
                <div class="categories__block">
                    <h3 class="categories__title text__headline -bold-400 -size-25">
                        Browse Jobs – List Layout
                    </h3>
                    <p class="categories__text">
                        <a href="../index.php" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Contact</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="content__head">
                <?php echo (isset($_GET['success']) == 1) ? "<p class=\"success__validate\">Cảm ơn bạn đã hỏi  <img width=\"20px\" src=\"/images/love_icon.svg\" /></p>" : ""; ?>
            </div>
            <div class="content__form <?php echo (isset($_GET['success']) == 1) ? "d-none" : ""; ?>">
                <h4 class="contact__title text__headline -bold-400 -dark -size-30 text-center">Bất kỳ câu hỏi nào?</h4>
                <p class="contact__text text__headline text-center -size-20 -gray -bold-300">Liên lạc nếu bạn cần!</p>
                <form class="form__block" style="max-width: 800px;margin: 0 auto;" action="process.php" method="get">
                    <div class="d-flex mb-5">
                        <div class="form__box me-3 w-50 text__headline -size-15 -gray">
                            <label for="">Họ & tên: *</label>
                            <input required type="text" name="user_name" value="<?php echo (isset($_GET['user_name'])) ? $_GET['user_name'] : ""; ?>" class="form-control text__headline -size-16 form__box--input p-3" />
                            <?php echo (isset($_GET['error']) && $_GET['error'] == 0 && isset($_GET['user_name']) && $_GET['user_name'] == "") ? "<p class=\"error__validate\">Bạn chưa điền thông tin!</p>" : ""; ?>
                        </div>
                        <div class="form__box ms-3 w-50 text__headline -size-15 -gray">
                            <label for="">Email <span>*</span></label>
                            <input required type="email" name="user_email" value="<?php echo (isset($_GET['user_email'])) ? $_GET['user_email'] : ""; ?>" class="form-control text__headline -size-16 form__box--input p-3" />
                            <?php echo (isset($_GET['error']) && $_GET['error'] == 0 && isset($_GET['user_email']) && $_GET['user_email'] == "") ? "<p class=\"error__validate\">Bạn chưa điền thông tin!</p>" : ""; ?>
                        </div>
                    </div>
                    <div class="form__box text__headline -size-15 -gray">
                        <label for="">Nội dung: <span>*</span></label>
                        <textarea required name="user_content" value="" rows="7" class="form-control text__headline -size-16 form__box--input p-3"><?php echo (isset($_GET['user_content'])) ? $_GET['user_content'] : ""; ?></textarea>
                        <?php echo (isset($_GET['error']) && $_GET['error'] == 0 && isset($_GET['user_content']) && $_GET['user_content'] == "") ? "<p class=\"error__validate\">Bạn chưa điền thông tin!</p>" : ""; ?>
                    </div>
                    <button type="submit" class="mt-5 btn--all btn--0"> <i class="fas fa-paper-plane me-4"></i> Gửi</button>
                </form>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- footer -->
    <?php
    require_once('../footer.php');
    ?>
    <!-- end footer -->
</body>

</html>