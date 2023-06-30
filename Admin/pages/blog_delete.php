<?php
session_start();
include('../../Men-Shop/control.php');
$getdata = new Data();
$delete_blog = $getdata->delete_blog($_GET['delete']);
if($delete_blog){
    header('location:blog.php');
} else {
    echo "error";
}

?>