




<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="LuxuryWatch - Shop đồng hồ hạng sang đẳng cấp nhất Việt Nam">

	<!-- Test share -->
	<meta name="title" content="Luxury Watch">
	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://luxurywatch1122.000webhostapp.com/">
	<meta property="og:title" content="Luxury Watch">
	<meta property="og:description" content="Đồng hồ mang đậm vẻ đẹp đến từ thương hiệu thời trang hàng đầu thế giới. Đồng hồ nam nữ thời trang.">
	<meta property="og:image" content="https://luxurywatch1122.000webhostapp.com/img/luxurywatch/gucci/gucci-g11.jpg">
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
	<link rel="stylesheet" type="text/css" href="./css/product.css">
	<link rel="stylesheet" href="./css/footer.css">
	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="TncFQsy9"></script>
	<!-- FB -->
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="4GmzziCG"></script>


</head>
<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=2585897151723669&autoLogAppEvents=1" nonce="uMrFeKGR"></script>
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

	<!-- MAIN -->
<?php
	session_start();
	//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
	//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
	if (!isset($_SESSION['token'])&&!isset($_SESSION['fb_access_token'])&&!isset($_SESSION['gmail_access_token'])) {
		 header('Location: login-page.php');
	}

	if (isset($_GET['addtocart'])){
		$_SESSION['id_addtocart'] = $_GET['addtocart'];
		include 'php/home-page/addtocart.php';
	}


	if (!isset($_GET['idproduct'])) {
		 header('Location: index.php');
	}
	else{
		$id = $_GET['idproduct'];
		require_once("./php/connecttoDB.php");
		if(isset($_POST['message'])){	
			include 'php/product-page/write_comment.php';
		}
		include 'php/product-page/load_average_star.php';
		$sql = "SELECT short_description,product_name, stock, price, imagesource, product_brand ,description FROM product WHERE productID='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if (!isset($row)) {
			 header('Location: index.php');
		}
	}
	// Gửi đánh giá
