<?php 
  if(!isset($_SESSION)) 
    session_start(); 
  include ('components/header.php');

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 ?>
  <h2 class="bagtxt">eBag</h2> <h2 class="totaltxt">Summary</h2>
	
		<table class="bag show-cart table">
    </table>
  
	
	
	<div class="sum">
		
		<ul class="sbag" style="list-style-type:none;">
			<li class="sattr"><p> Total Quantity: <span class="total-count"></span></p></li>
			<li class="sattr"><p> Total Price: <span class="total-cart"></span> </p></li>
		</ul>
		
	</div>	
 <?php
  } else {
      echo "Please log in first to see this page.";
  }

  include ('components/footer.php');

?>

