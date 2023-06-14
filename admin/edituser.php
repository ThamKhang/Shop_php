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
                                // Kiểm tra nếu có giá trị userId truyền vào
                                if (isset($_POST['userId'])) {
                                    $userId = $_POST['userId'];
                                    // Lấy thông tin user từ CSDL
                                    $sql = "SELECT * FROM `user` WHERE `userId` = '$userId'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $name = $row['name'];
                                        $username = $row['username'];
                                        $userPassword = $row['userPassword'];
                                        $email = $row['email'];
                                        $gioiTinh = $row['gioiTinh'];
                                        $sdt = $row['sdt'];
                                        $ngaySinh = $row['ngaySinh'];
                                        $diaChi = $row['diaChi'];
                                    } else {
                                        echo "User not found.";
                                    }
                                }
                                // Kiểm tra nếu có giá trị form submit
                                if (isset($_POST['submit'])) {
                                    $userId = $_POST['userId'];
                                    $name = $_POST['name'];
                                    $username = $_POST['username'];
                                    $userPassword = $_POST['userPassword'];
                                    $email = $_POST['email'];
                                    $gioiTinh = $_POST['gioiTinh'];
                                    $sdt = $_POST['sdt'];
                                    $ngaySinh = $_POST['ngaySinh'];
                                    $diaChi = $_POST['diaChi'];
                                    // Cập nhật thông tin user vào CSDL
                                    $sql = "UPDATE `user` SET `name` = '$name', `username` = '$username', `userPassword` = '$userPassword', `email` = '$email', `gioiTinh` = '$gioiTinh', `sdt` = '$sdt', `ngaySinh` = '$ngaySinh', `diaChi` = '$diaChi' WHERE `userId` = '$userId'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "User updated successfully.";
                                    } else {
                                        echo "Error updating user: " . $conn->error;
                                    }
                                }
                                $conn->close();
                                ?>
                                <style>
                                    table {
                                        width: 100%;
                                        border-collapse: collapse;
                                    }

                                    td {
                                        padding: 10px;
                                        border: 1px solid #ccc;
                                    }

                                    input[type="text"],
                                    textarea {
                                        width: 100%;
                                        padding: 8px;
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                        box-sizing: border-box;
                                    }

                                    select {
                                        width: 100%;
                                        padding: 8px;
                                        border: 1px solid #ccc;
                                        border-radius: 4px;
                                        box-sizing: border-box;
                                        background-color: #fff;
                                        cursor: pointer;
                                    }

                                    input[type="submit"],
                                    input[type="button"] {
                                        background-color: #4CAF50;
                                        border: none;
                                        color: #fff;
                                        padding: 10px 20px;
                                        text-align: center;
                                        text-decoration: none;
                                        display: inline-block;
                                        font-size: 16px;
                                        border-radius: 4px;
                                        cursor: pointer;
                                    }
                                </style>
                                <table>
                                    <tr>
                                        <td>User ID:</td>
                                        <td><input type="text" name="userId" value="<?php echo $userId; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Username:</td>
                                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input type="password" name="userPassword" value="<?php echo $userPassword; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>
                                            <select name="gioiTinh">
                                                <option value="Nam" <?php if ($gioiTinh == 'Nam') {
                                                                        echo "selected";
                                                                    } ?>>Nam</option>
                                                <option value="Nữ" <?php if ($gioiTinh == 'Nữ') {
                                                                        echo "selected";
                                                                    } ?>>Nữ</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input type="text" name="sdt" value="<?php echo $sdt; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth:</td>
                                        <td><input type="text" name="ngaySinh" value="<?php echo $ngaySinh; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td><textarea name="diaChi"><?php echo $diaChi; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="button" value="Close" onclick="window.location.href='xulykhachhang.php'">
                                            <input type="submit" name="submit" value="Update User">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
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