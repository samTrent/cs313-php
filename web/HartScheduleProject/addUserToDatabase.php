<?php session_start();
require('checkIfUserHasLoggedIn.php');

$_SESSION['userAlreadyExsists'];

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <link rel="stylesheet" href="hartSchedulePageLook.css">
     <script src="engine.js"></script>
     <meta charset="utf-8">
     <title></title>
   </head>

   <body>

     <img id="backgroundImg" src="hartGym3.jpg" alt="gym">
      <div class="centerWithBorder">
     <section class="center">
     <h1 class="textAlignCenter">Add User To Database</h1>


     <form class="center" onsubmit="return checkBothPasswordsMatch()" action="remoteUserAddDatabase.php" method="post">

       <?php
         //display error if username or password is wrong...
         if(isset($_SESSION['userAlreadyExsists']))
         {
           if($_SESSION['userAlreadyExsists'] == true)
           {
             echo "<p class='errorStyle'>This user already exsits, enter a different name.";
           }
         }
         echo "<p id='error' class='errorStyle'></p>"
        ?>


       <p class="infoStyle" align="center">Username</p>
       <input type="text" name="username" value="" placeholder="Enter a Username" required><br>
       <p class="infoStyle" align="center">Password</p>
       <input  id="passwordFirst" type="password" name="password" value="" placeholder="Enter a Password" required><br>
       <p class="infoStyle" align="center">Confirm Password</p>
       <input  id="passwordSecond" type="password" name="" value="" placeholder="Confirm Password" required><br>
       <input class="loginButton" type="submit" name="" value="Add User"><br>
     </form>


    </section>
  </div>
   </body>
 </html>
