<?php
session_start();
?>
<?php include 'inc/handle.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Colo Shop Categories</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-3KvH8JWlLumXKM+5pIaYfVd8W5Q2x5w5ak5Kf7Vz8WZ/hG9Iy+5P5Jv7yKoe1Qa5x5w+6ZoJ0ZcKzB9lo+AlrQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.sidebar_categories li.hidden {
			display: none;
		}

		.show-more {
			display: inline-block;
			padding: 3px 15px;
			margin-top: 15px;
			border: 1px solid #333;
			background-color: #fff;
			color: #333;
			font-size: 13px;
			font-weight: bold;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}

		.show-more:hover {
			background-color: #333;
			color: #fff;
			border-color: #fff;
		}

		.show-more i {
			margin-left: 5px;
			transition: transform 0.3s ease-in-out;
		}

		.show-more.collapsed i {
			transform: rotate(-180deg);
		}
	</style>

</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include 'inc/header.php' ?>

		<div class="fs_menu_overlay"></div>

		<!-- Hamburger Menu -->

		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">
					<li class="menu_item has-children">
						<a href="#">
							usd
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#">cad</a></li>
							<li><a href="#">aud</a></li>
							<li><a href="#">eur</a></li>
							<li><a href="#">gbp</a></li>
						</ul>
					</li>
					<li class="menu_item has-children">
						<a href="#">
							English
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#">French</a></li>
							<li><a href="#">Italian</a></li>
							<li><a href="#">German</a></li>
							<li><a href="#">Spanish</a></li>
						</ul>
					</li>
					<li class="menu_item has-children">
						<a href="#">
							My Account
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
							<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
						</ul>
					</li>
					<li class="menu_item"><a href="#">home</a></li>
					<li class="menu_item"><a href="#">shop</a></li>
					<li class="menu_item"><a href="#">promotion</a></li>
					<li class="menu_item"><a href="#">pages</a></li>
					<li class="menu_item"><a href="#">blog</a></li>
					<li class="menu_item"><a href="#">contact</a></li>
				</ul>
			</div>
		</div>

		<div class="container product_section_container">
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="categories.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Category</a></li>
						</ul>
					</div>

					<!-- Sidebar -->

					<div class="sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Product Category</h5>
							</div>
							<ul class="sidebar_categories">
								<?php
								include 'classses/cate.php';

								// Truy vấn lấy danh sách danh mục
								$catsql = "SELECT * FROM category";
								$result = mysqli_query($conn, $catsql);
								// Kiểm tra kết quả truy vấn và hiển thị danh mục
								if (mysqli_num_rows($result) > 0) {
									$params['catName'] = '';
									$params['page'] = 1;
									echo '<li><a href="categories.php?' . http_build_query($params) . '">Tất cả</a></li>';
									while ($row = mysqli_fetch_assoc($result)) {
										// Thêm catName mới vào mảng các tham số
										$params['catName'] = $row['catName'];
										// Xây dựng chuỗi query string mới với catName mới
										$newUrl = 'http://localhost/shop_php/categories.php?' . http_build_query($params);
										echo '<li><a href="' . $newUrl . '">' . $row["catName"] . '</a></li>';
									}
								} else {
									echo "<li>Không có danh mục nào</li>";
								} ?>
								<button class="show-more">Xem thêm <i class="fa fa-angle-down"></i></button>
							</ul>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
							<script>
								$(document).ready(function() {
									var max_items = 5; // số lượng danh mục muốn hiển thị ban đầu
									var categories = $(".sidebar_categories li"); // danh sách tất cả các danh mục
									categories.slice(max_items).addClass('hidden'); // ẩn các danh mục còn lại

									$(".show-more").on('click', function() {
										categories.slice(max_items).toggleClass('hidden'); // hiển thị/ẩn các danh mục còn lại khi nhấp vào nút "Xem thêm"
										$(this).toggleClass('collapsed'); // thêm hoặc xóa lớp "collapsed" để ẩn hoặc hiển thị mũi tên trên nút
									});
								});
							</script>
						</div>


						<!-- Price Range Filtering -->

						<!-- HTML -->
						<div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Filter by Price</h5>
							</div>
							<p>
								<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
							</p>
							<div id="slider-range"></div>
							<div class="filter_button"><span>filter</span></div>
						</div>

						<!-- JavaScript -->
						<!-- <script>
							$(document).ready(function() {
								// Khi tài liệu đã sẵn sàng
								$("#slider-range").slider({
									// Cấu hình thanh trượt
									range: true,
									min: 0,
									max: 10000000,
									values: [0, 10000000],
									step: 100,
									slide: function(event, ui) {
										// Cập nhật giá trị đọc được từ thanh trượt
										$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
									}
								});

								$("#filter_button").on("click", function() {
									var minPrice = $("#slider-range").slider("values", 0);
									var maxPrice = $("#slider-range").slider("values", 1);
									// Gọi hàm getFilteredProducts với khoảng giá đã chọn
									getFilteredProducts(minPrice, maxPrice);
								});

							});
						</script> -->


						<!-- Sizes -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Sizes</h5>
							</div>
							<ul class="checkboxes">
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>S</span></li>
								<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>L</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XL</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>XXL</span></li>
							</ul>
						</div> -->

						<!-- Color -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_title">
								<h5>Color</h5>
							</div>
							<ul class="checkboxes">
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Black</span></li>
								<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Pink</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>White</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Blue</span></li>
								<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Orange</span></li>
							</ul>
							<div class="show_more">
								<span><span>+</span>Show More</span>
							</div>
						</div> -->

					</div>

					<!-- Main Content -->

					<div class="main_content">

						<!-- Products -->

						<div class="products_iso">
							<div class="row">
								<div class="col">

									<!-- Product Sorting -->

									<!-- <div class="product_sorting_container product_sorting_container_top">
										<ul class="product_sorting">
											<li>
												<span class="type_sorting_text">Default Sorting</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_type">
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
													<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
												</ul>
											</li>
											<li>
												<span>Show</span>
												<span class="num_sorting_text">6</span>
												<i class="fa fa-angle-down"></i>
												<ul class="sorting_num">
													<li class="num_sorting_btn"><span>6</span></li>
													<li class="num_sorting_btn"><span>12</span></li>
													<li class="num_sorting_btn"><span>24</span></li>
												</ul>
											</li>
										</ul>
										<div class="pages d-flex flex-row align-items-center">
											<div class="page_current">
												<span>1</span>
												<ul class="page_selection">
													<li><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
												</ul>
											</div>
											<div class="page_total"><span>of</span> 3</div>
											<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
										</div>
									</div> -->

									<!-- Product Grid -->
									<!-- Form tìm kiếm với nút submit -->


									<div class="product-grid">
										<?php
										// Số sản phẩm hiển thị trên mỗi trang
										$productsPerPage = 4;

										// Trang hiện tại
										$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

										// Tính tổng số sản phẩm trong cơ sở dữ liệu
										$totalProducts = mysqli_num_rows(mysqli_query($conn, $sql));

										// Tính tổng số trang
										$totalPages = ceil($totalProducts / $productsPerPage);

										// Giới hạn bắt đầu của dữ liệu lấy từ cơ sở dữ liệu dựa trên trang hiện tại
										$limitStart = ($currentPage - 1) * $productsPerPage;

										// Câu truy vấn SQL lấy dữ liệu của từng trang
										$sqlLimit = $sql . " LIMIT $limitStart, $productsPerPage";
										$result = mysqli_query($conn, $sqlLimit);

										// Kiểm tra kết quả truy vấn và hiển thị sản phẩm
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result)) {
												echo '<div class="product-item ' .  $row['catId'] . '">';
												echo '<div class="product discount product_filter">';
												echo '<div class="product_image">';
												echo '<img src="' . "admin/" . $row['image'] . '" alt="' . $row['productName'] . '">';
												echo '</div>';
												echo '<div class="favorite favorite_left"></div>';
												// echo '<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>';
												echo '<div class="product_info">';
												echo '<h6 class="product_name"><a href="single.php?productName=' . $row['productName'] . '">' . $row['productName'] . '</a></h6>';
												$price_discount = number_format($row['price_discount'], 0, ',', '.') . '₫';
												$price = number_format($row['price'], 0, ',', '.') . '₫';
												echo '<div class="product_price">' . $price_discount . '<span>' . $price . '</span>' . '</div>';
												echo '</div>';
												echo '</div>';
												echo '<div class="red_button add_to_cart_button"><a href="addcart.php?productId=' . $row['productId'] . "&quantity=1" . '">add to cart</a></div>';
												echo '</div>';
											}
										} else {
											echo "0 results";
										}
										?>
									</div>

									<!-- Product Sorting -->

									<div class="product_sorting_container product_sorting_container_bottom clearfix">
										<!-- <ul class="product_sorting">
												<li>
													<span>Show:</span>
													<span class="num_sorting_text">04</span>
													<i class="fa fa-angle-down"></i>
													<ul class="sorting_num">
														<li class="num_sorting_btn"><span>01</span></li>
														<li class="num_sorting_btn"><span>02</span></li>
														<li class="num_sorting_btn"><span>03</span></li>
														<li class="num_sorting_btn"><span>04</span></li>
													</ul>
												</li>
											</ul>
											<span class="showing_results">Showing 1–3 of 12 results</span> -->
										<!-- Hiển thị nút phân trang -->
										<div class="pagination">
											<?php
											$params = array(
												'search' => isset($_SESSION['searchKeyword']) ? $_SESSION['searchKeyword'] : '',
												'catName' => isset($_GET['catName']) ? $_GET['catName'] : '',
												'minPrice' => isset($_GET['minPrice']) ? $_GET['minPrice'] : '0',
												'maxPrice' => isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '10000000',
												'page' => isset($_GET['page']) ? $_GET['page'] : '1' // Thêm tham số page vào URL
											);

											// Thêm các tham số vào URL
											$url = 'http://localhost/shop_php/categories.php?' . http_build_query($params);
											if ($currentPage > 1) : ?>
												<a href="<?php
															$params['page'] = '1';
															echo 'http://localhost/shop_php/categories.php?' . http_build_query($params);
															?>" class="first">&laquo;&laquo; First</a>
												<a href="<?php
															$params['page'] = ($currentPage - 1);
															echo 'http://localhost/shop_php/categories.php?' . http_build_query($params);
															?>" class="prev">&laquo; Prev</a>
											<?php endif; ?>

											<?php
											for ($i = 1; $i <= $totalPages; $i++) {
												if ($i == $currentPage) {
													// Nếu đang ở trang 1 thì không hiển thị thẻ a chứa href
													echo '<span class="active">' . $i . '</span> ';
												} else {
													$params['page'] = $i;
													echo '<a href="' . 'http://localhost/shop_php/categories.php?' . http_build_query($params) . '">' . $i . '</a> ';
												}
											}
											?>
											<?php if ($currentPage < $totalPages) : ?>
												<a href="?page=<?php echo ($currentPage + 1); ?>&<?php echo http_build_query($params); ?>" class="next">Next &raquo;</a>
												<a href="?page=<?php echo $totalPages; ?>&<?php echo http_build_query($params); ?>" class="last">Last &raquo;&raquo;</a>
											<?php endif; ?>
										</div>
										<style>
											.pagination {
												display: flex;
												justify-content: center;
												align-items: center;
												margin-top: 20px;
											}

											.pagination a,
											.pagination span {
												color: #fe4c50;
												display: inline-block;
												padding: 8px 16px;
												text-decoration: none;
												transition: color 0.3s ease;
												/* border: 1px solid #fe4c50; */
												border-radius: 4px;
												margin-right: 4px;
												background-color: #fff;
											}

											.pagination a:hover {
												color: #fff;
												background-color: #fe4c50;
											}

											.pagination .active {
												color: #fff;
												font-weight: bold;
												background-color: #fe4c50;
											}

											.pagination .first,
											.pagination .prev,
											.pagination .next,
											.pagination .last {
												padding: 8px;
											}

											.pagination a::before,
											.pagination a::after {
												content: "";
											}

											.pagination .active::before,
											.pagination .active::after {
												content: none;
											}
										</style>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>free shipping</h6>
								<p>Suffered Alteration in Some Form</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>cach on delivery</h6>
								<p>The Internet Tend To Repeat</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>45 days return</h6>
								<p>Making it Look Like Readable</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>opening all week</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Newsletter -->

		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
							<h4>Newsletter</h4>
							<p>Subscribe to our newsletter and get 20% off your first purchase</p>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include 'inc/footer.php'; ?>

	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/categories_custom.js"></script>
</body>

</html>