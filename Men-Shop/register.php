<?php
ob_start(); // Bắt đầu đệm đầu ra
include('control.php');
$getdata = new Data();
$register_success = false;
if (isset($_POST['txtsubmit'])) {
    // $up = move_uploaded_file($_FILES["txtfile"]["tmp_name"], "" . $_FILES["txtfile"]["name"]);
    $insert = $getdata->add_user(
        $_POST['txthoten'],
        $_POST['txtsdt'],
        $_POST['txtemail'],
        $_POST['txtpassword']
        // $_FILES["txtfile"]["name"]
    );
    $register_success = true;
    // $insertimg = $getdata -> image($_FILES["txtfile"]["name"]);
    header("Location: login.php");
    exit;
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
    <!-- css -->
    <!-- <link href='//theme.hstatic.net/200000405593/1000757505/14/timber.scss.css?v=3766' rel='stylesheet' type='text/css'
        media='all' /> -->
    <link rel="stylesheet" href="./template/css/hienmatkhau.css">
    <!-- <link href='//theme.hstatic.net/200000405593/1000757505/14/suplo-style.scss.css?v=3766' rel='stylesheet'
        type='text/css' media='all' /> -->
    <link rel="stylesheet" href="./template/css/suplo-style.scss.css">
    <link rel="stylesheet" href="./template/css/timber.scss.css">
    <script src="https://kit.fontawesome.com/f03f52505a.js" crossorigin="anonymous"></script>
    <title>Trang chủ</title>
</head>

<body>
    <!-- left-box ở bên trái khi thu nhỏ -->
    <section class="navbar-left-box">
        <div id="hideContent" class=""></div>
        <div id="navbar-active" class="navbar-left">
            <div class="visual">
                <a id="btn-login" type="button" href="login.php">
                    <!-- Đoạn thẻ a thiếu đoạn mở hộp( data-toggle="modal" data-target="#exampleModal" )-->
                    <div class="avatar-box">
                        <div class="avatar-icon"><span><i class="fas fa-user-circle"></i></span></div>
                        <div class="avatar-content">
                            <div>Đăng nhập</div>
                            <div class="avatar-content-adver">Nhận thêm ưu đãi</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="navbar-left-content">
                <div class="navbar-left-item">

                    <a href="trangchu.php" class="active-nav"><span><i class="fas fa-home"></i></span>Trang chủ</a>
                </div>
                <div>
                    <div class="navbar-left-item">

                        <a type="button" class="" href="#" id="btnDropdownMenuProduct">
                            <span><i class="fas fa-list"></i></span>
                            Sản Phẩm

                            <span class="btn-dropdown"><i class="fas fa-angle-down"></i></span>
                        </a>
                    </div>
                    <div id="dropdownMenuProduct" class="dropdown-menu-product">
                        <a href="shirt.php">Ao</a>
                        <a href="pant.php">Quần</a>
                        <a href="shoes.php">Giày</a>
                        <a href="accessories.php">Phụ Kiện</a>
                    </div>
                </div>
                <div class="navbar-left-item">

                    <a href="blog.php"><span><i class="far fa-newspaper"></i></span>Tin Tức</a>
                </div>
                <div class="navbar-left-item">

                    <a href="contact.php"><span><i class="fas fa-map"></i></span>Liên Hệ</a>
                </div>
            </div>
        </div>
    </section>

    <section id="" class="search">
        <div id="hideContentSearch" class=""></div>
        <div class="search-box" id="searchBox">
            <form action="" class="form-seach" id="form-search">
                <input type="text" name="" class="form-input-search" id="">
                <button type="submit" class="btn-submit-search"><span><i class="fas fa-search"></i></span></button>
                <button type="button" class="btnCancel">X</button>
            </form>
            <div class="resSearch">

            </div>
        </div>
    </section>

    <header>
        <div class="header-wellcome">

            <div class="text-header">
                <p>Wellcome to Men's Shop !</p>
            </div>

        </div>
        <div class="" id="navbarFixed">
            <nav class="navbar navbar-expand-lg navbar-light container">
                <button id="btn-active-nav" class="navbar-toggler" type="button" data-toggle="collapse" data-target=""
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="trangchu.php"><img src="img/logoshop.png" alt=""></a>
                <div class="header-nav-card">
                    <button class="btn-search" id="btnSearchNav" type="button"><span><i class="fa fa-search"
                                aria-hidden="true"></i></span></button>
                    <a href="cart.php"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>

                </div>
                <div class="nav-search-box" id="navSearchBox">
                    <div class="nav-icon-search"><span><i class="fa fa-search" aria-hidden="true"></i></span></div>
                    <input type="text" class="w-100 form-control" placeholder="Bạn muốn tìm gì ?">
                </div>
                <div class="collapse navbar-collapse main-menu" id="navbarNav">
                    <div class="navbar-nav navbar-menu">
                        <div class="nav-item active-nav"><a href="trangchu.php" class="">Trang chủ</a></div>
                        <div class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sản Phẩm
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="shirt.php">Ao</a>
                                <a class="dropdown-item" href="pant.php">Quan</a>
                                <a class="dropdown-item" href="shoes.php">Giay</a>
                                <a class="dropdown-item" href="accessories.php">Phu Kien</a>
                            </div>
                        </div>
                        <div class="nav-item"><a href="blog.php">Tin Tức</a>

                        </div>

                        <div class="nav-item"><a href="contact.php">Liên Hệ</a></div>
                    </div>
                    <ul class="navbar-nav navbar-icon ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" type="button" id="btnSearch"><span><i class="fa fa-search"
                                        aria-hidden="true"></i></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" type="button" href="#" data-toggle="modal"
                                data-target="#exampleModal"><span><i class="fa fa-user"
                                        aria-hidden="true"></i></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><span class=""><i class="fa fa-shopping-cart"
                                        aria-hidden="true"></i></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div id="PageContainer">
        <main class="main-content" role="main">
            <section id="page-wrapper">
                <div class="wrapper">
                    <div class="inner">

                        <div class="grid">

                            <div class="grid__item large--one-third push--large--one-third text-center">

                                <h1>Tạo tài khoản</h1>

                                <div class="form-vertical">
                                    <form accept-charset='UTF-8' action="" id='create_customer' method='post'>
                                        <input name='form_type' type='hidden' value='create_customer'>
                                        <input name='utf8' type='hidden' value='✓'>
                                        <label for="FullName" class="hidden-label">Full Name</label>
                                        <input type="text" id="FullName" class="input-full" placeholder="Nhập họ và tên"
                                            autocapitalize="words" name="txthoten">


                                        <label for="PhoneNumber" class="hidden-label">Số điện thoại</label>
                                        <input type="text" id="PhoneNumber" class="input-full"
                                            placeholder="Số điện thoại" autocapitalize="words" type="number"
                                            pattern="[0-9]*" name="txtsdt">


                                        <label for="Email" class="hidden-label">Email</label>
                                        <input type="email" id="Email" class="input-full" placeholder="Email"
                                            autocorrect="off" autocapitalize="off" name="txtemail">

                                        <label for="CreatePassword" class="hidden-label">Mật khẩu</label>
                                        <div class="password-input">
                                            <input type="password" id="CreatePassword" class="input-full"
                                                placeholder="Mật khẩu" name="txtpassword">
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

                                        <input type="submit" name="txtsubmit" value="Đăng ký" class="btn btn--full">


                                        <a href="./trangchu.php">Trở về</a>


                                        <input id='de87dd252076486dbbb59e2566d8eee9' name='g-recaptcha-response'
                                            type='hidden'>
                                        <script
                                            src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'>
                                        </script>
                                        <script>
                                        grecaptcha.ready(function() {
                                            grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                                action: 'submit'
                                            }).then(function(token) {
                                                document.getElementById(
                                                        'de87dd252076486dbbb59e2566d8eee9').value =
                                                    token;
                                            });
                                        });
                                        </script>
                                    </form>
                                    <?php
                                    if ($register_success) {
                                        echo '<a href="login.php">Đăng nhập</a>';
                                    }
                                    ?>
                                </div>
                                <?php
                                ob_end_flush(); // Kết thúc đệm đầu ra
                                ?>
                            </div>

                        </div>

                    </div>

                </div>
    </div>
    </section>

    </main>
    </div>

    <footer>
        <div class="container">
            <div class="list-slide-logo box-element">
                <div class="owl-carousel owl-theme" id="owlCarouselLogo">
                    <div class="item"><img src="./img/slidelogo/logo1.png" alt=""></div>
                    <div class="item"><img src="./img/slidelogo/logo2.png" alt=""></div>
                    <div class="item"><img src="./img/slidelogo/logo3.png" alt=""></div>
                    <div class="item"><img src="./img/slidelogo/logo4.png" alt=""></div>

                    <div class="item"><img src="./img/slidelogo/logo2.png" alt=""></div>
                </div>
            </div>
        </div>
        <div class="footer-area">
            <div class="footer-service">
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-4 col-md-6 col-sm-12 footer-service-box">
                            <div class="footer-icon-service"><span><i class="fas fa-paper-plane"></i></span></div>
                            <div class="footer-content-serivce">
                                <span>FREE SHIPPING</span>
                                <span>ĐƠN HÀNG TRÊN 500.000</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-service-box">
                            <div class="footer-icon-service"><span><i class="fas fa-sync"></i></span></div>
                            <div class="footer-content-serivce">
                                <span>ĐỔI TRẢ</span>
                                <span>5 NGÀY ĐỔI TRẢ MIỄN PHÍ</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 footer-service-box">
                            <div class="footer-icon-service"><span><i class="far fa-credit-card"></i></span></div>
                            <div class="footer-content-serivce">
                                <span>THANH TOÁN</span>
                                <span>CHẤP NHẬN TẤT CẢ LOẠI THẺ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-infor">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Men's Shop</h5>
                                <p>Cửa hàng thời trang nam mang phong cách mới lạ</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Hỗ Trợ Mua Hàng</h5>
                                <div class="footer-list-service">
                                    <a href=""><span><i class="fas fa-angle-right"></i></span> Hướng
                                        dẫn mua hàng</a>
                                    <a href=""><span><i class="fas fa-angle-right"></i></span> Hướng
                                        dẫn tranh toán</a>
                                    <a href=""><span><i class="fas fa-angle-right"></i></span>
                                        Phương thức vẫn
                                        chuyển</a>
                                    <a href=""><span><i class="fas fa-angle-right"></i></span> Tra
                                        cứu đơn hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Theo Dõi Chúng Tôi</h5>
                                <div class="follow-icon">
                                    <a href=""><span style="color: #3B5A9A;"><i
                                                class="fab fa-facebook-square"></i></span></a>
                                    <a href=""><span style="color: #42C8F4;"><i
                                                class="fab fa-twitter-square"></i></span></a>
                                    <a href=""><span style="color: #F8BC2E;"><i class="fab fa-skype"></i></span></a>
                                    <a href=""><span style="color: #CE3633;"><i
                                                class="fab fa-google-plus-square"></i></span></a>
                                    <a href=""><span style="color: #040707;"><i class="fab fa-behance-square"></i>
                                        </span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-infor-item">
                            <div class="footer-infor-title">
                                <h5>Thanh Toán</h5>
                                <p>Chúng tôi chấp nhận thanh toán với tất cả loại thẻ</p>
                                <div class="atm-icon">
                                    <span style="color: #3B5A9A;"><i class="fab fa-cc-visa"></i></span>
                                    <span style="color: #CE3633;"><i class="fab fa-cc-mastercard"></i></span>
                                    <span style="color: #42C8F4;"><i class="fab fa-cc-paypal"></i></span>
                                    <span style="color: #F8BC2E;"><i class="fab fa-cc-jcb"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="template/js/jquery-3.5.1.js"></script>
    <script src="template/js/footer.js"></script>
    <script src="template/js/header.js"></script>
    <script src="lib/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#owlCarouselProduct').owlCarousel({
            autoplay: true,
            autoplayTimeout: 2000,
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })

    })
    </script>
</body>

</html>