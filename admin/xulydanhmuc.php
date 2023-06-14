<?php include 'inc/sessionCheck.php' ?>
<?php
// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lagi.shop";
$con = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['themdanhmuc'])) {
    $tendanhmuc = $_POST['danhmuc'];
    $sql_insert = mysqli_query($con, "INSERT INTO category (catName) values ('$tendanhmuc') ");
} elseif (isset($_POST['capnhatdanhmuc'])) {
    $id_post = $_POST['id_danhmuc'];
    $tendanhmuc = $_POST['danhmuc'];
    $sql_update = mysqli_query($con, "UPDATE category SET catName='$tendanhmuc' WHERE catId = '$id_post' ");
    header('Location:xulydanhmuc.php');
}
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM category WHERE catId='$id' ");
}

?>

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
                                /* Định dạng danh sách dọc */
                                ul {
                                    list-style: none;
                                    margin: 0;
                                    padding: 0;
                                }

                                /* Định dạng tiêu đề */
                                h4 {
                                    margin-top: 0;
                                }

                                /* Định dạng bảng */
                                .table {
                                    width: 100%;
                                    border-collapse: collapse;
                                }

                                /* Định dạng các ô tiêu đề */
                                .table th {
                                    background-color: #f2f2f2;
                                    font-weight: bold;
                                    text-align: center;
                                    padding: 8px;
                                }

                                /* Định dạng các ô nội dung */
                                .table td {
                                    text-align: center;
                                    padding: 8px;
                                    border: 1px solid #ddd;
                                }

                                /* Định dạng nút Xóa */
                                .btn-delete {
                                    background-color: #dc3545;
                                    color: #fff;
                                    border: none;
                                    padding: 6px 12px;
                                    border-radius: 4px;
                                    text-decoration: none;
                                }

                                /* Định dạng nút Cập nhật */
                                .btn-update {
                                    background-color: #4CAF50;
                                    color: #fff;
                                    border: none;
                                    padding: 6px 12px;
                                    border-radius: 4px;
                                    text-decoration: none;
                                }
                            </style>
                            <div class="container">
                                <div class="row">
                                    <?php
                                    if (isset($_GET['quanly']) == "capnhat") {
                                        $id_capnhat = $_GET['id'];
                                        $sql_capnhat =  mysqli_query($con, "SELECT * FROM category WHERE catId = '$id_capnhat' ");
                                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                                    ?>
                                        <div class="col-lg-4">
                                            <h4>Cập Nhật Danh Mục</h4>
                                            <label for="">Tên Danh Mục</label>
                                            <form action="" method="post">
                                                <input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['catName'] ?>">
                                                <input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['catId'] ?>">
                                                <input type="submit" name="capnhatdanhmuc" value="Cập Nhật Danh Mục" class="btn btn-primary mt-3">
                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-lg-4">
                                            <h4>Thêm Danh Mục</h4>
                                            <label for="">Tên Danh Mục</label>
                                            <form action="" method="post">
                                                <input type="text" class="form-control" name="danhmuc" placeholder="Tên Danh Mục">
                                                <input type="submit" name="themdanhmuc" value="Thêm Danh Mục" class="btn btn-primary mt-3">
                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="col-lg-8">
                                        <h4>Liệt Kê Danh Mục</h4>
                                        <?php
                                        $sql_select = mysqli_query($con, "SELECT * FROM category ORDER BY catId ASC");
                                        ?>
                                        <table class="table table-responsive table-bordered ">
                                            <tr>
                                                <th>
                                                    Thứ Tự
                                                </th>
                                                <th>
                                                    Tên Danh Mục
                                                </th>
                                                <th>
                                                    Quản Lý
                                                </th>
                                            </tr>
                                            <?php
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($sql_select)) {
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['catName'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="?xoa=<?php echo $row['catId'] ?>" class="btn-delete">Xóa</a> || <a href="?quanly=capnhat&id=<?php echo $row['catId'] ?>" class="btn-update">Cập Nhật</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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