<header class="header trans_300" style="top: 0px;">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">


                            <li class="currency">
                                <a href="#">
                                    usd
                                </a>
                            </li>
                            <li class="language">
                                <a href="#">
                                    English
                                </a>
                            </li>
                            <li class="account">
                                <a href="#">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection">
                                    <?php if (isset($_SESSION['userId'])) { ?>
                                        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                                    <?php } else { ?>
                                        <li><a href="dangnhap.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                        <li><a href="dangky.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                    <?php } ?>
                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="index.php">Lagi<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="index.php">home</a></li>
                            <li><a href="categories.php">shop</a></li>
                            <li><a href="#">promotion</a></li>
                            <li><a href="#">pages</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="contact.php">contact</a></li>
                        </ul>
                        <ul class="navbar_user">
                            <li><a href="#" id="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                            <div id="popup" class="popup">
                                <form id="search-form" class="search-form" action="categories.php">
                                    <input type="text" name="search" placeholder="Tìm kiếm">
                                    <button type="submit">Tìm</button>
                                </form>
                            </div>
                            <style>
                                .popup {
                                    display: none;
                                    position: fixed;
                                    top: 0;
                                    left: 0;
                                    right: 0;
                                    bottom: 0;
                                    background-color: rgba(0, 0, 0, 0.5);
                                    z-index: 9999;
                                }

                                .popup.show {
                                    display: block;
                                }

                                .search-form {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    background-color: #fff;
                                    border: 1px solid #ccc;
                                    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
                                    padding: 10px;
                                }

                                .search-form input[type="text"] {
                                    width: 200px;
                                    border: none;
                                    border-bottom: 1px solid #ccc;
                                    font-size: 16px;
                                    padding: 5px;
                                }

                                .search-form button[type="submit"] {
                                    background-color: #51545f;
                                    color: #fff;
                                    border: none;
                                    border-radius: 5px;
                                    padding: 5px 10px;
                                    font-size: 16px;
                                    cursor: pointer;
                                }
                            </style>
                            <script>
                                var searchIcon = document.getElementById("search-icon");
                                var popup = document.getElementById("popup");
                                var searchForm = document.getElementById("search-form");

                                searchForm.addEventListener("submit", function(e) {
                                    e.preventDefault(); // Ngăn chặn form gửi đi
                                    var searchInput = searchForm.querySelector("input[name='search']");
                                    if (searchInput) {
                                        var searchValue = searchInput.value;
                                        var url = "categories.php?search=" + searchValue;
                                        window.location.href = url;
                                    }
                                });


                                searchIcon.addEventListener("click", function() {
                                    popup.classList.add("show");
                                });

                                popup.addEventListener("click", function(e) {
                                    if (e.target === popup) {
                                        popup.classList.remove("show");
                                    }
                                });
                            </script>
                            <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            <?php
                            // kết nối database
                            $conn = mysqli_connect("localhost", "root", "", "lagi.shop");

                            // kiểm tra kết nối
                            if (!$conn) {
                                die("Kết nối không thành công: " . mysqli_connect_error());
                            }

                            // kiểm tra session userId
                            if (isset($_SESSION['userId'])) {
                                $userId = $_SESSION['userId'];

                                // truy vấn số lượng sản phẩm trong giỏ hàng của khách hàng
                                $query = "SELECT COUNT(*) AS count FROM cart WHERE userId = '$userId'";
                                $result = mysqli_query($conn, $query);

                                // lấy kết quả truy vấn
                                $row = mysqli_fetch_assoc($result);

                                // lưu số lượng sản phẩm vào biến
                                $cartItemCount = $row['count'];
                            } else {
                                $cartItemCount = 0;
                            }
                            ?>

                            <!-- hiển thị số lượng sản phẩm trong giỏ hàng -->
                            <li class="checkout">
                                <a href="giohang.php">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items"><?php echo $cartItemCount ?></span>
                                </a>
                            </li>
                            <li class="checkout">
                                <a href="hienthi.php">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>