<?php
session_start();
include('../../Men-Shop/control.php');
$getdata = new Data();
$select_product = $getdata->product();
$select_product_ban_duoc = $getdata->product_dan_duoc_nhieu();
$select_bill = $getdata->select_bill();
$select_unique_name = $getdata->select_unique_name();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./icofont/icofont.min.css">
    <link rel="apple-touch-icon" sizes="76x76" href="../../Men-Shop/img/logoshop.png" />
    <link rel="icon" type="image/png" href="../../Men-Shop/img/logoshop.png" />
    <title>Quản lí sản phẩm</title>

    <!-- Material Icons quan trọng -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files quan trợn -->
    <link id="pagestyle" href="../css/material-dashboard.css?v=3.0.5" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* .product-table {
        margin-left: 275px;
    } */

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc !important;
            text-align: center;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table img {
            max-width: 100px;
            max-height: 100px;
        }

        .btn-add {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn-add:hover {
            background-color: #45a049;
        }

        .menu {
            background-color: #f4f4f4;
            padding: 10px;
        }

        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .menu li {
            margin: 0 10px;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 5px;
            transition: background-color 0.3s ease;
        }

        .menu a:hover {
            background-color: #4CAF50;
            color: #fff;
            border-radius: 5px;
            padding: 10px 5px;
        }

        .list_sp {
            text-align: start;
        }

        .list_sp ul li {
            list-style: none;
        }

        .bnt_bao_cao {
            margin: 20px 0;
            padding: 10px;
        }

        #tb_doanh_thu {
            display: block;
        }

        #tb_kho {
            display: block;
        }

        #tb_khach_hang {
            display: block;
        }
    </style>

</head>

