<?php

include("config.php");

function getQueryData($sql){
  global $mysqli;
  $result =  $mysqli->query($sql);

  while($row = $result->fetch_row()) {
    $rows[]=$row;
  }
  return $rows;
}
?>