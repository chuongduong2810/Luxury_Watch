<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login or Sign up</title>
	<script src="https://kit.fontawesome.com/255938e5d5.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/login-page.css">
	<!-- Sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	

</head>
<body>
<?php	
		require_once './php/config_emaillogin.php';
		require_once './php/config_fb.php';
        require_once("./php/connecttoDB.php");
			$username = "";
            $phone = "";
            $email = "";
        //Task đăng ký
        if (isset($_POST["btn_submit"])) {
            //lấy thông tin từ các form bằng phương thức POST
            $username = $_POST["username"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
           

            //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
            if ($password != $repassword) {
            		echo "<script>swal('Không thể đăng ký tài khoản!', 'Mật khẩu không hợp lệ', 'error');</script>";	

            }else{
                    // Kiểm tra tài khoản đã tồn tại chưa
                    $sql="select * from user where username='$username'";
                    $sql2="select * from user where email='$email'";
                    $kt=mysqli_query($conn, $sql);
                    $kt2=mysqli_query($conn, $sql2);

                    if(mysqli_num_rows($kt)  > 0){
                    	
                   		echo "<script>swal('Không thể đăng ký tài khoản!', 'Tài khoản này đã tồn tại', 'error');</script>";	
                    }
                    else if(mysqli_num_rows($kt2)  > 0){
                    	echo "<script>swal('Không thể đăng ký tài khoản!', 'Email này đã được sử dụng', 'error');</script>";	
                        
                    }
                    else{
                        //thực hiện việc lưu trữ dữ liệu vào db
                        $password = md5($password);
                        
                        $sql = "INSERT INTO user(username,password,phone,email) VALUES ('$username','$password','$phone','$email')";
                        // thực thi câu $sql với biến conn lấy từ file connection.php
                        mysqli_query($conn,$sql);
                    
                        echo "<script>swal('Đăng ký tài khoản!', 'Bạn có thể đăng nhập ngay lúc này', 'success');</script>";	

                    }
                                        
                    
            }
    	}
    	//Task Đăng nhập
    	if (isset($_POST["btn_login"])) {
        // lấy thông tin người dùng
        $username = $_POST["username"];
        $password = $_POST["password"];
        //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
        //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        
        $password = md5($password);
        $sql = "select * from user where username = '$username' and password = '$password' ";
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
        	echo "<script>swal('Không thể đăng nhập vào tài khoản!', 'Tên đăng nhập hoặc mật khẩu không hợp lệ', 'error');</script>";	

        }else{
        	$token = md5(time().$password);
        	$sql="UPDATE user SET  token = '$token' WHERE username = '$username'";
			mysqli_query($conn,$sql);
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['token'] = $token;
            $_SESSION['username'] = $username;

            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
 

            
            echo "<script>swal('Đăng nhập vào tài khoản thành công!', 'Đi vào trang chính', 'success').then((click) => {
  if (click) {
   			window.location = 'index.php';
  }});;</script>";
  			
        }
        
    	}

    	// đăng nhập bằng gmail

		//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
		if(isset($_GET["code"]))
		{
		 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

		 if(!isset($token['error']))
		 {
		  //Set the access token used for requests
		  $google_client->setAccessToken($token['access_token']);
		  //Store "access_token" value in $_SESSION variable for future use.
		  $_SESSION['gmail_access_token'] = $token['access_token'];
		  //Create Object of Google Service OAuth 2 class
		  $google_service = new Google_Service_Oauth2($google_client);
		  //Get user profile data from google
		  $data = $google_service->userinfo->get();
		  //Below you can find Get profile data and store into $_SESSION variable
		  if(!empty($data['given_name']))
		  {
		   $_SESSION['username'] = $data['given_name'];
		  }
		  if(!empty($data['family_name']))
		  {
		   $_SESSION['user_last_name'] = $data['family_name'];
		  }
		  if(!empty($data['email']))
		  {
		   $_SESSION['user_email_address'] = $data['email'];
		  }
		  if(!empty($data['id']))
		  {
		   $_SESSION['id'] = $data['id'];
		   header('Location: php/xulyDangnhapEmail.php');
		  } 
		 }

		}

