//this php file is used by the log in page
<?php

if (isset($_POST["submit"])) {

  $useremail = $_POST["useremail"];
  $pass = $_POST["pass"];

  require_once 'dbhandler.php';
  require_once 'functions.php';


   loginUser($conn, $useremail, $pass);
}
else{
  header("location: ../Index.php");
  exit();
}