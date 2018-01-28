<?php
session_start();

 include 'pageHeader.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta charset="utf-8">
    <title></title>

    <script type="text/javascript">

      function clearCart()
      {
        <?php //$_SESSION['myCart'] = array();  ?>
        document.getElementById('cartInfo').innerHTML = '';

      }

    </script>
  </head>
  <body style="background-color:blue;">

<br><br><br><br><br><br>

<h3 class="pageSubText">Your cart info:</h3>

<div id="cartInfo" class="">
  <?php
  // unset($_SESSION['myCart']);
  echo count($_SESSION['myCart']);

  if(count($_SESSION['myCart']) > 0)
  {
    foreach ($_SESSION['myCart'] as $key)
    {
      echo $key . "<br>";
    }
  }
   ?>
</div>


     <br><br>
     <button class="pageSubText" onclick="clearCart()" type="button" name="button">Clear Cart</button>
  </body>
</html>
