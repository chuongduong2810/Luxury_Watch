<?php
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
		$totalprice=$_POST['totalprice'];
		// Tao transaction
		$sql="INSERT INTO transaction (userID,price,shipment_date) SELECT userID,'$totalprice',current_timestamp() FROM user WHERE username='$username'";
		mysqli_query($conn,$sql);

		$sql="SELECT transactionID,userID from transaction WHERE userID IN (SELECT userID FROM user WHERE username='$username') ORDER BY transactionID DESC LIMIT 1; ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$transactionID = $row['transactionID'];
		$userID = $row['userID'];
		
		
		// them cart vao transaction detail
	$i = 1;
	while(1) {
		if(isset($_POST['quantity'.$i])){
			$quantity = $_POST['quantity'.$i];
			$productID = $_POST['productID'.$i];
			$totalprice = $_POST['totalprice'.$i];
			
			$sql="INSERT INTO transaction_detail (transactionID,productID,quantity,price) VALUES ('$transactionID','$productID','$quantity','$totalprice')";
			mysqli_query($conn,$sql);
			$i++;
		}	
		else {
			break;
		}
	}

	
	$_SESSION['transaction'] = $transactionID;
	

		 echo "<script>swal('Duyệt giỏ hàng thành công!', 'Tiến hành chọn thông tin giao hàng', 'success').then((click) => {
  if (click) {
   			window.location = 'address.php';
  }});;</script>";	

?>

