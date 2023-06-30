<?php
include('control.php'); //chèn trang control vào news
session_start();
ob_start(); // Bắt đầu đệm đầu ra
$_SESSION['user_id'];
$blog_id = $_GET['id']; // Nhận giá trị product_id từ URL
$getdata = new Data(); // Gọi class data
$select = $getdata->blog(); //Gọi function gắn bằng 1 biến
$select_blog = $getdata->select_blog_id($blog_id); // 
$select_user = $getdata->select_user_id($_SESSION['user_id']);
$select_comment = $getdata->select_comment_id($blog_id);
$select_comment_nd = $getdata->comment();
$comments = $getdata->get_comments($blog_id);

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
    <link rel="stylesheet" href="template/css/generalblog.css">
    <link rel="stylesheet" href="template/css/detailblog.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/brands.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/solid.css">
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <title>Chi Tiết Bài Viết</title>
    <style>
    .btn-primary {
        background-color: #08bbb7;
        border-color: #08bbb7;
    }

    .btn-primary:hover {
        background-color: #059090;
        border-color: #059090;
    }
    </style>
</head>

<body>
    <?php
    // Gọi tệp footer.php
    include('header.php');
    ?>
    <main>
        <?php
        foreach ($select_blog as $se) { // khi thực hiện lấy dữ liệu trong data cần sử dụng?>
        <div class="container">
            <div class="banner-current-page box-element">
                <img src="img/banner-current-page.png" alt="">
                <div class="current-page-box">
                    <h3 class="title-banner-page">Tin Tức</h3>
                    <div class="current-page-box-link">
                        <a href="index.php" class="link-previous-page">Trang chủ ></a>
                        <a href="blog.php" class="link-previous-page">Tin Tức ></a>
                        <span class="current-page">
                            <?php echo $se['title'] ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        } ?>

            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 box-element content-blog-area">
                    <?php
                    foreach ($select_blog as $se) { // khi thực hiện lấy dữ liệu trong data cần sử dụng?>
                    <div class="content-blog">
                        <div class="main-img-blog">
                            <img src="<?php echo $se['image'] ?>" alt="">
                        </div>
                        <div class="main-content">
                            <h2 class="title-blog">
                                <?php echo $se['title'] ?>
                            </h2>
                            <div class="infor-blog">
                                <span><i class="fas fa-calendar-alt"></i>
                                    <?php echo $se['created_time'] ?>
                                </span>
                                <?php
                                    foreach ($select_user as $su) { // khi thực hiện lấy dữ liệu trong data cần sử dụng?>
                                <span><i class="fas fa-user"></i>
                                    <?php echo $su['hoten'] ?>
                                </span>
                                <?php
                                    } ?>

                            </div>
                            <div>
                                <p class="blog-para">
                                    <?php echo $se['d_content'] ?>
                                </p>

                                <div class="img-samll">
                                    <img src="   <?php echo $se['image_s'] ?>" alt="">
                                </div>
                                <p class="blog-para">
                                    <?php echo $se['d_content'] ?>
                                </p>


                                <!-- Dấu gạch chân -->
                                <div class="row footer-content-blog">
                                </div>



                            </div>
                        </div>
                    </div>
                    <?php } ?>



                    <div class="comment-area">


                        <h3 class="heading-blog heading-comment">Bình Luận</h3>
                        <?php
                        foreach ($comments  as $scn) { // khi thực hiện lấy dữ liệu trong data cần sử dụng?>
                        <div class="mb-5">
                            <div class="user-comment">
                                <div class="img-of-user">
                                    <img src="img/imgOfUser/EC0nvJEUwAEQOnZ.jpg" alt="">
                                </div>
                                <div class="content-comment">
                                    <div class="infor-user">
                                        <span class="name-user">
                                            <?php echo $scn['ten_cmt'] ?>
                                        </span>
                                        <span class="time-post">
                                            <?php echo $scn['created_time'] ?>
                                        </span>
                                    </div>
                                    <p>
                                        <?php echo $scn['content_cmt'] ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <form method="post">
                            <div class="col-lg-12">
                                <div class="form-coment">
                                    <div class="row">
                                        <div class="clearfix"></div> <!-- Thêm clearfix -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="margin-top-0 margin-bottom-30">
                                                <h5 class="title-form-coment">Để lại bình luận của bạn:</h5>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <fieldset class="form-group">
                                                <input placeholder="Họ và tên" type="text"
                                                    class="form-control form-control-lg" value="" id="full-name"
                                                    name="txtname" Required>
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <fieldset class="form-group">
                                                <input placeholder="Email"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" type="email"
                                                    class="form-control form-control-lg" value="" name="txtemail"
                                                    Required>
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <fieldset class="form-group">
                                                <textarea placeholder="Viết bình luận"
                                                    class="form-control form-control-lg" id="comment" name="txtcontent"
                                                    rows="6" Required></textarea>
                                            </fieldset>
                                        </div>
                                        <div
                                            class="margin-bottom-fix margin-bottom-50-article col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary" name="addComment">Gửi bình
                                                luận</button>
                                        </div>
                                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                                    </div>
                                </div> <!-- End form mail -->
                            </div>
                        </form>
                        <?php

                        if (isset($_POST['addComment'])) {

                            $add = $getdata->add_comment(
                                $blog_id = $_POST['blog_id'],
                                $_POST['txtname'],
                                $_POST['txtemail'],
                                $_POST['txtcontent'],
                                $created_time = date('Y-m-d '),
                                $last_update = date('Y-m-d ')

                            );

                            header("Location: detailblog.php?id=" . $se['id']);
                        }
                        ?>

                        <?php
                        ob_end_flush(); // Kết thúc đệm đầu ra
                        ?>

                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 box-element">

                    <div class="blog-sidebar-content">
                        <form action="">
                            <div class="form-group blog-form-search">
                                <input type="text" placeholder="Tìm kiếm bài viết" class="form-control">
                                <button type="submit" class="btn-submit-search"><span><i
                                            class="fas fa-search"></i></span></button>
                            </div>
                        </form>



                        <div class="post-popular">
                            <h3 class="heading-blog">Tin Phổ Biến</h3>
                            <?php
                            foreach ($select as $s) { // khi thực hiện lấy dữ liệu trong data cần sử dụng?>
                            <div class="post-popular-card">
                                <div class="post-img">
                                    <img src="<?php echo $s['image'] ?>" alt="">
                                </div>
                                <div class="post-content">
                                    <h5><a href="">
                                            <?php echo $s['title'] ?>
                                        </a></h5>
                                    <div class="post-time"><span><i class="fas fa-calendar-alt"></i></span>
                                        <?php echo $s['created_time'] ?>
                                    </div>

                                </div>
                            </div>

                            <?php } ?>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>