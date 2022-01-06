<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LearnJS</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="header">
      <h1>Έγγραφα μαθήματος</h1>
    </div>
    
    <!-- Navigation bar -->
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
        //Show all documents
        $sql = "SELECT * FROM documents;";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Έγγραφο " . $row['docID'] . ":</h2>" 
        . "<p><strong>Τίτλος</strong>: " . $row['title'] . "</p>" 
        . "<p><strong>Περιγραφή</strong>: " . $row['description'] . "</p>" 
        . "<a href='" . $row['filePath'] . "' download='" . $row['title'] . "'><button id='download'type='button'>Download</button></a>";
        }
      ?>

      <!-- Scroll to the top button -->
      <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>
    </div>
  </body>
</html>
