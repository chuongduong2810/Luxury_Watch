<?php
	
	require_once("./php/connecttoDB.php");
	$username = $_SESSION['username'];
	$sql = "SELECT cartID, productID, quantity FROM cart
	WHERE username IN (SELECT userID FROM user WHERE username='$username')";
	$result = $conn->query($sql);
	$i =0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    
			$i = $i +1;
			$productID = $row['productID'];

			$quantity = $row['quantity'];
			$cartID = $row['cartID'];

			$sql2 = "SELECT product_name,price,imagesource,short_description FROM product WHERE productID='$productID'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch_assoc();?>
			<tr class="product-row">
				<td width="5%"><?=$i?></td>
				<td width="15%">
					<div class="product-pic">
						<img src="<?=$row2["imagesource"]?>" alt="">
					</div>
				</td>
				<td width="40%">
					<div class="product-info">
						<p class="font-weight-bold"><?=$row2["product_name"]?></p>
						<p><?=substr($row2["short_description"],0,50)?></p>
					</div>
				</td>
				<?php $row2['price']=number_format($row2['price']/230000,2,'.','')?>
				<td width="15%" class="unit-price">$<?=$row2['price']?></td>
				<td width="15%">
					<div class="input-group">
						<div class="mx-auto">
							<div class="input-group"> 
								<div class="input-group"> 
									<input aria-label="quantity" class="input-qty" max="99" min="1" name="quantity<?=$i?>" type="number" value="<?=$quantity?>">
									<input type="hidden" name="productID<?=$i?>" value="<?=$productID?>">
								
								</div>
							</div>
						</div>
					</div>
				</td>
				<td width="10%" class="price">$<?=$row2["price"]*$quantity?></td>
				<input type="hidden" name="totalprice<?=$i?>" value="<?=$row2["price"]*$quantity?>">
				<td width="10%">
					<button class="remove-product"><a href="?delete=<?=$cartID?>">X</a></button>
				</td>
			</tr>
				


		<?php }
	}

	$conn->close();
?>
		



