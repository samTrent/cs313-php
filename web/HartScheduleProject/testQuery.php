<?php session_start();
//kick user out if they are not logged in
require('checkIfUserHasLoggedIn.php');

require('getScheduleTables.php');

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

    <br><br><br><br>

    <!-- add user button -->
    <form style="float: right" class="" action="addUserToDatabase.php" method="post">
      <input id="addUserButton" type="submit" name="" value="Create New User">
    </form>

    <!-- start php processing -->
    <?php
    getSchedules();

     ?>


  </body>
</html>

<?php
