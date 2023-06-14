<?php
session_start();

// Hủy phiên đăng nhập của người dùng bằng cách xóa toàn bộ thông tin phiên
session_unset();
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập
header("Location: dangnhap.php");
exit;
