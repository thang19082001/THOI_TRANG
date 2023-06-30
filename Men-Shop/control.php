<?php
include('connect.php');
class Data
{
    public function user()
    { // lấy dữ liệu từ bảng user ra
        global $conn;
        $sql = "select * from account";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // Đăng nhập
    public function LOGIN($name, $pass)
    { // lấy dữ liệu từ bảng user với điều kiện name và pass
        global $conn;
        $sql = "select * from account where email='$name' and password='$pass'";
        $run = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($run);
        return $num;
    }
    public function select_role($name, $pass)
    {
        global $conn;
        $sql = "select * from account where email = '$name' and password='$pass'";
        $run = mysqli_fetch_array(mysqli_query($conn, $sql));
        return $run;
    }
    //----- user--------
    public function add_user($hoten, $sdt, $email, $password)
    {
        global $conn;
        $sql = "insert into account(hoten ,sdt ,email ,password   ) values 
        ('$hoten', '$sdt', '$email', '$password')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_user($id, $hoten, $sdt, $email, $password, $role)
    {
        global $conn;
        $sql = "update account set hoten='$hoten', sdt='$sdt', email='$email', password='$password',role='$role' where id='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_user($id)
    {
        global $conn;
        $sql = "delete from account where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_user_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from account where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // ----- product ---------------------------------------------------------------------------------------------------------------------
    public function product()
    {
        global $conn;
        $sql = "select * from product";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function product_gia_giam_dan()
    {
        global $conn;
        $sql = "select * from product ORDER BY gia DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function product_gia_tang_dan()
    {
        global $conn;
        $sql = "select * from product ORDER BY gia ASC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function product_A_Z()
    {
        global $conn;
        $sql = "select * from product ORDER BY gia ASC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function product_Z_A()
    {
        global $conn;
        $sql = "select * from product ORDER BY gia DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function product_dan_duoc_nhieu()
    {
        global $conn;
        $sql = "SELECT * FROM product
        WHERE da_ban_duoc > 0
        ORDER BY da_ban_duoc DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    function product_ban_duoc($conn)
    {
        $query = "SELECT * FROM product WHERE da_ban_duoc > 0";
        $result = mysqli_query($conn, $query);

        $select_product_ban_duoc = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $select_product_ban_duoc[] = $row;
        }

        return $select_product_ban_duoc;
    }


    public function product_Xu_huong()
    {
        global $conn;
        $sql = "SELECT * FROM product
                ORDER BY da_ban_duoc DESC
                LIMIT 8";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function add_product(
        $anh,
        $tensp,
        $gia,
        $theloai,
        $status,
        $mota,
        $created_time,
        $last_update,
        $soluong,
        $giagoc

    ) {
        global $conn;
        $sql = "insert into product (anh, tensp, gia, theloai, status, mota, created_time, last_update, soluong,giagoc) values 
            ('$anh', '$tensp', '$gia','$theloai','$status','$mota',' $created_time', ' $last_update',' $soluong',' $giagoc')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function add_images(
        $product_id,
        $path
    ) {
        global $conn;
        $sql = "insert into images (product_id, path) values 
            ('$product_id','$path')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // Assuming you have a database connection established
    function get_last_inserted_product_id()
    {
        // Assuming you have a database connection variable named $conn
        global $conn;

        // Assuming your product table has an auto-increment primary key named "product_id"
        $query = "SELECT LAST_INSERT_ID() AS product_id";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query executed successfully
        if ($result) {
            // Fetch the result row
            $row = mysqli_fetch_assoc($result);

            // Retrieve the product ID
            $productID = $row['product_id'];

            // Free the result set
            mysqli_free_result($result);

            // Return the product ID
            return $productID;
        } else {
            // Handle the query error
            // You can log an error message or throw an exception
            return null;
        }
    }
    public function updateProductLastUpdate($productID)
    {
        global $conn; // Sử dụng biến kết nối toàn cục

        $sql = "UPDATE product SET last_update = NOW() WHERE id = '$productID'";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update_product(
        $id,
        $anh,
        $tensp,
        $gia,
        $theloai,
        $mota,
        $soluong,
        $giagoc

    ) {
        global $conn;
        $sql = "update product SET anh='$anh', tensp='$tensp', gia='$gia', theloai='$theloai', mota= '$mota', soluong= '$soluong', giagoc= '$giagoc' WHERE id='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // updata số lượng hàng được bán ra 
    public function select_product_SoLuong()
    {
        global $conn;
        $sql = "select * from product  ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_product_so_luong_da_ban($id, $SoLuong, $da_ban_duoc)
    {

        global $conn;
        $sql = "update product SET  soluong= '$SoLuong', da_ban_duoc= '$da_ban_duoc' WHERE id='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }



    public function delete_images($productID)
    {
        global $conn;

        // Xóa thông tin trong bảng images liên quan đến sản phẩm
        $sql = "DELETE FROM images WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productID);
        $stmt->execute();
        $stmt->close();

        // Trả về true nếu xóa thành công, ngược lại trả về false
        return true;
    }

    public function delete_product_and_images($productID)
    {
        global $conn;

        // Bắt đầu transaction
        $conn->begin_transaction();

        try {
            // Xóa thông tin trong bảng images liên quan đến sản phẩm
            $sql_images = "DELETE FROM images WHERE product_id = ?";
            $stmt_images = $conn->prepare($sql_images);
            $stmt_images->bind_param("i", $productID);
            $stmt_images->execute();
            $stmt_images->close();

            // Xóa sản phẩm trong bảng product
            $sql_product = "DELETE FROM product WHERE id = ?";
            $stmt_product = $conn->prepare($sql_product);
            $stmt_product->bind_param("i", $productID);
            $stmt_product->execute();
            $stmt_product->close();

            // Hoàn thành transaction
            $conn->commit();

            return true;
        } catch (Exception $e) {
            // Lỗi xảy ra, rollback transaction
            $conn->rollback();
            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    public function select_product_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from product where id = '$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }


    public function select_images_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from images where product_id ='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // Trong class Data


    public function select_product_by_category($category)
    {
        global $conn;
        // Chạy truy vấn
        $sql = "SELECT * FROM product WHERE theloai = '$category'";
        $result = mysqli_query($conn, $sql);
        // Lưu kết quả vào một mảng
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        // Trả về kết quả
        return $products;
    }
    public function select_product()
    {
        // Kết nối cơ sở dữ liệu
        global $conn;
        // Chuẩn bị câu truy vấn
        $sql = "SELECT * FROM product";

        // Thực thi truy vấn
        $result = mysqli_query($conn, $sql);

        // Kiểm tra và lấy dữ liệu
        $products = array();
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }
        // Trả về kết quả
        return $products;
    }

    // -----------------------------------------------------Cart--------------------------------------------------------------------


    public function update_cart($Arr_id)
    {

        function update($id, $SL, $pri)
        {
            global $conn;
            $sql = "update cart set qty='$SL', price='$pri' where id='$id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }

        for ($i = 0; $i < sizeof($Arr_id); $i++) {
            update($Arr_id[$i], $_COOKIE['SL_' . $Arr_id[$i]], $_COOKIE['Price_' . $Arr_id[$i]] * $_COOKIE['SL_' . $Arr_id[$i]]);
        }
        return 1;
    }

    public function select_cart_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from cart where id = '$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }


    public function add_cart($product_id, $account_id, $mausac, $kichco, $quantity, $price)
    {

        global $conn;

        // Kiểm tra xem account_id có tồn tại trong bảng account không
        $checkAccountQuery = "SELECT id FROM account WHERE id = '$account_id'";

        $result = mysqli_query($conn, $checkAccountQuery);

        if (mysqli_num_rows($result) > 0) {
            // Giá trị account_id hợp lệ, tiến hành thêm vào bảng cart
            $sql = "INSERT INTO cart (product_id, account_id , mausac, kichco, qty, price ) VALUES ('$product_id','$account_id','$mausac','$kichco', '$quantity','$price')";
            $run = mysqli_query($conn, $sql);

            if ($run) {
                // Thêm thành công
                return true;
            } else {
                // Lỗi khi thêm vào bảng cart

                return false;
            }
        } else {
            // Giá trị account_id không tồn tại trong bảng account
            return false;
        }
    }

    public function cart($id)
    {
        global $conn;
        $sql = "select * from cart where account_id = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function cart_idProduct_idAccount($id_account, $id_product)
    {
        global $conn;
        $sql = "select * from cart where account_id = '$id_account' and product_id = '$id_product'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // Trong class Data
    public function select_cart_products()
    {
        global $conn;

        // Lấy danh sách các product_id trong bảng cart
        $sql = "SELECT product_id FROM cart";
        $result = mysqli_query($conn, $sql);

        $productData = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];

            // Lấy thông tin sản phẩm từ bảng product dựa trên product_id
            $product_sql = "SELECT * FROM product WHERE id = '$product_id'";
            $product_result = mysqli_query($conn, $product_sql);
            $product_row = mysqli_fetch_assoc($product_result);

            // Lưu thông tin sản phẩm vào mảng
            $productData[] = $product_row;
        }

        return $productData;
    }
    public function cartByProductId($productId)
    {
        global $conn;
        // Thực hiện truy vấn SQL để lấy các hàng có product_id tương ứng từ bảng cart
        $query = "SELECT * FROM cart WHERE product_id = $productId";
        $result = mysqli_query($conn, $query);

        return $result;
    }
    public function delete_cart($cartId)
    {
        global $conn;
        $sql = "delete from cart where account_id = $cartId ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_cart_2($cartId)
    {
        global $conn;
        $sql = "delete from cart where id = $cartId ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // -----------------------------------------------------Order--------------------------------------------------------------------
    public function add_order(
        $account_id,
        $name,
        $phone,
        $address,
        $note,
        $total,
        $list_sanPham,
        $list_soLuong

    ) {
        global $conn;
        $sql = "insert into bill (account_id ,name, phone, address, note, total, list_san_pham, list_so_luong, trang_thai) values ('$account_id','$name', '$phone', '$address',
                                                                                        '$note','$total','$list_sanPham','$list_soLuong',0)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_bill()
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from bill  ORDER BY created_time DESC ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_bill_date($data, $year)
    { //Lấy dữ liệu trong database
        $data2 = $data + 1;
        global $conn;
        $sql = "SELECT * FROM `bill` WHERE created_time  between '$year-$data-01 00:00:00
        ' and '$year-$data2-01 00:00:00 - 24:00:00
        '  ORDER BY created_time DESC ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_bill_date_day($day, $month)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "SELECT * FROM `bill` WHERE created_time  between '2023-$month-$day 00:00:00
        ' and '2023-$month-$day 23:59:59'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_bill_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from bill where account_id = '$id'  ORDER BY created_time DESC ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }


    public function update_cart_bill_id($bill_id)
    {
        global $conn;
        $sql = "UPDATE cart SET bill_id = '$bill_id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_unique_name()
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "SELECT *
        FROM bill
        GROUP BY name ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_By_name($name)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "SELECT *
        FROM bill
        WHERE name = '$name' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }









    //----------------------------------------------contact--------------------------------------
    public function contact()
    { // lấy dữ liệu từ bảng user ra
        global $conn;
        $sql = "select * from contact";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function add_contact($name, $email, $note)
    { // chèn dữ liệu vào bản contact
        global $conn;
        $sql = "insert into contact(name, email, note) values ('$name', '$email', '$note')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_contact($id, $name, $email, $subject, $message)
    {
        global $conn;
        $sql = "update contact set name='$name', email='$email', subject='$subject', message='$message'  where id=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_contact($id)
    {
        global $conn;
        $sql = "delete from contact where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_contact_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from contact where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }








    //-----------------------------------------------BLOG------------------------------------------------
    public function select_recent_blogs($limit)
    {
        global $conn;
        $sql = "SELECT * FROM blog ORDER BY created_time DESC LIMIT $limit";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public function blog()
    {
        global $conn;
        $sql = "select * from blog";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function add_blog(
        $image,
        $image_s,
        $title,
        $n_content,
        $d_content,
        $created_time,
        $last_update
    ) {
        global $conn;

        // Chuẩn bị câu lệnh INSERT với tham số truy vấn
        $sql = "INSERT INTO blog (image, image_s, title, n_content, d_content, created_time, last_update) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Gắn các tham số truy vấn vào câu lệnh chuẩn bị
        $stmt->bind_param("sssssss", $image, $image_s, $title, $n_content, $d_content, $created_time, $last_update);

        // Thực thi câu lệnh chuẩn bị
        $stmt->execute();

        // Trả về kết quả
        return $stmt->affected_rows > 0;
    }
    public function select_blog_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from blog where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_blog($id)
    {
        global $conn;
        $sql = "delete from blog where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // ---------------------------------- Comment ----------------------------------------------------
    public function comment()
    {
        global $conn;
        $sql = "select * from comment";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_comment_id($id)
    { //Lấy dữ liệu trong database
        global $conn;
        $sql = "select * from comment where blog_id ='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function add_comment(
        $blog_id,
        $ten_cmt,
        $emai_cmt,
        $content_cmt,
        $created_time,
        $last_update

    ) {
        global $conn;
        $sql = "insert into comment (blog_id,ten_cmt, emai_cmt, content_cmt,created_time,last_update) values 
            ('$blog_id','$ten_cmt', '$emai_cmt', '$content_cmt','$created_time','$last_update')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_comments($blog_id)
    {
        global $conn; // Đảm bảo biến $conn đã được khởi tạo và kết nối đến cơ sở dữ liệu

        $blog_id = $conn->real_escape_string($blog_id); // Escape giá trị để tránh SQL injection

        $sql = "SELECT * FROM comment WHERE blog_id = '$blog_id'";
        $result = $conn->query($sql);

        $comments = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
        }
        return $comments;
    }
    // ----------------------------------------- update trạng thái ----------------------------

    public function update_trang_thai_1($id)
    {
        global $conn;
        $sql = "update bill set trang_thai= '1'  where id=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_trang_thai_2($id)
    {
        global $conn;
        $sql = "update bill set trang_thai= '2'  where id=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_trang_thai_0($id)
    {
        global $conn;
        $sql = "update bill set trang_thai= '0'  where id=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }


    // --------------------------------------------ma giam gia --------------------------------------
    public function select_MAGG()
    {
        global $conn;
        $sql = "select * from mgg  ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_mgg($ma, $tien, $start_date, $end_date)
    {
        global $conn;
        $sql = "insert into mgg(ma_GG, tien_GG, start_date, end_date) values ('$ma', '$tien', '$start_date', '$end_date')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_mgg($id)
    {
        global $conn;
        $sql = "delete from mgg where id = $id ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function delete_expired_mgg($date)
    {
        global $conn;
        $sql = "DELETE FROM mgg WHERE end_date < '$date'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}