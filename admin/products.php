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
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                        <span class="title">Lagi Shop</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="xulydonhang.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Oders</span>
                    </a>
                </li>
                <li>
                    <a href="xulydanhmuc.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="xulybrand.php">
                        <span class="icon"><ion-icon name="bag-outline"></ion-icon></span>
                        <span class="title">Brands</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Products</span>
                    </a>
                </li>
                <li>
                    <a href="xulykhachhang.php">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li>
                    <a href="account.php">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="?dangxuat=1">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

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

                    <style>
                        .btn {
                            margin: 10px;
                            display: inline-block;
                            font-weight: 400;
                            color: #fff;
                            text-align: center;
                            vertical-align: middle;
                            user-select: none;
                            background-color: #dc3545;
                            border-color: #dc3545;
                            padding: .375rem .75rem;
                            font-size: 1rem;
                            line-height: 1.5;
                            border-radius: .25rem;
                            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                        }

                        .btn:hover {
                            background-color: #c82333;
                            border-color: #bd2130;
                            color: #fff;
                        }

                        .btn span {
                            display: inline-block;
                            margin-left: 5px;
                            margin-right: 5px;
                        }
                    </style>
                    <div class="mb-10">
                        <a href="create.php" class="btn btn-danger mr-2">
                            <span>Add New</span>
                        </a>
                    </div>
                    <div class="content-2">
                        <div class="recent-payments">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Price discount</th>
                                        <th>Amount</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Connect to the database
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "lagi.shop";

                                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                                    // Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    // Xử lý khi người dùng thực hiện thao tác xóa sản phẩm trong giỏ hàng
                                    if (isset($_POST['delete_cart_item'])) {
                                        $productId = $_POST['product_id'];

                                        // Kiểm tra xem sản phẩm có tồn tại trong bảng cart không
                                        $sql_check_cart = "SELECT COUNT(*) as total FROM cart WHERE productId = $productId";
                                        $result_check_cart = mysqli_query($conn, $sql_check_cart);
                                        $row_check_cart = mysqli_fetch_assoc($result_check_cart);

                                        if ($row_check_cart['total'] > 0) {
                                            // Nếu sản phẩm tồn tại trong bảng cart thì chỉ được ẩn sản phẩm
                                            $sql_hide = "UPDATE product SET hidden = 1 WHERE productId = $productId";
                                            if ($conn->query($sql_hide) === TRUE) {
                                                echo "<script>alert('Sản phẩm đang được bán chỉ có thể ẩn');</script>";
                                            } else {
                                                echo "Error hiding product: " . $conn->error;
                                            }
                                        } else {
                                            // Nếu sản phẩm không tồn tại trong bảng cart thì xóa sản phẩm
                                            // Hiển thị thông báo để người dùng xác nhận xóa sản phẩm
                                            echo "<script>";
                                            echo "var r = confirm('Are you sure you want to delete this product?');";
                                            echo "if (r == true) {";
                                            $sql_delete = "DELETE FROM product WHERE productId = $productId";
                                            if ($conn->query($sql_delete) === TRUE) {
                                                echo "alert('Product deleted successfully.');";
                                            } else {
                                                echo "alert('Error deleting product: " . $conn->error . "');";
                                            }
                                            echo "} else {";
                                            echo "alert('Product not deleted.');";
                                            echo "}";
                                            echo "</script>";
                                        }
                                    }


                                    if (isset($_POST['hidden_cart_item'])) {
                                        $productId = $_POST['product_id'];
                                        $sql_hidden = "UPDATE product SET hidden = 1 WHERE productId = $productId";
                                        if ($conn->query($sql_hidden) === TRUE) {
                                        } else {
                                            echo "Error hidden product: " . $conn->error;
                                        }
                                    }


                                    if (isset($_POST['visible_cart_item'])) {
                                        $productId = $_POST['product_id'];
                                        $sql_hidden = "UPDATE product SET hidden = 0 WHERE productId = $productId";
                                        if ($conn->query($sql_hidden) === TRUE) {
                                        } else {
                                            echo "Error visible product: " . $conn->error;
                                        }
                                    }
                                    // Fetch data from the product table
                                    $sql = "SELECT * FROM `product` ORDER BY `product`.`created_at` DESC";
                                    $result = mysqli_query($conn, $sql);

                                    // Loop through the data and display it in the table
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["productId"] . "</td>";
                                            echo "<td><img class='profile-1' src='" . $row["image"] . "' alt=''></td>";
                                            echo "<td>" . $row["productName"] . "</td>";
                                            echo "<td>" . $row["catId"] . "</td>";
                                            echo "<td>" . $row["brandId"] . "</td>";
                                            echo "<td>" . $row["price"] . "</td>";
                                            echo "<td>" . $row["price_discount"] . "</td>";
                                            echo "<td>" . $row["amount"] . "</td>";
                                            echo "<td>" . date('Y-m-d', strtotime($row["created_at"])) . "</td>";
                                            echo "<td>";
                                            echo "<form method='POST' action='editproduct.php'>";
                                            echo "<input type='hidden' name='productId' value='" . $row["productId"] . "'>";
                                            echo "<input type='submit' name='edit_cart_item' value='Edit'>";
                                            echo "</form></br>";
                                            if ($row["hidden"] == 0) {
                                                echo "<form method='POST'>";
                                                echo "<input type='hidden' name='product_id' value='" . $row["productId"] . "'>";
                                                echo "<input type='submit' name='hidden_cart_item' value='Hidden'>";
                                                echo "</form></br>";
                                            } else {
                                                echo "<form method='POST'>";
                                                echo "<input type='hidden' name='product_id' value='" . $row["productId"] . "'>";
                                                echo "<input type='submit' name='visible_cart_item' value='Visible'>";
                                                echo "</form></br>";
                                            }
                                            echo "<form method='POST'>";
                                            echo "<input type='hidden' name='product_id' value='" . $row["productId"] . "'>";
                                            echo "<input type='submit' name='delete_cart_item' value='Delete'>";
                                            echo "</form>";
                                            echo "</td>";

                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='10'>No products found</td></tr>";
                                    }

                                    mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

            <script>
                //Menu
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');

                toggle.onclick = function() {
                    navigation.classList.toggle('active');
                    main.classList.toggle('active');
                }



                //add hovered class in selected list item
                let list = document.querySelectorAll('.navigation li');

                function activeLink() {
                    list.forEach((item) =>
                        item.classList.remove('hovered'));
                    this.classList.add('hovered');
                }
                list.forEach((item) =>
                    item.addEventListener('mouseover', activeLink));
            </script>


</body>

</html>