<?php
	
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT transactionID,shipment_date FROM transaction WHERE userID IN (SELECT userID FROM user WHERE username='admin') ORDER BY shipment_date DESC ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$transactionID = $row['transactionID'];
			$shipment_date = $row['shipment_date'];
			$sql2 = "SELECT product_name,imagesource,quantity,transaction_detail.price as price FROM transaction_detail,product WHERE transactionID = '$transactionID' AND transaction_detail.productID = product.productID";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) { ?>
					<div class="row history-product">
						<img src="<?=$row2['imagesource']?>" alt="product" class="img-thumbnail img-fluid history-product__img" style="width: 100px;">
						<div class="history-product__name"><?=$row2['product_name']?></div>
						<span style="transform: translateY(30%);">x</span>
						<div class="history-product__quantity"><?=$row2['quantity']?></div>
						<div class="history-product__price">$<?=$row2['price']?></div>
						<span class="history-product__buytime">Ngày mua : <?=$shipment_date?></span>
					</div>	
				<?php }
			}
		}
	}

	$conn->close();
?>