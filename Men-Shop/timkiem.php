<?php
include('control.php');
$getdata = new Data();
$select = $getdata->product();

function vn_str_filter ($str){
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
   foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
   }
return $str;
}

if (isset($_POST['btn'])) {
    $noidung = $_POST['noidung'];
    $matchedProducts = [];
    while ($row = mysqli_fetch_array($select)) {
        if (strpos(strtolower(vn_str_filter($row['tensp'])), vn_str_filter(strtolower($noidung))) !== false) {
            
                $matchedProducts[] = $row;
            
        }
    }
} else {
    $matchedProducts = $select;
}

$numResults = count($matchedProducts);
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
    <link rel="stylesheet" href="template/css/_grid.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="icon" href="img/logoshop.png" type="image/gif">
    <link rel="stylesheet" href="./template/css/dangxuat.css">
    <title>Tìm kiếm</title>
</head>

<body>


    <?php
    // Gọi tệp header.php
    include('header.php');
    ?>

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
                    <h3 class="title-banner-page"> Trang tìm kiếm</h3>
                    <div class="current-page-box-link">
                        <a href="" class="link-previous-page">Trang chủ ></a>
                        <span class="current-page"> Tìm kiếm</span>
                    </div>
                </div>
            </div>

            <div class="row mb-4 search-order-box">
                <div class="filter-search col-lg-3 col-md-4 col-sm-6">
                    <h6>Có
                        <?php echo $numResults; ?> kết quả tìm kiếm phù hợp
                    </h6>
                </div>
            </div>

            <div class="row box-element">

                <div>
                    <div class="row products">
                        <?php
                        if (!empty($matchedProducts)) {


                            foreach ($matchedProducts as $se) { // khi thực hiện lấy dữ liệu trong data cần sử dụng
                        
                                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 item">
                            <div class="product-item">
                                <div class="card">
                                    <div class="card-img">
                                        <a href="./detailProduct.php?id=<?php echo $se['id'] ?>"><img
                                                src="<?php echo $se['anh'] ?>" class="card-img-top" alt="..."></a>
                                        <div class="add-cart-box">
                                            <a href="">
                                                <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                                THÊM VÀO GIỎ HÀNG
                                            </a>
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
                        } else {
                            echo "<p>Không có sản phẩm phù hợp.</p>";
                        }
                        ?>

                    </div>

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