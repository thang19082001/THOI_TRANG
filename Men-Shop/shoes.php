<?php
include('control.php'); //chèn trang control vào news
session_start();

$getdata = new Data(); // Gọi class data
if (isset($_GET['SX'])) {
    if ($_GET['SX'] == 'ThapCao') {
        $select = $getdata->product_gia_giam_dan();
    } elseif ($_GET['SX'] == 'CaoThap') {
        $select = $getdata->product_gia_tang_dan();
    } elseif ($_GET['SX'] == 'AZ') {
        $select = $getdata->product_Z_A();
    } elseif ($_GET['SX'] == 'ZA') {
        $select = $getdata->product_A_Z();
    } else {
        $select = $getdata->product();
    }
} else {
    $select = $getdata->product();
}
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
    <link rel="stylesheet" href="template/css/product.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <title>Sản Phẩm</title>
</head>

<body>
    <?php
    //form Thong bao
    include('function/thong_bao.php');
    ?>
    <div id="hideContent" class=""></div>
    <section class="navbar-left-box">
        <div id="hideContent" class=""></div>
        <div id="navbar-active" class="navbar-left">
            <div class="visual">
                <a id="btn-login" type="button" href="#" data-toggle="modal" data-target="#exampleModal">
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
                    <span><i class="fas fa-map"></i></span>
                    <a href="contact.php">Liên Hệ</a>
                </div>
            </div>
        </div>
    </section>

    <?php include('header.php'); ?>

    <!-- button filter  -->
    <div class="button-filter-box">
        <button class="btn-active-filter" id="btnActiveFilter"><span><i class="fas fa-filter"></i></span></button>
    </div>

    <!-- Main cotent -->
    <main>
        <div class="container">
            <div class="banner-current-page box-element">
                <img src="img/banner-current-page.png" alt="">
                <div class="current-page-box">
                    <h3 class="title-banner-page">Sản Phẩm</h3>
                    <div class="current-page-box-link">
                        <a href="" class="link-previous-page">Trang chủ ></a>
                        <span class="current-page"> Giày</span>
                    </div>
                </div>
            </div>

            <div class="row mb-4 search-order-box">

                <div class="filter-search col-lg-3 col-md-4 col-sm-6">

                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="form-group order-by">

                        <select id="my-select" class="custom-select" name="" onchange="test(value)">
                            <option>Sắp xếp giá</option>
                            <option>Từ thấp tới cao</option>
                            <option>Từ cao tới thấp</option>
                            <option>Từ A-Z</option>
                            <option>Từ Z-A</option>
                        </select>
                    </div>
                </div>
            </div>
            <script>
            function test(value) {
                if (value == 'Từ thấp tới cao') {
                    window.location = 'shoes.php?SX=CaoThap';
                } else if (value == 'Từ cao tới thấp') {
                    window.location = 'shoes.php?SX=ThapCao';
                } else if (value == 'Từ A-Z') {
                    window.location = 'shoes.php?SX=AZ';
                } else if (value == 'Từ Z-A') {
                    window.location = 'shoes.php?SX=ZA';
                }

            }
            </script>

            <div class="row box-element">
                <div class="col-lg-3 col-md-4 col-sm-12 filter-box-all" id="optionFilterBox">
                    <div class="filter-box">
                        <div class="filter-title">
                            <h5>Thương Hiệu</h5>
                            <button class="btn-active-filter-box" style="outline: none;">-</button>
                        </div>
                        <ul class="list-cate" id="filterCate">
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Nike</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Adidas</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Owen</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Bitis Hunter</label>
                            </li>

                        </ul>
                    </div>

                    <div class="filter-box">
                        <div class="filter-title">
                            <h5>Thể Loại</h5>
                            <button class="btn-active-filter-box" class="btn" style="outline: none">-</button>
                        </div>
                        <ul class="list-cate" id="filterCate">
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">T-Shirt</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Áo len</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Áo sơ mi</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Áo khoác</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Áo thun</label>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title">
                            <h5>Size</h5>
                            <button class="btn-active-filter-box" class="btn" style="outline: none">-</button>
                        </div>
                        <ul class="list-size-filter" id="filterCate">
                            <li>
                                <a href="">39</a>
                            </li>
                            <li>
                                <a href="">40</a>
                            </li>
                            <li>
                                <a href="">41</a>
                            </li>
                            <li>
                                <a href="">42</a>
                            </li>
                            <li>
                                <a href="">43</a>
                            </li>
                            <li>
                                <a href="">44</a>
                            </li>
                        </ul>
                    </div>
                    <div class="filter-box">
                        <div class="filter-title">
                            <h5>Màu Sắc</h5>
                            <button class="btn-active-filter-box" class="btn" style="outline: none">-</button>
                        </div>
                        <ul class="list-cate" id="filterCate">
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Đỏ</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Vàng</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Cam</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Hồng</label>
                            </li>
                            <li>
                                <input type="checkbox" class="" />
                                <label for="">Nâu</label>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 mb-4">
                    <div class="row products">

                        <?php
                        $category = "Giày";
                        foreach ($select as $se) { // khi thực hiện lấy dữ liệu trong data cần sử dụng
                            if ($se['theloai'] == $category) { // Chỉ hiển thị sản phẩm có thể loại trùng khớp với giá trị trong biến $category
                                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 item">
                            <div class="product-item">
                                <div class="card">
                                    <div class="card-img">
                                        <a href="./detailProduct.php?id=<?php echo $se['id'] ?>"><img
                                                src="<?php echo $se['anh'] ?>" class="card-img-top" alt="..."></a>
                                        <div class="add-cart-box">
                                            <?php
                                                    if ($se['soluong'] > 0) {
                                                        if (isset($_SESSION['user_id'])) {
                                                            ?>
                                            <a
                                                href="./function/add_toCart.php?idUser=<?php echo $_SESSION['user_id'] ?>&&idSP=<?php echo $se['id'] ?>&&giaSP=<?php echo $se['gia'] ?>">
                                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                THÊM VÀO GIỎ HÀNG
                                            </a>
                                            <?php
                                                        } else {
                                                            ?>
                                            <a class='not_sesstion'>
                                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                THÊM VÀO GIỎ HÀNG
                                            </a>
                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                            <a style="background-color: #d8d8d8;">
                                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                HẾT HÀNG
                                            </a>
                                            <?php

                                                    }
                                                    ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="./detailProduct.php?id=<?php echo $se['id'] ?>">
                                            <h5 class="card-title">
                                                <?php echo $se['tensp'] ?>
                                            </h5>
                                        </a>
                                        <p class="card-text"> <span>
                                                <?php echo $se['gia'] ?>
                                            </span>₫</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>



                    </div>

                </div>

            </div>

        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
<script src="./function/thong_bao.js"></script>