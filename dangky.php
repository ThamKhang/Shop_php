<?php

// if(isset($_GET['btn-sign-up'])){

//     header("Location: index.php?page=sign-up");

// }

?>


<style>
  body {
     background-color: #00fcd6; 
   background-image: linear-gradient(to right, #d6f9f9,#aaffaa, #aaffff  ,#d4aaff);
   }
   
   #form-1 {
     margin-bottom: 50px;
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

  .convert-sign-in a:hover {
    color: crimson;
    text-decoration: none;
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

<!-- end header -->
<div id="content" class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <h1 class="text-center">Đăng ký</h1>
        <form action="" class="form" id="form-1">

          <div class="form-group form-group-name">
            <label for="name">Họ tên</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Họ tên" />
            <small class="form-message form-message-name"></small>
          </div>

          <div class="form-group form-group-username">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập" />
            <small class="form-message form-message-username"></small>
          </div>

          <div class="form-group form-group-email">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
            <small class="form-message form-message-email"></small>
          </div>

          <div class="form-group form-group-sdt">
            <label for="sdt">Số điện thoại</label>
            <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Số điện thoại" />
            <small class="form-message form-message-sdt"></small>
          </div>

          <div class="form-group form-group-password">
            <label for="password">Mật khẩu</label>
            <div class="sub-form">
              <input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="Mật khẩu" />
              <i class="fa-solid fa-eye icon-eye"></i>
            </div>
            <small class="form-message form-message-password"></small>
          </div>

          <div class="form-group form-group-sex">
            <label for="gioiTinh">Giới tính:</label>
            <select name="gioiTinh" id="gioiTinh" required>
              <option value="Nam">Nam</option>
              <option value="Nữ">Nữ</option>
              <option value="Khác">Khác</option>
            </select><br><br>
            <small class="form-message form-message-gioiTinh"></small>
          </div>


          <div class="form-group form-group-ngaysinh">
            <label for="ngaySinh">Ngày sinh:</label>
            <input type="date" name="ngaySinh" id="ngaySinh" required><br><br>
            <small class="form-message form-message-ngaySinh"></small>
          </div>

          <div class="form-group form-group-diaChi">
            <label for="diaChi">Địa chỉ:</label><br>
            <!-- <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                <option value="" selected>Chọn tỉnh thành</option>
            </select>

            <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                <option value="" selected>Chọn quận huyện</option>
            </select>

            <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                <option value="" selected>Chọn phường xã</option>
            </select><br><br> -->

            <input type="text" name="diaChi" id="diaChi" class="form-control" placeholder="Nhập địa chỉ" />
            <small class="form-message form-message-diaChi"></small>
          </div>

          <input type="submit" name="btn-sign-up" id="btn-sign-up" class="btn btn-info w-100 mt-4 mb-2" value="Đăng ký"></input>
          <small id="form-message-error"></small>
          <small id="form-message-success"></small>

          <div class="convert-sign-in mt-1">
            <span>Bạn đã có tài khoản?</span>
            <a href="dangnhap.php">Đăng nhập</a>
          </div>
        </form>

        <!--         
        <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn chặn form submit mặc định

            // Lấy giá trị từ các trường select và textarea
            var city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;
            var district = document.getElementById('district').options[document.getElementById('district').selectedIndex].text;
            var ward = document.getElementById('ward').options[document.getElementById('ward').selectedIndex].text;
            var diaChi = document.getElementById('diaChi').value;

            // Ghép các giá trị lại thành một chuỗi
            var diaChiFull = city + ', ' + district + ', ' + ward + ', ' + diaChi;

            // Gán chuỗi địa chỉ vào trường input "diaChi"
            document.getElementById('diaChi').value = diaChiFull;

            // Tiếp tục submit form
            this.submit();
        });
    </script> -->


        <!-- <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script> -->

      </div>
    </div>
  </div>
</div>
<!-- <a href=""></a> -->
<!-- <?php
      // require('email.php');
      // echo send_mail('lddtan5@gmail.com','Lê Đức Duy Tân_A0694', 'Kích hoạt tài khoản', '<a href="http://unitop.vn">Kích hoạt tài khoản</a>');

      ?> -->

