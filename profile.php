
	
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
	<!-- Custom css -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/profile.css">
	<link rel="stylesheet" type="text/css" href="./css/cart.css">
	<link rel="stylesheet" href="./css/footer.css">
	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=342432456383702&autoLogAppEvents=1" nonce="TncFQsy9"></script>

</head>
<body>
	<?php
	session_start();

	if(isset($_POST['fullname'])){
		
		include 'php/profile-page/save-profile.php';
		
		include 'php/profile-page/save-image.php';

	}
	
	include 'php/profile-page/load-data-profile.php';
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
		<div class="profile-page-title">
			<h1>Profile</h1>
		</div>
		<div class="container">
			
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="row left-header">
						<img src="./img/avatar_profile/<?=$row['ImageURL']?>" alt="avt" class="rounded-circle img-fluid left-header__avatar">
						<div class="left-header__right">
							<strong><?=$row["username"]?></strong>
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
								<a href="#" class="active">
									<i class="fa fa-user-circle user-icon" aria-hidden="true"></i>
									Tài khoản của tôi
								</a> 
								<ul class="left-body__main-list-profile-container">
									<li><a href="./profile.php" class="mb-2 active">Hồ sơ</a></li>
									<li><a href="./address.php" class="mb-2">Địa chỉ</a></li>
									<li><a href="./passwordchange.php" class="mb-2">Đổi mật khẩu</a></li>
								</ul>
							</li>
							<li class="left-body__main-list-history">
								<a href="./history.php">
									<i class="fa fa-history history-icon" aria-hidden="true"></i>
									Lịch sử mua hàng
								</a>
							</li>
							<hr>
							<li class="left-body__sign-out">
								<a href="./logout.php">
									<i class="fa fa-sign-out-alt"></i>
									<span style="color:red">Sign out</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 col-sm-9 right-part">
					<div class="right-part__header">
						<h3>Hồ sơ của tôi</h3>
						<span>Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
						<hr>
					</div>
					<form id="form_Saveprofile" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-9 right-part__body">
							
							<div class="form-group">
								<div class="row info-input">
									<label for="">Tên đăng nhập</label> 
									<span><?=$row["username"]?></span>
								</div>
								<div class="row info-input">
									<label for="">Tên</label> 
									<input class="input-long" name="fullname" type="text" value="<?=$row["fullname"]?>">
								</div>
	
								<div class="row info-input">
									<label for="">Email</label> 
									<span id="email-change-text"><?=$row["email"]?></span>
									<input class="input-long" id="email-change-input" type="text" style="display: none;" name="email" value="<?=$row["email"]?>">
									<i class="fas fa-times" id="btn-cancel-change-email" style="display: none;"></i>
									<a id="btn-change-email" class="ml-3" href="javascript:void(0);">Thay đổi</a>
								</div>
	
								<div class="row info-input">
									<label for="">Số điện thoại</label> 
									<span id="number-change-text"><?=substr($row["phone"],0,7)?>****</span>
									<input class="input-long" id="number-change-input" type="text" style="display: none;" name="phone" value="<?=$row["phone"]?>" >
									<i class="fas fa-times" id="btn-cancel-change-number" style="display: none;"></i>
									<a id="btn-change-number" class="ml-3" href="javascript:void(0);">Thay đổi</a>
								</div>
								<?php 
									$checkmale ="";$checkfemale ="";$checkother ="";
									if ($row["gender"] == "male") $checkmale = "checked";
									elseif ($row["gender"] == "female") $checkfemale = "checked";
									else $checkother = "checked";
								?>
								<div class="row info-input">
									<label for="">Giới tính</label>
									<div class="form-check">
										<label class="form-check-label gender-label">
										<input type="radio" class="form-check-input" name="gender" id="" value="Male" <?=$checkmale?>>
										Nam
									  </label>
									</div>
									
									<div class="form-check">
										<label class="form-check-label gender-label">
										<input type="radio" class="form-check-input" name="gender" id="" value="Female" <?=$checkfemale?>>
										Nữ
									  </label>
									</div>
									
									<div class="form-check">
										<label class="form-check-label gender-label">
										<input type="radio" class="form-check-input" name="gender" id="" value="Other" <?=$checkother?>>
										Khác
									  </label>
									</div>
								</div>
								<div class="row info-input">
									<label for="">Ngày sinh</label> 
									<input class="input-long" data-date-format="dd/mm/yyyy" id="datepicker" name="birthday">
								</div>

								<button onclick="document.getElementById('form_Saveprofile').submit()" type="submit" class="btn btn-success btn-save">Lưu</button>
							</div>
							
						</div>
						<div class="col-md-3 right-part__avatar">
							<div class="avatar-uploader">
								
									<div class="avatar-uploader__img">
										<img id="avt-preview" class="img-fluid rounded-circle" style="width: 200px;" src="./img/avatar_profile/<?=$row['ImageURL']?>" alt="avatar">
									</div>
									<input type="hidden" name="size" value="1000000">
									<input type="hidden" name="ImageURL" value="<?=$row['ImageURL']?>">
									<input type="file" id="input-upload" style="display: none;" name="image">
									<button type="button" id="btn-upload-avt" class="btn btn-success btn-select-avt btn-block mt-4" value="0">Chọn ảnh</button>
								
								<div class="avatar-uploader__text mt-2">Dung lượng tối đa 1 MB</div>
								<div class="avatar-uploader__text">Định dạng:.JPEG, .PNG</div>

							</div>
						</div>
				</div>
				</form>
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
	<?php 	$conn->close(); ?>
	<!-- Footer -->

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
		<?php
			$year = substr($row['birthday'], 0,4);
			$month= substr($row['birthday'], 5,2)-1;
			$day  = substr($row['birthday'], 8,2);
		?>
		$('#datepicker').datepicker("setDate", new Date(<?=$year?>, <?=$month?>, <?=$day?>));
		// $("#datepicker").datepicker().val(); => theo format

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
				$('#email-change-input').val($('#email-change-text').text());
				$('#btn-cancel-change-email').show();
			})
			$('#btn-change-number').click(function () { 
				$('#btn-change-number').hide();
				$('#number-change-text').hide();
				$('#number-change-input').show();
				$('#number-change-input').val($('#number-change-input').val());
				$('#btn-cancel-change-number').show();

			})

			//Btn-cancel
			$('#btn-cancel-change-email').click(function () {
				$('#email-change-text').text($('#email-change-input').val());
				$('#btn-change-email').show();
				$('#email-change-text').show();
				$('#email-change-input').hide();
				$('#btn-cancel-change-email').hide();
			  })

			$('#btn-cancel-change-number').click(function () {
				$('#number-change-text').text($('#number-change-input').val());
				$('#btn-change-number').show();
				$('#number-change-text').show();
				$('#number-change-input').hide();
				$('#btn-cancel-change-number').hide();
			})



		});
		
	</script>
</body>
</html>

