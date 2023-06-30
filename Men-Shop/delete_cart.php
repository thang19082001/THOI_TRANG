<?php
include('control.php');
$getdata = new Data();

$delete = $getdata->delete_cart_2($_GET['delete']); //GET là phương thức gửi dữ liệu thông qua đường dẫn URL
if ($delete) {
    header('location:cart.php');
} else {
    echo "error";
}
?>