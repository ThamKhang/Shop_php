<?php

require("email.php");
$conn = mysqli_connect('localhost', 'root', '', 'lagi.shop');
$email = $_POST['email'];
$data = array();
$error = array();

$sql_email = "SELECT * from `user` where email = '$email'";
$result_email = mysqli_query($conn, $sql_email);
if (empty($email)) {
    $error['email'] = "Không được để trống email";
} else {
    // $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Email không đúng định dạng";
    } else if (mysqli_num_rows($result_email) == 0) {
        $error['email'] = "Email không tồn tại trên hệ thống";
    }
}


if (isset($_POST['btnForgotPass'])) {

    $sql = "SELECT * from `user` where email = '$email' and isActive = '0'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data['is_send'] = 1;
        $reset_token = md5($email . time());
        $link_reset_pass = "http://localhost/Shop_php/reset_pass.php?reset_token={$reset_token}";
        $content = "<p>Chào bạn</p>
        <p>Vui lòng click vào đây để khôi phục mật khẩu: $link_reset_pass</p>
        <p>Nếu không phải bạn, vui lòng bỏ qua email này</p>";
        $sql_update =  "UPDATE `user` SET reset_token= '$reset_token' where email ='$email'";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result) {
            $data['message'] = "Gửi yêu cầu thành công, vui lòng kiểm tra email của bạn!!!";
        }
        send_mail("$email", "", "Khôi phục mật khẩu", $content);
    } else {
        $data['is_send'] = 0;
        $data['message'] = "Email chưa được kích hoạt, vui lòng kiểm tra email để kích hoạt tài khoản!!!";
    }
    
}

$data['error'] = $error;
echo json_encode($data);
