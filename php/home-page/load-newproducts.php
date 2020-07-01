<?php
	require_once("./php/connecttoDB.php");

	$sql = "SELECT productID, product_name, stock, price, imagesource, product_brand FROM product WHERE price != 0 ORDER BY added_date DESC 
	LIMIT 10";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    ?>
			<div class="item">
				<div class="product-grid">
					<div class="product-image">
						<a href="product.php?idproduct=<?=$row["productID"]?>" class="image">
							<img class="pic-1" src="<?=$row["imagesource"]?>" alt="">		
						</a>
						<ul class="social">
							<li><a href="product.php"><i class="fa fa-heart"></i></a></li>
							<li><a href="?addtocart=<?=$row["productID"]?>"><i class="fa fa-shopping-cart"></i></a></li>
						</ul>
						<div class="product-content">
							<h3 class="title"><a href="product.php?idproduct=<?=$row["productID"]?>"><?=$row["product_name"]?></a></h3>
						</div>
					</div>
				</div>
			</div>

		<?php }
	}

	// $conn->close();
?>
		



