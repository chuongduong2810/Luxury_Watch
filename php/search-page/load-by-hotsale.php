<?php
	require_once("./php/connecttoDB.php");

	$sql = "SELECT productID, COUNT(*) as Soluong FROM transaction_detail GROUP BY productID ORDER BY Soluong DESC";
	$result = $conn->query($sql);
	$count = $result->num_rows;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$productID = $row['productID'];


			$sql2 = "SELECT productID, product_name, stock, price, imagesource, product_brand FROM product WHERE productID = '$productID'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch_assoc();?>

				<div class="col-sm-12 col-md-6 col-lg-4">
					<!-- product_brand -->

					<div class="product-grid <?=$row2["product_brand"]?>">
						<div class="product-image">
							<!-- product.php?idproduct= -->
							<a href="product.php?idproduct=<?=$row2["productID"]?>" class="image">
								<!-- imagesource -->
								<img class="pic-1" src="<?=$row2["imagesource"]?>" alt="">		
							</a>
							<ul class="social">
								<li><a href="#"><i class="fa fa-heart"></i></a></li>
								<li><a href="?keyword=<?=$keyword?>&addtocart=<?=$row2["productID"]?>"><i class="fa fa-shopping-cart"></i></a></li>
							</ul>
						</div>
						<div class="product-content">
							<!-- product_name -->
							<h3 class="title"><a href="product.php?idproduct=<?=$row2["productID"]?>"><?=$row2["product_name"]?></a></h3>
							<!-- price/ -->
							<div class="price">	<?php 
						if($row2['price']==0){
							echo '<span style="color:red">Sản phẩm hết hàng!</span>';
						}else{
							echo '$'.number_format($row2['price']/23000,2,'.','');
						}
					?></div>
							<ul class="rating">
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
								<li class="fa fa-star"></li>
							</ul>
						</div>
					</div>
				</div>

		<?php }
	}
	$conn->close();
?>
		



