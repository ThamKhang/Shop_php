<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: dangnhap.php");
    exit;
}
$userId = $_SESSION['userId'];
?>
<?php
include 'inc/handle.php';
$db = new Database();
$conn = $db->connect();
// Lấy thông tin đơn hàng từ form
$orderId = '';
$thanhtien = $_POST['thanhtien'];
$userId = $_POST['userId'];
$order_time = $_POST['order_time'];
$recieve_time = ''; // Chưa có thời gian giao hàng
$status = $_POST['status'];
$recipientName = $_POST['recipientName'];
$recipientPhone = $_POST['recipientPhone'];
$recipientAddress = $_POST['recipientAddress'];

// Lấy thông tin sản phẩm từ form
$products = $_POST['products'];

// Lưu thông tin đơn hàng vào bảng orders
$sql = "INSERT INTO `order`(`orderId`, `thanhtien`, `userId`, `order_time`, `recieve_time`, `status`, `recipientName`, `recipientPhone`, `recipientAddress`) VALUES ('','$thanhtien','$userId','$order_time','$recieve_time','$status','$recipientName','$recipientPhone','$recipientAddress')";
$conn->query($sql);
// Lấy giá trị orderId được tự động tạo
$orderId = mysqli_insert_id($conn);


// Lưu thông tin sản phẩm vào bảng order_detail
foreach ($products as $product) {
    $productId = $product['productId'];
    $productName = $product['productName'];
    $price = $product['price_discount'];
    $image = $product['image'];
    $quantity = $product['quantity'];

    $sql2 = "INSERT INTO order_detail (orderId, productId, price, image, quantity, productName) VALUES ('$orderId', '$productId', '$price', '$image', '$quantity', '$productName')";
    $conn->query($sql2);
}

// Xóa các sản phẩm trong giỏ hàng của user đó
$sql3 = "DELETE FROM cart WHERE userId = '$userId'";
$conn->query($sql3);

header("Location: hienthi.php");
exit;