<?php
	$username = $_SESSION['username'];
	require_once("./php/connecttoDB.php");
		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$year = substr($_POST['birthday'], 6,4);
		$month= substr($_POST['birthday'], 3,2);
		$day  = substr($_POST['birthday'], 0,2);
		$birthday = $year."-".$month."-".$day;

	$username = $_SESSION['username'];
	$sql = "UPDATE user SET fullname='$fullname',email='$email',phone='$phone',birthday='$birthday',gender='$gender' WHERE username='$username' ";
	mysqli_query($conn,$sql);

	
		 echo "<script>swal('Cập nhật thông tin User', 'Thông tin đã được thay đổi', 'info').then((click) => {
  if (click) {
   			window.location = 'profile.php';
  }});;</script>";	



?>
		



