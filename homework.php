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
        if ($_SESSION["userAdmin"] !== 1){
          header("location: hwstudent.php");
        }
  ?>

    <div class="box news">
      <button onclick="openForm()" id="open-button">Νέα Έργασία</button>
      <!-- Create a new assignment form -->
      <div class="form-popup" id="newForm">
        <form action="assets/homeworkAsset.php" method="post" enctype="multipart/form-data" class="form-container">
          
          <h1>Νέα Έργασία</h1>

          <label for="targets"><b>Στόχοι</b></label>
          <input type="text" name="targets" required>

          <label for="deliverables"><b>Παραδοτέα</b></label>
          <textarea type="text" name="deliverables" rows=6 required></textarea>

          <label for="deadline"><b>Διορία</b></label>
          <input type="text" name="deadline" required>

          Select file to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          <button type="submit" value="upload" id="manage" name="submit">Ανέβασμα</button>

          <button id="delete" type="button"  onclick="closeForm()">Κλείσιμο</button>
        </form>
      </div>
      
      <button onclick="openForm1()" id="open-button1">Τροποποίηση Εργασίας</button>
      <!-- Manage a assignment form -->
      <div class="form-popup" id="manageForm">
        <form action="assets/homeworkAsset.php" method="post" enctype="multipart/form-data" class="form-container">
          
          <h1>Τροποποίηση Εργασίας</h1>

          <label for="id"><b>Επιλέξτε ποιά εργασία θέλετε να τροποποιήσετε</b></label>
          <input type="text" name="id" required>

          <label for="targets"><b>Στόχοι</b></label>
          <input type="text" name="targets">

          <label for="deliverables"><b>Παραδοτέα</b></label>
          <textarea type="text" name="deliverables" rows=6></textarea>

          <label for="deadline"><b>Διορία</b></label>
          <input type="text" name="deadline">

          Select file to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          <button type="submit" value="manage" id="manage" name="submit">Τροποποίηση</button>

          <button id="delete" type="button"  onclick="closeForm1()">Κλείσιμο</button>
        </form>
      </div>
      <?php
          //Some error handlers
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "exists") {
              echo "<p>File already exists</p>";
            }
            else if($_GET["error"] == "toolarge") {
              echo "<p>File too large</p>";
            }
            else if($_GET["error"] == "new") {
              echo "<p>Document created!</p>";
            }
            else if($_GET["error"] == "notuploaded") {
              echo "<p>Sorry, your file was not uploaded.</p>";
            }
            else if($_GET["error"] == "wrongtype") {
              echo "<p>Your file extension must be .zip, .pdf or .docx</p>";
            }
            else if($_GET["error"] == "filechanged") {
              echo "<p>The file has been successfully changed.</p>";
            }
          }
      ?>

      <?php
        //Show all assignments
        $sql = "SELECT * FROM assignments;";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<h2>" . $row['ergID'] . "η Εργασία" .  ":</h2>" 
          . "<p><strong>Στόχοι</strong>: " . $row['targets'] . "</p>" 
          . "<p><strong>Παραδοτέα</strong>: " . $row['deliverables'] . "</p>" 
          . "<p><strong style='color:red;'>Διορία</strong>: " . $row["deadline"]
          . "<form action='assets/homeworkAsset.php' method='post'><button id='delete' name='delete' type='delete' value='" . $row['ergID'] . "'>Delete</button></form>" 
          . "<a href='" . $row['filePath'] . "' download='" . $row['targets'] . "'><button id='download' type='button'>Download</button></a>";
        }
      ?>
      
      <!-- Scroll to the top button -->
      <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>
        
    </div>
  </body>
  <script type="text/javascript" src="js/top.js"></script>
  <script type="text/javascript" src="js/forms.js"></script>
</html>
