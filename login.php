<?php
session_start();

// Kiểm tra xem người dùng đã gửi thông tin đăng nhập hay chưa
if (isset($_POST['username']) && isset($_POST['userPassword'])) {
  $username = $_POST['username'];
  $userPassword = $_POST['userPassword'];

  // Kết nối tới cơ sở dữ liệu và lấy thông tin tài khoản của người dùng
  $pdo = new PDO("mysql:host=localhost;dbname=lagi.shop", "root", "");
  $stmt = $pdo->prepare("SELECT * FROM user WHERE username=:username AND isActive = 0");
  $stmt->bindParam(":username", $username);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  echo $username;
  echo $user['userPassword'];
  // Kiểm tra mật khẩu nhập vào có khớp với mật khẩu đã được mã hóa trong cơ sở dữ liệu hay không
  if ($user && password_verify($userPassword, $user['userPassword'])) {
    // Mật khẩu đúng, tạo phiên đăng nhập và chuyển hướng người dùng đến trang chính
    $_SESSION['userId'] = $user['userId'];
    header("Location: index.php");
    exit;
  } else {
    // Mật khẩu sai, hiển thị thông báo lỗi
    header("Location: dangnhap.php");
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