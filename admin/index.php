<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doan.css">
    <link rel="stylesheet" href="../css/Login.css">
    <title>Lagi Shop</title>
</head>

<body>
    <div class="box">
        <div class="from-1">
            <form action="login.php" method="post">
                <h2>Login</h2>
                <div class="inputBox">
                    <input type="text" name="adminUser">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="adminPass">
                    <span>Password</span>
                    <i></i>
                </div>
                <!-- <div class="links">
                    <a href="#">Forgot Password</a>
                </div> -->
                <div>
                    <input type="submit" name="dangnhap" class="button_login" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>