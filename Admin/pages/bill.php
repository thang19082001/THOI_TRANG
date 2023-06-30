<?php
session_start();
include('../../Men-Shop/control.php');
$getdata = new Data();
$select_product = $getdata->product();
$select_bill = $getdata->select_bill()
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <style>
        /* .product-table {
        margin-left: 275px;
    } */

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        ul li {
            text-decoration: none;
            list-style: none;
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

        #chua_duyet {
            padding: 5px 10px;
            border: none;
            color: #ffffff;
            background-color: red;
        }

        #da_duyet {
            padding: 5px 10px;
            border: none;
            color: #ffffff;
            background-color: green;
        }

        #da_giao {
            padding: 5px 10px;
            border: none;
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
                    <a class="nav-link text-white active bg-gradient-primary" href="../pages/bill.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">request_quote</i>
                        </div>

                        <span class="nav-link-text ms-1">Quản lí hóa đơn</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  " href="../pages/Doanh_thu.php">
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
                            Quản lí hóa đơn
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Quản lí hóa đơn</h6>
                </nav>
        </nav>
        <!-- File product.php -->

        <!-- Menu -->

        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên khách</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Ngày đặt</th>
                    <th>Sản phầm</th> <!-- Thêm dòng này -->
                    <th>Số lượng</th> <!-- Thêm dòng này -->
                    <th>Tổng giá</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>

            <!-- Sản phẩm -->

            <tbody border='1'>

                <?php
                $STT = 1;
                foreach ($select_bill as $sb) {
                    $arr_idSP = explode("-", $sb['list_san_pham']);
                    $arr_SLSP = explode("-", $sb['list_so_luong']);
                    ?>
                    <tr>
                        <td>
                            <?php echo $STT; ?>
                        </td>
                        <td>
                            <?php echo $sb['account_id']; ?>
                        </td>
                        <td>
                            <?php echo $sb['name']; ?>
                        </td>
                        <td>
                            <?php echo $sb['phone']; ?>
                        </td>
                        <td>
                            <?php echo $sb['address']; ?>
                        </td>
                        <td>
                            <?php echo $sb['note']; ?>
                        </td>
                        <td>
                            <?php echo $sb['created_time']; ?>
                        </td>
                        <td>
                            <ul>
                                <?php
                                foreach ($select_product as $sp) {
                                    for ($i = 0; $i < sizeof($arr_idSP); $i++) {
                                        if ($sp['id'] == $arr_idSP[$i]) {
                                            echo "<li>" . $sp['tensp'] . "</li>";
                                        }

                                    }
                                }
                                ?>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <?php

                                for ($i = 0; $i < sizeof($arr_SLSP); $i++) {
                                    echo "<li>" . $arr_SLSP[$i] . "</li>";
                                }

                                ?>
                            </ul>
                        </td>
                        <td>
                            <?php echo $sb['total']; ?>
                        </td>
                        <td>
                            <?php
                            if ($sb['trang_thai'] == 0) {
                                echo "<a href='trang_thai_1.php?idBill=" . $sb['id'] . "'><button id='chua_duyet' onclick='xacNhan()'>Chưa duyệt</button></a>";
                            } elseif ($sb['trang_thai'] == 1) {
                                echo "<a href='trang_thai_2.php?idBill=" . $sb['id'] . "'><button id='da_duyet' onclick='xacNhan()'>Đã duyệt</button></a>";
                            } else {
                                echo "<a href='trang_thai_0.php?idBill=" . $sb['id'] . "'><button id='da_giao' onclick='xacNhan()'>Đã giao hàng</button></a>";
                            }
                            ?>
                        </td>

                    </tr>

                    <?php
                    $STT = $STT + 1;
                }
                ?>
            </tbody>
        </table>
        </div>



    </main>

</body>