?>
	<main>
		<div class="product-page-title">
			<h1>Product page</h1>
			<a href="#">Home</a>/<a href="#">Collection</a>
		</div>
		<div class="product-detail">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<img class="product-pic" src="<?=$row['imagesource']?>" alt="">
					</div>

					<div class="col-md-7">
						<div class="product-info">
							<h3 class="font-weight-bold"><?=$row['product_name']?></h3>
							<h5 class="font-italic">From <?=$row['product_brand']?></h5>
							<div class="rating-box">
								<ul class="rating">
									<?php $string = str_repeat('<li class="fa fa-star"></li> ',$average_rate);
									?>
									<?=$string?>

								</ul>

								<span class="font-italic"><?=$average_rate?> of <?=$total2?> Reviews</span>
							<!-- 	<div class="like-share">
									<a class="btn-like" href="#"><i class="fa fa-thumbs-up"></i></a>
									<a class="btn-share" href="#"><i class="fa fa-share"></i></a>
								</div> -->
								<br>
								<iframe src="https://www.facebook.com/plugins/like.php?href=https://google.com&width=128&layout=button&action=like&size=small&share=true&height=65&appId=342432456383702" width="128" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

							</div>
							<h1 class="price font-weight-bold pt-2" >
								
									<?php 
									if($row['price']==0){
										echo '<span style="color:red;font-size:50%;">Sản phẩm hết hàng!</span>';
									}else{
										echo '$'.number_format($row['price']/23000,2,'.','');
									}
								?>
								</h1>
							<p class="py-4"><?=$row['short_description']?></p>
							<div class="product-action">

								<a class="add-to-cart" href="?idproduct=<?=$id?>&addtocart=<?=$id?>"><i class="fa fa-cart-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr width="70%">
		<div class="product-description">
			<h1 class="text-center py-4">Description</h1>
			<div class="description">
				<div class="container">
					<?=$row['description']?>
				</div>
			</div>
		</div>
		<hr width="70%">
		<div class="product-comment">
			<div class="comment-and-rating">
				<!-- rating -->
				<div class="container mt-5" id="danhgiasanpham">
					
					<h1 class="text-center py-4">ĐÁNH GIÁ SẢN PHẨM</h1>
					<span>Có </span>
					<span class="comment-count"><?=$total2?></span>
					<span>đánh giá cho sản phẩm này</span>
					<br>
					<br>
					<div class="container rating-group">
						<div class="row rating-group-container">
							
							<!-- Sao trung bình -->
							
							<div class="col-md-4 col-sm-6 rating-group-average">
								<span>Số sao trung bình</span>
								<br>
								<span style="margin-right: 0.5em" class="star-number star-number-average"><?=$average_rate?></span>
								<i class="fas fa-star star-active"></i>
							</div>
							<div class="col-md-4 col-sm-6 rating-group-list">
								<ul class="rating-list">
									<li class="rating-list-item">
										<div>
											<span class="star-number">1</span>
											<i class="fas fa-star star-active"></i>
											<div class="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="70%" aria-valuemin="0" aria-valuemax="100" style="width:<?=(int)(100*$quantity_rate[1]/$total)?>%">
													<?=(int)(100*$quantity_rate[1]/$total)?>%
													<span class="sr-only">100% Complete</span>
												</div>
											</div>
										</div>
									</li>
									<li class="rating-list-item">
										<div>
											<span class="star-number">2</span>
											<i class="fas fa-star star-active"></i>
											<div class="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="70%" aria-valuemin="0" aria-valuemax="100" style="width:<?=(int)(100*$quantity_rate[2]/$total)?>%">
													<?=(int)(100*$quantity_rate[2]/$total)?>%
													<span class="sr-only">100% Complete</span>
												</div>
											</div>
										</div>
									</li>
									<li class="rating-list-item">
										<div>
											<span class="star-number">3</span>
											<i class="fas fa-star star-active"></i>
											<div class="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="70%" aria-valuemin="0" aria-valuemax="100" style="width:<?=(int)(100*$quantity_rate[3]/$total)?>%">
													<?=(int)(100*$quantity_rate[3]/$total)?>%
													<span class="sr-only">100% Complete</span>
												</div>
											</div>
										</div>
									</li>
									<li class="rating-list-item">
										<div>
											<span class="star-number">4</span>
											<i class="fas fa-star star-active"></i>
											<div class="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="70%" aria-valuemin="0" aria-valuemax="100" style="width:<?=(int)(100*$quantity_rate[4]/$total)?>%">
													<?=(int)(100*$quantity_rate[4]/$total)?>%
													<span class="sr-only">100% Complete</span>
												</div>
											</div>
										</div>
									</li>
									<li class="rating-list-item">
										<div>
											<span class="star-number">5</span>
											<i class="fas fa-star star-active"></i>
											<div class="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="70%" aria-valuemin="0" aria-valuemax="100" style="width:<?=(int)(100*$quantity_rate[5]/$total)?>%">
													<?=(int)(100*$quantity_rate[5]/$total)?>%
													<span class="sr-only">100% Complete</span>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="col-md-4 col-sm-6 rating-group-summit">
								<button class="btn btn-success"id="btn-comment-summit">Bình luận sản phẩm</button>
							</div>
						</div>
					</div>
					<div class="select-rating mt-3" id="select-rating" style="display: none;">
						<span>Chọn đánh giá của bạn</span> &nbsp;
						<i class="fas fa-star select-rating-star star-active" id="s1"></i>
						<i class="fas fa-star select-rating-star star-active" id="s2"></i>
						<i class="fas fa-star select-rating-star star-active" id="s3"></i>
						<i class="fas fa-star select-rating-star star-active" id="s4"></i>
						<i class="fas fa-star select-rating-star star-active" id="s5"></i>
					</div>
					<form action="#danhgiasanpham" method="post">
					<div class="comment-group" id="comment-group" style="display:none">
						<input type="hidden" name="rate_value" id="rate_value">
						<textarea class="comment-text-area mt-3" name="message" id="commenttext" cols="50" rows="5" required minlength="10" maxlength="150"></textarea>
						<!-- <a name="" id="btn-send-cmt"  href="javascript:void" role="button">Gửi bình luận</a> -->
						<button type="submit" class="btn btn-success"id="btn-send-cmt">Gửi bình luận</button>
					</div>
					</form>
				</div>
				<!-- end rating -->
				<!-- comment -->
				<div class="container my-2 comment-container">

				</div>
				<!-- end comment -->
				<!-- View all comment button -->
				<!-- <div class="container view-all-comment">
					<button class="btn btn-secondary btn-view-all">Xem tất cả đánh giá</button>
				</div> -->
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
	<!-- Sweet alert -->
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	<!-- Slick JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script>
		$('#commenttext').keyup( function() {
  				$(this).val( $(this).val().replace( /\r?\n/gi, '' ) );
		});
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
		//arr cmt
		
		var cmtArr = [
			<?php include 'php/product-page/load_comment.php';?>
			// {
			// 	"username": "Chương",
			// 	"rating": 4,
			// 	"ratingtime": "Tue Jun 23 2020 17:43:59 GMT+0700 (Giờ Đông Dương)",
			// 	"data": "đồng hồ đẹp"
			// },
			// {
			// 	"username": "Chương",
			// 	"rating": 4,
			// 	"ratingtime": "Tue Jun 23 2020 17:43:59 GMT+0700 (Giờ Đông Dương)",
			// 	"data": "đồng hồ chất lượng"
			// },
			// {
			// 	"username": "Dương",
			// 	"rating": 4,
			// 	"ratingtime": "Tue Jun 23 2020 17:43:59 GMT+0700 (Giờ Đông Dương)",
			// 	"data": "đồng hồ chất lượng"
			// },
		];
		//push object cmt to cmtArr
		// $('#btn-send-cmt').click(function() {
		// 	var cmtData = $('.comment-text-area').val();
		// 	var dt = new Date();
		// 	//var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		// 	//Xu ly rating
		// 	var rating = 1;
		// 	if($('#s1').hasClass('.star-active'))
		// 	{
		// 		rating = rating + 1;
		// 	}
		// 	var newCmt = {
		// 		"username": "Username",
		// 		"rating": 5,
		// 		"ratingtime": dt.toString(),
		// 		"data": cmtData
		// 	}
		// 	//console.log(newCmt);
		// 	cmtArr.push(newCmt);
		// 	addNewcmt(newCmt);
		// 	//console.log(cmtArr);
		// });
		//load cmt
		function addNewcmt(e) {
			$('.comment-container').append('<div class="comment-content py-2 mb-2"><div class="ml-3"><span class="comment-username mr-2">' + e.username + '</span><i class="fas fa-check-circle"></i><span style="color:rgb(2, 189, 2);font-size: 0.8rem;">Đã mua tại LuxuryWatch</span></div><div class="ml-3"><div class="comment-rating"><div class="comment-rating-star">' + e.rating +'</div><div class="comment-rating-time"><span class="buy-time">' + e.ratingtime + '</span></div></div><div class="comment"><span class="comment-data">' + e.data + '</span></div></div></div>');
		};
		$(document).ready(function() {
			$.each(cmtArr, function(i, e) {
				//console.log(e);
				$('.comment-container').append('<div class="comment-content py-2 mb-2"><div class="ml-3"><span class="comment-username mr-2">' + e.username + '</span><i class="fas fa-check-circle"></i><span style="color:rgb(2, 189, 2);font-size: 0.8rem;">Đã mua tại LuxuryWatch</span></div><div class="ml-3"><div class="comment-rating"><div class="comment-rating-star">'+e.rating+'</div><div class="comment-rating-time"><span class="buy-time">' + e.ratingtime + '</span></div></div><div class="comment"><span class="comment-data">' + e.data + '</span></div></div></div>');
			});
		});
		$(document).ready(function() {
			//xu ly btn hien text area cmt
			var flag = 0;
			$("#btn-comment-summit").click(function() {
				if (flag === 0) {
					$("#btn-comment-summit").addClass('btn-close-comment');
					$("#btn-comment-summit").text('Đóng lại');
					$("#select-rating").show();
					flag = 1;
				} else {
					$("#btn-comment-summit").removeClass('btn-close-comment');
					$("#btn-comment-summit").text('Gửi đánh giá');
					$("#comment-group").hide();
					$(".select-rating").hide();
					flag = 0;
				}
			});
			//send cmt
			// $("#btn-send-cmt").click(function() {
			// 	if ($(".comment-text-area").val() === "") 
			// 	{
			// 		swal("Không thể thêm bình luận !", " Comment phải có nội dung", "error");
			// 	} 
			// 	else 
			// 	{
			// 		//end test
			// 		swal("Thêm bình luận thành công !", "Cảm ơn bạn đã để lại bình luận!", "success");
			// 		$("#btn-comment-summit").removeClass('btn-close-comment');
			// 		$("#btn-comment-summit").text('Gửi đánh giá');
			// 		$(".comment-text-area").val("");
			// 		$("#comment-group").hide();
			// 		$("#select-rating").hide();
			// 		flag = 0;
			// 		//Them 1 binh luan
			// 	}
			// })
		});

		//xu ly rating
		$("#s1").hover(function() {
			$("#s2").removeClass("star-active");
			$("#s3").removeClass("star-active");
			$("#s4").removeClass("star-active");
			$("#s5").removeClass("star-active");
			$("#rate_value").val("1");

		});

		$("#s2").hover(function() {
			if (!$("#s2").hasClass("star-active")) {
				$("#s2").addClass("star-active");
			}
			$("#s3").removeClass("star-active");
			$("#s4").removeClass("star-active");
			$("#s5").removeClass("star-active");
			$("#rate_value").val("2");
		});

		$("#s3").hover(function() {
			if (!$("#s3").hasClass("star-active")) {
				$("#s2").addClass("star-active");
				$("#s3").addClass("star-active");
			}
			$("#s4").removeClass("star-active");
			$("#s5").removeClass("star-active");
			$("#rate_value").val("3");
		});

		$("#s4").hover(function() {
			if (!$("#s4").hasClass("star-active")) {
				$("#s2").addClass("star-active");
				$("#s3").addClass("star-active");
				$("#s4").addClass("star-active");
			}
			$("#s5").removeClass("star-active");
			$("#rate_value").val("4");
		});

		$("#s5").hover(function() {
			if (!$("#s5").hasClass("star-active")) {
				$("#s2").addClass("star-active");
				$("#s3").addClass("star-active");
				$("#s4").addClass("star-active");
				$("#s5").addClass("star-active");
			}
			$("#rate_value").val("5");
		});

		$(".select-rating-star").click(function() {
			var flag = 0;
			console.log(flag);
			if (flag === 0) {
				$("#comment-group").show();
				flag = 1;
			} else {
				$("#comment-group").hide();
				flag = 0;
			}
		});
	</script>
</body>
</html>

