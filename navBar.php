<!-- this file displays the navbar on every page and changes whether the user is signed in or not -->
<?php
    session_start();
 ?>

<div class="navbar">
    <a class="active" href="start.php">Αρχική σελίδα</a>
    <a href="announcement.php">Ανακοινώσεις</a>
    <a href="communication.php">Επικοινωνία </a>
    <a href="documents.php">Έγραφα μαθήματος</a>
    <a href="homework.php">Εργασίες </a>
    <?php 
        if ($_SESSION["userAdmin"] == 1){
          echo "<a href='admin.php'>Διαχείρηση</a>";
        }
    ?>
    <a href="assets/logout.php">Αποσύνδεση </a>
  </div>