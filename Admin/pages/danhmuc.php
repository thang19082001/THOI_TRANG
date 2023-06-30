<?php
session_start();
include('../../Men-Shop/control.php');
$getdata = new Data();

$select_category = $getdata->select_danhmuc();
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
    <title>Quản lí danh mục sản phẩm</title>

    <!-- Material Icons quan trọng -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files quan trợn -->
    <link id="pagestyle" href="../css/material-dashboard.css?v=3.0.5" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark">
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
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/product.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">inventory_2</i>
                        </div>
                        <span class="nav-link-text ms-1">Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../pages/danhmuc.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">inventory_2</i>
                        </div>
                        <span class="nav-link-text ms-1">Danh Mục</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/blog.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">newspaper</i>
                        </div>
                        <span class="nav-link-text ms-1">Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/bill.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">request_quote</i>
                        </div>

                        <span class="nav-link-text ms-1">Bills</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary " href="../pages/Doanh_thu.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">insert_chart</i>
                        </div>

                        <span class="nav-link-text ms-1">Doanh thu</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/ma_giam_gia.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">currency_exchange</i>
                        </div>

                        <span class="nav-link-text ms-1">Sale</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
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
                            Quản lí danh mục
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Quản lí danh mục</h6>
                </nav>
        </nav>
        <!-- Category form -->
        <div class="form_input">
            <form method='post'>
                <input type="text" name="txt_name" placeholder='Nhập tên danh mục' required>
                <button type="submit" name="btn_them">Thêm Danh Mục</button>
            </form>
        </div>

        <div class="form_input">
            <?php
            if (isset($_POST['btn_them'])) {
                $name = $_POST['txt_name'];
                $insert_category = $getdata->insert_danhmuc($name);
                if ($insert_category) {
                    echo "Thêm thành công!!";
                } else {
                    echo "Thêm không thành công!!";
                }
            }
            ?>
        </div>
        <br>
        <div class="form_input">
            <button onclick='window.location="danhmuc.php"'>Reload</button>
        </div>
        <div class="form_input">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên Danh Mục</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <?php
                foreach ($select_category as $sc) {
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $sc['id'] ?>
                            </td>
                            <td>
                                <?php echo $sc['tendanhmuc'] ?>
                            </td>
                            <td><a href="category_delete.php?id=<?php echo $sc['id'] ?>"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    </tbody>

                    <?php
                }
                ?>

            </table>
        </div>
    </main>
</body>

</html>