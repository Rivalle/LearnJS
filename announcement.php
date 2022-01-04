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
   
  <!-- navigation bar -->
  <?php
        include_once 'navBar.php';
        require_once 'assets/dbhandler.php';
        if ($_SESSION["userAdmin"] !== 1){
          header("location: annStudent.php");
        }
  ?>

  <div class="box news">
    <button onclick="openForm()" id="open-button">Νέα ανακοίνωση</button>
    
    <div class="form-popup" id="newAssForm">
      <form action="assets/annAsset.php" class="form-container" method="post">
        <h1>Νέα ανακοίνωση</h1>

        <label for="subject"><b>Θέμα</b></label>
        <input type="text" name="subject" required>

        <label for="text"><b>Περιεχόμενο</b></label>
        <textarea type="text" name="text" rows=6 required></textarea>

        <div>
          <input type="checkbox" name ="checkbox" id="checkbox" value="true">
          <label for="checkbox">
            Eργασία
          </label>
        </div>

        <button id="manage" type="submit" name="submit" class="btn" value="new">Ανάρτηση</button>
        <button id="delete" type="button"  onclick="closeForm()">Close</button>
      </form>
    </div>

    <button onclick="openForm1()" id="open-button1">Τροποποίηση ανακοίνωσης</button>
    
    <div class="form-popup" id="manageForm">
      <form action="assets/annAsset.php" class="form-container" method="post">
        <h1>Τροποποίηση ανακοίνωσης</h1>

        <label for="assignment"><b>Επιλέξτε ποιά ανακοίνωση θέλετε να τροποποιήσετε</b></label>
        <input type="text" name="id" required>

        <label for="subject"><b>Νέο θέμα</b></label>
        <input type="text" name="subject" required>

        <label for="text"><b>Νέο περιεχόμενο</b></label>
        <textarea type="text" name="text" rows=6 required></textarea>

        <div>
          <input type="checkbox" name ="checkbox" id="checkbox" value="true">
          <label for="checkbox">
            Eργασία
          </label>
        </div>

        <button id="manage" type="submit" name="submit" class="btn" value="manage">Αλλαγή</button>
        <button id="delete" type="button"  onclick="closeForm1()">Close</button>
      </form>
    </div>

    <?php
          $sql = "SELECT * FROM announcements;";
          $result = mysqli_query($conn,$sql);
          $sum = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>Ανακοίνωση " . $row['id']+1 . ":</h2>" 
            . "<form action='assets/annAsset.php' method='post'><button id='delete' name='delete' type='delete' value='" . $row['id']+1 . "'>Delete</button></form>"
            . "<p><strong>Ημερομηνία</strong>: " . $row['date'] . "</p>" 
            . "<p><strong>Θέμα</strong>: " . $row['subject'] . "</p>" 
            . "<p><strong>Περιεχόμενο</strong>: " . $row['text'] . "</p>";
            if ($row['assignment'] == true){
              echo "<p>Η εργασία έχει αναρτηθεί στην ιστοσελίδα <a href='homework.php'>Εργασίες</a> </p>";
            }
           }
      ?>

  </div>
  <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>

  </body>

  <script type="text/javascript" src="js/top.js"></script>
  <script>
    function openForm() {
      document.getElementById("newAssForm").style.display = "block";
      document.getElementById("open-button").style.display = "none";
    }

    function closeForm() {
      document.getElementById("newAssForm").style.display = "none";
      document.getElementById("open-button").style.display = "block";
    }
    function openForm1() {
      document.getElementById("manageForm").style.display = "block";
      document.getElementById("open-button1").style.display = "none";
    }

    function closeForm1() {
      document.getElementById("manageForm").style.display = "none";
      document.getElementById("open-button1").style.display = "block";
    }
  </script>
  
</html>
