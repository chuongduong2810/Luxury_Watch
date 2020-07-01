<!-- SELECT `productID`,COUNT(*)
FROM transaction_detail      
GROUP BY `productID`; -->

<?php
	// require_once("./php/connecttoDB.php");

	$sql = "SELECT productID, COUNT(*) as Soluong FROM transaction_detail WHERE price != 0 GROUP BY productID ORDER BY Soluong DESC LIMIT 10";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$productID = $row['productID'];


			$sql2 = "SELECT productID, product_name, stock, price, imagesource, product_brand FROM product WHERE productID = '$productID'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch_assoc();?>

			<div class="item">
				<div class="product-grid">
					<div class="product-image">
						<a href="product.php?idproduct=<?=$row2["productID"]?>" class="image">
							<img class="pic-1" src="<?=$row2["imagesource"]?>" alt="">		
						</a>
						<ul class="social">
							<li><a href="product.php"><i class="fa fa-heart"></i></a></li>
							<li><a href="?addtocart=<?=$row2["productID"]?>"><i class="fa fa-shopping-cart"></i></a></li>
						</ul>
						<div class="product-content">
							<h3 class="title"><a href="product.php?idproduct=<?=$row2["productID"]?>"><?=$row2["product_name"]?></a></h3>
						</div>
					</div>
				</div>
			</div>

		<?php }
	}

	// $conn->close();
?>
		



