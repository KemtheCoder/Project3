<?php   
  require 'dbconnect.php';
  
  session_start();
  $userid = $_SESSION['userid'];

  $today = date("Y-m-d");

  require 'db2array.php';
  //include 'printall.php';

?>
  <link rel="stylesheet" href="style.css">

  <h3>Last 10 Messages:</h3>
  <p>Click a message below to see details</p>
  <br>
  <div>
  <?php 
    
    $inbox_count = 0;

    foreach ($messages as $message){
      //Get Recipients 
      $i=1;
      foreach(explode(',', $message['recipient_ids']) as $recipient){
        $recipients[$i] = intval($recipient);
        $i++;
      }

      //If sent to current User
      if(in_array($userid, $recipients)){
        //Only Display First 10 Messages
        $inbox_count++;
        if($inbox_count > 10)
          break;

        //Get Message Data
        $messageid = $message['id'];
        $senderid = $message['user_id'];
        $subject = $message['subject'];
        $body = $message['body'];
        $sender = $users[$senderid]['firstname'].' '.$users[$senderid]['lastname'];
        
        //Check if unread
        $readstate = 'unread';
        foreach($message_reads as $mread){
          if($mread['message_id']==$messageid)
            $readstate='';
        }
        
        //Display Message
        echo "<div class='message $readstate' onclick='read(\"$messageid\")'><p>fr: $sender - $subject</p></div>";

      }
    }


  ?>
  </div>