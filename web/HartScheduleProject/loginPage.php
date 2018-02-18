<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

    <img id="backgroundImg" src="hartGym3.tiff" alt="gym">
    <div class="centerWithBorder">


    <h1 class="textAlignCenter">Welcome to the Hart Schedule</h1>
    <h3 class="textAlignCenter">Please sign in</h3>

    <form class="center" action="validateUsernameAndPassword.php" method="post">
      Username: <input class="textAlignCenter" type="text" name="username" value="" placeholder="Enter Username"><br>
      Password: <input class="textAlignCenter" type="password" name="password" value="" placeholder="Enter Password"><br>
      <input class="textAlignCenter" type="submit" name="" value="Login">
    </form>

      </div>

  </body>
</html>
