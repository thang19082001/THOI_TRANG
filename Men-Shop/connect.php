<?php
$sever = 'localhost';
$user = 'root';
$pass = '';
$database = 'thoitrangvip4';
$conn = mysqli_connect($sever, $user, $pass, $database);
mysqli_query($conn, 'set names "UTF8"');
?>