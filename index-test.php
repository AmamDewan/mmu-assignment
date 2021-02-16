<?php

  $mysqli = new mysqli("localhost","root","","eshop");

  $sql = "SELECT * FROM product";
  $result = $mysqli->query($sql);

	while($row = $result->fetch_row()) {
		$rows[]=$row;
	}

  // if ($result->num_rows > 0) {
  //   $products = [];
  //   // output data of each row
  //   while($row = $result->fetch_arra()) {
  //     $temp = [$row['id'],$row['title'], $row["slug"], $row["sku"],$row["imgUrl"],$row["price"]];
  //     //var_dump($temp);
  //     array_push($products,$temp);
  //   }

  // }
		var_dump($rows);
	
    $mysqli -> close();
?>

<!DOCTYPE HTML>
<html>
<head>
	<title> eShop </title>
	<link rel="stylesheet" href="css/basic.css">
	<link rel="stylesheet" href="css/search.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img id="logo" src="img/logo.jpg">
	
	<form class="searchbar" action="/action_page.php" style="margin:auto;max-width:300px">
		<input type="text" placeholder="Search.." name="search2">
		<button type="submit"><i class="a-search"><img src="img/search.png" style="width:16px;" ></i></button>
	</form>
	
	<ul class="nav1">
		<li class="navbar"><a href="home.html">Home</a></li>
		<li class="navbar"><a href="#news">All-Items</a></li>
		<li class="navbar"><a href="#contact">Track-Order</a></li>
		<li class="navbar" style="float:right"><a class="active" href="#about">eBag</a></li>
		<li class="navbar" style="float:right"><a class="active" href="#about">MyOrders</a></li>
		<li class="navbar" style="float:right"><a class="active" href="#about">Wishlist</a></li>
	</ul>



<section class="sec">	
	<h2 class="header"> Mens </h2>
  <?php foreach($products as $product) {?>
	<div class="card">
		<p class="inf"><?php echo $product[1] ?></p>
		<img class="img" src="<?php echo $product[4] ?>">
		<p class="inf"><img class="wish" src="img/wishlist.png" >$<?php echo $product[5] ?><img class="cart" src="img/addtocart.png" ></p>
	</div>
  <?php } ?>
</section>


</body>
</html>