<body>
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs  border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark">
        <div class="sidenav-header">
            <a class="navbar-brand m-0" href="">
                <img src="../../Men-Shop/img/logoshopnentrang.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold text-white">Men's Shop</span>
            </a>
        </div>

        <hr class="horizontal light mt-0 mb-2" />
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/user.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_circle</i>
                        </div>
                        <span class="nav-link-text ms-1"> Quản lí người dùng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/product.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">inventory_2</i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lí sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/blog.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">newspaper</i>
                        </div>
                        <span class="nav-link-text ms-1">Quản lí bài viết</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/bill.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">request_quote</i>
                        </div>

                        <span class="nav-link-text ms-1">Quản lí hóa đơn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary " href="../pages/Doanh_thu.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">insert_chart</i>
                        </div>

                        <span class="nav-link-text ms-1">Báo cáo thống kê</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/ma_giam_gia.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">currency_exchange</i>
                        </div>

                        <span class="nav-link-text ms-1">Mã giảm giá</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    <main class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            Báo cáo thống kê
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Báo cáo thống kê</h6>
                </nav>
        </nav>
        <!-- File product.php -->

        <!-- Menu -->
        <form method='post'>
            <label for="">Tháng: </label>
            <select name="get_date">
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>


            <label for="">Năm: </label>
            <?php $years = range(2020, strftime("%Y", time())); ?>
            <select name="get_year">
                <option>Select Year</option>
                <?php foreach ($years as $year): ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="btn_xem">Xem</button>
        </form>
        <br>


        <button id='btn_doanh_thu' class='bnt_bao_cao' date-show='false'>Báo cáo doanh thu</button>
        <div id='tb_doanh_thu'>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tháng</th>
                        <th>Số sản phẩm bán được</th>
                        <th>Số đơn chưa duyệt</th>
                        <th>Số đơn đã duyệt</th>
                        <th>Số đơn đã giao</th>
                        <th>Số tiền thu về</th>
                        <th>Số lượng bán được | Sản phẩm</th>
                    </tr>
                </thead>

                <!-- Sản phẩm -->

                <?php
                $month = date('m');
                $year = date('y');

                if (isset($_POST['btn_xem'])) {

                    $month = $_POST['get_date'];
                    $year = $_POST['get_year'];

                }
                $select_bill_data = $getdata->select_bill_date($month, $year);
                // $select_bill_data_day = $getdata->select_bill_date_day($day,$month);
                $so_don_hang = mysqli_num_rows($select_bill_data); // tong so don hang
                $so_SP = 0;
                $so_tien_thu = 0;
                $so_khach_hang = [];
                $string_SL = '0';
                $string_ID = '0';

                $arr_don_chua_duyet = [];
                $arr_don_da_duyet = [];
                $arr_don_da_gui = [];
                foreach ($select_bill_data as $sbd) {
                    $string_SL = $string_SL . '-' . $sbd['list_so_luong'];
                    $string_ID = $string_SL . '-' . $sbd['list_san_pham'];

                    array_push($so_khach_hang, $sbd['account_id']);

                    if ($sbd['trang_thai'] == 0) {
                        array_push($arr_don_chua_duyet, $sbd['trang_thai']);
                    } elseif ($sbd['trang_thai'] == 1) {
                        array_push($arr_don_da_duyet, $sbd['trang_thai']);
                    } else {
                        array_push($arr_don_da_gui, $sbd['trang_thai']);
                    }



                    $sbd['total'] = str_replace(',', '', $sbd['total']);
                    $so_tien_thu = $so_tien_thu + intval($sbd['total']);




                }

                $arr_SLSP = explode("-", $string_SL); // so luongg san pham da duoc dat  
                $arr_idSP = explode("-", $string_ID);
                for ($i = 1; $i < sizeof($arr_SLSP); $i++) {
                    $so_SP = $so_SP + intval($arr_SLSP[$i]);

                }



                $don_chua_duyet = sizeof($arr_don_chua_duyet);
                $don_da_duyet = sizeof($arr_don_da_duyet);
                $don_da_gui = sizeof($arr_don_da_gui);

                $SP_con_lai = 0;
                foreach ($select_product as $sp) {
                    $SP_con_lai = $SP_con_lai + $sp['soluong'];
                }

                ?>
                <tbody>
                    <tr>
                        <?php

                        ?>
                        <td>Tháng
                            <?php echo $month; ?>
                        </td>
                        <td>
                            <?php echo $so_SP; ?> Sản phẩm
                        </td>
                        <td>
                            <?php echo $don_chua_duyet; ?>
                        </td>
                        <td>
                            <?php echo $don_da_duyet; ?>
                        </td>
                        <td>
                            <?php echo $don_da_gui; ?> Đơn
                        </td>
                        <td>
                            <?php echo number_format($so_tien_thu, 0, ",", "."); ?> vnđ
                        </td>
                        <td class='list_sp'>
                            <ul>
                                <?php

                                for ($i = 1; $i < sizeof($arr_SLSP); $i++) {
                                    foreach ($select_product as $sp) {
                                        // $arr_SLSP[$i];
                                        // $arr_idSP[$i];
                                        if ($arr_idSP[$i] == $sp['id']) {
                                            echo ' <li>' . $arr_idSP[$i] . 'x &nbsp; &nbsp; | &nbsp; &nbsp; ' . $sp['tensp'] . '</li>';
                                        }
                                    }
                                }
                                ?>

                            </ul>
                        </td>

                        <?php

                        ?>


                    </tr>
                </tbody>

                <?php
                ?>
            </table>
        </div>

        <!-- Kho -->
        <?php
        // Lấy thông tin sản phẩm bán được từ cơ sở dữ liệu hoặc nguồn dữ liệu khác
        $select_product_ban_duoc = $getdata->product_ban_duoc($conn);

        // Kiểm tra xem biến có dữ liệu hay không
        if (!empty($select_product_ban_duoc)) {
            // Sắp xếp mảng sản phẩm theo số lượng đã bán giảm dần
            usort($select_product_ban_duoc, function ($a, $b) {
                return $b['da_ban_duoc'] - $a['da_ban_duoc'];
            });
            ?>
            <button id='btn_kho' class='bnt_bao_cao' date-show='false'>Báo cáo kho</button>
            <div id='tb_kho'>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số sản phẩm bán được</th>
                            <th>Tồn kho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($select_product_ban_duoc as $spbd) {
                            ?>
                            <tr>
                                <td>
                                    <img src="../../Men-Shop/<?php echo $spbd['anh'] ?>" alt="not img" />
                                </td>
                                <td>
                                    <?php echo $spbd['tensp'] ?>
                                </td>
                                <td>
                                    <?php echo $spbd['gia'] ?>
                                </td>
                                <td>
                                    <?php echo $spbd['da_ban_duoc'] ?>
                                </td>
                                <td>
                                    <?php echo $spbd['soluong'] ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "Không có dữ liệu sản phẩm bán được.";
        }
        ?>


        <button id='btn_khach_hang' class='bnt_bao_cao' date-show='false'>Báo cáo khách hàng</button>
        <div id='tb_khach_hang'>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tống hàng đặt</th>
                        <th>Chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($select_unique_name as $sn) {
                        $SL_san_pham_Sr = '0';
                        $id_san_pham_Sr = '0';
                        $tong_so_SP = 0;
                        $select_bill_by_name = $getdata->select_By_name($sn['name']);


                        foreach ($select_bill_by_name as $sbbn) {
                            $SL_san_pham_Sr = $SL_san_pham_Sr . '-' . $sbbn['list_so_luong'];
                            $id_san_pham_Sr = $id_san_pham_Sr . '-' . $sbbn['list_san_pham'];
                        }

                        $ARR_san_pham_Sr = explode("-", $SL_san_pham_Sr);
                        $ARR_id_san_pham_Sr = explode("-", $id_san_pham_Sr);
                        for ($i = 1; $i < sizeof($ARR_san_pham_Sr); $i++) {
                            $tong_so_SP = $tong_so_SP + intval($ARR_san_pham_Sr[$i]);

                        }
                        ?>
                        <tr>
                            <td>
                                <?php echo $sn['name']; ?>
                            </td>
                            <td>
                                <?php echo $sn['phone']; ?>
                            </td>
                            <td>
                                <?php echo $sn['address']; ?>
                            </td>
                            <td>
                                <?php echo $tong_so_SP ?>
                            </td>
                            <td class='list_sp'>
                                <ul>
                                    <?php
                                    for ($i = 1; $i < sizeof($ARR_san_pham_Sr); $i++) {
                                        foreach ($select_product as $sp) {
                                            if ($ARR_san_pham_Sr[$i] == $sp['id']) {
                                                echo '<li>' . $ARR_san_pham_Sr[$i] . 'x  &nbsp; |  &nbsp; ' . $sp['tensp'] . '</li>';
                                            }
                                        }
                                    }



                                    ?>
                                </ul>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>





    </main>

</body>
<script>
    function node_table(id_idv, id_table) {
        const btn_doanh_thu = document.getElementById(id_idv);
        const tb_doanh_thu = document.getElementById(id_table);
        btn_doanh_thu.addEventListener('click', function () {
            if (btn_doanh_thu.getAttribute("date-show") == 'true') {
                tb_doanh_thu.style.display = 'none';
                btn_doanh_thu.style.backgroundColor = '#EFEFEF';
                btn_doanh_thu.setAttribute("date-show", "false")
            } else {
                tb_doanh_thu.style.display = 'block';
                btn_doanh_thu.style.backgroundColor = '#34ba3c';
                btn_doanh_thu.setAttribute("date-show", "true")
            }

        })
    }
    node_table('btn_doanh_thu', 'tb_doanh_thu');
    node_table('btn_kho', 'tb_kho');
    node_table('btn_khach_hang', 'tb_khach_hang');
</script>