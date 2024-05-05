<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "project";
  // Create Connection
  $conn = new mysqli($servername, $username, $password, $databasename);
  // Check Connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>