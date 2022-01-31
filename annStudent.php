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
    if (!$_SESSION["useremail"]){
      header("location: login.php");
      exit();
    }
  ?>

  <div class="box news">
    <?php
      //Show alla announcements
      $sql = "SELECT * FROM announcements;";
      $result = mysqli_query($conn,$sql);
      $sum = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Ανακοίνωση " . $row['id'] . ":</h2>" 
        . "<p><strong>Ημερομηνία</strong>: " . $row['date'] . "</p>" 
        . "<p><strong>Θέμα</strong>: " . $row['subject'] . "</p>" 
        . "<p><strong>Περιεχόμενο</strong>: " . $row['text'] . "</p>";
        if ($row['assignment'] == true){
          echo "<p>Η εργασία έχει αναρτηθεί στην ιστοσελίδα <a href='homework.php'>Εργασίες</a> </p>";
        }
       }  
    ?>

  </div>
  <!-- Scroll to the top button -->
  <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>
  </body>
  <script type="text/javascript" src="js/top.js"></script>  
</html>
