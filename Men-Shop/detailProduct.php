<?php
include('control.php'); //chèn trang control vào news
session_start();
$getdata = new Data(); // Gọi class data
ob_start(); // Bắt đầu đệm đầu ra
$product_id = $_GET['id']; // Nhận giá trị product_id từ URL

$select = $getdata->select_product_id($product_id);
$select_images = $getdata->select_images_id($product_id);

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
    <link rel="stylesheet" href="template/css/detailProduct.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/brands.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/solid.css">
    <!-- bo sung css -->
    <link rel="stylesheet" href="template/css/bo_sung.css">
    <script src="https://kit.fontawesome.com/f03f52505a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <title>Chi tiết sản phẩm</title>
</head>
<style>
    .btn-add-cart{
        background-color: rgb(231, 28, 28);
    }
    </style>
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

    <main>
        <?php
        ob_start(); // Bắt đầu đệm đầu ra
        foreach ($select as $sp) { ?>
            <div class="container">
                <div class="banner-current-page box-element">
                    <img src="img/banner-current-page.png" alt="">
                    <div class="current-page-box">
                        <h3 class="title-banner-page">Sản Phẩm</h3>
                        <div class="current-page-box-link">
                            <a href="trangchu.php" class="link-previous-page">Trang chủ ></a>
                            <a href="shirt.php" class="link-previous-page">
                                <?php echo $sp['theloai'] ?> >
                            </a>

                            <span class="current-page">
                                <?php echo $sp['tensp'] ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row detail-product-box box-element">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="detail-product-img"><img src="    <?php echo $sp['anh'] ?>" class="card-img-top"
                                alt="..." id="mainImage"></div>
                        <?php
                        foreach ($select_images as $si) { ?>
                            <div class="list-img-product" style="float: left;">
                                <button style=" width: 80px; height: 80px; margin: 0.2rem ;"><img
                                        src="  <?php echo $si['path'] ?>" alt=""></button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 detail-product-content">
                        <h2 class="detail-product-title">
                            <?php echo $sp['tensp'] ?>
                        </h2>
                        <div class="price">
                            <?php echo $sp['gia'] ?> đ
                        </div>


                        <div class="product-details">
                            <!-- Các thông tin khác của sản phẩm -->

                            <?php
                            $quantity = $sp['soluong']; // Số lượng sản phẩm
                        
                            if ($quantity < 1) {
                                // Hết hàng
                                echo '<div class="status-product"><span style="color: red;"><i class="fas fa-times"></i> Hết hàng</span></div>';
                            } else {
                                // Còn hàng
                                echo '<div class="status-product"><span style="color: green;"><i class="fas fa-check"></i> Còn hàng</span></div>';
                            }
                            ?>
                        </div>


                        <form method="POST">
                            <div class="form-cate">

                                <?php


                                // Kiểm tra ID để xác định thể loại sản phẩm
                                if ($sp['theloai'] == 'Quần' || $sp['theloai'] == 'Áo') {
                                    // Nếu là quần áo, hiển thị tùy chọn kích cỡ dạng chữ
                                    echo '
                                    <label for="">Kích Cỡ</label>
                                        <select class="custom-select select-size" name="kichco">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>';
                                } elseif ($sp['theloai'] == 'Giày') {
                                    // Nếu là giày, hiển thị tùy chọn kích cỡ dạng số
                                    echo '
                                    <label for="">Kích Cỡ</label>
                                        <select class="custom-select select-size" name="kichco">
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                        </select>';
                                } else {
                                    // Trường hợp còn lại (phụ kiện), không hiển thị tùy chọn kích cỡ
                            
                                }
                                ?>
                            </div>
                            <div class="form-cate">
                                <label for="">Màu Sắc</label>
                                <select class="custom-select select-size " name="mausac">
                                    <option value="Đỏ">Đỏ</option>
                                    <option value="Trắng">Trắng</option>
                                    <option value="Đen">Đen</option>
                                    <option value="Hồng">Hồng</option>
                                </select>
                            </div>
                            <div class="form-cate">
                                <label for="">Số Lượng</label>
                                <div class="input-amount-box">
                                    <a onclick="decreaseQuantity()">-</a>
                                    <input type="text" min="1" value="1" id="quantityProduct" name="quantity">
                                    <a onclick="increaseQuantity()">+</a>
                                </div>
                            </div>

                            <script>
                                function decreaseQuantity() {
                                    var quantityInput = document.getElementById("quantityProduct");
                                    var currentValue = parseInt(quantityInput.value);
                                    if (currentValue > 1) {
                                        quantityInput.value = currentValue - 1;
                                    }
                                }

                                function increaseQuantity() {
                                    var quantityInput = document.getElementById("quantityProduct");
                                    quantityInput.value = parseInt(quantityInput.value) + 1;
                                }
                            </script>


                            

                            <?php   
                                                         if( $quantity>0){   
                                                                if(isset($_SESSION['user_id'])){
                                                                
                                    ?>
                                                                            <button class="btn-add-cart" type="submit" name="addToCart">
                                                                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                                                THÊM VÀO GIỎ HÀNG
                                                                            </button>
                                                                        <?php
                                                                                }
                                                                            
                                                                            else{
                                                                        ?>
                                                                            <button class="btn-add-cart" style="background-color:red;" onclick="show_thongBao()" type="button">
                                                                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                                                THÊM VÀO GIỎ HÀNG
                                                                            </button>
                                                                        <?php
                                                                            }
                                                                }
                                                            else{
                                                                ?>
                                                                    <button class="btn-add-cart btn_het_hang" type='button'>
                                                                        <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                                        ĐANG HẾT HÀNG
                                                                    </button>
                                                                <?php

                                                            }
                                                        
                                                        ?>

                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                        </form>


                        <?php
                    
                        if (isset($_POST['addToCart'])) {

                            // Lấy dữ liệu từ form
                            $mausac = $_POST['mausac'];
                            $kichco = $_POST['kichco'];
                            $quantity = $_POST['quantity'];
                            $product_id = $_POST['product_id'];

                            $account_id = $_SESSION['user_id'];

                            // Lấy giá từ bảng product
                            $get_price_sql = "SELECT gia FROM product WHERE id = $product_id";
                            $result = $conn->query($get_price_sql);
                            // Kiểm tra xem truy vấn có thành công hay không
                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $gia = $row['gia'];
                                // Tính toán biến giá mới
                                $gia = $gia * $quantity;
                                
                                // Thêm sản phẩm vào giỏ hàng với biến giá mới
                                $inserted = $getdata->add_cart($product_id, $account_id, $mausac, $kichco, $quantity, $gia);
                                // Kiểm tra xem sản phẩm đã được thêm thành công hay chưa
                                if ($inserted) {
                                    // Thêm sản phẩm thành công, chuyển hướng đến trang khác
                                    header("Location:cart.php");
                                    exit();
                                } else {
                                    // Thêm sản phẩm thất bại, hiển thị thông báo
                                    echo "Thêm sản phẩm thất bại. Vui lòng thử lại.";
                                }
                            } else {
                                // Không tìm thấy giá sản phẩm, hiển thị thông báo
                                echo "Không tìm thấy giá sản phẩm. Vui lòng thử lại.";
                            }

                        }
                     }
        ?>
                    <div class="infor-about-product">
                        <span>Mô Tả</span>
                        <p>
                            <?php echo $sp['mota'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
            ob_end_flush(); // Kết thúc đệm đầu ra
            ?>











            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Truy vấn lấy danh sách sản phẩm liên quan
                $sql = "SELECT * FROM product WHERE theloai = (SELECT theloai FROM product WHERE id = '$id') LIMIT 4";
                $result = $conn->query($sql);

                // Kiểm tra và hiển thị danh sách sản phẩm
                if ($result->num_rows > 0) {
                    ?>
                    <div class="related-products">
                        <div class="row mb-4 products">
                            <?php foreach ($result as $sp) { ?>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 item">
                                    <div class="product-item">
                                        <div class="card" style="">
                                            <div class="card-img">
                                                <a href="./detailProduct.php?id=<?php echo $sp['id']; ?>"><img
                                                        src="<?php echo $sp['anh']; ?>" class="card-img-top img-product"
                                                        alt="..."></a>
                                                <div class="add-cart-box">
                                                    <a href="./detailProduct.php?id=<?php echo $sp['id']; ?>">
                                                        <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                        THÊM VÀO GIỎ HÀNG
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <a href="">
                                                    <h5 class="card-title">
                                                        <?php echo $sp['tensp']; ?>
                                                    </h5>
                                                </a>
                                                <p class="card-text-sale"><strike>
                                                        <?php echo $sp['giagoc']; ?>
                                                    </strike></p>
                                                <p class="card-text">
                                                    <?php echo $sp['gia']; ?> ₫
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                } else {
                    echo 'Không có sản phẩm liên quan.';
                }
            } else {
                echo 'Không có ID sản phẩm.';
            }
            ?>





            <div class="box-btn font-text-2 mb-3">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Truy vấn lấy thông tin sản phẩm
                    $sql = "SELECT theloai FROM product WHERE id = '$id'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $theloai = $row['theloai'];

                        switch ($theloai) {
                            case 'Áo':
                                echo '<a href="shirt.php" class="btn-viewmore">Xem thêm</a>';
                                break;
                            case 'Quần':
                                echo '<a href="pant.php" class="btn-viewmore">Xem thêm</a>';
                                break;
                            case 'Giày':
                                echo '<a href="shoes.php" class="btn-viewmore">Xem thêm</a>';
                                break;
                            case 'Phụ Kiện':
                                echo '<a href="accessories.php" class="btn-viewmore">Xem thêm</a>';
                                break;
                            default:
                                echo "Không có trang tương ứng.";
                                break;
                        }
                    } else {
                        echo "Không có thông tin sản phẩm.";
                    }
                } else {
                    echo "Không có ID sản phẩm.";
                }
                ?>
            </div>







        </div>
    </main>

    <?php include('footer.php'); ?>
</body>

</html>
<script src="./function/thong_bao.js"></script>   