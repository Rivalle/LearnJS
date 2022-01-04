//this php file is used by the announcement page
<?php

require_once 'dbhandler.php';
require_once 'functions.php';

if (isset($_POST["submit"])) {
  if($_POST["submit"] == "new"){

    $subject = $_POST["subject"];
    $text = $_POST["text"];
    $date = date('d/m/Y');
    $chbox = $_POST["checkbox"];

    if($chbox == "true"){
      $chbox = 1;  
    }
    else{
      $chbox = 0;
    }
    
    $query = "INSERT INTO `announcements` (`id`, `date`, `subject`, `text`, `assignment`) VALUES (NULL, '$date' , '$subject' , '$text' , '$chbox' );";
    $queryrun = mysqli_query($conn,$query);
    header("location: ../announcement.php?new" . $_POST["submit"]);
  }
  else if($_POST["submit"] == "manage"){
    $id = $_POST["id"]-1;
    $subject = $_POST["subject"];
    $text = $_POST["text"];
    $date = date('d/m/Y');
    $chbox = $_POST["checkbox"];

    if($chbox == "true"){
      $chbox = 1;  
    }
    else{
      $chbox = 0;
    }
    
    $query = "UPDATE `announcements` SET `date` = '$date', `subject` = '$subject', `text` = '$text', `assignment` = '$chbox' WHERE `announcements`.`id` = '$id';";
    $queryrun = mysqli_query($conn,$query);
    header("location: ../announcement.php?managed" . $_POST["submit"]);
    }
}
else if (isset($_POST["delete"])){
  $id = $_POST["delete"]-1;
  $query = "DELETE FROM announcements WHERE id = '$id';";
  $queryrun = mysqli_query($conn,$query);
  header("location: ../announcement.php?deletedannouncement");
}
else {
  header("location: ../announcement.php");
  exit();
}