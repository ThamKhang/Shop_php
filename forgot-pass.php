<!-- end header -->
<style>
  .form-group label {
    font-weight: 500;
    font-size: larger;
  }

  .form-group.invalid .form-control {
    border-color: #f33a58;
  }

  .form-group.invalid .form-message {
    color: #f33a58;
    font-size: 17px;
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

  .sign-up:hover,
  .login:hover,
  .forgot-password:hover {
    color: crimson;
    text-decoration: none;
  }

  body {
    background-color: #00fcd6;
    background-image: linear-gradient(to right, #d6f9f9, #aaffaa, #aaffff, #d4aaff);
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
        <h1 class="text-center mb-3">Quên mật khẩu</h1>
        <form action="" class="form" id="form-3">
          <div class="form-group">
            <label for="email">Vui lòng nhập email để lấy lại mật khẩu của bạn</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" />
            <small class="form-message"></small>
          </div>
          <input type="submit" name="btn-forgot-pass" id="btn-forgot-pass" class="btn btn-info w-100 my-2" value="Gửi yêu cầu"></input>
          <small id="form-message-success"></small>
          <small id="form-message-error"></small>
          <div>
            <span>Quay lại trang</span>
            <a href="dangnhap.php" class="login">Đăng nhập</a>
            <a href="dangky.php" class="sign-up">Đăng ký</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#email").blur(function() {
      var email = $("#email").val();
      var data = {
        email: email,
      };
      // console.log(data);
      $.ajax({
        url: "check-forgot-pass-ajax.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          // console.log(data.error.email);
          // console.log(data.error.password);
          if (data.error.email != null) {
            $(".form-group").addClass("invalid");
            $(".form-message").text(data.error.email);
          } else {
            $(".form-group").removeClass("invalid");
            $(".form-message").text("");
          }


          $("#email").focus(function() {
            $(this).parents(".form-group").removeClass("invalid");
            $(this).next(".form-message").text("");
            $("#form-message-success").text("");
            $("#form-message-error").text("");
          })




          console.log(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        },
      });
    })


    $("#form-3").submit(function(e) {
      var email = $("#email").val();
      var btnForgotPass = $("#btn-forgot-pass").val();
      var data = {
        email: email,
        btnForgotPass: btnForgotPass
      };
      // console.log(data);
      $.ajax({
        url: "check-forgot-pass-ajax.php", // Trang xử lý, mặc định trang hiện tại
        method: "POST", // POST hoặc GET, mặc định GET
        data: data, // Dữ liệu truyền lên server
        dataType: "json", // html, text, script hoặc json
        success: function(data) {
          // console.log(data.error.email);
          // console.log(data.error.password);
          if (data.error.email != null) {
            $(".form-group").addClass("invalid");
            $(".form-message").text(data.error.email);
          } else {
            $(".form-group").removeClass("invalid");
            $(".form-message").text("");
          }

          $("#email").focus(function() {
            $(this).parents(".form-group").removeClass("invalid");
            $(this).next(".form-message").text("");
            $("#form-message-success").text("");
            $("#form-message-error").text("");

          })

          if (data.error == "") {
            if (data.is_send == 1) {
              $("#form-message-success").text(data.message);
            } else {
              $("#form-message-error").text(data.message);
            }
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