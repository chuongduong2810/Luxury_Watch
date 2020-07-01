<?php
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT userID FROM user WHERE username='$username'";
	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$id_addtocart = $_SESSION['id_addtocart'];
	$userID = $row['userID'];

	$sql1 = "SELECT price FROM product WHERE productID='$id_addtocart';";
	$row = $conn->query($sql1)->fetch_assoc();
	if ($row['price']==0){
		echo "<script>swal('Không thể mua sản phẩm này!', 'Sản phẩm đã hết hàng', 'error')</script>";
	}else{
		$sql2 = "INSERT INTO cart (username,productID,quantity)
		VALUES ('$userID','$id_addtocart','1')";
		mysqli_query($conn,$sql2);
	 	echo "<script>swal('Thêm sản phẩm thành công!', 'Sản phẩm đã được thêm vào giỏ hàng', 'success');</script>";	
	}



	

	

?>