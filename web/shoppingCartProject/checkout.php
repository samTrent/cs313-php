<?php
session_start();

 include 'pageHeader.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta charset="utf-8">
    <script type="text/javascript" src="engine.js"></script>
    <title></title>
  </head>
  <body style="background-color:red;">
    <input id="numItemsInCart" type="text" name="" hidden="true" value="<?php echo count($_SESSION['myCart']) ?>">
<br><br><br><br>
    <h3 class="pageSubText">You have <?php echo count($_SESSION['myCart']) ?> items in your Cart.</h3>

    <form class="" onsubmit=" checkAddress();" action="confirm.php" method="post">
      <input id="userAddress" class="pageSubText" type="text" name="theAddress" value="" placeholder="Enter Address Here..."><br><br>
      <button  type="submit" class="pageSubText" type="submit" name="clearData" value="true">Checkout Now</button>
    </form>


  </body>
</html>
