<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F2F2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 1px #ccc;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        button[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type=submit]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address">

            <button type="submit">Send</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email_or_phone = $_POST["email_or_phone"];

            // Kiểm tra thông tin đầu vào hợp lệ
            if (empty($email_or_phone)) {
                $error_message = "Vui lòng nhập email hoặc số điện thoại.";
            } else {
                // Kiểm tra thông tin trong cơ sở dữ liệu
                $user = getUserByEmailOrPhone($email_or_phone);
                if (!$user) {
                    $error_message = "Không tìm thấy người dùng với thông tin này.";
                } else {
                    // Tạo mật khẩu mới
                    $new_password = generateRandomPassword();

                    // Lưu mật khẩu mới vào cơ sở dữ liệu
                    saveNewPasswordForUser($user["id"], $new_password);

                    // Gửi email hoặc tin nhắn SMS chứa mật khẩu mới
                    sendPasswordResetNotification($user["email"], $user["phone"], $new_password);

                    // Hiển thị thông báo thành công
                    $success_message = "Mật khẩu mới đã được gửi đến email hoặc số điện thoại của bạn.";
                }
            }
        }
        ?>


    </div>
</body>

</html>