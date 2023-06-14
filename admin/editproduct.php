<?php include 'inc/sessionCheck.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doan.css">
    <link rel="stylesheet" href="../css/new_products.css">
    <title>Lagi Shop</title>
</head>

<body>
    <div class="container">

        <!--main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!--userimg-->
                <div class="user">
                    <img src="../img/user.png" alt="">
                </div>
            </div>

            <div class="content">
                <div class="cards-1">
                    <div class="content-2">
                        <form method="post" enctype="multipart/form-data">
                            <div class="recent-payments">
                                <?php
                                // Kết nối CSDL
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "lagi.shop";
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Kiểm tra nếu có giá trị productId truyền vào
                                if (isset($_POST['productId'])) {
                                    $productId = $_POST['productId'];

                                    // Lấy thông tin sản phẩm từ CSDL
                                    $sql = "SELECT * FROM `product` WHERE `productId` = '$productId'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $productName = $row['productName'];
                                        $catId = $row['catId'];
                                        $brandId = $row['brandId'];
                                        $product_desc = $row['product_desc'];
                                        $price = $row['price'];
                                        $price_discount = $row['price_discount'];
                                        $image = $row['image'];
                                        $amount = $row['amount'];
                                    } else {
                                        echo "Product not found.";
                                    }
                                }

                                // Lấy danh sách các Category từ CSDL
                                $sql_cat = "SELECT * FROM `category`";
                                $result_cat = $conn->query($sql_cat);
                                if ($result_cat->num_rows > 0) {
                                    $categories = array();
                                    while ($row_cat = $result_cat->fetch_assoc()) {
                                        $categories[$row_cat['catId']] = $row_cat['catName'];
                                    }
                                } else {
                                    echo "No categories found.";
                                }

                                // Lấy danh sách các Brand từ CSDL
                                $sql_brand = "SELECT * FROM `brand`";
                                $result_brand = $conn->query($sql_brand);
                                if ($result_brand->num_rows > 0) {
                                    $brands = array();
                                    while ($row_brand = $result_brand->fetch_assoc()) {
                                        $brands[$row_brand['brandId']] = $row_brand['brandName'];
                                    }
                                } else {
                                    echo "No brands found.";
                                }

                                // Kiểm tra nếu có giá trị form submit
                                if (isset($_POST['submit'])) {
                                    $productId = $_POST['productId'];
                                    $productName = $_POST['productName'];
                                    $catId = $_POST['catId'];
                                    $brandId = $_POST['brandId'];
                                    $product_desc = $_POST['product_desc'];
                                    $price = $_POST['price'];
                                    $price_discount = $_POST['price_discount'];
                                    $amount = $_POST['amount'];

                                    // Xử lý upload ảnh
                                    $target_dir = "uploads/";
                                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                        $image = $target_file;
                                    } else {
                                        $image = $_POST['image_old'];
                                    }

                                    // Kiểm tra xem Category ID và Brand ID có hợp lệ hay không
                                    if (!array_key_exists($catId, $categories)) {
                                        echo "Invalid Category ID.";
                                    } else if (!array_key_exists($brandId, $brands)) {
                                        echo "Invalid Brand ID.";
                                    } else {
                                        // Cập nhật thông tin sản phẩm vào CSDL
                                        $sql = "UPDATE `product` SET `productName` = '$productName', `catId` = '$catId', `brandId` = '$brandId', `product_desc` = '$product_desc', `price` = '$price', `price_discount` = '$price_discount', `image` = '$image', `amount` = '$amount' WHERE `productId` = '$productId'";
                                        if ($conn->query($sql) === TRUE) {
                                            echo "Product updated successfully.";
                                        } else {
                                            echo "Error updating product: " . $conn->error;
                                        }
                                    }
                                }

                                $conn->close();
                                ?>
                                <table>
                                    <tr>
                                        <td>Product ID:</td>
                                        <td><input type="text" name="productId" value="<?php echo $productId; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Product Name:</td>
                                        <td><input type="text" name="productName" value="<?php echo $productName; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>
                                            <select name="catId">
                                                <?php foreach ($categories as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php if ($key == $catId) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brand:</td>
                                        <td>
                                            <select name="brandId">
                                                <?php foreach ($brands as $key => $value) { ?>
                                                    <option value="<?php echo $key; ?>" <?php if ($key == $brandId) {
                                                                                            echo "selected";
                                                                                        } ?>>
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Description:</td>
                                        <td><textarea name="product_desc"><?php echo $product_desc; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Price Discount:</td>
                                        <td><input type="text" name="price_discount" value="<?php echo $price_discount; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Image:</td>
                                        <td>
                                            <input type="file" name="image">
                                            <input type="hidden" name="image_old" value="<?php echo $image; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Amount:</td>
                                        <td><input type="text" name="amount" value="<?php echo $amount; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="button" value="Close" onclick="window.location.href='products.php'">
                                            <input type="submit" name="submit" value="Update Product">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>

</html>