<?php session_start();
//kick user out if they are not logged in
require('checkIfUserHasLoggedIn.php');


 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="hartSchedulePage.css">
    <meta charset="utf-8">
    <script src="engine.js" ></script>
    <title>Hart Schedules</title>
  </head>
  <body>
    <img id="backgroundImg" src="hartGym3.jpg" alt="gym">

    <!-- logout button -->
    <form style="float: right" onsubmit="return confirmLogout()" class="" action="loginPage.php" method="post">
      <input class="logoutButton" type="submit" name="" value="Logout">
    </form>

    <!-- start php processing -->
    <?php
    require('getScheduleTables.php');
    file_put_contents('php://stderr', print_r(getSchedules(), TRUE));

     ?>


  </body>
</html>

<?php
