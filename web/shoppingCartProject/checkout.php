<?php
session_start();

 include 'pageHeader.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color:red;">

<br><br><br><br>
    <h3 class="pageSubText">You have <?php echo count($_SESSION['myCart']) ?> items in your Cart.</h3>
    <?php




    ?>


  </body>
</html>
