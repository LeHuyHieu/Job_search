<!DOCTYPE html>
<html lang="en">

<?php
echo "<title>Contact</title>";
require_once('../head.php');
?>

<body>
    <!-- header -->
    <?php
    require_once('../header_white.php');
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
                        <a href="#" class="categories__link">
                            WorkScout <i class="fas fa-angle-right"></i>
                        </a>
                        <span>Contact</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="container -m -mt-5 -mb-5 categories__list">
            <div class="content__head">
                
            </div>
            <div class="content__form">
                <h4 class="contact__title text__headline -bold-400 -dark -size-30 text-center">Any questions?</h4>
                <p class="contact__text text__headline text-center -size-20 -gray -bold-300">Feel free to contact us!</p>
                <form class="form__block" style="max-width: 800px;margin: 0 auto;" action="" method="post">
                    <div class="d-flex mb-5">
                        <div class="form__box me-3 w-50 text__headline -size-15 -gray">
                            <label for="">Name</label>
                            <input type="text" name="name_user" value="" class="form-control text__headline -size-20 form__box--input" />
                        </div>
                        <div class="form__box ms-3 w-50 text__headline -size-15 -gray">
                            <label for="">Email <span>*</span></label>
                            <input type="email" name="name_user" value="" class="form-control text__headline -size-20 form__box--input" />
                        </div>
                    </div>
                    <div class="form__box text__headline -size-15 -gray">
                        <label for="">Message <span>*</span></label>
                        <textarea type="text" name="name_user" value="" rows="7" class="form-control text__headline -size-20 form__box--input"></textarea>
                    </div>
                    <input type="submit" value="Send" class="mt-5 btn--all btn--0" />
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