<!-- <script src="assets/js/validator.js"></script>
<script>
  Validator({
    form: "#form-1",
    formGroupSelector: ".form-group",
    errorSelector: ".form-message",
    rules: [
      Validator.isRequired("#username"),
      Validator.isRequired("#email"),
      Validator.isEmail("#email"),
      Validator.isRequired("#password"),
      Validator.minLength("#password", 6),
      Validator.isRequired("#password-comfirmation"),
      Validator.isComfirmed(
        "#password-comfirmation",
        function() {
          return document.querySelector("#form-1 #password").value;
        },
        "Mật khẩu nhập lại không chính xác"
      ),
    ],
    // onSubmit: function (data) {
    //   // call API
    //   console.log(data);
    // },
  });
</script> -->


<script>
  $(document).ready(function() {

    $("#name").blur(function() {
      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();

      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
      };
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.name != null) {
            $(".form-group-name").addClass("invalid");
            $(".form-message-name").text(data.error.name);
          } else {
            $(".form-group-name").removeClass("invalid");
            $(".form-message-name").text("");
          }
          console.log(data);

          $("#name").focus(function() {
            $(this).parents(".form-group-name").removeClass("invalid");
            $(this).next(".form-message-name").text("");
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


    $("#username").blur(function() {
      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();

      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
      };
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.username != null) {
            $(".form-group-username").addClass("invalid");
            $(".form-message-username").text(data.error.username);
          } else {
            $(".form-group-username").removeClass("invalid");
            $(".form-message-username").text("");
          }
          console.log(data);

          $("#username").focus(function() {
            $(this).parents(".form-group-username").removeClass("invalid");
            $(this).next(".form-message-username").text("");
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

    $("#email").blur(function() {
      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();

      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
      };
      // console.log(data);
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.email != null) {
            $(".form-group-email").addClass("invalid");
            $(".form-message-email").text(data.error.email);
          } else {
            $(".form-group-email").removeClass("invalid");
            $(".form-message-email").text("");
          }
          console.log(data);

          $("#email").focus(function() {
            $(this).parents(".form-group-email").removeClass("invalid");
            $(this).next(".form-message-email").text("");
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

    $("#sdt").blur(function() {

      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();

      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
      };
      // console.log(data);
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.sdt != null) {
            $(".form-group-sdt").addClass("invalid");
            $(".form-message-sdt").text(data.error.sdt);
          } else {
            $(".form-group-sdt").removeClass("invalid");
            $(".form-message-sdt").text("");
          }
          console.log(data);

          $("#sdt").focus(function() {
            $(this).parents(".form-group-sdt").removeClass("invalid");
            $(this).next(".form-message-sdt").text("");
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


    $("#userPassword").blur(function() {
      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();

      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
      };
      // console.log(data);
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.userPassword != null) {
            $(".form-group-password").addClass("invalid");
            $(".form-message-password").text(data.error.userPassword);
          } else {
            $(".form-group-password").removeClass("invalid");
            $(".form-message-password").text("");
          }
          console.log(data);

          $("#userPassword").focus(function() {
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




    // $("#gioiTinh").blur(function() {
    //   var name = $("#name").val();
    //   var username = $("#username").val();
    //   var email = $("#email").val();
    //   var sdt = $("#sdt").val();
    //   var userPassword = $("#userPassword").val();
    //   var gioiTinh = $("#gioiTinh").val();
    //   var ngaySinh = $("#ngaySinh").val();
    //   var diaChi = $("#diaChi").val();

    //   var data = {
    //     name: name,
    //     username: username,
    //     email: email,
    //     sdt: sdt,
    //     userPassword: userPassword,
    //     gioiTinh: gioiTinh,
    //     ngaySinh: ngaySinh,
    //     diaChi: diaChi,
    //   };
    //   // console.log(data);
    //   $.ajax({
    //     url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
    //     method: "POST", // POST hoặc GET, mặc định GET
    //     data: data, // Dữ liệu truyền lên server
    //     dataType: "json", // html, text, script hoặc json
    //     success: function(data) {
    //       if (data.error.gioiTinh != null) {
    //         $(".form-group-gioiTinh").addClass("invalid");
    //         $(".form-message-gioiTinh").text(data.error.gioiTinh);
    //       } else {
    //         $(".form-group-gioiTinh").removeClass("invalid");
    //         $(".form-message-gioiTinh").text("");
    //       }

    //       $("#gioiTinh").focus(function() {
    //         $(this).parents(".sub-form").parents(".form-group-gioiTinh").removeClass("invalid");
    //         $(this).parents(".sub-form").nextAll(".form-message-gioiTing").text("");
    //         $("#form-message-error").text("");
    //         $("#form-message-success").text("");
    //       })
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //       alert(xhr.status);
    //       alert(thrownError);
    //     },
    //   });
    // })


    $("#diaChi").blur(function() {
      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();

      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
      };
      // console.log(data);
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.diaChi != null) {
            $(".form-group-diaChi").addClass("invalid");
            $(".form-message-diaChi").text(data.error.diaChi);
          } else {
            $(".form-group-diaChi").removeClass("invalid");
            $(".form-message-diaChi").text("");
          }

          $("#diaChi").focus(function() {
            $(this).parents(".form-group-diaChi").removeClass("invalid");
            $(this).next(".form-message-diaChi").text("");
            $("#form-message-error").text("");
            $("#form-message-success").text("");
          })
          console.log(data);

        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
    })


    $("#form-1").submit(function(e) {
      var name = $("#name").val();
      var username = $("#username").val();
      var email = $("#email").val();
      var sdt = $("#sdt").val();
      var userPassword = $("#userPassword").val();
      var gioiTinh = $("#gioiTinh").val();
      var ngaySinh = $("#ngaySinh").val();
      var diaChi = $("#diaChi").val();
      var btnSignUp = $("#btn-sign-up").val();
      var data = {
        name: name,
        username: username,
        email: email,
        sdt: sdt,
        userPassword: userPassword,
        gioiTinh: gioiTinh,
        ngaySinh: ngaySinh,
        diaChi: diaChi,
        btnSignUp: btnSignUp
      };
      // console.log(data);
      $.ajax({
        url: "check_signup_test.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          if (data.error.name != null) {
            $(".form-group-name").addClass("invalid");
            $(".form-message-name").text(data.error.name);
          } else {
            $(".form-group-name").removeClass("invalid");
            $(".form-message-name").text("");
          }

          if (data.error.username != null) {
            $(".form-group-username").addClass("invalid");
            $(".form-message-username").text(data.error.username);
          } else {
            $(".form-group-username").removeClass("invalid");
            $(".form-message-username").text("");
          }

          if (data.error.email != null) {
            $(".form-group-email").addClass("invalid");
            $(".form-message-email").text(data.error.email);
          } else {
            $(".form-group-email").removeClass("invalid");
            $(".form-message-email").text("");
          }

          if (data.error.sdt != null) {
            $(".form-group-sdt").addClass("invalid");
            $(".form-message-sdt").text(data.error.sdt);
          } else {
            $(".form-group-sdt").removeClass("invalid");
            $(".form-message-sdt").text("");
          }

          if (data.error.diaChi != null) {
            $(".form-group-diaChi").addClass("invalid");
            $(".form-message-diaChi").text(data.error.diaChi);
          } else {
            $(".form-group-diaChi").removeClass("invalid");
            $(".form-message-diaChi").text("");
          }

          if (data.error.userPassword != null) {
            $(".form-group-password").addClass("invalid");
            $(".form-message-password").text(data.error.userPassword);
          } else {
            $(".form-group-password").removeClass("invalid");
            $(".form-message-password").text("");
          }


          $("#username").focus(function() {
            $(this).parents(".form-group-username").removeClass("invalid");
            $(this).next(".form-message-username").text("");
            $("#form-message-error").text("");
            $("#form-message-success").text("");
          })

          $("#email").focus(function() {
            $(this).parents(".form-group-email").removeClass("invalid");
            $(this).next(".form-message-email").text("");
            $("#form-message-error").text("");
            $("#form-message-success").text("");
          })

          $("#sdt").focus(function() {
            $(this).parents(".form-group-sdt").removeClass("invalid");
            $(this).next(".form-message-sdt").text("");
            $("#form-message-error").text("");
            $("#form-message-success").text("");
          })

          $("#diaChi").focus(function() {
            $(this).parents(".form-group-diaChi").removeClass("invalid");
            $(this).next(".form-message-diaChi").text("");
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
            if (data.is_sign_up == 1) {
              $("#form-message-success").text(data.message);
              // window.location.href = "dangnhap.php";
            } else {
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>