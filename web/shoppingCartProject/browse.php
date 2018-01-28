<?php
session_start();
$_SESSION['myCart'] = array();
// $_SESSION['myCart'] = $cartArray;
// <?php $_SESSION['myCart'][] = "iPhone X";
include 'pageHeader.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="mycss.css">
    <title></title>

  </head>
  <body>


    <?php
    echo "<br><br><br><br>";
    echo "<h3 class=\"pageSubText\">Pick an item to add to your cart!</h3>";
    echo "<a herf=\"#\" ><img class=\"imgSize\" src=\"img/iphoneX.png\"></a>";
    echo "<a herf=\"#\" ><img class=\"imgSize\" src=\"img/iphone8.png\"></a>";
    echo "<a herf=\"#\" ><img class=\"imgSize\" src=\"img/s8.png\"></a>";
    echo "<a herf=\"#\" ><img class=\"imgSize\" src=\"img/note8.png\"></a>";
    echo "<a herf=\"#\" ><img class=\"imgSize\" src=\"img/5t.png\"></a>";




     ?>


    <!-- <br><br><br><br>

    <h3 class="pageSubText">Pick an item to add to your cart!</h3>
    <div class="browsingTopLine">
      <! <a src="img/iphoneX.png" href="#">Test</a> -->
      <!-- <button onclick=style="float: left;" type="button" name="button">
        <img class="imgSize" src="img/iphoneX.png"/></button>
      <button onclick= style="float: left;" type="button" name="button">
        <img class="imgSize" src="img/iphone8.png"/></button>
      <button onclick=> style="float: left;" type="button" name="button">
        <img class="imgSize" src="img/s8.png"/></button>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="browsingBottomLine">
      <button onclick="" style="float: left;" type="button" name="button">
        <img  class="imgSize" src="img/note8.png"/></button>
      <button onclick= style="float: left;" type="button" name="button">
        <img  class="imgSize" src="img/5t.png"/></button>
      <button onclick=style="float: left;" type="button" name="button">
        <img  class="imgSize" src="img/pixel.png"/></button>
    </div> -->



  </body>
</html>
