<?php

	include 'functions/query.php';

  $menQuery = "
		SELECT * 
		FROM product
		WHERE product.id IN (
			SELECT productId
			FROM product_category
			WHERE categoryId = 1
		)
	";
  $womenQuery = "
		SELECT * 
		FROM product
		WHERE product.id IN (
			SELECT productId
			FROM product_category
			WHERE categoryId = 2
		)
	";
  $kidsQuery = "
		SELECT * 
		FROM product
		WHERE product.id IN (
			SELECT productId
			FROM product_category
			WHERE categoryId = 3
		)
	";

	$collectionQuery = "
			SELECT * 
			FROM category
	";

	function insertQuery($sql){
		$mysqli = new mysqli("localhost","root","","eshop");

		$result = $mysqli->query($sql);

		$mysqli -> close();

	}

	$menProducts = getQueryData($menQuery);
	$womenProducts = getQueryData($womenQuery);
	$kidsProducts = getQueryData($kidsQuery);

	$collections = getQueryData($collectionQuery);


	require ("components/header.php");
?>

<section class="sec">	
	<h2 class="header"> Collection </h2>

	<?php foreach($collections as $collection) {?>
	<div class="card">
		<p class="inf"><?php echo ucfirst($collection[2]) ?> Collection</p>
		<img class="img" src="<?php echo $collection[4] ?>">
		<p class="inf"><a href="collections.php?catagoryId=<?php echo $collection[0] ?>">View More</a></p>
	</div>
	<?php } ?>
</section >
	
<section class="sec">	
	<h2 class="header"> Kids </h2>
	<?php foreach($kidsProducts as $product) {?>
	<div class="card">
		<p class="inf"><?php echo $product[1] ?></p>
		<img class="img" src="<?php echo $product[4] ?>">
		<p class="inf"><img class="wish" src="img/wishlist.png" >$<?php echo $product[5] ?><img class="cart" src="img/addtocart.png" ></p>
	</div>
	<?php } ?>
</section>


<section class="sec">	
	<h2 class="header"> Mens </h2>
	<?php foreach($menProducts as $product) {?>
	<div class="card">
		<p class="inf"><?php echo $product[1] ?></p>
		<img class="img" src="<?php echo $product[4] ?>">
		<p class="inf"><img class="wish" src="img/wishlist.png" >$<?php echo $product[5] ?><img class="cart" src="img/addtocart.png" ></p>
	</div>
	<?php } ?>
</section>
	
<section class="sec">	
	<h2 class="header"> Womens </h2>
	<?php foreach($womenProducts as $product) {?>
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