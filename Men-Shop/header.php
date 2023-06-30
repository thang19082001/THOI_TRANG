<section class="navbar-left-box">
    <div id="hideContent" class=""></div>
    <div id="navbar-active" class="navbar-left">
        <div class="visual">
            <a id="btn-login" type="button" href="login.php">
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
                    <a href="shirt.php">Áo</a>
                    <a href="pant.php">Quần</a>
                    <a href="shoes.php">Giày</a>
                    <a href="accessories.php">Phụ Kiện</a>
                </div>
            </div>
            <div class="navbar-left-item">

                <a href="blog.php"><span><i class="far fa-newspaper"></i></span>Tin Tức</a>
            </div>

            <div class="navbar-left-item">

                <a href="contact.php"><span><i class="fas fa-map"></i></span>Liên Hệ</a>
            </div>
        </div>
    </div>
</section>


<!-- Chức năng tìm kiếm -->
<section id="" class="search">
    <div id="hideContentSearch" class=""></div>
    <div class="search-box" id="searchBox">
        <form class="form-seach" id="form-search" method="post" action="timkiem.php">
            <input type="text" name="noidung" class="form-input-search">

            <button type="submit" class="btn-submit-search" name="btn"><span><i
                        class="fas fa-search"></i></span></button>
            <button type="button" class="btnCancel">X</button>
        </form>
        <?php

        include "connect.php";
        if (isset($_POST['btn'])) {
            $noidung = $_POST['noidung'];
            $sql = "SELECT * FROM product WHERE tensp LIKE '%$noidung%' OR theloai LIKE '%$noidung%' ";
            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <?php
                }

            } else {
                echo "No results found.";
            }
        }
        ?>
        <div class="resSearch">
        </div>
    </div>
</section>




<header>
    <div class="header-wellcome">

        <div class="text-header">
            <p>Wellcome to Men's Shop !</p>
        </div>

    </div>
    <div class="" id="navbarFixed">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <button id="btn-active-nav" class="navbar-toggler" type="button" data-toggle="collapse" data-target=""
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="trangchu.php"><img src="img/logoshop.png" alt=""></a>
            <div class="header-nav-card">
                <button class="btn-search" id="btnSearchNav" type="button"><span><i class="fa fa-search"
                            aria-hidden="true"></i></span></button>
                <a href="cart.php"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>

            </div>


            <div class="nav-search-box" id="navSearchBox">
                <div class="nav-icon-search"><span><i class="fa fa-search" aria-hidden="true"></i></span></div>
                <input type="text" class="w-100 form-control" placeholder="Bạn muốn tìm gì ?">
            </div>



            <div class="collapse navbar-collapse main-menu" id="navbarNav">
                <div class="navbar-nav navbar-menu">
                    <div class="nav-item "><a href="trangchu.php" class="">Trang chủ</a></div>
                    <div class="nav-item dropdown ">
                        <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sản Phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="shirt.php">Áo</a>
                            <a class="dropdown-item" href="pant.php">Quần</a>
                            <a class="dropdown-item" href="shoes.php">Giày</a>
                            <a class="dropdown-item" href="accessories.php">Phụ kiện</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chính sách
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="blog.php">Tin tức</a>

                            <a class="dropdown-item" href="dieukhoan.php">Điều khoản</a>
                            <a class="dropdown-item" href="chinhsachdoihang.php">Chính sách đổi hàng</a>

                        </div>
                    </div>
                    <!-- <div class="nav-item"><a href="blog.php">Tin Tức</a>

                        </div> -->

                    <div class="nav-item"><a href="contact.php">Liên Hệ</a></div>
                </div>
                <ul class="navbar-nav navbar-icon ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" type="button" id="btnSearch"><span><i class="fa fa-search"
                                    aria-hidden="true"></i></span></a>
                    </li>

                    <li class="nav-item" style="margin: 0 15px;">
                        <div class="account_icon">
                            <span style="margin-top: -4px;"><i class="fa fa-user"></i></span>

                            <div class="achover">
                                <div class="wp">
                                    <?php
                                    // Kiểm tra xem người dùng đã đăng nhập chưa
                                    if (isset($_SESSION['txtemail']) && isset($_SESSION['txtpassword'])) {
                                        // Nếu đã đăng nhập
                                        echo '<a class="btns" href="account.php">Tài khoản</a>';
                                        echo '<a class="btns" href="logout.php">Đăng xuất</a>';
                                    } else {
                                        // Nếu chưa đăng nhập
                                        echo '<a class="btns" href="login.php">Đăng nhập</a>';
                                        echo '<a class="btns" href="register.php">Đăng kí</a>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                var accountIcon = document.querySelector(".account_icon");
                                var accountHover = document.querySelector(".account_icon .achover");

                                // Sự kiện khi nhấp vào biểu tượng
                                accountIcon.addEventListener("click", function (event) {
                                    accountHover.style.display = "block";
                                    event.stopPropagation(); // Ngăn chặn sự kiện click từ lan ra bên ngoài
                                });

                                // Sự kiện khi nhấp vào bất kỳ điểm nào bên ngoài cửa sổ
                                document.addEventListener("click", function (event) {
                                    if (!accountIcon.contains(event.target)) {
                                        accountHover.style.display = "none";
                                    }
                                });
                            });
                        </script>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><span class=""><i class="fa fa-shopping-cart"
                                    aria-hidden="true"></i></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>