?>


	<!-- <div class="login-page"> -->
		<div class="form">
			<div id="form-login">
				<div class="logo">
					<a href="#"><i class="far fa-gem"></i></a>
				</div>
				<div class="title">
					<p>Sign in</p>
				</div>
				<form action="#" method="post" id="login_form">
				<div class="input-field">
					<div class="field">
						<span class="icon"><i class="fa fa-user"></i></span>
						<input class="username" type="text" name="username" placeholder="Username" required>
						<span class="border"></span>
					</div>
					<div class="field">
						<span class="icon"><i class="fa fa-lock"></i></span>
						<input class="password" type="password" name="password" placeholder="Password" required>
					</div>
					<div class="forgot-pass">
						<a href="#">Forgot password</a>
					</div>
					<input type="submit" class="btn-login" name="btn_login" value="Login"></input>
				</div>
				</form>
				<div class="social">
					<p>or login using</p>
					<div class="social-icon">
						<a href="<?=$loginUrl?>" class="icon-fb"><i class="fa fa-facebook"></i></a>
						<a href="<?=$google_client->createAuthUrl()?>" class="icon-gg"><i class="fa fa-google"></i></a>
					</div>
					<!-- <p>don't have account? <a href="" class="create" onclick="create()">Create account <i class="fa fa-chevron-circle-right"></i></a></p> -->
					<p>don't have account? <button class="create" onclick="create()">Create account <i class="fa fa-chevron-circle-right"></i></button></p>
				</div>
			</div>
			<div id="form-create">
				<button onclick = "login()" class="return"><i class="fa fa-chevron-circle-left"></i> return to login page</button>
				<div class="title">
					<p>Create account</p>
				</div>
				<form action="#" method="post" id="register_form">
				<div class="input-field">
					<div class="field">
						<span class="icon"><i class="fa fa-user"></i></span>
						<input class="username" type="text" placeholder="Username" name="username" value="<?=$username?>"required pattern="[A-Za-z0-9_]{1,15}"title="Tên tài khoản không quá 15 ký tự và ký tự đặc biệt">
						<span class="border"></span>
					</div>
					<div class="field">
						<span class="icon"><i class="fas fa-envelope"></i></span>
						<input class="email" type="text" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required value="<?=$email?>">
						<span class="border"></span>
					</div>
					<div class="field">
						<span class="icon"><i class="fa fa-lock"></i></span>
						<input class="password" type="password" placeholder="Password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Mật khẩu chứa ít nhất 1 con số, 1 chữ HOA và trên 8 kí tự">
					</div>
					<div class="field">
						<span class="icon"><i class="fa fa-lock"></i></span>
						<input class="re-password" type="password" placeholder="Confirm password" name="repassword" title="Nhập lại đúng Mật khẩu trên">
					</div>
					<div class="field">
						<span class="icon"><i class="fas fa-envelope"></i></span>
						<input class="phone" type="text" placeholder="Phone number" name="phone" pattern="[0-9]{9,11}" title="SĐT từ 10 đến 11 chữ số" value="<?=$phone?>">
						<span class="border"></span>
					</div>
					<input type="submit" class="btn-create" name="btn_submit" value="Create"></input>
				</div>
				</form>
			</div>
		</div>
		<!-- </div> -->
		<script>
			var z = document.getElementById("form-login");
			var w = document.getElementById("form-create");
			console.log(z.style.display);
			function create(){
				w.style.left = "0";
				z.style.left = "-28.75rem";
			}

			function login(){
				z.style.left = "0";
				w.style.left = "28.75rem";
			}
		</script>
	</body>
	</html>