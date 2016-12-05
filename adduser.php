<?php
  //Inititalize
  require 'dbconnect.php';
  session_start();

  $userid = 11;
  $today = date("Y-m-d");
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $pass = $_POST['password'];

  $salt = rand();
  $hash = md5($pass.$salt);

  //Add Message
  $sql = "INSERT INTO User (id, firstname
, lastname, username, hash, salt) VALUES (0, '$firstname', '$lastname', '$username', '$hash', '$salt')";
  $result = mysqli_query($con, $sql);

  echo 'Successfully Added!';
?>