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
   <h1>Add User To Database</h1>
   <p id="error"></p>
   <body>

     <img id="backgroundImg" src="hartGym3.jpg" alt="gym">

     <form class="" onsubmit="return checkBothPasswordsMatch()" action="remoteUserAddDatabase.php" method="post">
       Username: <input type="text" name="username" value="" required><br>
       Password: <input id="passwordFirst" type="text" name="password" value="" required><br>
       Confirm Password <input id="passwordSecond" type="text" name="" value="" required><br>
       <input type="submit" name="" value="Add User"><br>
     </form>
   </body>
 </html>
