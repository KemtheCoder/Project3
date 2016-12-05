<?php

  $today = date("Y-m-d");

  //RESET TABLES
  //*
  $sql = "DROP TABLE User";
  $result = mysqli_query($con, $sql);

  $sql = "DROP TABLE Message";
  $result = mysqli_query($con, $sql);

  $sql = "DROP TABLE Message_read";
  $result = mysqli_query($con, $sql);
  //*/

  //CREATE TABLES
  $sql = "CREATE TABLE User (`id` int AUTO_INCREMENT PRIMARY KEY, `firstname` varchar(25), `lastname` varchar(25), `username` varchar(25), `salt` int, `hash` varchar(255))";
  $result = mysqli_query($con, $sql);

  $sql = "CREATE TABLE Message (`id` int AUTO_INCREMENT PRIMARY KEY, `recipient_ids` varchar(100), `user_id` int, `subject` varchar(55), `body` varchar(255), `date_sent` date)";
  $result = mysqli_query($con, $sql);

  $sql = "CREATE TABLE Message_read (`id` int AUTO_INCREMENT PRIMARY KEY, `message_id` int, `reader_id` int, `date_read` date)";
  $result = mysqli_query($con, $sql);


  //INSERT VALUES
  $sql = "INSERT INTO User (id, firstname, lastname, username, salt, hash) VALUES (0, 'Lil', 'Bill', 'lilbill', 9675, '711b380f816afd811071e591a089256f'), (0, 'Agent', 'Smith', 'asmith', 9675, '711b380f816afd811071e591a089256f')";
  $result = mysqli_query($con, $sql);

  $sql = "INSERT INTO Message (id, recipient_ids, user_id, subject, body, date_sent) VALUES 
  (0, '1,2', 1, 'Mission Compromised', 'Run Now!', '$today'),
  (0, '1', 2, 'Found!', 'Neo has ben found!', '$today')";
  $result = mysqli_query($con, $sql);

  $sql = "INSERT INTO Message_read (id, message_id, reader_id, date_read) VALUES (0, 1, 1, '$today'),(0, 1, 2, '$today')";
  $result = mysqli_query($con, $sql);

?>