

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Search</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Slick -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

	<!-- Font Awesome CDN -->
	<script src="https://kit.fontawesome.com/255938e5d5.js" crossorigin="anonymous"></script>
	<!-- Custom css -->
	
	<link rel="stylesheet" href="./css/searchresult.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">

	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="TncFQsy9"></script>
</head>
<body>
<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['token'])&&!isset($_SESSION['fb_access_token'])&&!isset($_SESSION['gmail_access_token'])) {
	 header('Location: login-page.php');
}

if (isset($_GET['addtocart'])){
	$_SESSION['id_addtocart'] = $_GET['addtocart'];
	include 'php/search-page/addtocart.php';
	
}


if (isset($_POST['searching']) && $_POST['searching']!=""){

	$keyword = $_POST['searching'];
}
elseif (isset($_GET['keyword'])) {
	$keyword = $_GET['keyword'];
}
else{
	header('Location: index.php');
}



?>
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
	<div class="searchresult-page-title">
		<h1>Search page</h1>
		<a href="./index.php">Home</a>/<a href="#">Search</a>
	</div>
	<main>
	<div class="container" style="margin-top: 1.5rem;">
			<div class="col-sm-12 col-md-12">
				<div class="row">
					<h5 class="mb-4">Kết quả tìm kiếm cho từ khóa </h5>
					<span class="keyword" id="keyword" style="font-weight: 600; margin-left:6px; font-size: 1.1rem;"><?=$keyword?>.</span>
				</div>

				<div class="row mb-3 filter">
					<span class="filter-text">Sắp xếp theo</span>
					<a class="btn filter-btn ml-3" href="?keyword=<?=$keyword?>&type=hotsale" role="button">Hot Sales</a>
					<a class="btn filter-btn ml-3" href="?keyword=<?=$keyword?>&type=atoz" role="button">A-Z</a>
					<a class="btn filter-btn ml-3" href="?keyword=<?=$keyword?>&type=ztoa" role="button">Z-A</a>
					<a class="btn filter-btn ml-3" href="?keyword=<?=$keyword?>&type=newprod" role="button">Mới nhất</a>
					<a class="btn filter-btn ml-3" href="?keyword=<?=$keyword?>&type=pricedown" role="button">Giá cao - thấp</a>
					<a class="btn filter-btn ml-3" href="?keyword=<?=$keyword?>&type=priceup" role="button">Giá thấp - cao</a>
				</div>
				<div class="row">
					<?php 
						if(isset($_GET['type'])){
							if($_GET['type']=='hotsale'){
								include 'php/search-page/load-by-hotsale.php';
							}
							if($_GET['type']=='atoz'){
								include 'php/search-page/load-by-name-asc.php';
							}
							if($_GET['type']=='ztoa'){
								include 'php/search-page/load-by-name-desc.php';
							}
							if($_GET['type']=='newprod'){
								include 'php/search-page/load-by-date-desc.php';
							}
							if($_GET['type']=='pricedown'){
								include 'php/search-page/load-by-price-desc.php';
							}
							if($_GET['type']=='priceup'){
								include 'php/search-page/load-by-price-asc.php';
							}
						}else{
							include 'php/search-page/load-by-keyword.php';
						}
						
					?>
				</div>
				<div class="loadmore">
					<?php
						
						if($count-6>0){
							echo'<a id="btn-loadmore">Xem thêm '.($count-6).' sản phẩm.</a>';
							
						}else{
							echo'<a id="btn-loadmore" href="index.php">Xem thêm trang chủ.</a>';	
						}

					?>	
					
				</div>
	
		<!-- 		<div class="row">
					<div class="pagination mx-auto">
						<a href="#"><i class="fa fa-chevron-left"></i></a>
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#"><i class="fa fa-chevron-right"></i></a>
					</div>
				</div> -->
			</div>

		</div>

	</div>

</main>
<br><br><br><br>
<footer>
	<div class="footer-top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 footer-1">
					<h2>Luxury Watch</h2>
					<p><b>Địa chỉ:</b> Trường Đại học CNTT</p> 
					<p><b>SĐT: </b>0566666666</p>
					<p><b>Email: </b>luxurywatch@gmail.com</p>  
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 footer-2">
					<h2>Về chúng tôi</h2>
					<ul>
						<li><a href="#">Hướng dẫn mua hàng</a></li>
						<li><a href="#">Chính sách bảo hành</a></li>
						<li><a href="#">Chính sách đổi trả</a></li>
						<li><a href="#">Chính sách giao hàng</a></li>
						<li><a href="#">Kiểm định chất lượng</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 footer-3">
					<h2>Theo dõi chúng tôi</h2>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 footer-4">
					<h2>Đăng ký</h2>
					<p>Để lại email để chúng tôi gửi thông báo về những sản phẩm mới nhất.</p>
					<form>
						<input class="email" type="email">
						<input class="submit" type="submit" value="Subcribe">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div>
			<p>All right reserved by Lê Đình Nam © 2020</p>
		</div>
	</div>
</footer>

<!-- Bootstrap JS -->
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" src="js/search-result.js"></script>

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
<script>
	$(document).ready(function(){
		var count = <?=$count-6?>;
		var string;
	    $("#keyword").text("<?=$keyword?> (Hiển thị <?=$count?> sản phẩm)");
		$('#btn-loadmore').click(function(){
			count=count-6;
			if(count>0){
				string = "Xem thêm "+count+" sản phẩm...";
			}else{
				string = "Kết thúc danh mục.";	
			}



			$('#btn-loadmore').text(string);
		});

	});
</script>
</body>
</html>