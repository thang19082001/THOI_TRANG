<?php
include('control.php');
$getdata = new Data();
$select = $getdata->select_user_id($_GET['update']);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin người dùng</title>
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
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-exit {
            background-color: #ff0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cập nhật thông tin người dùng</h2>
        <?php foreach ($select as $se) { ?>
            <form method="POST">
                <div class="form-group">
                    <label for="txtHoten">Họ và tên:</label>
                    <input type="text" id="txtHoten" name="txtHoten" value="<?php echo $se['hoten'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="txtSdt">Số điện thoại:</label>
                    <input type="text" id="txtSdt" name="txtSdt" value="<?php echo $se['sdt'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="txtEmail">Email:</label>
                    <input type="text" id="txtEmail" name="txtEmail" value="<?php echo $se['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="txtPassword">Mật khẩu:</label>
                    <input type="text" id="txtPassword" name="txtPassword" value="<?php echo $se['password'] ?>" required>
                </div>
                <label for="">Phân Quyền</label>
                <input name="txtVaitro" type="radio" value="1" />Quản trị viên
                <input name="txtVaitro" type="radio" value="0" />Người dùng




                <div class="form-group">
                    <input type="submit" name="btnUpdate" value="Cập nhật">
                    <a href="../Admin/pages/user.php" class="btn-exit">Thoát</a>
                </div>

            </form>
        <?php } ?>
        <?php
        if (isset($_POST['btnUpdate'])) {
            $update_user = $getdata->update_user(
                $_GET['update'],
                $_POST['txtHoten'],
                $_POST['txtSdt'],
                $_POST['txtEmail'],
                $_POST['txtPassword'],
                $_POST['txtVaitro']
            );
            header('location:../Admin/pages/user.php');
        }
        ?>
    </div>
</body>

</html>