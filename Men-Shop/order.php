<?php

include('control.php'); //chèn trang control vào news
session_start();
$getdata = new Data(); // Gọi class data
$select_Product= $getdata->product();
if(isset($_SESSION['user_id'])){
    $select_cart = $getdata->cart($_SESSION['user_id']);

}
$select_mgg = $getdata->select_MAGG();


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
    <link rel="stylesheet" href="template/css/order.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/brands.css">
    <link rel="stylesheet" href="lib/fontawesome-free-5.15.2-web/css/solid.css">
    <link rel="stylesheet" href="./template/css/dangxuat.css">

    <link rel="stylesheet" href="./template/css/order3.css">
    <title>Thanh toán</title>
    <style>
    .address-form .btn-add-cart {
        /* Các thuộc tính CSS của nút "Thêm địa chỉ" trong form */
        background-color: #f2f2f2;
        color: #333;
        border: 1px solid #ccc;
        padding: 10px 20px;

    }

    .btn-add-cart:hover {
        background-color: #45a049;
    }

    .btn-add-cart:focus {
        outline: none;
    }
    </style>
</head>

<body>
    <section class="model_checkout">
        <!-- Modal -->
        <?php 
                        
                        function run_bill($select_cart,$select_Product,$Tong_tien){
                         
                        
                        
                ?>
        <div id="WALL_THONG_BAO"></div>
        <div id="BOX_THONG_BAO">
            <div class="modal-dialog modal-checkout">
                <div class="modal-content">
                    <div class="modal-body ">
                        <div class="success-icon"><i class="fas fa-check-circle"></i></div>
                        <p class="text-sucess">Đặt hàng thành công</p>
                        <div class="detail-order">
                            <div class="check-out">
                                <span>Mã đơn hàng:</span>
                                <span><?php echo(rand(1000,10000)) ?></span>
                            </div>
                            <div class="check-out">
                                <span>Khách hàng:</span>
                                <span><?php echo  $_SESSION['user_hoten']; ?></span>
                            </div>
                            <div class="check-out">
                                <span>Địa chỉ: </span>
                                <span><?php echo $_SESSION["address"]; ?></span>
                            </div class="check-out">
                            <div class="check-out">
                                <span>Số điện thoại: </span>
                                <span><?php echo $_SESSION["sdt"]; ?></span>
                            </div>
                            <div class="check-out">
                                <span>Hình thức thanh toán: </span>
                                <span>Thanh toán khi nhận hàng</span>
                            </div>
                            <p class="text-order">Đơn hàng</p>


                            <?php
                                    $_SESSION["ID_SP"] = [];
                                    foreach ($select_cart as $sc) { 
                                        array_push($_SESSION["ID_SP"],$sc['id']);
                                        foreach ( $select_Product as $sp) { 
                                            if($sc['product_id']==$sp['id']){
                                    ?>
                            <div class="check-out">
                                <span
                                    class="name-product"><?php echo $_COOKIE['SL_'.$sc['id']].'x  '.$sp['tensp']; ?></span>
                                <span><?php echo number_format($_COOKIE['Price_'.$sc['id']], 0, ',', '.') ?> đ</span>
                            </div>
                            <?php
                                                }
                                            }
                                        }
                                      
                                    ?>


                            <div class="total-order">

                                <span>Tổng tiền</span>

                                <span><?php 
                                                        if(isset($_COOKIE['Tong_tien']) && ($_COOKIE['Tong_tien']) != ''){
                                                                echo $_COOKIE['Tong_tien'];
                                                            }else{
                                                                echo number_format($Tong_tien, 0, ',', '.');
                                                                
                                                            } 
                                                    ?>
                                </span>

                            </div>
                            <div class="btn-return">
                                <a href="delete_cookie_cart.php"><span><i class="fas fa-long-arrow-alt-left"></i></span>
                                    Quay lại
                                    trang chủ</a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

        <?php 
                            
                        echo "<script>              
                        document.getElementById('BOX_THONG_BAO').style.display = 'block';
                        document.getElementById('WALL_THONG_BAO').style.display = 'block';
                        </script>";
                    }
                     
                ?>

    </section>
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
                        <h3 class="title-banner-page">Thanh Toán</h3>
                        <div class="current-page-box-link">
                            <a href="trangchu.php" class="link-previous-page">Trang chủ ></a>
                            <a href="cart.php" class="link-previous-page">Giỏ Hàng ></a>
                            <span class="current-page"> Thanh Toán</span>
                        </div>
                    </div>
                </div>
                <h2 class="order-title">1. ĐỊA CHỈ THANH TOÁN</h2>
                <div class="row">
                    <div class=" col-lg-7 col-md-12">
                        <div class="infor-order-area">
                            <form class="address-form" method="POST">
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Họ tên</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="txtname" id="colFormLabel"
                                            value="<?php echo  $_SESSION['user_hoten']; ?>" placeholder="Nhập họ tên">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Điện thoại</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="txtphone" id="colFormLabel"
                                            value="<?php echo  $_SESSION['user_sdt']; ?>"
                                            placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-9">
                                        <textarea name="txtaddress" id="" class="form-control" cols="30" rows="4"
                                            placeholder="Ghi rõ địa chỉ nhận hàng"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Ghi chú</label>
                                    <div class="col-sm-9">
                                        <textarea name="txtnote" id="" class="form-control" cols="30" rows="4"
                                            placeholder="Ghi chú"></textarea>
                                    </div>
                                </div>


                            </form>




                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="infor-bill-area">
                            <?php
                            $tinh_Tam = 0;
                            $count_cart =mysqli_num_rows($select_cart) ;   
                        ?>

                            <div class="infor-bill-flex infor-bill-item">
                                <span>Đơn hàng (
                                    <?php echo $count_cart ?> sản phẩm)
                                </span>
                                <a href="cart.php">Sửa</a>
                            </div>
                            <?php
                            $tien_ship = 50000;// tiền ship
                            $count = 0;
                            $arr_idSP = [];
                            $arr_SLSP = [];
                            $_SESSION['get_id_product'] = [];

                            foreach ($select_cart as $sc) { 
                                foreach ( $select_Product as $sp) { 
                                    if($sc['product_id']==$sp['id']){ 
                        ?>
                            <div class="infor-bill-item ">
                                <div class="order-product-item infor-bill-flex">
                                    <span><?php echo $_COOKIE['SL_'.$sc['id']] ?>X</span>
                                    <span><?php echo $sp['tensp']; ?></span>
                                    <span><?php echo number_format($_COOKIE['Price_'.$sc['id']], 0, ',', '.')  ?></span>
                                </div>
                            </div>

                            <input type="hidden" name="get_id_product" value="<?php echo $sp['id']; ?>">
                            <input type="hidden" name="get_SL_product" value="<?php echo $_COOKIE['SL_'.$sc['id']]; ?>">
                            <?php
                                array_push( $arr_idSP,$sp['id']);
                                array_push( $arr_SLSP,$_COOKIE['SL_'.$sc['id']]);

                               
                                $_SESSION['get_SL_product']= $arr_SLSP;

                                $count = $count+1;

                                $tinh_Tam = $tinh_Tam + $_COOKIE['Price_'.$sc['id']] * $_COOKIE['SL_'.$sc['id']];
                                
                                    }
                                }
                            }
                            $Tong_tien = $tinh_Tam + $tien_ship;
                           
                        ?>




                            <div class="infor-bill-item">
                                <div class="infor-bill-flex">
                                    <span>Tạm Tính</span>
                                    <span>
                                        <?php echo number_format($tinh_Tam, 0, ',', '.')  ?>

                                        đ</span>
                                </div>
                                <div class="infor-bill-flex">
                                    <span>Giảm giá</span>
                                    <input type="text" name="discount" placeholder="Nhập giá trị giảm giá"
                                        onblur="addCurrencySymbol(this)">
                                </div>
                                <div class="infor-bill-flex">
                                    <span>Phí Vận Chuyển</span>
                                    <input type="text" name="shipping_fee" disabled value="50.000 đ"
                                        onblur="addCurrencySymbol(this)">
                                </div>




                            </div>


                            <div class="infor-bill-flex infor-bill-item total-price-bill">
                                <span>Thành Tiền</span>
                                <span id='tien_ship'> <?php echo number_format($Tong_tien, 0, ',', '.')  ?> </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="btn-order">
                    <button class="btn-add-cart" type="submit" name="dat_Mua">ĐẶT MUA</button>
                </div>
            </div>
        </form>

        <?php
                    $arr_ma_GG = [];
                    foreach($select_mgg  as $sm){
                     array_push($arr_ma_GG,$sm['ma_GG'])
                ?>
        <input type="hidden" id="<?php echo $sm['ma_GG'];?>" value=<?php echo $sm['tien_GG'];?>>
        <?php

                    }
                    
                ?>
        <input type="hidden" id="arr_maGG" value="<?php echo implode('-',$arr_ma_GG) ; ?>">
        <input type="hidden" id="Tong_so_tien" value=<?php echo $Tong_tien; ?>>


        <script>
        function formatCurrency(num) {
            num = num.toString().replace(/\$|\,/g, '');
            if (isNaN(num)) {
                num = "0";
            }

            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num * 100 + 0.50000000001);
            cents = num % 100;
            num = Math.floor(num / 100).toString();

            if (cents < 10) {
                cents = "0" + cents;
            }
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++) {
                num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
            }

            return (((sign) ? '' : '-') + num);
        }
        // let tien_ship = 50000;
        const arr_mgg = [];

        function addCurrencySymbol(input) {
            // Lấy giá trị đã nhập
            var value = input.value;

            function setCookie(cname, cvalue, exdays) {
                const d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                let expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            const get_code = document.getElementById('arr_maGG').value;
            const get_arr_code = get_code.split("-");
            get_arr_code.map((item) => {
                if (value == item) {
                    const get_value_code = document.getElementById(item).value;
                    const get_Tong_tien = document.getElementById('Tong_so_tien').value;

                    const id_tien_ship = document.getElementById('tien_ship');
                    let tong_tien = formatCurrency((parseInt(get_Tong_tien) - get_value_code))
                    id_tien_ship.innerHTML = tong_tien;
                    setCookie('Tong_tien', tong_tien, 1)
                }
            })



        }
        </script>




        <?php
           
            if(isset($_POST['dat_Mua'])){
                
                $account_id = $_SESSION['user_id'];
                $name = $_POST['txtname'];
                $phone = $_POST['txtphone'];
                $address = $_POST['txtaddress'];
                $note = $_POST['txtnote'];
                
                if(isset($_COOKIE['Tong_tien']) && ($_COOKIE['Tong_tien']) != ''){
                    $total = $_COOKIE['Tong_tien'];
                }else{
                    $total = number_format($Tong_tien, 0, ',', ',');
                    echo "check: ".$Tong_tien;
                }
                $_SESSION["address"]= $_POST['txtaddress'];
                $_SESSION["sdt"]=$_POST['txtphone'];
                $list_sanPham = implode("-",$arr_idSP);
                $list_soLuong = implode("-",$arr_SLSP);

                $insert_bill = $getdata->add_order(
                        $account_id,
                        $name,
                        $phone,
                        $address,
                        $note,
                        $total,$list_sanPham,$list_soLuong
                    );



                if($insert_bill){
                    
                    run_bill($select_cart,$select_Product,$Tong_tien);
                     // xoa cookies tong tien
                    // updata số lượng đã bán được và số lượng hàng còn trong kho
                    $updata_soLluong = $getdata->select_product_SoLuong();

                    foreach($updata_soLluong as $se){
                        for($i=0;$i<sizeof($arr_idSP);$i++){
                            if($arr_idSP[$i]==$se['id']){

                                $quantyti_product = $getdata-> cart_idProduct_idAccount($_SESSION['user_id'],$arr_idSP[$i]);
                                foreach($quantyti_product as $qp){
                                    $updata_SL_SLDB = $getdata->update_product_so_luong_da_ban($arr_idSP[$i],$se['soluong']-$qp['qty'],$se['da_ban_duoc']+$qp['qty']);
                                }
                            }
                        }
                    }
                    
                    // xõa cart khi đặt hàng thành công
                    $delete_cart= $getdata->delete_cart($_SESSION['user_id']); 
               
                }
                
            }

            
            
        ?>





    </main>
    <?php
    // Gọi tệp footer.php
    include('footer.php');
    ?>
</body>

</html>
<script>
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
setCookie('Tong_tien', '', 1)
</script>