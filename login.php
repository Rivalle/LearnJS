<!DOCTYPE html>
<!-- This is the login page -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LearnJS</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <div class="header">
    <h1>Είσοδος</h1>
  </div>
  
  <!-- Login form -->
  <div class="login">
    <form action="assets/loginAsset.php" method="post">
        <div class="container">
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="useremail" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="pass" required>

          <button type="submit" name="submit">Login</button>
          <?php
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "wrongloginname") {
                echo "<p>Incorrect email</p>";
              }
              else if ($_GET["error"] == "wrongloginpass") {
                echo "<p>Incorrect password</p>";
              }
            }
          ?>
        </div>
    </form>
  </div>
  </body>
</html>