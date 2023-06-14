<?php
session_start();
ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'lagi.shop');
$email = $_POST['email'];
$userPassword = $_POST['userPassword'];

$data = array();
$error = array();
if (isset($_POST['btnLogin'])) {
    if (empty($email)) {
        $error['email'] = "Không được để trống email";
    } else {
        // $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email không đúng định dạng";
        }
    }

    if (empty($userPassword)) {
        $error['userPassword'] = "Không được để trống mật khẩu";
    } else {
        $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{5,32}$/';
        if (!preg_match($pattern, $userPassword)) {
            $error['userPassword'] = "Mật khẩu chứa ít nhất 5 ký tự, không chứa khoảng trắng và không có dấu";
        }
    }

    $password = md5($userPassword);
    $sql = "SELECT * from `user` where email = '$email' and userPassword = '$password' and isActive = '0'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result); // Lấy dòng dữ liệu từ kết quả truy vấn
        $_SESSION['userId'] = $user['userId']; // Gán giá trị userId vào biến phiên $_SESSION
        $data['message'] = "Đăng nhập thành công!!!";
        $data['is_login'] = 1;
            
    } else {
        $data['message'] = "Tài khoản của bạn không tồn tại trên hệ thống!!!";
        $data['is_login'] = 0;
    }

    $data['error'] = $error;

    echo json_encode($data);
}
