<?php
	
	// require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT transactionID,price from transaction WHERE userID IN (SELECT userID FROM user WHERE username='$username') ORDER BY transactionID DESC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$transactionID = $row['transactionID'];
			$totalprice = $row['price'];
			
			$sql2 = "SELECT product_name,imagesource,quantity,transaction_detail.price as price FROM transaction_detail,product WHERE transactionID = '$transactionID' AND transaction_detail.productID = product.productID";
			$result2 = $conn->query($sql2);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) { ?>
                    <div class="row product">
                        <img class="img-fluid product-img" src="<?=$row2['imagesource']?>" alt="" style="height: 100px;">
                        <div class="product-name ml-2"><?=$row2['product_name']?></div>
                        <span>x</span> &nbsp;
                        <div class="product-quantity"><?=$row2['quantity']?></div>
                        <div class="product-price float-right">$<?=$row2['price']?></div>
                    </div>
                    <hr>	
                    <?php				
				}
			}
			?>

            <div class="row temp-total">
                <span>Tạm tính</span>
                <div class="temp-price">$<?=$totalprice?></div>
            </div>
            <div class="row ship-fee">
                <span>Phí vận chuyển</span>
                <div class="temp-price">Miễn phí</div>
            </div>
            <hr>
            <div class="row total">
                <span>Tổng cộng</span>
                <div class="total-price">$<?=$totalprice?></div>
            </div>
            <?php
		}
	}

	$conn->close();
?>