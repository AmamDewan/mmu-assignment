<!DOCTYPE HTML>
<html>
<head>
	<title> eShop - Mens </title>
	<link rel="stylesheet" href="css/basic.css">
	<link rel="stylesheet" href="css/search.css">
	<link rel="stylesheet" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<!-- new edited file -->
<body>
	<img id="logo" src="img/logo.jpg">
	
	<form class="searchbar" action="/action_page.php" style="margin:auto;max-width:300px">
		<input type="text" placeholder="Search.." name="search2">
		<button type="submit"><i class="a-search"><img src="img/search.png" style="width:16px;" ></i></button>
	</form>

	<!-- Button to open the modal login form -->

	<?php 
		if(!isset($_SESSION)) 
        session_start(); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
	?>
		<form action="../functions/logout.php" method="post">
			<button type>Logout</button>
		</form>
		
	<?php } else { ?>
		<button onclick="document.getElementById('login-modal').style.display='block'">Login</button>
	<?php }?>

	<!-- The Modal -->
	<div id="login-modal" class="modal">
		<span onclick="document.getElementById('login-modal').style.display='none'"
	class="close" title="Close Modal">&times;</span>

		<!-- Modal Content -->
		<form class="modal-content animate" action="../functions/login.php" method="POST">
			
			<div class="modal-title">
				<h3 class="title">Login</h3>
			</div>

			<div class="container">
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="Enter Username" name="email" required>

				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button type="submit">Login</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container">
				<button type="button" onclick="document.getElementById('login-modal').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
			<div class="container">
				<p>New here? <a href="#">Register</a></p>
			</div>
		</form>
	</div>
	
	<ul class="nav1">
		<li class="navbar"><a href="/">Home</a></li>
		<li class="navbar"><a href="#news">All-Shops</a></li>
		<li class="navbar"><a href="#contact">Track-Order</a></li>
		<li class="navbar" style="float:right"><a class="active" href="../cart.php">eBag</a></li>
		<li class="navbar" style="float:right"><a class="active" href="#about">MyOrders</a></li>
		<li class="navbar" style="float:right"><a class="active" href="#about">Wishlist</a></li>
	</ul>