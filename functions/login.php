<?php

  include("config.php");
  if(!isset($_SESSION)) 
    session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($mysqli,$_POST['email']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['password']); 
      
      $sql = "SELECT id, userRole FROM user WHERE email = '$myemail' and passwordHash = '$mypassword'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // print_r($row['userRole']);
      $active = $row['id'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myemail and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myemail;
         $_SESSION['loggedin'] = true;
         $_SESSION['user_role'] = $row['userRole'];
    // $_SESSION['username'] = $username;
         header("location: ../index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>