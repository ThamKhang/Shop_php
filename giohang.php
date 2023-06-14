<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: dangnhap.php");
    exit;
}
$userId = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lagi Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
    <style>
        .contact_container {
            margin-top: 150px;
            padding-bottom: 0px;
            border-bottom: solid 1px #ebebeb;
        }

        .super_container {
            width: 100%;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        th {
            text-align: left;
            padding: 0.5rem;
            background-color: #eee;
        }

        td {
            text-align: left;
            padding: 0.5rem;
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        th {
            text-align: left;
            padding: 0.5rem;
            background-color: #eee;
        }

        td {
            text-align: left;
            padding: 0.5rem;
            border: 1px solid #ccc;
        }

        .cart-totals {
            margin-top: 2rem;
        }

        .cart-totals table {
            margin-top: 1rem;
        }

        .cart-totals td:first-child {
            text-align: right;
            font-weight: bold;
        }

        input[type="number"] {
            width: 60px;
            padding: 0.5rem;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: #0069d9;
        }

        input[name="delete_cart_item"] {
            padding: 0.5rem 1rem;
            background-color: brown;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php include 'inc/header.php' ?>

    <div class="super_container">
        <div class="container contact_container">
            <div class="row">
                <div class="col product_section clearfix">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <?php
        include 'inc/handle.php';
        $db = new Database();
        $conn = $db->connect();

        // Xử lý khi người dùng thực hiện thao tác xóa sản phẩm trong giỏ hàng
        if (isset($_POST['delete_cart_item'])) {
            $productId = $_POST['product_id'];
            $sql_delete = "DELETE FROM cart WHERE userId = $userId AND productId = $productId";
            if ($conn->query($sql_delete) === TRUE) {
            } else {
                echo "Error deleting product: " . $conn->error;
            }
        }

        // Xử lý khi người dùng thực hiện thao tác thay đổi số lượng sản phẩm trong giỏ hàng
        if (isset($_POST['update_cart_quantity'])) {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $sql_update = "UPDATE cart SET quantity = $quantity WHERE userId = $userId AND productId = $productId";
            if ($conn->query($sql_update) === TRUE) {
            } else {
                echo "Error updating quantity: " . $conn->error;
            }
        }

        // Lấy thông tin sản phẩm trong giỏ hàng của user
        $sql = "SELECT *
                FROM cart
                JOIN product ON cart.productId = product.productId
                WHERE userId = $userId";
        $result = $conn->query($sql);

        // Tính tổng tiền hàng
        $total = 0;
        $i = 0;
        ?>
        <?php if ($result->num_rows > 0) : ?>
            <div class="container single_product_container">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row["productId"]; ?></td>
                                <td><?php echo $row["productName"]; ?></td>
                                <td><?php echo $row["price_discount"]; ?></td>
                                <td>
                                    <form method='POST'>
                                        <input type='hidden' name='product_id' value='<?php echo $row["productId"]; ?>'>
                                        <input type='number' name='quantity' value='<?php echo $row["quantity"]; ?>'>
                                        <input type='submit' name='update_cart_quantity' value='Update'>
                                    </form>
                                </td>
                                <td><img src='<?php echo "admin/" . $row["image"]; ?>' alt='Product Image' width='100'></td>
                                <?php $total += $row['price_discount'] * $row['quantity'];
                                $i++; ?>
                                <td>
                                    <form method='POST'>
                                        <input type='hidden' name='product_id' value='<?php echo $row["productId"]; ?>'>
                                        <input type='submit' name='delete_cart_item' value='Delete'>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>There are no products in your cart.</p>
            <?php endif; ?>

            <?php
            // Tính tiền thuế và thành tiền
            $tax = $total * 0.1;
            $grandTotal = $total + $tax;
            ?>

            <div class="cart-totals">
                <table>
                    <tbody>
                        <tr>
                            <td>Total:</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                        <tr>
                            <td>Tax:</td>
                            <td><?php echo $tax; ?></td>
                        </tr>
                        <tr>
                            <td>Grand Total:</td>
                            <td><?php echo $grandTotal; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form method='POST' action='payment.php'>
                <input type='submit' name='checkout' value='Chuyển tới thanh toán'>
            </form>
            </div>

            <!-- Newsletter -->

            <div class="newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                                <h4>Newsletter</h4>
                                <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form action="post">
                                <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                    <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                                    <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include 'inc/footer.php'; ?>
    </div>
</body>

</html>