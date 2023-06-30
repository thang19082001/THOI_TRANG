<?php
include('control.php'); //chèn trang control vào news
session_start();
$getdata = new Data(); // Gọi class data
$select = $getdata->user();
$select_bill = $getdata->select_bill_id($_SESSION['user_id']);
$select_product = $getdata->product();
$select_use = $getdata->user();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/css/header.css">
    <!-- <link rel="stylesheet" href="template/css/main.css"> -->
    <link rel="stylesheet" href="template/css/footer.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="./template/css/suplo-style.scss.css">
    <link rel="stylesheet" href="./template/css/timber.scss.css">

    <link rel="stylesheet" href="template/css/base.scss.css">
    <link rel="stylesheet" href="./template/css/dangxuat.css">

    <script src="https://kit.fontawesome.com/f03f52505a.js" crossorigin="anonymous"></script>
    <title>Trang khách hàng</title>
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






    <div class="title_full">

    </div>

    </div>
    <section class="signup page_customer_account">
        <div class="container">
            <div class="wrap_background_aside  margin-bottom-40">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
                        <div id="parent" class="row">
                            <div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">

                                        <div class="page-title m992">
                                            <h1 class="title-head margin-top-0"><a href="">Trang khách hàng</a></h1>
                                        </div>
                                        <div class="form-signup name-account m992">
                                            <p><strong>Xin chào, <a href="/account/addresses" style="color:#08bbb7;">
                                                        <?php echo $_SESSION['user_hoten'] ?>
                                                    </a>&nbsp;!</strong></p>
                                        </div>
                              
                                <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">

                                    <div class="my-account">
                                        <div class="dashboard">

                                            <div class="recent-orders">
                                                <div class="table-responsive tab-all" style="overflow-x:auto;">
                                                    <table class="table table-cart" id="my-orders-table">
                                                        <thead class="thead-default">
                                                            <tr>
                                                                <th>Đơn hàng</th>
                                                                <th>Số lượng</th>
                                                                <th>Ngày</th>
                                                                <th>Địa chỉ</th>
                                                                <th>Giá trị đơn hàng</th>
                                                                <th>Trạng thái </th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tbody>
                                                            <?php
                                                                if(mysqli_num_rows($select_bill) > 0 ){
                                                                    foreach($select_bill as $se){
                                                                        $arr_idSP = explode("-",$se['list_san_pham']);
                                                                        $arr_SLSP = explode("-",$se['list_so_luong']);      
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <ul>
                                                                                <?php 
                                                                                    foreach( $select_product as $sp){
                                                                                        for($i=0;$i<sizeof($arr_idSP);$i++)
                                                                                        {
                                                                                            if( $sp['id'] == $arr_idSP[$i] )
                                                                                            {
                                                                                                echo  "<li>".$sp['tensp']."</li>";
                                                                                            }
                                                                                            
                                                                                        }
                                                                                    }
                                                                                ?>
                                                                            </ul>
                                                                        </td>
                                                                        <td>
                                                                            <ul>
                                                                                <?php 
                                                                                    
                                                                                    for($i=0;$i<sizeof( $arr_SLSP);$i++)
                                                                                    {
                                                                                        echo  "<li>".$arr_SLSP[$i]."</li>";
                                                                                    }
                                                                                        
                                                                                ?>
                                                                            </ul>
                                                                        </td>
                                                                        <td><?php echo $se['created_time'] ?></td>
                                                                        <td><?php echo $se['address'] ?></td>
                                                                        <td><?php echo $se['total'] ?> VNĐ</td>
                                                                        <td><?php 
                                                                            if($se['trang_thai'] == 0){
                                                                                echo "Chờ xác nhận";
                                                                            }
                                                                            elseif($se['trang_thai'] == 1){
                                                                                echo "Đang Vận chuyển";
                                                                            }
                                                                            else{
                                                                                echo "Đã giao hàng";
                                                                            }
                                                                        ?></td>

                                                                    </tr>
                                                            <?php 
                                                                    }
                                                                }
                                                                else{

                                                                
                                                            ?>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <p>Không có đơn hàng nào.</p>
                                                                    </td>
                                                                </tr>
                                                            <?php 
                                                                    }
                                                            ?>

                                                        </tbody>


                                                    </table>

                                                </div>

                                                <div
                                                    class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
                                <div class="block-account">
                                    <div class="block-title-account">
                                        <h5>Tài khoản của tôi</h5>
                                    </div>
                                    <div class="block-content form-signup">
                                        <p>Tên tài khoản: <strong style="line-height: 20px;"> <?php echo $_SESSION['user_hoten'] ?></strong></p>
                                         <?php
                                            foreach($select_use as $su){
                                                if($_SESSION['user_id'] == $su['id'] )
                                                {
                                         ?>
                                                <p><i class="fa fa-home font-some" aria-hidden="true"></i> <span>Email: <?php echo $su['email'] ?>
                                                    </span></p>
                                                <p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <span>Điện thoại: <?php echo $su['sdt'] ?>
                                                    </span> </p>

                                                
                                        <?php
                                                }
                                            }
                                         ?>        

                                    </div>
                                </div>
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