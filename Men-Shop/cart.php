<?php
include('control.php'); //chèn trang control vào news
session_start();
$getdata = new Data(); // Gọi class data
ob_start(); // Bắt đầu đệm đầu ra

$select = $getdata->product();
if(isset($_SESSION['user_id'])){
    $select_cart = $getdata->cart($_SESSION['user_id']);
}else{    
    header("Location:login.php");
}


$total = 0;




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
    <link rel="stylesheet" href="template/css/cart.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/brands.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/solid.css">
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <title>Giỏ Hàng</title>
    <style>
    .btn-order {
        background-color: #4CAF50;
        /* Màu nền của nút */
        color: white;
        /* Màu chữ trên nút */
        padding: 10px 20px;
        /* Kích thước lề và đệm của nút */
        border: none;
        /* Loại bỏ viền */
        border-radius: 4px;
        /* Bo tròn các góc của nút */
        cursor: pointer;
        /* Hiển thị con trỏ tương tác khi di chuột vào nút */
    }

    .btn-order:hover {
        background-color: #45a049;
        /* Màu nền khi di chuột vào nút */
    }

    .not_btn-order {
        background-color: #808080 !important;
    }


    .btn-delete-link {
        text-decoration: none;
        padding: 5px 20px;
        background-color: #f73636;
        border-radius: 20px;
        color: #ffffff;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }
    </style>
</head>

<body>
    <?php
        //form Thong bao
        include('function/thong_bao.php');
    ?>
    <?php
    // Gọi tệp header.php
    include('header.php');

    ?>
    <main>
        <form method='post'>
            <div class="container box-element">
                <div class="banner-current-page box-element">
                    <img src="img/banner-current-page.png" alt="">
                    <div class="current-page-box">
                        <h3 class="title-banner-page">Giỏ Hàng</h3>
                        <div class="current-page-box-link">
                            <a href="trangchu.php" class="link-previous-page">Trang chủ ></a>
                            <span class="current-page"> Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class=" col-lg-8 col-md-12">

                        <div class="product-list">
                            <script>
                            function setCookie(cname, cvalue, exdays) {
                                const d = new Date();
                                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                                let expires = "expires=" + d.toUTCString();
                                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                            }
                            </script>

                            <?php
                        $count=0;
                        $arr_idSP = [];
                            foreach ($select_cart as $cartItem) {
                                foreach ($select as $sp) {
                                    if($cartItem['product_id']==$sp['id']){

                                            array_push($arr_idSP,$cartItem['id']);
                                            $count = $count+1;  
                                            setcookie('SL_'.$cartItem['id'], $cartItem['qty'], time() + (86400 * 30), "/");
                                            setcookie('Price_'.$cartItem['id'], $sp['gia'], time() + (86400 * 30), "/");
                                           
                    ?>

                            <div class="card-product-item">
                                <div class="product-img">
                                    <img src="<?php echo $sp['anh'] ?>" alt="">
                                </div>
                                <div class="cart-product-content">
                                    <div class="infor-product-area">
                                        <p class="name-product">
                                            <?php echo $sp['tensp'] ?>
                                        </p>
                                        <p>Màu Sắc:
                                            <?php echo $cartItem['mausac'] ?>
                                        </p>
                                        <p>Kích Cỡ:
                                            <?php echo $cartItem['kichco'] ?>
                                        </p>
                                        <br>
                                        <a class="btn-delete-link"
                                            href="delete_cart.php?delete=<?php echo $cartItem['id'] ?>">
                                            Xóa

                                        </a>
                                    </div>
                                    <div class="product-price">
                                        <span id="price">
                                            <?php echo $cartItem['price'] ?>
                                        </span>₫
                                    </div>
                                    <div class="product-quantity quantity-md">
                                        <button class="btn-minus" type="button"
                                            onclick="set_SL(<?php echo $cartItem['id'];?>,2)">-</button>

                                        <input class="inputQuantity" id="id_inputQuantity<?php echo $cartItem['id'];?>"
                                            name="txtqty" type="text" value=" <?php echo $cartItem['qty'] ?>">

                                        <button class="btn-plus" type="button"
                                            onclick="set_SL(<?php echo $cartItem['id'];?>,0)">+</button>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="id" value="<?php echo $cartItem['id']; ?>">
                            <input type="hidden" name="qty" value="<?php echo $cartItem['qty']; ?>">
                            <input type="hidden" name="price" id="Get_Price_<?php echo $cartItem['id'];?>"
                                value="<?php echo $cartItem['price']; ?>">

                            <script>
                            function set_SL(id, N) {
                                const soLuong = document.getElementById("id_inputQuantity" + id)
                                const Gia = document.getElementById("Get_Price_" + id)
                                const luuSL = soLuong.value

                                setCookie('SL_' + id, (Number(luuSL) + 1) - N, 1)
                                soLuong.value = luuSL
                                // setCookie('Price_'+id,(((Number(soLuong.value)+1)-N)*Gia.value ), 1)
                            }
                            </script>


                            <?php
                                
                                }
                            }
                        }
                        ?>
                        </div>
                    </div>




                    <div class="col-lg-4 col-md-12">
                        <div class="cart-total-price-area">
                            <div class="price-item">
                                <span class="title-price">Tổng</span>
                                <span class="total-price" id="totalCard">
                                    <?php echo number_format($total) ?> ₫
                                </span>
                            </div>


                        </div>


                        <?php
                            if(mySqli_num_rows($select_cart)>0){
                        ?>
                        <button type="submit" class="btn-order" name="btn-order">Thanh Toán</button>
                        <?php 
                            }
                            else{
                        ?>
                        <button type="button" class="btn-order not_btn-order">Chưa có đơn</button>
                        <?php 
                            }
                        ?>

                        <?php
                     
                    if (isset($_POST['btn-order'])) {
                        $result = $getdata->update_cart($arr_idSP);

                        setcookie('SL_'.$cartItem['id'],$_COOKIE['SL_'.$cartItem['id']], time() + (86400 * 30), "/");
                        
                        if ($result) {
                            header("Location:order.php");

                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    }
                    ?>

                        <?php
                    ob_end_flush(); // Kết thúc đệm đầu ra
                    ?>
                    </div>


                </div>



            </div>
        </form>
    </main>
    <?php
    // Gọi tệp footer.php
    include('footer.php');
    ?>
</body>

</html>