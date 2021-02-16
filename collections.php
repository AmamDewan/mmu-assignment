<?php

	include 'functions/query.php';

	$categoryUrl = $_GET['catagoryId'];

	$categoryQuery = "
		SELECT * 
		FROM product
		WHERE product.id IN (
			SELECT productId
			FROM product_category
			WHERE categoryId = ". $categoryUrl ."
		)
	";


	$categoryProducts = getQueryData($categoryQuery);



	require ("components/header.php");
?>



<section class="sec">	
	<h2 class="header"> Categories Items</h2>
	<?php foreach($categoryProducts as $product) {?>
	<div class="card">
		<p class="inf"><?php echo $product[1] ?></p>
		<img class="img" src="<?php echo $product[4] ?>">
		<p class="inf"><img class="wish" src="img/wishlist.png" >$<?php echo $product[5] ?><img class="cart" src="img/addtocart.png" ></p>
	</div>
	<?php } ?>
</section>

<?php 
	require ("components/footer.php");
?>