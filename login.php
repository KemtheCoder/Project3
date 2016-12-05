<?php   
  require 'dbconnect.php';

  include 'db2array.php';

  if(isset($_POST['username']) && isset($_POST['pass'])){
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM User WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    
    if (session_status() == PHP_SESSION_NONE){
      session_start();
    }
    $_SESSION['userid']=$user['id'];

    if(md5($pass.$user['salt']) == $user['hash']){
       echo 'Successful Login <!--';
    }else{
       echo 'Credentials Wrong'; 
    }
  }


?>

  <link rel="stylesheet" href="style.css">
  <hr>
  <h3>Login   <a href="./admin.php">Add user using admin page</a></h3>
  <form action="#" method="post">
    <p>Username:</p>
    <input type="text" id="username" name="username">
    <p>Password:</p>
    <input type="password" id="pass" name="pass">
    <br><br>
    <input type="submit" value="submit">
    <button onclick="login()">Login</button>
  </form>
<?php
  
    if(!isset($_SESSION['userid']))
      die('not logged in!!!');

  if(md5($pass.$user['salt']) == $user['hash'])
     echo '-->';
?>