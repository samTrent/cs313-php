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
  <body style="background-color:blue;">

<br><br><br><br><br><br>

<h3 class="pageSubText">Your cart info:</h3>

<div id="cartInfo" class="browsingTopLine">
  <?php

  if(count($_SESSION['myCart']) > 0)
  {
      foreach ($_SESSION['myCart'] as $key)
      {
        echo "<h3 class=\"checkoutItem\">" . $key . "</h3><br><br>";
      }
   }
   else {
     echo "<p class=\"pageSubText\">You have no items in your cart.</p>";
   }
   ?>
</div>


     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
     <form class="" action="cartData.php" method="post">
       <button type="submit" class="pageSubText" type="submit" name="clearData" value="true">Clear All Cart Items</button>
       <!-- <input class="" type="submit" name="clearData" value="Clear Cart"> -->
     </form>
     <!-- <button class="pageSubText" onclick="clearCart()" type="button" name="button">Clear Cart</button> -->
  </body>
</html>
