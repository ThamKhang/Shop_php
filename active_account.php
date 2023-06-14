<?php
$conn = mysqli_connect('localhost', 'root', '', 'lagi.shop');
$active_token = $_GET['active_token'];
$sql =  "UPDATE `user` SET `isActive`='0', active_token = NULL where `active_token`='$active_token'";
$result = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../shop-giay/assets/font/fontawesome/css/all.css" /> -->
    <!-- <script src="assets/js/main.js"></script> -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Shop bán giày</title>
</head>
<style>
    a:hover {
        color: tomato;
        text-decoration: none;
    }

    #active_account {
        margin: 0px auto;
        min-height: 500px;
    }

    h1 {
        display: inline-block;
        padding: 15px;
        border-radius: 10px;
    }

    p {
        font-size: larger;
    }

    #message-success {
        color: darkgreen;
        border: 2px solid green;
    }

    #message-error {
        color: crimson;
        border: 2px solid red;
    }
</style>
<div id="active_account" class="col-lg-12 text-center mt-5">
    <?php if ($result) { ?>
        <h1 id="message-success">Kích hoạt tài khoản thành công</h1>
        <p>Vui lòng click vào link sau để đăng nhập <a href="dangnhap.php">Đăng nhập</a></p>
    <?php } else { ?>
        <h1 id="message-error">Kích hoạt tài khoản thất bại</h1>
        <p>Quay lại trang <a href="dangky.php">Đăng ký</a></p>
    <?php } ?>
</div>