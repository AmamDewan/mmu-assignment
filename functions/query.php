<?php

include("config.php");
if(!isset($_SESSION)) 
    session_start(); 

function getQueryData($sql){
  global $mysqli;
  $result =  $mysqli->query($sql);

  while($row = $result->fetch_row()) {
    $rows[]=$row;
  }
  return $rows;
}

function addToCart($productId){
  global $mysqli;

  
  $checkEmptyCart = '
    SELECT id 
    FROM `eshop`.`cart`
    WHERE status=0 AND userId='.(int)$_SESSION['user_id'].'
  ';
  if ($result = $mysqli->query($checkEmptyCart) == TRUE){
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $insertCart = '
      INSERT INTO  `eshop`.`cart_item` (productId, cartId, sku) VALUES ('.$productId.','.$row['id'].',"product-1");
    ';
  }

  $addToCartQuery = '
    INSERT INTO `eshop`.`user` (
      name, email, passwordHash, registeredAt, userRole
    ) VALUES (
      "'.$name.'","'.$email.'","'.$passwordHash.'",CURRENT_TIMESTAMP,"'.$userRole.'"
    );
  ';

  if ($mysqli->query($createUserQuery) === TRUE) {
    echo "New user created successfully";
  }else{
    echo "Error: " . $createUserQuery . "<br>" . $mysqli->error;
  }
}
?>