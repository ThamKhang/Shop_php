<?php
session_start();

// Kiểm tra xem người dùng đã gửi thông tin đăng nhập hay chưa
if (isset($_POST['adminUser']) && isset($_POST['adminPass'])) {
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];
    echo $username;
    echo $adminPass;

    // Kết nối tới cơ sở dữ liệu và lấy thông tin tài khoản của người dùng
    $pdo = new PDO("mysql:host=localhost;dbname=lagi.shop", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE adminUser=:adminUser");
    $stmt->bindParam(":adminUser", $adminUser);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $user['adminPass'];
    // Kiểm tra mật khẩu nhập vào có khớp với mật khẩu đã được mã hóa trong cơ sở dữ liệu hay không
    if ($user && password_verify($adminPass, $user['adminPass'])) {
        // Mật khẩu đúng, tạo phiên đăng nhập và chuyển hướng người dùng đến trang chính
        $_SESSION['adminId'] = $user['adminId'];
        header("Location: dashboard.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<!-- Hiển thị form đăng nhập và thông báo lỗi nếu có -->
<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
</head>

<body>
    <h2>Đăng nhập</h2>
    <?php if (isset($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>