<?php
  ob_start(); //output buffering. Waits for all data before sending to server rather than streaming in pieces
  session_start();

  $timezone = date_default_timezone_set("America/New_York");

  $con = mysqli_connect("localhost", "root", "", "pauldora");   //connects db. Parameters: server, un, pw, db name

  if(mysqli_connect_errno()) {
    echo "Failed to connect: ". mysqlie_connect_errno();
  }

 ?>
