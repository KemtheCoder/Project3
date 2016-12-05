<?php

  $sql = "SELECT * FROM User";
  $result = mysqli_query($con, $sql);
  $i=1;
  while($row=mysqli_fetch_array($result)){
    $users[$i]['id'] = $row['id'];
    $users[$i]['firstname'] = $row['firstname'];
    $users[$i]['lastname'] = $row['lastname'];
    $users[$i]['username'] = $row['username'];
    $users[$i]['salt'] = $row['salt'];
    $users[$i]['hash'] = $row['hash'];
    $i++;
  }  


  $sql = "SELECT * FROM Message";
  $result = mysqli_query($con, $sql);
  $i=1;
  while($row=mysqli_fetch_array($result)){
    $messages[$i]['id'] = $row['id'];
    $messages[$i]['user_id'] = $row['user_id'];
    $messages[$i]['recipient_ids'] = $row['recipient_ids'];
    $messages[$i]['subject'] = $row['subject'];
    $messages[$i]['body'] = $row['body'];
    $i++;
  }  

  $sql = "SELECT * FROM Message_read";
  $result = mysqli_query($con, $sql);
  $i=1;
  while($row=mysqli_fetch_array($result)){
    $message_reads[$i]['id'] = $row['id'];
    $message_reads[$i]['message_id'] = $row['message_id'];
    $message_reads[$i]['reader_id'] = $row['reader_id'];
    $message_reads[$i]['date_read'] = $row['date_read'];
    $i++;
  }  
  
?>