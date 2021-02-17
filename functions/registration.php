<?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $passwordHash = $_POST['password'];
  $userRole = "1";

  include ("config.php");

  $createUserQuery = '
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
?>

<p>Go back to <a href="/">home</a></p>