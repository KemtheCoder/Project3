<?php   
  require 'dbconnect.php';

  //passwd regex
  //^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$
?>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h3>Admin Page  <a href="./">Back to Homepage</a></h3>
  <a href="dbreset.php">Reset Database</a>
  <hr>
  
  <h3>Add User</h3>
  <p>Firstname:</p>
  <input type="text" id="fname">
  <p>Lastname:</p>
  <input type="text" id="lname">
  <p>Username:</p>
  <input type="text" id="uname">
  <p>Password:</p>
  <input type="password" id="pass">
  <p>Password2:</p>
  <input type="password" id="pass2">
  <br>
  <br>
  <button onclick="adduser()">Add User</button>
  
  <hr>
  <br><br>
  <div id="result"></div>
  
  <hr>
  <br>
  <h3>Data Dump of Database Below</h3>
  <?php include 'db2array.php'; include 'printall.php'; ?>
  
  <script>
    
    function adduser(){
      console.info('Adding User...'); 
      $.post( "adduser.php", { firstname: $('#fname').val(), lastname: $('#lname').val(), username: $('#uname').val(), password: $('#pass').val()})
        .done(function( data ) {
          console.log( "User Added: " + data );
          $('#result').html(data);
        });
      
    }
  
  </script>
</body>
</html>