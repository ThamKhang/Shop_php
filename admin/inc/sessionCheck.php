<?php
session_start();
if (!isset($_SESSION['adminId'])) {
    header('Location:index.php');
}
?>

<?php

if (isset($_GET['dangxuat'])) {
    $id = $_GET['dangxuat'];
    if ($id == 1) {
        unset($_SESSION['adminId']);
        header('Location:index.php');
    }
}
