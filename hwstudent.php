<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LearnJS</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="header">
      <h1>Εργασίες</h1>
    </div>
   
    <!-- navigation bar -->
    <?php
          include_once 'navBar.php';
          require_once 'assets/dbhandler.php';
          if (!$_SESSION["useremail"]){
              header("location: login.php");
              exit();
          }
    ?>

    <div class="box news">
      <?php
        //Show all assignments
        $sql = "SELECT * FROM assignments;";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<h2>" . $row['ergID'] . "η Εργασία" .  ":</h2>" 
          . "<p><strong>Στόχοι</strong>: " . $row['targets'] . "</p>" 
          . "<p><strong>Παραδοτέα</strong>: " . $row['deliverables'] . "</p>" 
          . "<p><strong style='color:red;'>Διορία</strong>: " . $row["deadline"] 
          . "<a href='" . $row['filePath'] . "' download='" . $row['targets'] . "'><button id='download' type='button'>Download</button></a>";
        }
      ?>
      <!-- Scroll to the top button -->
      <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>
        
    </div>
  </body>
  <script type="text/javascript" src="js/top.js"></script>
</html>
