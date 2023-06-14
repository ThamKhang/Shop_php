<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: dangnhap.php");
    exit;
}

// Kết nối tới cơ sở dữ liệu và lấy thông tin user
$pdo = new PDO("mysql:host=localhost;dbname=lagi.shop", "root", "");
$stmt = $pdo->prepare("SELECT * FROM user WHERE userId = :user_id");
$stmt->bindParam(":user_id", $_SESSION['userId']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

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
        /* Form */
        form {
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email_new"],
        input[type="date"] {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #f5f5f5;
            font-size: 1rem;
        }

        input[id="capnhat"] {
            background-color: #fe4c50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 10px;
        }

        input[id="logout"] {
            background-color: #222;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: darkgray;
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
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>User Profile</a></li>
                        </ul>
                    </div>
                    <!-- Form để thay đổi thông tin cá nhân -->
                    <form method="post" action="update_user_info.php">
                        <label for="name">Tên:</label>
                        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"><br>

                        <label for="email_new">Email:</label>
                        <input type="email_new" id="email_new" name="email" value="<?php echo $user['email']; ?>"><br>

                        <label for="phone">Số điện thoại:</label>
                        <input type="text" id="phone" name="phone" value="<?php echo $user['sdt']; ?>"><br>

                        <div class="form-group form-group-ngaysinh">
                            <label for="ngaySinh">Ngày sinh:</label>
                            <input type="date" name="ngaySinh" id="ngaySinh" value="<?php echo $user['ngaySinh']; ?>" required><br><br>
                        </div>

                        <div class="form-group form-group-diaChi">
                            <label for="diaChi">Địa chỉ:</label><br>
                            <input type="text" name="diaChi" id="diaChi" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo $user['diaChi']; ?>" />
                        </div>

                        <input type="submit" id="capnhat" value="Cập nhật thông tin">
                    </form>


                    <!-- Nút đăng xuất -->
                    <form method="post" action="logout.php">
                        <input type="submit" id="logout" value="Đăng xuất">
                    </form>
                </div>
            </div>
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