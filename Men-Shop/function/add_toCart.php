<?php
    include('../control.php');
    $getdata = new Data(); 
        echo "check: ",$_GET['idSP'];
        
        // ấn vào nút thêm vào giỏ hàng để thêm vào cart    
            $product_id = $_GET['idSP'];
            $account_id = $_GET['idUser'];
            $gia = $_GET['giaSP'];
            
            $inserted = $getdata->add_cart($product_id, $account_id,"Trắng","M",1, $gia);
            if($inserted){
                header("Location: ../shirt.php");
                exit();
            }

        
    ?>