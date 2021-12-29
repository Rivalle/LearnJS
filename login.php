<!DOCTYPE html>
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
  
  <div class="login">
    <form action="action_page.php" method="post">
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
        </div>
        </form>
  </div>
  </body>
</html>