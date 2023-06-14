<?php

// if (isset($_POST["btnLogin"])) {
//     $db = new Helper();
//     $statement = "SELECT * FROM tbl_users WHERE email=? and matkhau=?";
//     $para = [$_POST['username'], $_POST['password']];
//     $count = $db->rowCount($statement, $para);
//     if ($count == 0) {
//         // echo "<script type='text/javascript'>alert('Tên đăng nhập hoặc mật khẩu sai');</script>";
//     } else {
//         echo "<script type='text/javascript'>alert('Đăng nhập thành công');</script>";
//         $db = new Helper();
//         $result = $db->fetchOne($statement, $para);
//         if ($result['id_user'] == 1) {
//             $_SESSION["user1"] = $result;
//             header("Location: index.php?page=home");
//         } else {
//             $_SESSION["user"] = $result;
//             header("Location: ../admin/Control/index.php?page=profile-edit");
//         }
//     }
// }
?>
<script defer>
    function resetdn() {
        document.getElementById('ttdn').innerHTML = '  <img src="../uploads/" alt="" style="width:50px">'
    }
    window.onload = resetdn();
</script>
<style>
    body {
     background-color: #00fcd6; 
     background-image: linear-gradient(to right, #d6f9f9,#aaffaa, #aaffff  ,#d4aaff);
   }
   
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

    .convert-sign-up a:hover,
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
</style>

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
                <h1 class="text-center">Đăng nhập</h1>
                <form method="POST" class="form" id="form-2">
                    <div class="form-group form-group-email">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                        <small class="form-message-email form-message"></small>
                    </div>
                    <div class="form-group form-group-password">
                        <label for="password">Mật khẩu</label>
                        <div class="sub-form">
                            <input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="Mật khẩu" />
                            <i class="fa-solid fa-eye icon-eye"></i>
                        </div>
                        <small class="form-message-password form-message"></small>
                    </div>
                    <input type="submit" name="btn-login" id="btn-login" class="btn btn-info w-100 mt-4 mb-2" value="Đăng nhập">
                    <small id="form-message-error"></small>
                    <small id="form-message-success"></small>
                    <a class="forgot-password mt-1 d-block" href="forgot-pass.php">Quên mật khẩu?</a>
                    <div class="convert-sign-up">
                        <span>Bạn chưa có tài khoản?</span>
                        <a href="dangky.php">Đăng ký</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script src="assets/js/validator.js"></script> -->
<!-- <script src="assets/js/app.js"></script> -->
<!-- <script>
    Validator({
        form: "#form-2",
        formGroupSelector: ".form-group",
        errorSelector: ".form-message",
        rules: [
            Validator.isRequired("#username"),
            Validator.isRequired("#password"),
            Validator.minLength("#password", 5),
        ],

        // onSubmit: function (data) {
        //   // call API
        //   console.log(data);
        // },
    });
</script> -->
<script>
    $(document).ready(function() {
        $(".icon-eye").click(function() {
            $(this).toggleClass("fa-eye-slash");
            $(this).toggleClass("fa-eye");
            if ($(this).hasClass("fa-eye-slash")) {
                $(this).prev("#userPassword").attr('type', 'text');
            } else {
                $(this).prev("#userPassword").attr('type', 'password');
            }
        })
        $("#email").blur(function() {
            var email = $("#email").val();
            var userPassword = $("#userPassword").val();
            var btnLogin = $("#btn-login").val();
            var data = {
                email: email,
                userPassword: userPassword,
                btnLogin: btnLogin
            };
            // console.log(data);
            $.ajax({
                url: "check-login-ajax.php", // Trang xử lý, mặc định trang hiện tại
                method: "POST", // POST hoặc GET, mặc định GET
                data: data, // Dữ liệu truyền lên server
                dataType: "json", // html, text, script hoặc json
                success: function(data) {
                    // console.log(data.error.email);
                    // console.log(data.error.password);
                    if (data.error.email != null) {
                        $(".form-group-email").addClass("invalid");
                        $(".form-message-email").text(data.error.email);
                    } else {
                        $(".form-group-email").removeClass("invalid");
                        $(".form-message-email").text("");
                    }


                    $("#email").focus(function() {
                        $(this).parents(".form-group-email").removeClass("invalid");
                        $(this).next(".form-message-email").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })




                    // console.log(data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })

        $("#userPassword").blur(function() {
            var email = $("#email").val();
            var userPassword = $("#userPassword").val();
            var btnLogin = $("#btn-login").val();
            var data = {
                email: email,
                userPassword: userPassword,
                btnLogin: btnLogin
            };
            // console.log(data);
            $.ajax({
                url: "check-login-ajax.php", // Trang xử lý, mặc định trang hiện tại
                method: "POST", // POST hoặc GET, mặc định GET
                data: data, // Dữ liệu truyền lên server
                dataType: "json", // html, text, script hoặc json
                success: function(data) {
                    // console.log(data.error.email);
                    // console.log(data.error.password);
                    if (data.error.userPassword != null) {
                        $(".form-group-password").addClass("invalid");
                        $(".form-message-password").text(data.error.userPassword);
                    } else {
                        $(".form-group-password").removeClass("invalid");
                        $(".form-message-password").text("");
                    }

                    $("#userPassword").focus(function() {
                        $(this).parents(".sub-form").parents(".form-group-password").removeClass("invalid");
                        $(this).parents(".sub-form").nextAll(".form-message-password").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })

                    // console.log(data);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            });
        })


        $("#form-2").submit(function(e) {
            var email = $("#email").val();
            var userPassword = $("#userPassword").val();
            var btnLogin = $("#btn-login").val();
            var data = {
                email: email,
                userPassword: userPassword,
                btnLogin: btnLogin
            };
            // console.log(data);
            $.ajax({
                url: "check-login-ajax.php", // Trang xử lý, mặc định trang hiện tại
                method: "POST", // POST hoặc GET, mặc định GET
                data: data, // Dữ liệu truyền lên server
                dataType: "json", // html, text, script hoặc json
                success: function(data) {
                    // console.log(data.error.email);
                    // console.log(data.error.password);
                    if (data.error.email != null) {
                        $(".form-group-email").addClass("invalid");
                        $(".form-message-email").text(data.error.email);
                    } else {
                        $(".form-group-email").removeClass("invalid");
                        $(".form-message-email").text("");
                    }

                    if (data.error.userPassword != null) {
                        $(".form-group-password").addClass("invalid");
                        $(".form-message-password").text(data.error.userPassword);
                    } else {
                        $(".form-group-password").removeClass("invalid");
                        $(".form-message-password").text("");
                    }

                    $("#email").focus(function() {
                        $(this).parents(".form-group-email").removeClass("invalid");
                        $(this).next(".form-message-email").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })

                    $("#userPassword").focus(function() {
                        $(this).parents(".sub-form").parents(".form-group-password").removeClass("invalid");
                        $(this).parents(".sub-form").nextAll(".form-message-password").text("");
                        $("#form-message-error").text("");
                        $("#form-message-success").text("");
                    })



                    if (data.error == "") {
                        if (data.is_login == 1) {
                            $("#form-message-success").text(data.message);
                        } else {
                            $("#form-message-error").text(data.message);
                        }
                    }
                    // $("#form-message-2").text(data);
                    if (data.is_login == 1) {
                        window.location.href = "index.php";
                    }
                    if (data.is_login == 2) {
                        window.location.href = "index.php";
                    }
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