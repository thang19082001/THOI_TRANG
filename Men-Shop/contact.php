<?php
include('control.php');
session_start();
$getdata = new Data();
ob_start(); // Bắt đầu đệm đầu ra
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
    <link rel="stylesheet" href="template/css/header.css">
    <link rel="stylesheet" href="template/css/main.css">
    <link rel="stylesheet" href="template/css/footer.css">
    <link rel="stylesheet" href="template/css/contact.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/brands.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/solid.css">
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <title>Liên Hệ </title>
</head>

<body>
    <?php
    // Gọi tệp footer.php
    include('header.php');
    ?>
    <main>
        <div class="container">
            <div class="banner-current-page box-element">
                <img src="./img/banner-current-page.png" alt="">
                <div class="current-page-box">
                    <h3 class="title-banner-page">Liên Hệ</h3>
                    <div class="current-page-box-link">
                        <a href="trangchu.php" class="link-previous-page">Trang chủ ></a>
                        <span class="current-page"> Liên Hệ</span>
                    </div>
                </div>
            </div>
            <div class="row box-element">
                <div class="col-md-6 col-sm-12 contact">
                    <h5>Địa Chỉ</h5>
                    <p>Chi Long, Long Châu, Yên Phong, Bắc Ninh</p>
                    <h5>Giờ Làm Việc</h5>
                    <p>Từ 9h đến 22h tất cả các ngày trong tuần</p>
                    <h5>Số Điện Thoại</h5>
                    <p>0962.373.175</p>
                    <h5>Email</h5>
                    <p>nguyenvanthang.19082001@gmail.com</p>
                    <h5>Liên Kết</h5>
                    <p class="contact-icon">
                        <a href=""><span style="color: #3b5998;"><i class="fab fa-facebook-square"></i></span></a>
                        <a href=""><span style="color: #DB4437;"><i class="fab fa-youtube"></i></span></a>
                        <a href=""><span style="color: #DB4437;"><i class="fab fa-pinterest-square"></i></span></a>
                        <a href=""><span style="color: #00aced;"><i class="fab fa-twitter-square"></i></span></a>
                    </p>
                </div>
                <p class="text_des" style="margin-bottom: 40px;">Để liên hệ và nhận các thông tin khuyến mại sớm nhất,
                    xin vui
                    lòng điền đầy đủ thông tin của bạn vào form dưới đây. Chúng tôi sẽ liên lạc lại với bạn trong thời
                    gian sớm
                    nhất </p>

                <div id="pagelogin">
                    <form method="post" id="contact" accept-charset="UTF-8"><input name="FormType" type="hidden"
                            value="contact" /><input name="utf8" type="hidden" value="true" /><input type="hidden"
                            id="Token-afd4b9d60d774b12bdb2b258b0ec0422" name="Token" />
                        <script
                            src="https://www.google.com/recaptcha/api.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK">
                            </script>
                        <script>
                            grecaptcha.ready(function () {
                                grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                    action: "contact"
                                }).then(function (token) {
                                    document.getElementById("Token-afd4b9d60d774b12bdb2b258b0ec0422")
                                        .value = token
                                });
                            });
                        </script>
                        <div class="form-signup clearfix">
                            <div class="row group_contact">
                                <fieldset class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input placeholder="Họ và tên" type="text" class="form-control  form-control-lg"
                                        required value="Họ và tên" name="txtname">
                                </fieldset>
                                <fieldset class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input placeholder="Email" type="email" required id="email1"
                                        class="form-control form-control-lg" value="Email" name="txtemail">
                                </fieldset>
                                <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea placeholder="Nội dung" name="txtnote" id="comment"
                                        class="form-control content-area form-control-lg" rows="5" Required></textarea>
                                </fieldset>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10">
                                    <button type="submit" class="btn btn-primary btn-lienhe" name="txtsubmit">Gửi liên
                                        hệ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['txtsubmit'])) {
                        $add = $getdata->add_contact(
                            $_POST['txtname'],
                            $_POST['txtemail'],
                            $_POST['txtnote']
                        );
                        header('location:contact.php');
                    }
                    ?>
                    <?php
                    ob_end_flush(); // Kết thúc đệm đầu ra
                    ?>
                </div>
            </div>

        </div>

    </main>
    <?php
    // Gọi tệp footer.php
    include('footer.php');
    ?>
</body>

</html>