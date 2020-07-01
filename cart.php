


<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Luxury Watch</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Slick -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

	<!-- Font Awesome CDN -->
	<script src="https://kit.fontawesome.com/255938e5d5.js" crossorigin="anonymous"></script>
	<!-- Custom css -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/cart.css">
	<link rel="stylesheet" href="./css/footer.css">
	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="TncFQsy9"></script>


</head>
<body>
	<?php
session_start();

if (!isset($_SESSION['token'])&&!isset($_SESSION['fb_access_token'])&&!isset($_SESSION['gmail_access_token'])) {
	 header('Location: login-page.php');
}

//  xoa 1 san pham theo ID
if (isset($_GET['delete'])){
	include 'php/cart-page/delete-from-cart.php';
}
// co san pham trong kho
if(isset($_POST['quantity1'])){
	include 'php/cart-page/cart-to-transaction.php';
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
	<main>
		<div class="product-page-title">
			<h1>My Cart</h1>
		</div>
		<div class="cart">
			<div class="container">
				<div class="cart-table" style="overflow-x:auto;">
					<table>
						<tr style="font-size:1.3rem">
							<th colspan="3" width="50%">Product</th>
							<th width="15%">Price</th>
							<th width="15%">Quantity</th>
							<th width="10%">Total</th>
							<th width="10%"></th>
						</tr>

						<form id="form_Checkout" method="post">
						<?php include 'php/cart-page/load-data-to-cart.php'?>
						
						<tr style="border:none">
							<td colspan="6">
								<div class="total-price">$0</div>
								<input type="hidden" name="totalprice" id="totalprice">
							</td>
						</tr>
						</form>
					</table>
				</div>
				<div class="product-action">
					<a class="add-to-cart" onclick="document.getElementById('form_Checkout').submit()" href="#">Check Out</a>
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

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- Slick JS -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script> -->
	<script>
		// $('input.input-qty').each(function() {
		// 	var $this = $(this),
		// 	qty = $this.parent().find('.is-form'),
		// 	min = Number($this.attr('min')),
		// 	max = Number($this.attr('max'))
		// 	if (min == 0) {
		// 		var d = 0
		// 	} else d = min
		// 	$(qty).on('click', function() {
		// 		if ($(this).hasClass('minus')) {
		// 			if (d > min) d += -1
		// 		} else if ($(this).hasClass('plus')) {
		// 			var x = Number($this.val()) + 1
		// 			if (x <= max) d += 1
		// 		}
		// 	$this.attr('value', d).val(d)
		// 	})
		// });
	</script>
	<script>
		function Sum(){
			var sum = 0;
			var price = document.getElementsByClassName('price');
			var totalPrice = document.getElementsByClassName('total-price');
			for(let i of price){
				sum = Math.round((sum + Number(i.innerHTML.replace('$','')))*100)/100;
			}
			totalPrice[0].innerHTML = '$' + sum;
			document.getElementById("totalprice").value = sum;
		}
	</script>
	<script>
		var sumP = 0;
		Sum();
		$('.product-row').each(function() {
			var $this = $(this),
			price = $this.find('.price'),
			qty = $this.find('.input-qty'),
			uPrice= $this.find('.unit-price')
			//console.log($this.find('.price'))
			//value = qty.attr('value')
			//console.log(value)
			$(qty).change(function(){
				// console.log($(this).val());
				p = Number(price.html().replace('$',''));
				uP = Number(uPrice.html().replace('$',''));
				nP = Math.round((uP * Number(qty.val()))*100)/100;
				price.html('$' + nP);
				Sum();
			})			
		});
	</script>
	
	<script>
		$('.product-row').each(function(){
			var $this = $(this),
			btnDel = $this.find('.remove-product')
			$(btnDel).click(function(){
				// console.log('click')
				// $this.remove();
				// Sum();
			})
		})
	</script>
</body>
</html>

