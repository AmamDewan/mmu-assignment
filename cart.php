<?php 
  if(!isset($_SESSION)) 
    session_start(); 
  include ('components/header.php');

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['login_user'] . "! User Role: ".$_SESSION['user_role'];
  } else {
      echo "Please log in first to see this page.";
  }
?>