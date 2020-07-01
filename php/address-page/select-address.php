<?php

	require_once("./php/connecttoDB.php");
	$id_select = $_GET['selectAddress'];
	$username = $_SESSION['username'];

	$sql = "SELECT transactionID from transaction WHERE userID IN (SELECT userID FROM user WHERE username='$username') ORDER BY transactionID DESC LIMIT 1;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$transactionID = $row['transactionID'];

	$sql2 = "UPDATE transaction SET shipment_infoID='$id_select' WHERE transactionID='$transactionID'";
	mysqli_query($conn, $sql2);
	
	



		 echo "<script>swal('Chọn thông tin đơn hàng thành công!', 'Tiến hành thanh toán đơn hàng', 'success').then((click) => {
  if (click) {
   			window.location = 'checkout.php';
  }});;</script>";

	
  	
?>