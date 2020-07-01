<?php
	
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT shipment_infoID, phonenumber, address, receiver_name FROM shipment_info
	WHERE userID IN (SELECT userID FROM user WHERE username='$username')";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {   ?> 
			<div class="row mb-4">
				<div class="col-md-2 right-part__body-label">
					<label for="">Người nhận</label>
					<label for="">Số điện thoại</label>
					<label for="">Địa chỉ</label>
				</div>
				<div class="col-md-8 ml-4 right-part__body-info">
					<div class="row">
						<span class="ml-3"><?=$row['receiver_name']?></span>

					</div>
					<span><?=$row['phonenumber']?></span> <br>
					<span>
						<?=$row['address']?>
					</span>
				</div>
				<div class="col-md-2 right-part__body-btn">
					<div class="row right-part__body-btn-1">
						<!-- <a href="#" class="mr-4" >Sửa</a> -->
						<a href="?delete=<?=$row['shipment_infoID']?>" >Xóa</a>
					</div>
					<button onclick="window.location.href='http://localhost/luxury/address.php?selectAddress=<?=$row['shipment_infoID']?>';" type="button" class="btn btn-primary right-part__body-btn-2 btn-block">Địa chỉ nhận hàng</button>

				</div>
				<hr>
			</div>
			<hr>	
		
				


		<?php }
	}

	$conn->close();
?>
		
