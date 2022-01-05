<?php

require_once 'dbhandler.php';

if (isset($_POST["submit"])) {
  if($_POST["submit"] == "new"){

    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $sur = $_POST["surname"];
    $chbox = $_POST["checkbox"];

    if($chbox == "true"){
      $chbox = 1;  
    }
    else{
      $chbox = 0;
    }

    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== true){
      header("location: ../admin.php?error=invalidemail");
      exit();
    }
    
    $query = "INSERT INTO `users` (`usersID`, `usersEmail`, `usersPass`, `usersName`, `usersSur`, `userAdmin`) VALUES (NULL, '$email', '$pass', '$name', '$sur', '$chbox');";
    $queryrun = mysqli_query($conn,$query);
    header("location: ../admin.php?new");
  }
  else if($_POST["submit"] == "manage"){
    $id = $_POST["id"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $sur = $_POST["surname"];
    $chbox = $_POST["checkbox"];

    if($chbox == "true"){
      $chbox = 1;  
    }
    else{
      $chbox = 0;
    }

    if(!empty($email)){
      $query = "UPDATE `users` SET `usersEmail` = '$email' WHERE `users`.`usersID` = '$id';";
      $queryrun = mysqli_query($conn,$query);
    }
    if(!empty($pass)){
      $query = "UPDATE `users` SET `usersPass` = '$pass' WHERE `users`.`usersID` = '$id';";
      $queryrun = mysqli_query($conn,$query);
    }
    if(!empty($name)){
      $query = "UPDATE `users` SET `usersName` = '$name' WHERE `users`.`usersID` = '$id';";
      $queryrun = mysqli_query($conn,$query);
    }
    if(!empty($sur)){
      $query = "UPDATE `users` SET `usersSur` = '$sur' WHERE `users`.`usersID` = '$id';";
      $queryrun = mysqli_query($conn,$query);
    }
    
    $query = "UPDATE `users` SET 'userAdmin' = '$chbox' WHERE `users`.`usersID` = '$id';";
    $queryrun = mysqli_query($conn,$query);
    header("location: ../admin.php?managed");
    }
}
else if (isset($_POST["delete"])){
  $id = $_POST["delete"];
  $query = "DELETE FROM users WHERE usersID = '$id';";
  $queryrun = mysqli_query($conn,$query);
  header("location: ../admin.php?deletedUser");
}
else {
  header("location: ../start.php");
  exit();
}