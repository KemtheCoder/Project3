<?php
  //Inititalize
  require 'dbconnect.php';
  session_start();

  $userid = $_SESSION['userid'];
  $today = date("Y-m-d");
  $to = $_POST['to'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];

  //Add Message
  $sql = "INSERT INTO Message (id, recipient_ids
, user_id, subject, body, date_sent) VALUES (0, '$to', $userid, '$subject', '$body', '$today')";
  $result = mysqli_query($con, $sql);


?>