<?php
// Kết nối đến database
$pdo = new PDO('mysql:host=localhost;dbname=lagi.shop', 'root', '');

// Lấy dữ liệu từ form
$name = $_POST['name'];
$username = $_POST['username'];
$userPassword = $_POST['userPassword'];
$email = $_POST['email'];
$gioiTinh = $_POST['gioiTinh'];
$sdt = $_POST['sdt'];
$ngaySinh = $_POST['ngaySinh'];
$diaChi = $_POST['diaChi'];

// Mã hóa mật khẩu
$hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
// Chuẩn bị câu truy vấn SQL
$sql = "INSERT INTO user (name, username, userPassword, email, gioiTinh, sdt, ngaySinh, diaChi)
        VALUES (:name, :username, :userPassword, :email, :gioiTinh, :sdt, :ngaySinh, :diaChi)";
$stmt = $pdo->prepare($sql);

// Gán giá trị vào các biến trong câu truy vấn
$stmt->bindParam(':name', $name);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':userPassword', $hashedPassword);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':gioiTinh', $gioiTinh);
$stmt->bindParam(':sdt', $sdt);
$stmt->bindParam(':ngaySinh', $ngaySinh);
$stmt->bindParam(':diaChi', $diaChi);

// Thực thi câu truy vấn
$result = $stmt->execute();

if ($result) {
    header("Location: dangnhap.php");
    exit;
} else {
    header("Location: dangky.php");
    exit;
}