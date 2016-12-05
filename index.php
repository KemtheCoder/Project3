<?php   
  require 'dbconnect.php';
  require 'login.php';
?>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script src="main.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  
    $today = date("Y-m-d");
  
    //require 'dbinit.php';
    include 'db2array.php';
    //include 'printall.php';
  
    $user = $users[$_SESSION['userid']];
    $name = $user['firstname'].' '.$user['lastname'].' (#'.$user['id'].')';
    echo "<h1>Cheapo Mail</h1>Logged in as - $name";
    
  
  ?>
  
  <hr>
  <br>
  <div id="messages"></div>
  
  <hr>
  <br>
  <h3>Reading Message</h3>
  <div id="fullmessage"></div>
  
  <hr>
  <br>
  <p>Subject:</p>
  <input type="text" id="message_subject">
  <p>To:</p>
  <select id="message_to" multiple="">
  <?php
    foreach($users as $u){
      $id = $u['id'];
      $name = $u['firstname'].' '.$u['lastname'];
      echo "<option value='$id'>$name</option>"; 
    }
  ?>
  </select>
  <br>
  <p>Body:</p>
  <textarea id="message_body"></textarea>
  <br><br>
  <button onclick="send()">Send Message</button>&nbsp;&nbsp;
  <a href="logout.php">Logout</a>
  
  <hr>
  <br>
  <div id="result"></div>
</body>
</html>