<?php
include('control.php');
$getdata = new Data();

if (isset($_POST['txtsubmit'])) {
    $targetDir = "./img/upload_blog/"; // Thư mục lưu trữ ảnh

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


    $targetDir_s = "./img/upload_blog2/"; // Thư mục lưu trữ ảnh

    // Xử lý tải lên ảnh đại diện
    $targetFile_s = $targetDir_s . basename($_FILES["txtimage_s"]["name"]);
    $imageFileType_s = strtolower(pathinfo($targetFile_s, PATHINFO_EXTENSION));
    $allowedExtensions_s = array("jpg", "jpeg", "png", "gif");

    if (!in_array($imageFileType_s, $allowedExtensions_s)) {
        echo "Định dạng tệp ảnh không hợp lệ. Vui lòng tải lên tệp ảnh có định dạng JPG, JPEG, PNG, hoặc GIF.";
        exit;
    }

    if (!move_uploaded_file($_FILES["txtimage_s"]["tmp_name"], $targetFile_s)) {
        echo "Lỗi khi tải lên ảnh_s. Vui lòng thử lại.";
        exit;
    }

    $image = $targetFile;
    $image_s = $targetFile_s;
    // Lấy thông tin sản phẩm
    $title = $_POST['txttitle'];
    $n_content = $_POST['txtn_content'];
    $d_content = $_POST['txtd_content'];
    $created_time = date('Y-m-d');
    $last_update = date('Y-m-d');
    // Lưu thông tin sản phẩm vào cơ sở dữ liệu
    $inserted = $getdata->add_blog($image, $image_s, $title, $n_content, $d_content, $created_time, $last_update);

    if ($inserted) {
        // Thêm sản phẩm thành công, chuyển hướng đến trang khác
        header("Location: ../Admin/pages/blog.php");
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
        <h1>Thêm bài viết</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="txtimage" required onchange="previewImage(event)">
                <img id="preview" class="preview-image" src="" alt="">
            </div>
            <div class="form-group">
                <label for="image_s">Image_s:</label>
                <input type="file" id="image_s" name="txtimage_s" required onchange="previewImage(event)">
                <img id="preview_s" class="preview-image" src="" alt="">
            </div>
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" id="name" name="txttitle" required>
            </div>
            <div class="form-group">
                <label for="price">Nội dung xem trước:</label>
                <input type="text" id="price" name="txtn_content" required>
            </div>
            <div class="form-group">
                <label for="original_price">Nội dung:</label>
                <input type="text" id="original_price" name="txtd_content" required>
            </div>


            <div class="form-group">
                <input type="submit" name="txtsubmit" value="Thêm bài viết">
            </div>
        </form>
        <button class="exit-button" onclick="location.href='../Admin/pages/blog.php'">Quay lại</button>
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
            }
        }
    </script>
</body>

</html>