<?php session_start();
require('checkIfUserHasLoggedIn.php');

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <link rel="stylesheet" href="hartSchedulePageLook.css">
     <script src="engine.js"></script>
     <meta charset="utf-8">
     <title></title>
   </head>
   <p id="error"></p>
   <body>

     <img id="backgroundImg" src="hartGym3.jpg" alt="gym">
      <div class="centerWithBorder">
     <section class="center">
     <h1 class="center">Add User To Database</h1>


     <form class="center" onsubmit="return checkBothPasswordsMatch()" action="remoteUserAddDatabase.php" method="post">
       <p class="infoStyle" align="center">Username</p>
       <input class="infoStyle" type="text" name="username" value="" required><br>
       <p class="infoStyle" align="center">Password</p>
       <input class="infoStyle" id="passwordFirst" type="text" name="password" value="" required><br>
       <p class="infoStyle" align="center">Confirm Password</p>
       <input class="infoStyle" id="passwordSecond" type="text" name="" value="" required><br>
       <input class="loginButton" type="submit" name="" value="Add User"><br>
     </form>


    </section>
  </div>
   </body>
 </html>
