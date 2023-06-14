<?php include 'inc/sessionCheck.php' ?>
<?php
// Kết nối đến database
$pdo = new PDO('mysql:host=localhost;dbname=lagi.shop', 'root', '');

$adminId = '';
$adminName = $_POST['name'];
$adminEmail = $_POST['email'];
$adminUser = $_POST['username'];
$adminPass = $_POST['userPassword'];
$level = $_POST['level'];
if ($_SESSION['adminId'] == 1) {
// Mã hóa mật khẩu
$hashedPassword = password_hash($adminPass, PASSWORD_DEFAULT);
$sql = "INSERT INTO admin(adminId, adminName, adminEmail, adminUser, adminPass, level) VALUES (:adminId, :adminName, :adminEmail, :adminUser, :adminPass, :level)";
$stmt = $pdo->prepare($sql);

// Gán giá trị vào các biến trong câu truy vấn
$stmt->bindParam(':adminId', $adminId);
$stmt->bindParam(':adminName', $adminName);
$stmt->bindParam(':adminEmail', $adminEmail);
$stmt->bindParam(':adminUser', $adminUser);
$stmt->bindParam(':adminPass', $hashedPassword);
$stmt->bindParam(':level', $level);

// Thực thi câu truy vấn
$result = $stmt->execute();

if ($result) {
    header("Location: account.php");
    exit;
} else {
    header("Location: account.php");
    exit;
}
} else {
    echo "Bạn không có quyền thực hiện các hành động này";
    exit;
}