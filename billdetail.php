<?php
session_start();

if (!isset($_SESSION['token'])&&!isset($_SESSION['fb_access_token'])&&!isset($_SESSION['gmail_access_token'])) {
	 header('Location: login-page.php');
}
if(!isset($_GET['keyID'])){
 	header('Location: history.php');
 	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Luxury Watch</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Date picker -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
	<!-- Slick -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

	<!-- Font Awesome CDN -->
	<script src="https://kit.fontawesome.com/255938e5d5.js" crossorigin="anonymous"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="TncFQsy9"></script>
	<!-- Custom css -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/profile.css">
	<link rel="stylesheet" type="text/css" href="./css/cart.css">
	<link rel="stylesheet" href="./css/history.css">
	<link rel="stylesheet" href="./css/footer.css">
</head>
<body>
	<!-- Header -->
	<header>
		<div class="row">
			<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
				<div class="container">
					<!-- Brand -->
					<a href="#" class="navbar-brand">
						<i class="far fa-gem"></i>
						<span class="h2 my-md-3 site-title">Luxury Watch</span>
					</a>
					<!-- Toggler/collapsibe Button -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navbar links -->
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav mx-auto mx-4">
							<li class="nav-item active">
								<a class="nav-link" href="./index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./index.php#collection">Collection</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="./index.php#footer">Contact</a>
							</li>
							<li class="nav-item hide">
								<a class="nav-link" href="./profile.php">Account</a>
							</li>
							<li class="nav-item hide">
								<a class="nav-link" href="./cart.php">Cart</a>
							</li>
						</ul>
						<form class="form-inline" action="./searchresult.php" method="post">
							<input class="form-control" name="searching" type="search" placeholder="Nhập tên đồng hồ..." aria-label="Search" value="">
							<button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="btn-search">
								<i class="fa fa-search"></i>
							</button>
						</form>
						<div class="icons">
							<a href="profile.php"><img src="img/user.svg" id="user-icon"></a>
							<a href="cart.php"><img src="img/cart.svg" id="cart-icon"></a>
						</div>				
					</div>
				</div>
				
			</nav>

		</div>
		
	</header>
	<!-- End Header -->
	<main>
		<div class="profile-page-title">
			<h1>Profile</h1>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="row left-header">
						<img src="./img/avatar-png-1.png" alt="avt" class="rounded-circle img-fluid left-header__avatar">
						<div class="left-header__right">
							<strong>Username</strong>
							<div class="left-header__right-edit">
								<a href="#">
									<i class="fas fa-edit"></i> Sửa hồ sơ
								</a>
							</div>
						</div>
					</div>
					<hr>
					<br>
					<div class="left-body">
						<ul class="left-body__main-list">
							<li class="left-body__main-list-profile">
								<a href="./profile.php" class="">
									<i class="fa fa-user-circle user-icon" aria-hidden="true"></i>
									Tài khoản của tôi
								</a> 
								<ul class="left-body__main-list-profile-container">
									<li><a href="./profile.php" class="mb-2">Hồ sơ</a></li>
									<li><a href="./address.php" class="mb-2">Địa chỉ</a></li>
									<li><a href="./passwordchange.php" class="mb-2">Đổi mật khẩu</a></li>
								</ul>
							</li>
							<li class="left-body__main-list-history">
								<a href="#" class="active">
									<i class="fa fa-history history-icon" aria-hidden="true"></i>
									Lịch sử mua hàng
								</a>
							</li>
							<hr>
							<li class="left-body__sign-out">
								<a href="./logout.php">
									<i class="fa fa-sign-out-alt"></i>
									Sign out
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 right-part">
					<div class="right-part__header">
						<h3>Lịch sử mua hàng</h3>
						<span>Thông tin các sản phẩm đã mua</span>
						<hr>
					</div>
					<div class="right-part__body">
						<div class="container">
							<!-- load history -->
							<?php 
								$transactionID = $_GET['keyID'];
								include 'php/history-page/load-detail-transaction.php';
							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<br><br><br><br>

	<!-- Footer -->
<footer>
	<div class="footer-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 footer-1">
					<a href="#" class="navbar-brand">
						<i class="far fa-gem"></i>
						<!-- <img src="./img/logo-lux-demo.png" alt="logo" class="nav-logo"> -->
						<span class="h2 my-md-3 site-title">Luxury Watch</span>
					</a>
					<p><b>Địa chỉ:</b> Trường Đại học CNTT</p> 
					<p><b>Điện thoại: </b>0566666666</p>
					<p><b>Email: </b>luxurywatch@gmail.com</p>  
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 footer-2">
					<h2>Hướng dẫn</h2>
					<ul>
						<li><a href="#">Hướng dẫn mua hàng</a></li>
						<li><a href="#">Chính sách bảo hành</a></li>
						<li><a href="#">Chính sách đổi trả</a></li>
						<li><a href="#">Chính sách giao hàng</a></li>
						<li><a href="#">Kiểm định chất lượng</a></li>
					</ul>
				</div>
				<!-- <div class="col-md-3 col-sm-6 col-xs-12 footer-3">
					<h2>Theo dõi chúng tôi</h2>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div> -->
				<div class="col-md-3 col-sm-6 col-xs-12 footer-3">
					<h2>Liên hệ với chúng tôi</h2>
					<a href="https://www.facebook.com/luxurywatch9"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 footer-4">
					<div class="fb-page" data-href="https://www.facebook.com/Luxury-Watch-107140461046811/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Luxury-Watch-107140461046811/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Luxury-Watch-107140461046811/">Luxury Watch</a></blockquote></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div>
			<p>All right reserved Luxury Watch</p>
		</div>
	</div>
</footer>
	<!-- End footer -->

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- Slick JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script>
		$(".slider").slick({
			centerMode: true,
			slidesToShow: 4,
			dots: true,
			autoplay: true,
			autoplaySpeed: 2000,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 994,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 680,
				settings: {
					slidesToShow: 1
				}
			} 
			]
		},)
	</script>
	<script type="text/javascript">
		$('#datepicker').datepicker({
			weekStart: 1,
			daysOfWeekHighlighted: "6,0",
			autoclose: true,
			todayHighlight: true,
		});
		$('#datepicker').datepicker("setDate", new Date());
	</script>
	<script>
		$(document).ready(function () {
			$('#btn-upload-avt').click(function () {
				$('#input-upload').click();
			})
			//Preview avatar upload
			function readURL(input) {
			if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function(e) {
					$('#avt-preview').attr('src', e.target.result);
					}
					
					reader.readAsDataURL(input.files[0]); // convert to base64 string
				}
			}

			$("#input-upload").change(function() {
				readURL(this);
			});

			//Change email,phone number
			$('#btn-change-email').click(function () { 
				$('#btn-change-email').hide();
				$('#email-change-text').hide();
				$('#email-change-input').show();
			})
			$('#btn-change-number').click(function () { 
				$('#btn-change-number').hide();
				$('#number-change-text').hide();
				$('#number-change-input').show();
			})
		});
		
	</script>
</body>
</html>

