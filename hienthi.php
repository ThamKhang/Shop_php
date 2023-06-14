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

        input[type="text"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
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
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Order</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="container single_product_container">
            <?php
            if (isset($_SESSION['userId'])) {
                // Lấy danh sách đơn hàng từ CSDL                 
                $userId = $_SESSION['userId'];
                $sql = "SELECT * FROM `order` ORDER BY `order`.`order_time` DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Hiển thị bảng và header của nó
                    echo "<table>";
                    echo "<tr><th>Order ID</th><th>Total</th><th>Order Time</th><th>Status</th><th>Recipient Name</th><th>Recipient Phone</th><th>Recipient Address</th><th>Action</th></tr>";

                    // Hiển thị danh sách đơn hàng và chi tiết sản phẩm                     
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["orderId"] . "</td>";
                        echo "<td>" . $row["thanhtien"] . "</td>";
                        echo "<td>" . $row["order_time"] . "</td>";
                        echo "<td>";
                        if ($row['status'] == '0') {
                            echo "Đơn hàng bị hủy";
                        } elseif ($row['status'] == '1') {
                            echo "Đang xử lý";
                        } elseif ($row['status'] == '2') {
                            echo "Đang giao hàng";
                        } elseif ($row['status'] == '3') {
                            echo "Hoàn thành";
                        }
                        echo "</td>";
                        echo "<td>" . $row["recipientName"] . "</td>";
                        echo "<td>" . $row["recipientPhone"] . "</td>";
                        echo "<td>" . $row["recipientAddress"] . "</td>";
                        echo "<td><a href=\"javascript:void(0)\" onclick=\"toggleDetails(" . $row["orderId"] . ")\">View Details</a></td>";
                        echo "</tr>";

                        // Hiển thị bảng chi tiết sản phẩm với class là orderId
                        echo "<tr class=\"order-detail " . $row["orderId"] . "\" style=\"display:none\"><td colspan=\"8\">";
                        echo "<table>";
                        echo "<tr><th>Product Name</th><th>Price</th><th>Image</th><th>Quantity</th></tr>";

                        // Lấy thông tin chi tiết sản phẩm từ CSDL
                        $orderId = $row["orderId"];
                        $sql2 = "SELECT * FROM `order_detail` WHERE `orderId` = '$orderId'";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            // Hiển thị danh sách chi tiết sản phẩm
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row2["productName"] . "</td>";
                                echo "<td>" . $row2["price"] . "</td>";
                                echo "<td><img src=\"" . "admin/" . $row2["image"] . "\" alt=\"" . $row2["productName"] . "\" height=\"100\"></td>";
                                echo "<td>" . $row2["quantity"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan=\"5\">There are no order details for this order.</td></tr>";
                        }
                        echo "</table>";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "There are no orders for this user.";
                }
            } else {
                echo "Please login to view your orders.";
            }
            ?>

            <script>
                function toggleDetails(orderId) {
                    var details = document.getElementsByClassName("order-detail " + orderId)[0];
                    if (details.style.display === "none") {
                        details.style.display = "table-row";
                    } else {
                        details.style.display = "none";
                    }
                }
            </script>

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