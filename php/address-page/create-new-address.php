<?php
	require_once("./php/connecttoDB.php");
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];

	$username = $_SESSION['username'];

	$sql = "INSERT INTO shipment_info(userID,phonenumber,address,receiver_name) SELECT userID,'$phone','$address','$fullname' FROM user WHERE username='$username';";
	mysqli_query($conn, $sql);
	

	 echo "<script>swal('Tạo thông tin mới thành công!', 'Thông tin đã được thêm vào danh sách', 'success').then((click) => {
  if (click) {
   			window.location = 'address.php';
  }});;</script>";	



	$conn->close();
?>