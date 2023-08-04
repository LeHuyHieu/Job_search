<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php require_once('../../head.php'); ?>
</head>

<body>
    <div class="login_ad">
        <div class="login_admin p-5">
            <p class="text-center text__headline -size-30">
                Đăng nhập
            </p>
            <form action="./process.php" method="post" class="form__block">
                <div class="input_box mb-4">
                    <label class="input__box--item" for=""><i class="fas fa-envelope"></i> Nhập Email</label>
                    <input class="input__box--item" type="email" name="user_email" value="" placeholder="Nhập Email của bạn" />
                </div>
                <div class="input_box mb-4">
                    <label class="input__box--item" for=""><i class="fas fa-lock"></i> Nhập mật khẩu</label>
                    <input class="input__box--item" type="password" name="user_password" value="" placeholder="Nhập mật khẩu của bạn" />
                </div>
                <div class="input_box mb-4">
                    <input type="checkbox" name="" value="" id="remember_me" class="h-auto" />
                    <label for="remember_me">Nhớ tôi</label>
                </div>
                <input type="hidden" value="1" name="login">
                <button class="btn m-0" type="submit">Đăng Nhập</button>
            </form>
            <div class="login_admin_footer">
                <a href="javascript:void(0);">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
</body>

</html>