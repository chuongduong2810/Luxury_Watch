<?php
	
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	// chi tiết đơn hàng
	// bổ sung shipment fee

	?>
	<div class="row history-product-container">

	<?php
	$sql2 = "SELECT product_name,imagesource,quantity,transaction_detail.price as price FROM transaction_detail,product WHERE transactionID = '$transactionID' AND transaction_detail.productID = product.productID";
	$result2 = $conn->query($sql2);
	if ($result2->num_rows > 0) {
		while($row2 = $result2->fetch_assoc()) { ?>
		
			<div class="row history-product-item ml-1">
				<img src="<?=$row2['imagesource']?>" alt="product" class="img-thumbnail img-fluid history-product__img" style="width: 100px;">
				<div class="history-product__name"><?=$row2['product_name']?></div>
				<span style="transform: translateY(30%);">x</span>
				<div class="history-product__quantity"><?=$row2['quantity']?></div>
				<div class="history-product__price">$<?=$row2['price']?></div>
			</div>


		<?php }
	}



	$sql = "SELECT receiver_name,address,phonenumber,price,shipment_date FROM shipment_info AS a,transaction AS b WHERE b.transactionID='$transactionID' AND a.shipment_infoID=b.shipment_infoID";
	$result = $conn->query($sql);
	if ($result2->num_rows > 0) {
		$row = $result->fetch_assoc();
		$shipment_date = $row['shipment_date'];


		?>
			<table class="table mt-3 mr-3" style="text-align: right;">
					<tr>
						<th>Mã đơn hàng</th>
						<td><?=$transactionID?></td>
					</tr>
					<tr>
						<th>Người nhận hàng</th>
						<td><?=$row['receiver_name']?></td>
					</tr>
					<tr>
						<th>Số điện thoại</th>
						<td><?=$row['phonenumber']?></td>
					</tr>
					<tr>
						<th>Địa chỉ nhận hàng</th>
						<td style="max-width: 500px;"><?=$row['address']?></td>
					</tr>
					<tr>
						<th>Thời gian mua hàng</th>
						<td><?=$shipment_date?></td>
					</tr>
					<tr>
						<th>Tổng tiền hàng </th>
						<td>$<?=$row['price']?></td>
					</tr>
					<tr>
						<th>Phí vận chuyển </th>
						<td>$5</td>
					</tr>
					<!-- <tr>
						<th>Giảm giá vận chuyển </th>
						<td>-30.000 đ</td>
					</tr> -->
					<tr>
						<th>Tổng tiền hàng </th>
						<td style="font-weight: 600;font-size: 20px;">$<?=$row['price']+5?></td>
					</tr>
			

		<?php
		
	}
	echo '</table>
				<a href="./history.php" class="btn-back">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
					Quay lại
				</a>
			</div>';
	$conn->close();
?>		