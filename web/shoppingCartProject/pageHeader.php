<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1 id="pageTitle">PhoneShopping.com</h1>
    <p id="pageSubTitle">The Best Phones Money Can Buy!</p>

<div class="navBackground">
  <ul class="navBar">
      <li id="navBarItem" class="active" ><?php if ($page == 'browse.php') { echo '<h4>'; }?><a href="browse.php">Home</a><?php if ($page == 'browse.php') { echo '</h4>'; }?></li>
      <li id="navBarItem" class="active" ><?php if ($page == 'cart.php') { echo '<h4>'; }?><a href="cart.php">My Cart</a><?php if ($page == 'cart.php') { echo '</h4>'; }?></li>
      <li id="navBarItem" class="active" ><?php if ($page == 'checkout.php') { echo '<h4>'; }?><a href="checkout.php">Checkout</a><?php if ($page == 'checkout.php') { echo '</h4>'; }?></li>
  </ul>
</div>


  </body>
</html>
