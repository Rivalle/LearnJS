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
        if ($_SESSION["userAdmin"] !== 1){
          header("location: docStudent.php");
        }
  ?>

  <div class="box news">
    
    <button onclick="openForm()" id="open-button">Νέο Έγγραφο</button>
    <!-- Create a new document form -->
    <div class="form-popup" id="newForm">
      <form action="assets/upload.php" method="post" enctype="multipart/form-data" class="form-container">
        
        <h1>Νέο Έγγραφο</h1>

        <label for="title"><b>Τίτλος</b></label>
        <input type="text" name="title" required>

        <label for="description"><b>Περιγραφή</b></label>
        <input type="text" name="description" required>

        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <button type="submit" value="upload" id="manage" name="submit">Ανέβασμα</button>

        <button id="delete" type="button"  onclick="closeForm()">Κλείσιμο</button>
      </form>
    </div>
    
    <button onclick="openForm1()" id="open-button1">Τροποποίηση Εγγράφου</button>

     <!-- Manage a document form -->
    <div class="form-popup" id="manageForm">
      <form action="assets/upload.php" method="post" enctype="multipart/form-data" class="form-container">
        
        <h1>Τροποποίηση Εγγράφου</h1>

        <label for="id"><b>Επιλέξτε ποιό έγγραφο θέλετε να τροποποιήσετε</b></label>
        <input type="text" name="id" required>

        <label for="title"><b>Τίτλος</b></label>
        <input type="text" name="title">

        <label for="description"><b>Περιγραφή</b></label>
        <input type="text" name="description">

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
        //Show all documents
        $sql = "SELECT * FROM documents;";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<h2>Έγγραφο " . $row['docID'] . ":</h2>" 
          . "<p><strong>Τίτλος</strong>: " . $row['title'] . "</p>" 
          . "<p><strong>Περιγραφή</strong>: " . $row['description'] . "</p>" 
          . "<form action='assets/upload.php' method='post'><button id='delete' name='delete' type='delete' value='" . $row['docID'] . "'>Delete</button></form>" 
          . "<a href='" . $row['filePath'] . "' download='" . $row['title'] . "'><button id='download'type='button'>Download</button></a>";
         }
      ?>

      <!-- Scroll to the top button -->
      <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>
    </div>
  </body>
  <script type="text/javascript" src="js/top.js"></script>
  <script type="text/javascript" src="js/forms.js"></script>
</html>
