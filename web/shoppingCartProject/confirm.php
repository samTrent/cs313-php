<?php
session_start();

$rawAddress = $_POST['theAddress'];
$cleanAddress = htmlspecialchars($rawAddress);


include 'pageHeader.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color: green;">
    <br><br><br><br>
    <h2 class="pageSubTitle">The following items are being sent to: <?php echo $cleanAddress ?> </h2>
    <br>
    <div class="browsingTopLine">
      <?php

      foreach ($_SESSION['myCart'] as $key)
      {
        echo "<h3 class=\"checkoutItem\">" . $key . "</h3><br><br>";
      }

      unset($_SESSION['myCart']);
      $_SESSION['myCart'] = array();
       ?>
    </div>

<br><br><br><br><br><br><br><br><br><br><br><br>
     <p style="color:blue;" class="pageSubText">Thank You!</p>
  </body>
</html>
