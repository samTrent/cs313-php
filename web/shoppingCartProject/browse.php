<?php
session_start();
$_SESSION['firstPageVisit'];
if(!isset($_SESSION['firstPageVisit']))
{
  $_SESSION['myCart'] = array();
}

include 'pageHeader.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="mycss.css">
    <script src="engine.js"></script>
    <title></title>

  </head>
  <body>
    <br><br><br><br>
    <h3 class="pageSubText">Pick an item to add to your cart!</h3>
      <div class="browsingTopLine">
        <form class="browseItem" action="cartData.php" method="post">
          <!-- <button type="submit" name="button" name="item" value="Iphone"><img class="imgSize" src="img/iphoneX.png"/></button> -->
          <input class="imgSize" onclick="addToCartAlert()" type="image" alt="Submit" name="item" value="iPhone X " src="img/iphoneX.png">
        </form>

        <form class="browseItem" action="cartData.php" method="post">
          <input class="imgSize" onclick="addToCartAlert()" type="image" alt="Submit" src="img/iphone8.png" name="item" value="iPhone 8 ">
          <!-- <button type="image" alt="Submit" src="img/iphone8.png" name="button" name="item" value="iPhone 8"><img class="imgSize" src="img/iphone8.png"/></button> -->
        </form>

        <form class="browseItem" action="cartData.php" method="post">
          <input class="imgSize" onclick="addToCartAlert()" type="image" alt="Submit" src="img/s8.png" name="item" value="Samsung Galaxy S8 ">
          <!-- <button type="image" alt="Submit" name="button" name="item" value="Samsung Galaxy S8"><img class="imgSize" src="img/s8.png"/></button> -->
        </form>
      </div>

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

      <div class="browsingBottomLine">
        <form class="browseItem" action="cartData.php" method="post">
          <!-- <button type="submit" name="button" name="item" value="Iphone"><img class="imgSize" src="img/iphoneX.png"/></button> -->
          <input class="imgSize" onclick="addToCartAlert()" type="image" alt="Submit" name="item" value="Samsung Galaxy Note 8 " src="img/note8.png">
        </form>

        <form class="browseItem" action="cartData.php" method="post">
          <!-- <button type="submit" name="button" name="item" value="Iphone"><img class="imgSize" src="img/iphoneX.png"/></button> -->
          <input class="imgSize" onclick="addToCartAlert()" type="image" alt="Submit" name="item" value="OnePlus 5t " src="img/5t.png">
        </form>

        <form class="browseItem" action="cartData.php" method="post">
          <!-- <button type="submit" name="button" name="item" value="Iphone"><img class="imgSize" src="img/iphoneX.png"/></button> -->
          <input class="imgSize" onclick="addToCartAlert()" type="image" alt="Submit" name="item" value="Google Pixel XL 2" src="img/pixel.png">
        </form>


      </div>

<!--
  <br><br><br><br>

    <h3 class="pageSubText">Pick an item to add to your cart!</h3>
    <div class="browsingTopLine">

       <button id="iphoneX" onclick="selectItem('iphoneX')" style="float: left;" type="button" name="button">
        <img class="imgSize" src="img/iphoneX.png"/></button>
      <button id="iphone8" onclick="selectItem('iphone8')" style="float: left;" type="button" name="button">
        <img class="imgSize" src="img/iphone8.png"/></button>
      <button id="s8" onclick="selectItem('s8')" style="float: left;" type="button" name="button">
        <img class="imgSize" src="img/s8.png"/></button>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="browsingBottomLine">
      <button id="note8" onclick="selectItem('note8')" style="float: left;" type="button" name="button">
        <img  class="imgSize" src="img/note8.png"/></button>
      <button id="5t" onclick="selectItem('5t')" style="float: left;" type="button" name="button">
        <img  class="imgSize" src="img/5t.png"/></button>
      <button id="pixel" onclick="selectItem('pixel')" style="float: left;" type="button" name="button">
        <img  class="imgSize" src="img/pixel.png"/></button>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form class="pageSubText" action="cart.php" method="post">
      <input onclick="addToCartAlert()" class="pageSubText" type="button" name="" value="Add Selected Items To Cart">
      <input id="listOfItems" type="text" name="myCart" value="" >
    </form>
-->
  </body>
</html>
