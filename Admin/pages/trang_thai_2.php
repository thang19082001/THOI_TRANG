<?php
include('../../Men-shop/control.php'); //chèn trang control vào news
session_start();
$getdata = new Data(); // Gọi class data
$updata = $getdata-> update_trang_thai_2($_GET['idBill']);
if ($updata) {
    header('location:bill.php');
} else {
    echo "error";
}
?>