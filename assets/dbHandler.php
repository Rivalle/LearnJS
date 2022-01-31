<!-- php file that creates the connection with the database -->
<?php

$serverName = "webpagesdb.it.auth.gr";
$dBUserName = "alexderm";
$dBPassword = "data2022";
$dBName = "learnjs";

$conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName, "3306");

if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
}