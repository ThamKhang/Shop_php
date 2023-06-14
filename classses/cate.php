<?php
$db = new Database();
$conn = $db->connect();
//filter
$sql = "SELECT * FROM product LEFT JOIN category ON product.catId=category.catId WHERE 1 AND hidden = 0 ";
if (isset($_GET['search'])) {
    $_SESSION['searchKeyword'] = $_GET['search'];
}

// Lấy giá trị tìm kiếm từ session
if (isset($_SESSION['searchKeyword'])) {
    $searchKeyword = $_SESSION['searchKeyword'];
    $sql .= "AND productName LIKE '%$searchKeyword%' ";
}

if (isset($_GET['catName'])) {
    $catName = $_GET['catName'];
    if ($catName == ''){
        $sql .= "";
    }
    else $sql .= "AND catName = '$catName' ";
}
if (isset($_GET['minPrice']) && isset($_GET['maxPrice'])) {
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];
    // Thực hiện truy vấn lấy dữ liệu từ bảng sản phẩm với điều kiện khoảng giá
    $sql .= "AND price_discount BETWEEN $minPrice AND $maxPrice ";
}

// Xây dựng chuỗi query string từ các tham số
$params = array(
    'search' => isset($_SESSION['searchKeyword']) ? $_SESSION['searchKeyword'] : '',
    'catName' => isset($_GET['catName']) ? $_GET['catName'] : '',
    'minPrice' => isset($_GET['minPrice']) ? $_GET['minPrice'] : '0',
    'maxPrice' => isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '10000000',
    'page' => isset($_GET['page']) ? $_GET['page'] : '1' // Thêm tham số page vào URL
);

// Thêm các tham số vào URL
$url = 'http://localhost/shop_php/categories.php?' . http_build_query($params);
?>