<?php
	require_once("./php/connecttoDB.php");
	$id_del = $_GET['delete'];
	$sql = "DELETE FROM shipment_info WHERE shipment_infoID='$id_del'";
	mysqli_query($conn, $sql);
	

	 echo "<script>swal('Xóa giỏ hàng thành công!', 'Thông tin đã được thay đổi', 'warning').then((click) => {
  if (click) {
   			window.location = 'address.php';
  }});;</script>";	



?>