<?php
    include('control.php');
    session_start();
    $getdata = new Data();
    $select_cart = $getdata->cart($_SESSION['user_id']);
    // xoa cookie của cart
    foreach ($_SESSION["ID_SP"] as $cartItem) {
        setcookie( 'SL_'.$cartItem, "", time()- 60, "/","", 0);
        setcookie( 'Price_'.$cartItem, "", time()- 60, "/","", 0);
    }
    header("Location:trangchu.php");

?>

