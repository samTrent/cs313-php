<?php session_start();

$_SESSION['loginError'];
$_SESSION['userIsLoggedIn'] = false;

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="loginPage.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

    <img id="backgroundImg" src="hartGym3.jpg" alt="gym">
    <div class="centerWithBorder">


    <h1 class="textAlignCenter">Welcome to the Hart Scheduler</h1>
    <h3 class="textAlignCenter">Please sign in</h3>


  <!-- <img class="hartIconImg" src="hartIcon.png" alt="hart"> -->
    <section class="center">


      <form class="center" action="validateUsernameAndPassword.php" method="post">

        <?php
          //display error if username or password is wrong...
          if(isset($_SESSION['loginError']))
          {
            if($_SESSION['loginError'] == true)
            {
              echo "<p class='errorStyle'>Username/Password is invalid";
            }
          }
         ?>

        <p class="infoStyle" align="center">Username</p>
        <input style="textAlignCenter" type="text" name="username" value="" placeholder="Enter Username" required><br>
        <p class="infoStyle" align="center">Password</p>
        <input style="textAlignCenter" type="password" name="password" value="" placeholder="Enter Password" required><br>
        <img class="hartIconImg" src="hartIcon.png" alt="hart">
        <input class="loginButton" type="submit" name="" value="Login">

      </form>


    </section>

    </div>

  </body>
</html>
