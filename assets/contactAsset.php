//this php file is used by the contact page
<?php

//Send email to all tutors
if (isset($_POST["submit"])) {

  $subject = $_POST["subject"];
  $message = $_POST["message"];

  require_once 'dbHandler.php';

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