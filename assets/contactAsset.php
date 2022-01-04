//this php file is used by the contact page
<?php

if (isset($_POST["submit"])) {

  $subject = $_POST["subject"];
  $message = $_POST["message"];

  require_once 'dbhandler.php';
  require_once 'functions.php';

  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_assoc($result)) {
      if($row['userAdmin'] == 1){
          mail($row['usersEmail'], $subject, $message);
      }
  }
  header("location: ../communication.php");
}
else{
    header("location: ../communication.php???");
}