<?
  include ('components/header.php');
?>


  <form action="functions/registration.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="">
    <label for="email">Email</label>
    <input type="email" name="email" id="">
    <label for="password">Password</label>
    <input type="password" name="password" id="">
    <button type="submit">Sign Up</button>
  </form>


  <?php include "components/footer.php"; ?>