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
                        <a href="createUser.php" class="btn btn-danger mr-2">
                            <span>Add New</span>
                        </a>
                    </div>
                    <div class="content-2">
                        <div class="recent-payments">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <style>
                                        form {
                                            display: inline-block;
                                        }

                                        input[type="submit"] {
                                            background-color: #4CAF50;
                                            border: none;
                                            color: #fff;
                                            padding: 5px 10px;
                                            margin: 0.3em;
                                            text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 14px;
                                            border-radius: 4px;
                                            cursor: pointer;
                                        }

                                        input[type="submit"]:hover {
                                            background-color: #3e8e41;
                                        }

                                        input[type="submit"][name="delete_cart_item"] {
                                            background-color: #f44336;
                                        }

                                        input[type="submit"][name="hidden_item"] {
                                            background-color: #424242;
                                        }

                                        input[type="submit"][name="visible_item"] {
                                            background-color: #848484;
                                        }

                                        input[type="submit"][name="delete_cart_item"]:hover {
                                            background-color: #d32f2f;
                                        }
                                    </style>
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

                                    if (isset($_POST['hidden_item'])) {
                                        $userId = $_POST['user_id'];
                                        $sql_isActive = "UPDATE user SET isActive = 1 WHERE userId = $userId";
                                        if ($conn->query($sql_isActive) === TRUE) {
                                        } else {
                                            echo "Error hidden user: " . $conn->error;
                                        }
                                    }


                                    if (isset($_POST['visible_item'])) {
                                        $userId = $_POST['user_id'];
                                        $sql_isActive = "UPDATE user SET isActive = 0 WHERE userId = $userId";
                                        if ($conn->query($sql_isActive) === TRUE) {
                                        } else {
                                            echo "Error visible user: " . $conn->error;
                                        }
                                    }
                                    // Fetch data from the user table
                                    $sql = "SELECT * FROM user";
                                    $result = mysqli_query($conn, $sql);

                                    // Loop through the data and display it in the table
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["userId"] . "</td>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["sdt"] . "</td>";
                                            echo "<td>" . substr($row["diaChi"], 0, 40) . "</td>";
                                            echo "<td>";
                                            echo "<form method='POST' action='edituser.php'>";
                                            echo "<input type='hidden' name='userId' value='" . $row["userId"] . "'>";
                                            echo "<input type='submit' name='edit_cart_item' value='Edit'>";
                                            echo "</form></br>";
                                            if ($row["isActive"] == 0) {
                                                echo "<form method='POST'>";
                                                echo "<input type='hidden' name='user_id' value='" . $row["userId"] . "'>";
                                                echo "<input type='submit' name='hidden_item' value='Hidden'>";
                                                echo "</form></br>";
                                            } else {
                                                echo "<form method='POST'>";
                                                echo "<input type='hidden' name='user_id' value='" . $row["userId"] . "'>";
                                                echo "<input type='submit' name='visible_item' value='Visible'>";
                                                echo "</form></br>";
                                            }
                                            echo "</td>";

                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='10'>No users found</td></tr>";
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