
<?php
session_start(); // bắt đầu phiên đăng nhập

if (isset($_SESSION['userId'])) { // kiểm tra xem người dùng đã đăng nhập chưa
$userId = $_SESSION['userId']; // lấy ID người dùng từ phiên đăng nhập

// Lấy thông tin sản phẩm từ tham số truyền vào
$productId = $_GET['productId'];
$quantity = $_GET['quantity'];

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'lagi.shop');

// Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
$query = "SELECT * FROM cart WHERE userId = '$userId' AND productId = '$productId'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) { // nếu sản phẩm đã có trong giỏ hàng thì cập nhật số lượng
$row = mysqli_fetch_assoc($result);
$cartID = $row['cartID'];
$newQuantity = $row['quantity'] + $quantity;

$query = "UPDATE cart SET quantity = '$newQuantity' WHERE cartID = '$cartID'";
mysqli_query($conn, $query);
} else { // nếu sản phẩm chưa có trong giỏ hàng thì thêm mới
$query = "INSERT INTO cart (productId, userId, quantity) VALUES ('$productId', '$userId', '$quantity')";
mysqli_query($conn, $query);
}

// Đóng kết nối với cơ sở dữ liệu
mysqli_close($conn);

// Chuyển hướng người dùng tới trang giỏ hàng để xem sản phẩm đã được thêm vào
header("Location: giohang.php");
exit();
} else {
    header("Location: dangnhap.php");
}
