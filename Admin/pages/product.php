<?php
session_start();
include('../../Men-Shop/control.php');
$getdata = new Data();
$select_product = $getdata->product();
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
            border: 1px solid #ccc;
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
                    <a class="nav-link text-white active bg-gradient-primary" href="../pages/product.php">
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
                            Quản lí sản phẩm
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Quản lí sản phẩm</h6>
                </nav>
        </nav>
        <!-- File product.php -->

        <!-- Menu -->
        <a href="../../Men-Shop/add_product.php" style="float: right; margin-right: 10px" class="btn-add">Thêm
            sản phẩm</a>
        <div class="menu">

            <ul>
                <li><a href="product.php">Tất cả sản phẩm</a></li>
                <li><a href="product.php?category=Áo">Áo</a></li>
                <li><a href="product.php?category=quan">Quần</a></li>
                <li><a href="product.php?category=giay">Giày</a></li>
                <li><a href="product.php?category=Phụ Kiện">Phụ Kiện</a></li>
            </ul>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá gốc</th>
                    <th>Thể loại</th>
                    <th>Số lượng</th>
                    <th>Thời gian thêm</th> <!-- Thêm dòng này -->
                    <th>Cập nhật cuối</th> <!-- Thêm dòng này -->
                    <th>Thao tác</th>
                </tr>
            </thead>

            <!-- Sản phẩm -->
            <div class="product-container">
                <?php


                // Lấy giá trị của tham số category từ URL
                $category = isset($_GET['category']) ? $_GET['category'] : '';

                // Truy vấn và hiển thị sản phẩm theo danh mục
                if (!empty($category)) {
                    $select_product = $getdata->select_product_by_category($category);
                    // Hiển thị sản phẩm theo danh mục
                    foreach ($select_product as $sp) { ?>
                        <tr>
                            <td>
                                <?php echo $sp['id'] ?>
                            </td>
                            <td>
                                <img src="../../Men-Shop/<?php echo $sp['anh'] ?>" alt="not img" />
                            </td>
                            <td>
                                <?php echo $sp['tensp'] ?>
                            </td>
                            <td>
                                <?php echo $sp['gia'] ?>
                            </td>
                            <td>
                                <?php echo $sp['giagoc'] ?>
                            </td>
                            <td>
                                <?php echo $sp['theloai'] ?>
                            </td>
                            <td>
                                <?php echo $sp['soluong'] ?>
                            </td>
                            <td>
                                <?php echo $sp['created_time'] ?>
                                <!-- Hiển thị thời gian thêm -->
                            </td>
                            <td>
                                <?php echo $sp['last_update'] ?>
                                <!-- Hiển thị thời gian thêm -->
                            </td>


                            <td>
                                <a style="text-decoration: none; color: #000"
                                    href="../../Men-Shop/update_product.php?update=<?php echo $sp['id'] ?>">
                                    <button class="btn-edit">Chỉnh sửa</button>
                                </a>
                                <a style="text-decoration: none; color: #000"
                                    href="../../Men-Shop/delete_product.php?delete=<?php echo $sp['id'] ?>">
                                    <button class="btn-delete">Xóa</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                <?php
                } else {
                    // Hiển thị tất cả sản phẩm
                    $select_product = $getdata->select_product($category);
                    // Hiển thị sản phẩm theo danh mục
                    foreach ($select_product as $sp) { ?>
                        <tr>
                            <td>
                                <?php echo $sp['id'] ?>
                            </td>
                            <td>
                                <img src="../../Men-Shop/<?php echo $sp['anh'] ?>" alt="not img" />
                            </td>
                            <td>
                                <?php echo $sp['tensp'] ?>
                            </td>
                            <td>
                                <?php echo $sp['gia'] ?>
                            </td>
                            <td>
                                <?php echo $sp['giagoc'] ?>
                            </td>
                            <td>
                                <?php echo $sp['theloai'] ?>
                            </td>
                            <td>
                                <?php echo $sp['soluong'] ?>
                            </td>
                            <td>
                                <?php echo $sp['created_time'] ?>
                                <!-- Hiển thị thời gian thêm -->
                            </td>
                            <td>
                                <?php echo $sp['last_update'] ?>
                                <!-- Hiển thị thời gian thêm -->
                            </td>
                            <td>
                                <a style="text-decoration: none; color: #000"
                                    href="../../Men-Shop/update_product.php?update=<?php echo $sp['id'] ?>">
                                    <button class="btn-edit">Chỉnh sửa</button>
                                </a>
                                <a style="text-decoration: none; color: #000"
                                    href="../../Men-Shop/delete_product.php?delete=<?php echo $sp['id'] ?>">
                                    <button class="btn-delete">Xóa</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>

        </table>
        </div>



    </main>

</body>