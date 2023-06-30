<?php
include('../../Men-shop/control.php'); //chèn trang control vào news
session_start();
$getdata = new Data(); // Gọi class data
$delete = $getdata-> delete_mgg($_GET['id']);
if ($delete) {
    header('location:ma_giam_gia.php');
} else {
    echo "error";
}
?>