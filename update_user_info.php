<?php
session_start();
$userId = $_SESSION['userId'];
if (isset($_SESSION['userId'])) {
    // Kết nối đến cơ sở dữ liệu
    include 'inc/handle.php';
    $db = new Database();
    $conn = $db->connect();

    // Kiểm tra xem đã gửi dữ liệu form hay chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị mới từ form
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $ngaySinh = $_POST["ngaySinh"];
        $diaChi = $_POST["diaChi"];

        // Lấy userId từ form hoặc session, tùy thuộc vào cách bạn lưu trữ và truy xuất người dùng hiện tại

        // Xây dựng truy vấn SQL để cập nhật thông tin người dùng
        $sql = "UPDATE user SET name='$name', email='$email', sdt='$phone', ngaySinh='$ngaySinh', diaChi='$diaChi' WHERE userId = '$userId'";

        // Thực thi truy vấn
        if ($conn->query($sql) === TRUE) {
            header("Location: profile.php");
            exit;   
        } else {
            echo "Lỗi cập nhật thông tin người dùng: " . $conn->error;
        }
    }
}
