<?php 
  $hostname = "scarecro.com";
  $hostname = "104.236.203.47";
  $username = "scarecro";
  $password = "";

  $dbname = "maindb";

  $con = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to connect to database! Please try again later.");

?>