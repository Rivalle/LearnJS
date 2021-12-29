<!-- php file that creates the connection with the database -->
<?php

$serverName = "localHost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "healthspotting";

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);

if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
}