<?php
session_start();
echo $_SESSION['username']." ".$_SESSION['user_last_name'];
echo $_SESSION['user_email_address'];
echo $_SESSION['id'];
echo $_SESSION['gmail_access_token'];

  require_once("connecttoDB.php");
  $username = $_SESSION['id'];
  $email = $_SESSION['user_email_address'];
  $fullname = $_SESSION['username']." ".$_SESSION['user_last_name'];
  $token = $_SESSION['gmail_access_token'];

  $sql="select * from user where username='$username'";
  $kt=mysqli_query($conn, $sql);
  if(mysqli_num_rows($kt)  > 0){
    //kiểm tra token có tồn tại
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
  echo "<script>swal('Đăng nhập bằng tài khoản Gmail thành công!', 'Đi vào trang chính', 'success');</script>";
  
  $_SESSION['username'] = $username;
  header('Location: ../index.php');

?>