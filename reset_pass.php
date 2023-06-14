<style>
    .form-group label {
        font-weight: 500;
    }

    .form-group.invalid .form-control {
        border-color: #f33a58;
    }

    .form-group.invalid .form-message {
        color: #f33a58;
        font-size: 17px;
    }

    .sign-up:hover,
    .login:hover,
    .forgot-password:hover {
        color: crimson;
        text-decoration: none;
    }

    .sub-form {
        position: relative;
    }

    .icon-eye {
        position: absolute;
        right: 20px;
        bottom: 6px;
        padding: 3px;
        z-index: 1;
    }

    .icon-eye:hover {
        cursor: pointer;
    }


    #form-message-error {
        color: red;
        text-align: center;
        font-size: 23px;
        font-weight: 600;
        display: block;
    }

    #form-message-success {
        color: #3ae374;
        text-align: center;
        font-size: 23px;
        font-weight: 600;
        display: block;
    }

    #reset-token {
        display: none;
    }

    body {
        background-color: #00fcd6;
        background-image: linear-gradient(to right, #d6f9f9, #aaffaa, #aaffff, #d4aaff);
    }
</style>
<?php
$reset_token = $_GET['reset_token'];
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
<div id="content" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <h1 class="text-center">Khôi phục mật khẩu</h1>
                <form class="form" id="form-reset-pass">
                    <div class="form-group form-group-password">
                        <label for="password">Mật khẩu mới</label>
                        <div class="sub-form">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" />
                            <i class="fa-solid fa-eye icon-eye"></i>
                        </div>
                        <small class="form-message-password form-message"></small>
                    </div>
                    <div class="form-group form-group-password-confirm">
                        <label for="password-confirm">Nhập lại mật khẩu</label>
                        <div class="sub-form">
                            <input type="password" name="password-confirm" id="password-confirm" class="form-control" placeholder="Mật khẩu" />
                            <i class="fa-solid fa-eye icon-eye"></i>
                        </div>
                        <small class="form-message-password-confirm form-message"></small>
                    </div>
                    <input type="submit" name="btn-reset-pass" id="btn-reset-pass" class="btn btn-info w-100 mt-4 mb-2" value="Lưu mật khẩu">
                    <small id="form-message-error"></small>
                    <small id="form-message-success"></small>
                    <input type="hidden" name="reset-token" id="reset-token" value="<?php echo $reset_token; ?>"></input>
                    <div>
                        <span>Quay lại trang</span>
                        <a href="dangnhap.php" class="login">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".icon-eye").click(function() {
            $(this).toggleClass("fa-eye-slash");
            $(this).toggleClass("fa-eye");
            if ($(this).hasClass("fa-eye-slash")) {
                $(this).prev("#password").attr('type', 'text');
                $(this).prev("#password-confirm").attr('type', 'text');
            } else {
                $(this).prev("#password").attr('type', 'password');
                $(this).prev("#password-confirm").attr('type', 'password');
            }
            var reset_token = $("#reset-token").val();
            console.log(reset_token);
        })
        $("#password").blur(function() {
            var password = $("#password").val();
            var password_confirm = $("#password-confirm").val();
            var reset_token = $("#reset-token").val();
            var data = {
                password: password,
                password_confirm: password_confirm,
                reset_token: reset_token
            };
            // console.log(data);
            $.ajax({
                url: "check-reset-pass-ajax.php", // Trang xử lý, mặc định trang hiện tại
                method: "POST", // POST hoặc GET, mặc định GET
                data: data, // Dữ liệu truyền lên server
                dataType: "json", // html, text, script hoặc json
                success: function(data) {
                    if (data.error.password != null) {
                        $(".form-group-password").addClass("invalid");
                        $(".form-message-password").text(data.error.password);
                    } else {
                        $(".form-group-password").removeClass("invalid");
                        $(".form-message-password").text("");
                    }

                    $("#password").focus(function() {
                        $(this).parents(".sub-form").parents(".form-group-password").removeClass("invalid");
                        $(this).parents(".sub-form").nextAll(".form-message-password").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })

        $("#password-confirm").blur(function() {
            var password = $("#password").val();
            var password_confirm = $("#password-confirm").val();
            var reset_token = $("#reset-token").val();
            var data = {
                password: password,
                password_confirm: password_confirm,
                reset_token: reset_token
            };
            // console.log(data);
            $.ajax({
                url: "check-reset-pass-ajax.php", // Trang xử lý, mặc định trang hiện tại
                method: "POST", // POST hoặc GET, mặc định GET
                data: data, // Dữ liệu truyền lên server
                dataType: "json", // html, text, script hoặc json
                success: function(data) {
                    if (data.error.password_confirm != null) {
                        $(".form-group-password-confirm").addClass("invalid");
                        $(".form-message-password-confirm").text(data.error.password_confirm);
                    } else {
                        $(".form-group-password-confirm").removeClass("invalid");
                        $(".form-message-password-confirm").text("");
                    }

                    $("#password-confirm").focus(function() {
                        $(this).parents(".sub-form").parents(".form-group-password-confirm").removeClass("invalid");
                        $(this).parents(".sub-form").nextAll(".form-message-password-confirm").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })

        $("#form-reset-pass").submit(function(e) {
            var password = $("#password").val();
            var password_confirm = $("#password-confirm").val();
            var reset_token = $("#reset-token").val();
            var btnResetPass = $("#btn-reset-pass").val();
            var data = {
                password: password,
                password_confirm: password_confirm,
                reset_token: reset_token,
                btnResetPass: btnResetPass
            };
            // console.log(data);
            $.ajax({
                url: "check-reset-pass-ajax.php", // Trang xử lý, mặc định trang hiện tại
                method: "POST", // POST hoặc GET, mặc định GET
                data: data, // Dữ liệu truyền lên server
                dataType: "json", // html, text, script hoặc json
                success: function(data) {
                    if (data.error.password != null) {
                        $(".form-group-password").addClass("invalid");
                        $(".form-message-password").text(data.error.password);
                    } else {
                        $(".form-group-password").removeClass("invalid");
                        $(".form-message-password").text("");
                    }

                    if (data.error.password_confirm != null) {
                        $(".form-group-password-confirm").addClass("invalid");
                        $(".form-message-password-confirm").text(data.error.password_confirm);
                    } else {
                        $(".form-group-password-confirm").removeClass("invalid");
                        $(".form-message-password-confirm").text("");
                    }


                    $("#password").focus(function() {
                        $(this).parents(".sub-form").parents(".form-group-password").removeClass("invalid");
                        $(this).parents(".sub-form").nextAll(".form-message-password").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })

                    $("#password-confirm").focus(function() {
                        $(this).parents(".sub-form").parents(".form-group-password-confirm").removeClass("invalid");
                        $(this).parents(".sub-form").nextAll(".form-message-password-confirm").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })

                    if (data.error == "") {
                        if (data.is_reset_pass == 1) {
                            $("#form-message-success").text(data.message);
                        } else if (data.is_reset_pass == 0) {
                            $("#form-message-error").text(data.message);
                        }
                    }
                    console.log(data);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
            e.preventDefault();
        });
    })
</script>