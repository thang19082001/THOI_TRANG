<?php
include('control.php');
$getdata = new Data();
$delete = $getdata->delete_product_and_images($_GET['delete']); //GET là phương thức gửi dữ liệu thông qua đường dẫn URL

if ($delete) {
    header('location:../Admin/pages/product.php');
} else {
    echo "error";
}
?>