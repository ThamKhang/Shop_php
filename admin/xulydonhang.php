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
    <link rel="stylesheet" href="../bootstrap-4.0.0/assets/css/docs.min.css">
    <link rel="stylesheet" href="../bootstrap-4.0.0/assets/css/docs.min.css.map">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
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
                    <div class="content-2">
                        <div class="recent-payments">
                            <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                th,
                                td {
                                    text-align: left;
                                    padding: 12px;
                                }

                                th {
                                    background-color: #f1f1f1;
                                    font-weight: bold;
                                }

                                tr:nth-child(even) {
                                    background-color: #f9f9f9;
                                }

                                td a {
                                    color: #007bff;
                                    text-decoration: none;
                                }

                                td a:hover {
                                    text-decoration: underline;
                                }

                                .order-detail td {
                                    border-top: 0;
                                }

                                .order-detail img {
                                    max-height: 100px;
                                    max-width: 100px;
                                    display: block;
                                    margin: 0 auto;
                                }

                                .order-detail th {
                                    font-weight: normal;
                                }

                                .order-detail td:first-child {
                                    padding-left: 40px;
                                }

                                .order-detail td:last-child {
                                    padding-right: 40px;
                                }

                                .update-btn,
                                .details-btn {
                                    display: inline-block;
                                    padding: 6px 12px;
                                    font-size: 14px;
                                    font-weight: 400;
                                    line-height: 1.42857143;
                                    text-align: center;
                                    white-space: nowrap;
                                    vertical-align: middle;
                                    cursor: pointer;
                                    background-image: none;
                                    border: 1px solid transparent;
                                    border-radius: 4px;
                                    color: #fff;
                                }

                                .update-btn {
                                    background-color: #007bff;
                                    border-color: #007bff;
                                }

                                .details-btn {
                                    background-color: #28a745;
                                    border-color: #28a745;
                                }
                            </style>

                            <div class="container">
                                <h4>Liệt Kê Đơn Hàng</h4>
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
                                if (isset($_POST['submit'])) {
                                    // Lưu trạng thái đơn hàng mới vào CSDL
                                    $orderId = $_POST['orderId'];
                                    $status = $_POST['status'];
                                    $sql = "UPDATE `order` SET `status`='$status'";

                                    if ($status == '3') { // Nếu trạng thái là "Hoàn thành"
                                        $receiveTime = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
                                        $sql .= ", `recieve_time`='$receiveTime'"; // Cập nhật giá trị `recieve_time`
                                    }

                                    $sql .= " WHERE `orderId`='$orderId'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "Order status updated successfully.";
                                    } else {
                                        echo "Error updating order status: " . $conn->error;
                                    }
                                }
                                if (isset($_GET['filterDiachi'])) {
                                    $city = $_GET['city'];
                                    $district = $_GET['district'];
                                    $sql = "SELECT * FROM `order` WHERE 1";
                                    if (!empty($city)) {
                                        $sql .= " AND `recipientAddress` LIKE '%$city%'";
                                        if (!empty($district)) {
                                            $sql .= " AND `recipientAddress` LIKE '%$district%'";
                                        }
                                    }
                                } else {
                                    // Nếu không có yêu cầu lọc, ta sẽ truy vấn toàn bộ dữ liệu
                                    $sql = "SELECT * FROM `order`";
                                }

                                if (isset($_GET['filter'])) {
                                    $start_date = $_GET['start_date'];
                                    $end_date = $_GET['end_date'];
                                    // Kiểm tra xem ngày bắt đầu và ngày kết thúc có hợp lệ không
                                    if (!empty($start_date) && !empty($end_date)) {
                                        // Thực hiện truy vấn với điều kiện lọc
                                        if (strpos($sql, 'WHERE') === false) {
                                            $sql .= " WHERE `order_time` BETWEEN '$start_date' AND '$end_date'";
                                        } else {
                                            $sql .= " AND `order_time` BETWEEN '$start_date' AND '$end_date'";
                                        }
                                    }
                                }

                                $result = $conn->query($sql);
                                ?>
                                <style>
                                    /* Cho form chứa tỉnh thành và quận huyện nằm bên trái */
                                    .col-md-6:first-child {
                                        padding-right: 20px;
                                    }

                                    /* Cho form chứa start date và end date nằm bên phải */
                                    .col-md-6:last-child {
                                        padding-left: 20px;
                                    }

                                    /* Căn chỉnh label và input trong form */
                                    .form-group label {
                                        display: block;
                                        font-weight: bold;
                                    }

                                    .form-group input,
                                    .form-group select {
                                        margin-bottom: 10px;
                                    }

                                    /* Thiết lập màu nền và font chữ cho button */
                                    .btn-primary {
                                        background-color: #007bff;
                                        border-color: #007bff;
                                        color: #fff;
                                    }

                                    .btn-primary:hover {
                                        background-color: #0069d9;
                                        border-color: #0062cc;
                                        color: #fff;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="GET">
                                            <div class="form-group">
                                                <label for="city">Tỉnh thành:</label>
                                                <select class="form-control" id="city" name="city">
                                                    <option value="" selected><?php echo !empty($_GET['city']) ? $_GET['city'] : 'Chọn tỉnh thành'; ?></option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="district">Quận huyện:</label>
                                                <select class="form-control" id="district" name="district">
                                                    <option value="" selected><?php echo !empty($_GET['district']) ? $_GET['district'] : 'Chọn quận huyện'; ?></option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="filterDiachi">Lọc</button>
                                        </form>
                                    </div>

                                    <div class="col-md-6">
                                        <form method="GET">
                                            <div class="form-group">
                                                <label for="start_date">Start Order:</label>
                                                <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="end_date">End Order:</label>
                                                <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="filter">Filter</button>
                                        </form>
                                    </div>
                                </div>



                                <?php
                                if ($result->num_rows > 0) {
                                    // Hiển thị danh sách đơn hàng và chi tiết sản phẩm
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<table>";
                                        echo "<tr><th>Order ID</th><th>Total</th><th>Order Time</th><th>Status</th><th></th><th>Recipient Name</th><th>Recipient Phone</th><th>Recipient Address</th><th>Receive Time</th><th>Action</th></tr>";
                                        echo "<tr>";
                                        echo "<td>" . $row["orderId"] . "</td>";
                                        echo "<td>" . $row["thanhtien"] . "</td>";
                                        echo "<td>" . $row["order_time"] . "</td>";
                                        echo "<td>";
                                        echo "<form method='POST'>";
                                        echo "<select name='status'>";
                                        echo "<option value='0'" . ($row['status'] == '0' ? 'selected' : '') . ">Đơn hàng bị hủy</option>";
                                        echo "<option value='1'" . ($row['status'] == '1' ? 'selected' : '') . ">Đang xử lý</option>";
                                        echo "<option value='2'" . ($row['status'] == '2' ? 'selected' : '') . ">Đang giao hàng</option>";
                                        echo "<option value='3'" . ($row['status'] == '3' ? 'selected' : '') . ">Hoàn thành</option>";
                                        echo "</select>";
                                        echo "<td><button class='update-btn' type='submit' name='submit'>Update</button><input type='hidden' name='orderId' value='" . $row["orderId"] . "'></td>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "<td>" . $row["recipientName"] . "</td>";
                                        echo "<td>" . $row["recipientPhone"] . "</td>";
                                        echo "<td>" . $row["recipientAddress"] . "</td>";
                                        echo "<td>" . ($row['status'] == '3' ? $row['recieve_time'] : '') . "</td>";
                                        echo "<td><a href=\"javascript:void(0)\" onclick=\"toggleDetails(" . $row["orderId"] . ")\" class='details-btn'>View Details</a></td>";
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
                                                echo "<td><img src=\"" . $row2["image"] . "\" alt=\"" . $row2["productName"] . "\" height=\"100\"></td>";
                                                echo "<td>" . $row2["quantity"] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan=\"5\">There are no order details for this order.</td></tr>";
                                        }
                                        echo "</table>";
                                        echo "</td></tr>";
                                        echo "</table>";
                                    }
                                } else {
                                    echo "There are no orders for this user.";
                                }

                                $conn->close();
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
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                                <script>
                                    var citis = document.getElementById("city");
                                    var districts = document.getElementById("district");
                                    var Parameter = {
                                        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
                                        method: "GET",
                                        responseType: "application/json",
                                    };
                                    var promise = axios(Parameter);
                                    promise.then(function(result) {
                                        renderCity(result.data);
                                    });

                                    function renderCity(data) {
                                        for (const x of data) {
                                            citis.options[citis.options.length] = new Option(x.Name, x.Name);
                                        }
                                        citis.onchange = function() {
                                            districts.length = 1;
                                            if (this.value != "") {
                                                const result = data.filter(n => n.Name === this.value);

                                                for (const k of result[0].Districts) {
                                                    districts.options[districts.options.length] = new Option(k.Name, k.Name);
                                                }
                                            }
                                        };
                                    }
                                </script>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- <div class="content">
                    <h1 class="main_title">Văn học Việt Nam</h1>
                    <h2 class="title-1">Top Sách hay của Nguyễn Nhật Ánh</h2>
                    <div class="cards-1">
                        <div class="content-2">
                            <div class="recent-payments">
                                <div class="cardHeader">
                                    <h2>Sản phẩm mới</h2>
                                    <a href="#" class="btn">View All</a>
                                </div>
                                <table>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên tác phẩm</th>
                                        <th>Thể loại</th>
                                        <th>Giá</th>
                                        <th>Đánh giá</th>
                                    </tr>

                                    <tr>
                                        <td>1</td>
                                        <td><img class="profile-1" src="../img/toi-la-beto.jpg" alt=""></td>
                                        <td>Tôi là Beto</td>
                                        <td>Văn học thiếu nhi</td>
                                        <td>68.000đ</td>
                                        <td><a href="#" class="btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td><img class="profile-1" src="../img/ngoi-khoc-tren-cay.jpg" alt=""></td>
                                        <td>Ngồi khóc trên cây</td>
                                        <td>Tiểu thuyết lãng mạn</td>
                                        <td>104.000đ</td>
                                        <td><a href="#" class="btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td><img class="profile-1" src="../img/cho-toi-di-mot-ve-di-tuoi-tho.jpg" alt=""></td>
                                        <td>Cho tôi đi một vé tuổi thơ</td>
                                        <td>Văn học thiếu nhi</td>
                                        <td>80.000đ</td>
                                        <td><a href="#" class="btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td><img class="profile-1" src="../img/dao-mong-mo.jpg" alt=""></td>
                                        <td>Đảo mộng mơ</td>
                                        <td>Văn học thiếu nhi</td>
                                        <td>75.000đ</td>
                                        <td><a href="#" class="btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td><img class="profile-1" src="../img/ha-do.jpg" alt=""></td>
                                        <td>Hạ đỏ</td>
                                        <td>Tình cảm</td>
                                        <td>95.000đ</td>
                                        <td><a href="#" class="btn">View</a></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div> -->




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