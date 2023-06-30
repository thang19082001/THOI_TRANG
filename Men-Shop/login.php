<?php
session_start();
include('control.php');
$getdata = new Data();
?>
<?php
ob_start(); // Bắt đầu đệm đầu ra

if (isset($_POST['txtsubmit'])) {
    $name = $_POST['txtemail'];
    $pass = $_POST['txtpassword'];
    $login = $getdata->LOGIN($name, $pass);

    if ($login == 1) {
        $_SESSION['txtemail'] = $name;
        $_SESSION['txtpassword'] = $pass;
        
        $role = $getdata->select_role($name, $pass);
        $_SESSION['user_id'] = $role['id'];
        $_SESSION['user_hoten'] = $role['hoten'];
        $_SESSION['user_sdt'] = $role['sdt'];

        if ($role['role'] == 1) {
            header("location:../Admin/pages/user.php?id=" . $_SESSION['txtemail']);
            exit;
        } else {
            header("location:trangchu.php?id=" . $_SESSION['txtemail']);
            exit;
        }
    } else {
        $error_message = "<p stype = 'font-size: 10px;'>Sai mật khẩu</p>";
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/css/header.css">
    <link rel="stylesheet" href="template/css/main.css">
    <link rel="stylesheet" href="template/css/footer.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./template/css/hienmatkhau.css">
    <link rel="stylesheet" href="./template/css/suplo-style.scss.css">
    <link rel="stylesheet" href="./template/css/timber.scss.css">
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <script src="https://kit.fontawesome.com/f03f52505a.js" crossorigin="anonymous"></script>
    <title>Trang chủ</title>
</head>

<body>

    <?php
    // Gọi tệp header.php
    include('header.php');
    ?>
    <section id="breadcrumb-wrapper">
        <div class="breadcrumb-content">
            <div class="wrapper">
                <div class="inner">
                    <div class="breadcrumb-small">
                        <a href="trangchu.php" title="Quay trở về trang chủ">Trang chủ</a>
                        <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>
                        <span>Tài khoản</span>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="page-wrapper">
        <div class="wrapper">
            <div class="inner">

                <div class="grid">

                    <div class="grid__item large--one-third push--large--one-third text-center">


                        <div class="note form-success" id="ResetSuccess" style="display:none;">
                            Chúng tôi đã gửi một email với đường dẫn để giúp bạn cập nhật mật khẩu.
                        </div>
                        <div id="CustomerLoginForm" class="form-vertical">
                            <form accept-charset='UTF-8' action='' id='customer_login' method='post'>
                                <input name='form_type' type='hidden' value='customer_login'>
                                <input name='utf8' type='hidden' value='✓'>
                                <h1>Đăng nhập</h1>
                                <label for="CustomerEmail" class="hidden-label">Email/Số điện thoại</label>
                                <input type="email" name="txtemail" id="CustomerEmail" class="input-full"
                                    placeholder="Email/Số điện thoại" autocorrect="off" autocapitalize="off" autofocus>
                                <label for="CreatePassword" class="hidden-label">Mật khẩu</label>
                                <div class="password-input">
                                    <input type="password" id="CreatePassword" class="input-full" placeholder="Mật khẩu"
                                        name="txtpassword">
                                    <button type="button" class="toggle-password" onclick="
                                            var passwordInput = document.getElementById('CreatePassword');
                                            var toggleButton = document.querySelector('.toggle-password i');
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                toggleButton.classList.remove('fa-eye');
                                                toggleButton.classList.add('fa-eye-slash');
                                            } else {
                                                passwordInput.type = 'password';
                                                toggleButton.classList.remove('fa-eye-slash');
                                                toggleButton.classList.add('fa-eye');
                                            }"><i class="fas fa-eye"></i></button>
                                </div>
                                <input type="submit" class="btn btn--full" name="txtsubmit" value="Đăng nhập">
                                <p><a href="trangchu.php">Trở về</a></p>
                                <p><a href="register.php" id="customer_register_link">Đăng kí</a></p>
                                <p><a href="#recover" id="RecoverPassword">Quên mật khẩu?</a></p>
                                <input id='819dac4578224285860fd29126204fa3' name='g-recaptcha-response' type='hidden'>
                                <script
                                    src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'>
                                    </script>
                                <script>
                                    grecaptcha.ready(function () {
                                        grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                            action: 'submit'
                                        }).then(function (token) {
                                            document.getElementById(
                                                '819dac4578224285860fd29126204fa3').value =
                                                token;
                                        });
                                    });
                                </script>
                            </form>
                            <?php
                            if (isset($error_message)) {
                                echo $error_message;
                            }
                            ?>
                        </div>
                        <?php
                        ob_end_flush(); // Kết thúc đệm đầu ra
                        ?>

                    </div>
                    <div id="RecoverPasswordForm" style="display: none;">

                        <h2>Cài đặt lại mật khẩu</h2>
                        <p>Mật khẩu mới sẽ được gửi về email của bạn.</p>

                        <div class="form-vertical">
                            <form accept-charset='UTF-8' action='/account/recover' method='post'>
                                <input name='form_type' type='hidden' value='recover_customer_password'>
                                <input name='utf8' type='hidden' value='✓'>
                                <label for="RecoverEmail" class="hidden-label">Email</label>
                                <input type="email" value="" name="email" id="RecoverEmail" class="input-full"
                                    placeholder="Email" autocorrect="off" autocapitalize="off">

                                <p>
                                    <input type="submit" class="btn btn--full" value="Gửi">
                                </p>
                                <button type="button" id="HideRecoverPasswordLink" class="text-link">Bỏ
                                    qua</button>

                                <input id='99ea5bcf34cf45cc954b7d400e7d6f68' name='g-recaptcha-response' type='hidden'>
                                <script
                                    src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'>
                                    </script>
                                <script>
                                    grecaptcha.ready(function () {
                                        grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                            action: 'submit'
                                        }).then(function (token) {
                                            document.getElementById(
                                                '99ea5bcf34cf45cc954b7d400e7d6f68')
                                                .value = token;
                                        });
                                    });
                                </script>
                            </form>
                        </div>

                    </div>




                </div>

            </div>

        </div>
        </div>
    </section>

    <?php
    // Gọi tệp footer.php
    include('footer.php');
    ?>

</body>

</html>