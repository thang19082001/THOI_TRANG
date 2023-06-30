<?php
include('control.php');
$getdata = new Data();

if (isset($_POST['txtsubmit'])) {
    $targetDir = "./img/upload/"; // Thư mục lưu trữ ảnh

    // Xử lý tải lên ảnh đại diện
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

    // Lấy thông tin sản phẩm
    $tensp = $_POST['txtnameproduct'];
    $gia = $_POST['txtprice'];
    $theloai = $_POST['txtcategory'];
    $soluong = $_POST['txtquantity']; // Thêm số lượng
    $giagoc = $_POST['txtoriginalprice']; // Thêm giá gốc
    $status = $_POST['txtdanhmuc'];
    $mota = $_POST['txtdescription'];
    // Sử dụng biến $mota ở đây để thực hiện các xử lý phân tích tiếp theo
    $created_time = date('Y-m-d H:i:s');
    $last_update = date('Y-m-d H:i:s');
    // Lưu thông tin sản phẩm vào cơ sở dữ liệu
    $inserted = $getdata->add_product($anh, $tensp, $gia, $theloai, $status, $mota, $created_time, $last_update, $soluong, $giagoc);

    if ($inserted) {
        // Lấy ID của sản phẩm đã được thêm vào cơ sở dữ liệu
        $productID = $getdata->get_last_inserted_product_id();

        // Xử lý tải lên nhiều ảnh
        $uploadedFiles = $_FILES['txtimages'];
        $numFiles = count($uploadedFiles['name']);

        // Lưu đường dẫn của các ảnh vào cơ sở dữ liệu
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

            // Lưu đường dẫn ảnh vào cơ sở dữ liệu
            $inserted = $getdata->add_images($productID, $targetFile);

            if (!$inserted) {
                echo "Lỗi khi lưu đường dẫn ảnh vào cơ sở dữ liệu.";
                exit;
            }
        }

        // Thêm sản phẩm thành công, chuyển hướng đến trang khác
        header("Location: ../Admin/pages/product.php");
        exit();
    } else {
        // Thêm sản phẩm thất bại, hiển thị thông báo
        echo "Thêm sản phẩm thất bại. Vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thêm sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
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
            max-width: 100%;
            max-height: 300px;
            margin-top: 10px;
        }

        button.exit-button {
            background-color: #ccc;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.exit-button:hover {
            background-color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thêm sản phẩm</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Ảnh:</label>
                <input type="file" id="image" name="txtimage" required onchange="previewImage(event)">
                <img id="preview" class="preview-image" src="" alt="">
            </div>
            <div class="form-group">
                <label for="images">Thư viện ảnh:</label>
                <input type="file" id="images" name="txtimages[]" required multiple onchange="previewImages(event)">
                <div id="preview-container" class="preview-container"></div>
            </div>

            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="txtnameproduct" required>
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" id="price" name="txtprice" required>
            </div>
            <div class="form-group">
                <label for="original_price">Giá gốc:</label>
                <input type="text" id="original_price" name="txtoriginalprice" required>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="text" id="quantity" name="txtquantity" required>
            </div>
            <div class="form-group">
                <label for="category">Thể loại:</label>
                <select id="category" name="txtcategory" required>
                    <option value="Áo">Áo</option>
                    <option value="Quần">Quần</option>
                    <option value="Giày">Giày</option>
                    <option value="Phụ kiện">Phụ kiện</option>
                </select>
            </div>
            <div class="form-group">
                <label for="danhmuc">Danh mục:</label>
                <input type="text" id="danhmuc" name="txtdanhmuc" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả sản phẩm:</label>
                <textarea id="description" name="txtdescription" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="txtsubmit" value="Thêm sản phẩm">
            </div>
        </form>
        <button class="exit-button" onclick="location.href='../Admin/pages/product.php'">Quay lại</button>
    </div>

    <script>
        function previewImage(event) {
            var preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
        }

        function previewImages(event) {
            var previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = "";

            for (var i = 0; i < event.target.files.length; i++) {
                var image = document.createElement('img');
                image.classList.add('preview-image');
                image.src = URL.createObjectURL(event.target.files[i]);
                previewContainer.appendChild(image);
                var theloaiSelect = document.getElementById('category');
                var danhmucSelect = document.getElementById('danhmuc');

                function updateDanhMucOptions() {
                    var selectedCategory = theloaiSelect.value;
                    var danhmucOptions = <?php echo json_encode($danhmuc_theloai); ?>[selectedCategory];

                    // Xóa tất cả các tùy chọn hiện có
                    while (danhmucSelect.firstChild) {
                        danhmucSelect.removeChild(danhmucSelect.firstChild);
                    }

                    // Tạo các tùy chọn mới dựa trên danh sách danh mục của thể loại sản phẩm tương ứng
                    danhmucOptions.forEach(function (danhmuc) {
                        var option = document.createElement('option');
                        option.value = danhmuc;
                        option.text = danhmuc;
                        danhmucSelect.appendChild(option);
                    });
                }
            }
        }
    </script>
</body>

</html>