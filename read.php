<?php   
  require 'dbconnect.php';
  
  session_start();
  $userid = $_SESSION['userid'];

  $messageid = $_POST['messageid'];

  $today = date("Y-m-d");

  require 'db2array.php';
  //include 'printall.php';


  //Get Message Data
  $sql = "SELECT * FROM Message WHERE id=$messageid";
  $result = mysqli_query($con, $sql);
  $message=mysqli_fetch_assoc($result);

  $subject = $message['subject'];
  $senderid = $message['user_id'];
  $date = $message['date_sent'];
  $body = $message['body'];
  $from = $users[$senderid]['firstname'].' '.$users[$senderid]['lastname'];

  //Mark As Read
  $sql = "INSERT INTO Message_read (id, message_id, reader_id, date_read) VALUES (0, $messageid, $userid, '$today')";
  $result = mysqli_query($con, $sql);

  //Display Message
  echo "<div class=''><h3>$subject</h3><p>$body<br><br>- From: $from (#$senderid) [$date]</p><div>";

 



  ?>