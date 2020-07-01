<?php
	
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT transactionID,price AS totalprice,shipment_date FROM transaction WHERE userID IN (SELECT userID FROM user WHERE username='admin') ORDER BY shipment_date DESC ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$transactionID = $row['transactionID'];
			$shipment_date = $row['shipment_date'];
			$sql2 = "SELECT product_name,imagesource,quantity,transaction_detail.price as price FROM transaction_detail,product WHERE transactionID = '$transactionID' AND transaction_detail.productID = product.productID";
			?>
			<div class="row history-product-container">
			<?php
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
			?>

			<div class="row bill-total mt-1 ml-2 mr-3">
						<div class="history-product__buytime">Thời gian mua hàng : <?=$shipment_date?></div>
						<div class="bill-total-price">
							<span class="bill-total-text">Tổng giá trị sản phẩm: </span>
							<h3	style="font-weight: 600;">$<?=$row['totalprice']?></h3>
						</div>
				</div>
				<div class="row">
					<a class="btn btn-primary btn-bill-detail" href="./billdetail.php?keyID=<?=$row['transactionID']?>" role="button">Chi tiết đơn hàng</a>
				</div>
			</div>

			<?php
		}
	}

	$conn->close();
?>