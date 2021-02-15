
<?php
$mysqli = new mysqli("localhost","root","","eshop");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


$sql = "SELECT * FROM product";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["title"]. " Slug: " . $row["slug"]. "<br>";
  }
} else {
  echo "0 results";
}
// Perform query
// if ($result = $mysqli -> query("SELECT * FROM product")) {
//   echo "Returned rows are: " . $result -> num_rows;
//   $result->
//   // Free result set
//   $result -> free_result();
// }
var_dump($result);

$mysqli -> close();
?>