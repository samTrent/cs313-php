<?php session_start();
require('checkIfUserHasLoggedIn.php');
require('connectToDatabase.php');

$db = getDatabaseConnection();

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <script src="engine.js"></script>
     <meta charset="utf-8">
     <title></title>
   </head>
   <p id="error"></p>
   <body>
     <form class="" onsubmit="return checkBothPasswordsMatch()" action="index.html" method="post">
       Username: <input type="text" name="" value="" required><br>
       Password: <input id="passwordFirst" type="text" name="" value="" required><br>
       Confirm Password <input id="passwordSecond" type="text" name="" value="" required><br>
       <input type="submit" name="" value="Add User"><br>
     </form>
   </body>
 </html>
