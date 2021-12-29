<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LearnJS</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="header">
      <h1>Επικοινωνία</h1>
    </div>
     
  <!-- navigation bar -->
  <?php
        include_once 'navBar.php';
  ?>

    <div class="box">
      <div class="container">
       <form action="action_page.php">
         <label for="reciever">Αποστολέας</label>
         <input type="text" id="fname" name="reciever">
         <label for="subject">Θέμα</label>
         <input type="text" id="subject" name="subject">
         <label for="message">Κείμενο</label>
         <textarea id="message" name="message" style="height:200px"></textarea>
         <input type="submit" value="Submit">
       </form>
      </div>
      <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="#">tutor@csd.auth.test.gr</a>.</p>
    </div>

   <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>

  </body>

  <script type="text/javascript" src="js/top.js"></script>
</html>
