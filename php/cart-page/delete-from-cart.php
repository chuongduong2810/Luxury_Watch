<?php
	require_once("./php/connecttoDB.php");
	$id_del = $_GET['delete'];
	$sql = "DELETE FROM cart WHERE cartID='$id_del'";
	mysqli_query($conn, $sql);
	

		 echo "<script>swal('Danh sách giỏ hàng đã bị thay đổi!', 'Sản phẩm đã bị xóa khỏi giỏ hàng', 'warning').then((click) => {
  if (click) {
   			window.location = 'cart.php';
  }});;</script>";	


	// $conn->close();
?>