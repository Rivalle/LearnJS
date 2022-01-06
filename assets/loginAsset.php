//this php file is used by the log in page
<?php

if (isset($_POST["submit"])) {

  $useremail = $_POST["useremail"];
  $pass = $_POST["pass"];

  require_once 'dbhandler.php';

  //Checks if the email given exists
  $sql = "SELECT * FROM users WHERE usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("location: ../login.php?error=stmtfailed");
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, "s", $useremail);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  //If it exists, proceed to login the user
  if ($row = mysqli_fetch_assoc($result)) {
    $emailexists = $row;
  }
  else{
    $emailexists = false;
  }

  if ($emailexists === false) {
    header("location: ../login.php?error=wrongloginname");
    exit();
  }

  if ($pass !== $emailexists["usersPass"]) {
    header("location: ../login.php?error=wrongloginpass");
    exit();
  }
  else if ($pass === $emailexists["usersPass"]) {
    session_start();
    $_SESSION["userid"] = $emailexists["usersID"];
    $_SESSION["useremail"] = $emailexists["usersEmail"];
    $_SESSION["userpass"] = $emailexists["userspass"];
    $_SESSION["username"] = $emailexists["usersName"];
    $_SESSION["usersur"] = $emailexists["usersSur"];
    $_SESSION["userAdmin"] = $emailexists["userAdmin"];
    header("location: ../index.php");
    exit();
  }
}
else{
  header("location: ../login.php");
  exit();
}