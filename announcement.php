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
  ?>

    <div class="box news">
      <h2>Ανακοίνωση 1</h2>
      <p><strong>Ημερομηνία</strong>: 11/01/2022</p>
      <p><strong>Θέμα</strong>: Έναρξη μαθημάτων</p>
      <p>Τα μαθήματα αρχίζουν την Δευτέρα 17/01/2022</p>

      <h2>Ανακοίνωση 2</h2>
      <p><strong>Ημερομηνία</strong>: 01/02/2022</p>
      <p><strong>Θέμα</strong>: Ανακοίνωση 1ης εργασίας</p>
      <p>Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a href="homework.html">Εργασίες</a> </p>

      <h2>Ανακοίνωση 3</h2>
      <p><strong>Ημερομηνία</strong>: 08/02/2022</p>
      <p><strong>Θέμα</strong>: Ανακοίνωση 2ης εργασίας</p>
      <p>Η 2η εργασία έχει ανακοινωθεί στην ιστοσελίδα <a href="homework.html">Εργασίες</a> </p>

    </div>

   <button onclick="topFunction()" id="topBtn" title="Go to top">Top</button>

  </body>

  <script type="text/javascript" src="js/top.js"></script>
</html>
