<!-- Tutorial 
	https://www.youtube.com/watch?v=iMsi1qg1vI8
	-->

<?php
	require_once 'config_fb.php';

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exception\ResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\SDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

try{
	$response = $fb->get('/me?fields=id,name,email,first_name,last_name,picture,gender', $accessToken->getValue());
} catch(Facebook\Exceptions\FacebookResponseException $e){
	echo 'Error';
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e){
	echo 'Error';
	exit;
}
	
	$fbUserData = $response->getGraphUser()->asArray();
	echo "<pre>";
	print_r($fbUserData);
	echo '<a href="./logout.php">Log out FB</a> ';

  require_once("connecttoDB.php");
  $username = array_values($fbUserData)[0];
  $email = array_values($fbUserData)[2];
  $fullname = array_values($fbUserData)[1];
  $token = (string) $accessToken;
  echo $token;
  $sql="select * from user where username='$username'";
  $kt=mysqli_query($conn, $sql);
  if(mysqli_num_rows($kt)  > 0){
    //kiểm tra tài khoản có tồn tại
    $sql="UPDATE user SET 
    token = '$token' WHERE username = '$username'";

  }else{
      $sql = "INSERT INTO user(
      username,
      email,
      fullname,
      token
      ) VALUES (
      '$username',
      '$email',
      '$fullname',
      '$token'
      )";
  // thực thi câu $sql với biến conn lấy từ file connection.php
  
  }
  mysqli_query($conn,$sql);
  echo "<script>swal('Đăng nhập bằng tài khoản Facebook thành công!', 'Đi vào trang chính', 'success');</script>";

  $_SESSION['fb_access_token'] = (string) $accessToken;
  $_SESSION['username'] = $username;
  header('Location: ../index.php');
  
?>