<?php
	require_once("./php/connecttoDB.php");

	$sql = "SELECT productID, product_name, stock, price, imagesource, product_brand FROM product WHERE product_name LIKE '%{$keyword}%' ORDER BY added_date DESC";
	$result = $conn->query($sql);
	$count = $result->num_rows;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {    ?>
		<div class="col-sm-12 col-md-6 col-lg-4">
			<!-- product_brand -->

			<div class="product-grid <?=$row["product_brand"]?>">
				<div class="product-image">
					<!-- product.php?idproduct= -->
					<a href="product.php?idproduct=<?=$row["productID"]?>" class="image">
						<!-- imagesource -->
						<img class="pic-1" src="<?=$row["imagesource"]?>" alt="">		
					</a>
					<ul class="social">
						<li><a href="#"><i class="fa fa-heart"></i></a></li>
						<li><a href="?keyword=<?=$keyword?>&addtocart=<?=$row["productID"]?>"><i class="fa fa-shopping-cart"></i></a></li>
					</ul>
				</div>
				<div class="product-content">
					<!-- product_name -->
					<h3 class="title"><a href="product.php?idproduct=<?=$row["productID"]?>"><?=$row["product_name"]?></a></h3>
					<!-- price/ -->
					<div class="price">	<?php 
						if($row['price']==0){
							echo '<span style="color:red">Sản phẩm hết hàng!</span>';
						}else{
							echo '$'.number_format($row['price']/23000,2,'.','');
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
