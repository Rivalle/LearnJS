//this php file is used by the announcement page
<?php

require_once 'dbHandler.php';

if (isset($_POST["submit"])) {
  //Create an announcement
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
  //Manage an announcement
  else if($_POST["submit"] == "manage"){
    $id = $_POST["id"];
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

    if(!empty($subject)){
      $query = "UPDATE `announcements` SET `subject` = '$subject' WHERE `announcements`.`id` = '$id';";
      $queryrun = mysqli_query($conn,$query);
    }
    if(!empty($text)){
      $query = "UPDATE `announcements` SET `text` = '$text' WHERE `announcements`.`id` = '$id';";
      $queryrun = mysqli_query($conn,$query);
    }
    
    $query = "UPDATE `announcements` SET `date` = '$date', `assignment` = '$chbox' WHERE `announcements`.`id` = '$id';";
    $queryrun = mysqli_query($conn,$query);
    header("location: ../announcement.php?managed");
  }
}
//Delete an announcement
else if (isset($_POST["delete"])){
  $id = $_POST["delete"];
  $query = "DELETE FROM announcements WHERE id = '$id';";
  $queryrun = mysqli_query($conn,$query);
  header("location: ../announcement.php?deletedannouncement");
}
else {
  header("location: ../announcement.php");
  exit();
}