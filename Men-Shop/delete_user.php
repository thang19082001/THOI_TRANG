<?php
include('control.php');
$getdata = new Data();
$delete = $getdata->delete_user($_GET['delete']); //GET là phương thức gửi dữ liệu thông qua đường dẫn URL
if ($delete) {
    header('location:../Admin/pages/user.php');
} else {
    echo "error";
}
?>