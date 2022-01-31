<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LearnJS</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="header">
      <h1>Ανακοινώσεις</h1>
    </div>
   
  <!-- Navigation bar -->
  <?php
        include_once 'navBar.php';
        require_once 'assets/dbHandler.php';
        if ($_SESSION["userAdmin"] !== 1){
          header("location: login.php");
        }
  ?>

  <div class="box news">
    <button onclick="openForm()" id="open-button">Νέος Χρήστης</button>
    
    <!-- Create a user form -->
    <div class="form-popup" id="newForm">
      <form action="assets/adminAsset.php" class="form-container" method="post">
        <h1>Νέος Χρήστης</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" name="email" required>

        <label for="pass"><b>Κωδικός</b></label>
        <input type="password" name="pass" required>

        <label for="name"><b>Όνoμα</b></label>
        <input type="text" name="name" required>

        <label for="surname"><b>Επώνυμο</b></label>
        <input type="text" name="surname" required>

        <div>
          <input type="checkbox" name ="checkbox" id="checkbox" value="true">
          <label for="checkbox">
            Καθηγητής
          </label>
        </div>

        <button id="manage" type="submit" name="submit" class="btn" value="new">Δημιουργία</button>
        <button id="delete" type="button"  onclick="closeForm()">Κλείσιμο</button>
      </form>
    </div>

    <?php
        //error handler
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "invalidemail") {
             echo "<p>Incorrect email form</p>";
          }
        }
    ?>
    <button onclick="openForm1()" id="open-button1">Τροποποίηση Χρήστη</button>
    
    <!-- Managing a user form -->
    <div class="form-popup" id="manageForm">
      <form action="assets/adminAsset.php" class="form-container" method="post">
        <h1>Τροποποίηση Χρήστη</h1>

        <label for="id"><b>Επιλέξτε ποιό χρήστη θέλετε να τροποποιήσετε</b></label>
        <input type="text" name="id" required>

        <label for="email"><b>Αλλαγή email</b></label>
        <input type="text" name="email">

        <label for="pass"><b>Αλλαγή κωδικού</b></label>
        <input type="password" name="pass">

        <label for="name"><b>Αλλαγή ονόματος</b></label>
        <input type="text" name="name">

        <label for="surname"><b>Αλλαγή επώνυμου</b></label>
        <input type="text" name="surname">

        <div>
          <input type="checkbox" name ="checkbox" id="checkbox" value="true">
          <label for="checkbox">
            Καθηγητής
          </label>
        </div>

        <button id="manage" type="submit" name="submit" class="btn" value="manage">Αλλαγή</button>
        <button id="delete" type="button"  onclick="closeForm1()">Κλείσιμο</button>
      </form>
    </div>

    <?php
      //Show all users
      $sql = "SELECT * FROM users;";
      $result = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Χρήστης " . $row['usersID'] . ":</h2>" 
        . "<form action='assets/adminAsset.php' method='post'><button id='delete' name='delete' type='delete' value='" . $row['usersID'] . "'>Delete</button></form>"
        . "<p><strong>Email</strong>: " . $row['usersEmail'] . "</p>" 
        . "<p><strong>Password</strong>: " . $row['usersPass'] . "</p>" 
        . "<p><strong>Όνομα</strong>: " . $row['usersName'] . "</p>" 
        . "<p><strong>Επίθετο</strong>: " . $row['usersSur'] . "</p>";
        if ($row['userAdmin'] == true){
          echo "<p>Ο χρήστης είναι Καθηγητής.</p>";
        }
        else{
            echo "<p>Ο χρήστης είναι Μαθητής.</p>";
        }
      }
    ?>

  </div>
  <!-- Scroll to the top button -->
  <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>

  </body>
  <script type="text/javascript" src="js/top.js"></script>
  <script type="text/javascript" src="js/forms.js"></script>
</html>
