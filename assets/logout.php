<!-- this php file is used to log the user out -->
<?php

session_start();
session_unset();
session_destroy();
header("location: ../Index.php");
exit();