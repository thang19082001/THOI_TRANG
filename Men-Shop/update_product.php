<!DOCTYPE html>
<html>

<head>
    <title>Cập nhật sản phẩm</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    .form-container {
        margin-top: 20px;
        text-align: left;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group textarea {
        height: 100px;
    }

    .form-group input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .preview-image {
        max-width: 200px;
        max-height: 200px;
        margin-top: 10px;
    }

    img {
        width: 50%;
    }

    .btn-exit {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ccc;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn-exit:hover {
        background-color: #999;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cập nhật sản phẩm</h2>
        <div class="form-container">
            <?php
            include('control.php');
            $getdata = new Data();

            $select_id = $getdata->select_product_id($_GET['update']);
            $output = "";
            $se = $select_id->fetch_assoc();

            // Kiểm tra nếu có yêu cầu cập nhật sản phẩm
            if (isset($_POST['txtsubmit'])) {
                $targetDir = "./img/upload/"; // Thư mục lưu trữ ảnh
            


                // Xử lý tải lên ảnh đại diện nếu có
                if ($_FILES["txtimage"]["name"]) {
                    $targetFile = $targetDir . basename($_FILES["txtimage"]["name"]);
                    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

                    if (!in_array($imageFileType, $allowedExtensions)) {
                        echo "Định dạng tệp ảnh không hợp lệ. Vui lòng tải lên tệp ảnh có định dạng JPG, JPEG, PNG, hoặc GIF.";
                        exit;
                    }

                    if (!move_uploaded_file($_FILES["txtimage"]["tmp_name"], $targetFile)) {
                        echo "Lỗi khi tải lên ảnh. Vui lòng thử lại.";
                        exit;
                    }

                    $anh = $targetFile;
                } else {
                    // Nếu không tải lên ảnh mới, giữ nguyên đường dẫn ảnh cũ
                    $anh = $_POST['txtoldimage'];
                }

                // Lấy thông tin sản phẩm
                $tensp = $_POST['txtnameproduct'];
                $gia = $_POST['txtprice'];
                $theloai = $_POST['txtcategory'];
                $mota = $_POST['txtdescription'];
                $soluong = $_POST['txtquantity'];
                $giagoc = $_POST['txtoriginalprice'];
                // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
                $updated = $getdata->update_product(
                    $se['id'],
                    $anh,
                    $tensp,
                    $gia,
                    $theloai,
                    $mota,
                    $soluong,
                    $giagoc
                );
                $getdata->updateProductLastUpdate($se['id']); // Gọi phương thức updateProductLastUpdate để cập nhật cột "last_update"
                // Hiển thị ảnh cũ
                $oldImages = $getdata->select_images_id($se['id']);
                if ($oldImages->num_rows > 0) {
                    echo '<div class="form-group">';
                    echo '<label for="txtoldimages">Ảnh cũ:</label><br>';
                    while ($image = $oldImages->fetch_assoc()) {
                        echo '<img src="' . $image['path'] . '" class="preview-image" alt="Old Image">';
                    }
                    echo '</div>';
                }

                // Xóa các ảnh cũ của sản phẩm trong cơ sở dữ liệu
                $getdata->delete_images($se['id']);

                // Xử lý tải lên nhiều ảnh mới nếu có
                $uploadedFiles = $_FILES['txtimages'];
                $numFiles = count($uploadedFiles['name']);

                // Kiểm tra nếu có ảnh mới được tải lên
                if ($numFiles > 0) {
                    // Lưu đường dẫn của các ảnh mới vào cơ sở dữ liệu
                    for ($i = 0; $i < $numFiles; $i++) {
                        $targetFile = $targetDir . basename($uploadedFiles['name'][$i]);
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                        if (!in_array($imageFileType, $allowedExtensions)) {
                            echo "Định dạng tệp ảnh không hợp lệ. Vui lòng tải lên tệp ảnh có định dạng JPG, JPEG, PNG, hoặc GIF.";
                            exit;
                        }

                        if (!move_uploaded_file($uploadedFiles['tmp_name'][$i], $targetFile)) {
                            echo "Lỗi khi tải lên ảnh. Vui lòng thử lại.";
                            exit;
                        }

                        // Lưu đường dẫn ảnh mới vào cơ sở dữ liệu
                        $inserted = $getdata->add_images($se['id'], $targetFile);

                        if (!$inserted) {
                            echo "Lỗi khi lưu đường dẫn ảnh vào cơ sở dữ liệu.";
                            exit;
                        }
                    }
                }

                // Hiển thị tất cả ảnh trong thư viện ảnh
                $allImages = $getdata->select_images_id($se['id']);
                if ($allImages->num_rows > 0) {
                    echo '<div class="form-group">';
                    echo '<label for="txtallimages">Tất cả ảnh:</label><br>';
                    while ($image = $allImages->fetch_assoc()) {
                        echo '<img src="' . $image['path'] . '" class="preview-image" alt="Image">';
                    }
                    echo '</div>';
                }

                // Cập nhật sản phẩm thành công, chuyển hướng đến trang khác
                header("Location: ../Admin/pages/product.php");
                exit();



            }
            ?>
            <?php
            foreach ($select_id as $se) {
                ?>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="txtproductid" value="<?php echo $se['id']; ?>">
                <input type="hidden" name="txtoldimage" value="<?php echo isset($se['anh']) ? $se['anh'] : ''; ?>">
                <div class="form-group">
                    <label for="txtimage">Ảnh:</label><br>
                    <img id="preview" src="" alt="Preview Image" class="preview-image">
                    <input type="file" name="txtimage" id="txtimage" onchange="previewImage(event)">
                </div>

                <div class="form-group">
                    <label for="txtimages">Thư viện ảnh:</label><br>
                    <input type="file" name="txtimages[]" id="txtimages" multiple onchange="previewImages(event)">
                </div>
                <div id="preview-images"></div> <!-- Khu vực hiển thị ảnh mới -->

                <div class="form-group">
                    <label for="txtnameproduct">Tên sản phẩm:</label><br>
                    <input type="text" name="txtnameproduct" value="<?php echo $se['tensp'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="txtprice">Giá:</label><br>
                    <input type="text" name="txtprice" value="<?php echo $se['gia'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtquantity">Số lượng:</label><br>
                    <input type="number" name="txtquantity" value="<?php echo $se['soluong'] ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label for="txtoriginalprice">Giá gốc:</label><br>
                    <input type="text" name="txtoriginalprice" value="<?php echo $se['giagoc'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Thể loại:</label>
                    <select id="category" name="txtcategory" required>
                        <option value="Áo" <?php if ($se['theloai'] == 'Áo')
                                echo 'selected'; ?>>Áo</option>
                        <option value="Quần" <?php if ($se['theloai'] == 'Quần')
                                echo 'selected'; ?>>Quần</option>
                        <option value="Giày" <?php if ($se['theloai'] == 'Giày')
                                echo 'selected'; ?>>Giày</option>
                        <option value="Phụ kiện" <?php if ($se['theloai'] == 'Phụ kiện')
                                echo 'selected'; ?>>Phụ kiện
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả sản phẩm:</label>
                    <textarea id="description" name="txtdescription" required><?php echo $se['mota'] ?></textarea>
                </div>
                <input type="hidden" name="txtproductid" value="<?php echo $se['id']; ?>">

                <div class="form-group">
                    <input type="submit" name="txtsubmit" value="Cập nhật">
                    <a href="../Admin/pages/product.php" class="btn-exit">Thoát</a>
                </div>
            </form>
            <?php
            }
            ?>

            <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('preview');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }

            function previewImages(event) {
                var output = document.getElementById('preview-images');
                output.innerHTML = ''; // Xóa các ảnh trước đó để hiển thị ảnh mới

                for (var i = 0; i < event.target.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        var image = document.createElement('img');
                        image.src = reader.result;
                        image.className = 'preview-image';
                        output.appendChild(image);
                    }
                    reader.readAsDataURL(event.target.files[i]);
                }
            }
            </script>
        </div>
    </div>
</body>

</html>