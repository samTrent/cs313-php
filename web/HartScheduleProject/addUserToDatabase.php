<?php session_start();
require('checkIfUserHasLoggedIn.php');
require('connectToDatabase.php');

$db = getDatabaseConnection();

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <p id="error"></p>
   <body>
     <form class="" onsubmit="return checkBothPasswordsMatch()" action="index.html" method="post">
       Username: <input type="text" name="" value="" required>
       Password: <input id="passwordFirst" type="text" name="" value="" required>
       Confirm Password <input id="passwordSecond" type="text" name="" value="" required>
     </form>
   </body>
 </html>
